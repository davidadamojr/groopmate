<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::model('group', 'Group');
Route::model('quiz', 'Quiz');

Route::get('/', function()
{
	Session::flush();
	return View::make('hello');
});

Route::get('login/fb', function(){
	$facebook = new Facebook(Config::get('facebook'));
	$params = array(
		'redirect_uri' => url('login/fb/callback')
	);
	return Redirect::away($facebook->getLoginUrl($params));
});

Route::get('login/fb/callback', function(){
	$code = Input::get('code');
	if (strlen($code) == 0) return Redirect::away('/')->with('message', 'There was an error communicating with Facebook');
	
	$facebook = new Facebook(Config::get('facebook'));
	$uid = $facebook->getUser();
	
	if (!$uid) return Redirect::away('/')->with('message', 'There was an error.');
	
	try {
		$me = $facebook->api('/'.$uid, 'GET');
	} catch (FacebookApiException $e) {
		echo $e->getMessage();
		//$login_url = $facebook->getLoginUrl();
		//Redirect::away($login_url)->with('message', $e->getMessage());
	}
	
	$profile = Profile::whereUid($uid)->first();
	if (empty($profile)){
		$user = new User;
		$user->fname = $me['first_name'];
		$user->lname = $me['last_name'];
		//$user->email = $me['email'];
		$user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';
		$user->save();
		
		$profile = new Profile();
		$profile->uid = $uid;
		$profile->username = $me['username'];
		$profile->access_token = $facebook->getAccessToken();
		$profile->access_token_secret = '';
		$profile = $user->profiles()->save($profile);
	} else {
		$profile->access_token = $facebook->getAccessToken();
		$profile->save();
	}
	
	$user = $profile->user;
	
	Auth::login($user);
	
	//if this user is accepting an invitation, add the user to the appropriate group and redirect to the group page
	if (Session::has('confirmation_code')){
		//get the group the user has been invited to using the confirmation code
		$invitation = Invitation::where('code', '=', Session::get('confirmation_code'))->where('accepted', '=', '0')->first();
		$group_id = $invitation->group_id;
		
		//add the user to the group
		$member = new Member;
		$member->group_id = $group_id;
		$member->user_id = $user->id;
		$member->save();
		
		//update the invitation database to indicate the user has accepted the invitation
		$invitation->accepted = true;
		$invitation->save();
		
		//redirect to the appropriate group page
		return Redirect::to('groups/'.$group_id)->with('message', $user->fname . ', welcome to the group.');
	} else {
		return Redirect::away('/welcome');
	}
});

Route::get('logout', function()
{
	Auth::logout();
	
	return Redirect::away('/');
});

Route::get('welcome', function()	
{
	if (Auth::check()){
		//if the user is part of any groups, show the groups. If not, show the welcome prompt
		$user = Auth::user();
		if ($user->groups()->count() == 0){
			return View::make('welcome');
		} else {
			return Redirect::to('groups');
		}
	} else {
		return Redirect::away('/')->with('message', 'Please log in.');
	}
	
});

Route::get('invitations/{code}', array('as'=>'accept_invitation', function($code)
{
	//set session variable for potential user
	Session::put('confirmation_code', $code);
	
	return View::make('accept');
}));

Route::get('notifications', function()
{
	return View::make('notifications');
});

Route::get('invite', function()
{
	return View::make('invite');
});

Route::get('userstats', function()
{
	return View::make('userstats');
});

Route::get('groups', function()
{
	$user = Auth::user();
	$groups = $user->groups()->getResults();
	
	if (count($groups) == 0){
		return Redirect::to('welcome');
	}
	
	return View::make('groups.groups')->with('groups', $groups);
});

Route::post('groups/create', function()
{
	//insert data into groups table
	$group_details = Input::except('emailinvite');
	$group = Group::create($group_details);
	
	//add the creator to the group
	$member = new Member;
	$member->group_id = $group->id;
	$member->user_id = Auth::user()->id;
	$member->save();
	
	$email_addresses = explode(',', Input::get('emailinvite'));
	if (trim($email_addresses[0]) != ''){ //rudimentary email list check
		foreach ($email_addresses as $email){
			//generate confirmation link
			$random_hash = md5(uniqid(rand(), true));
			$confirmation_link = route('accept_invitation', array('code' => $random_hash));
			
			//insert invitation info into database
			$invitation = new Invitation;
			$invitation->email = $email;
			$invitation->code = $random_hash;
			$invitation = $group->invitations()->save($invitation);
			
			//send mail to invitees
			$data = array(
				'from' => Auth::user()->fname . ' ' . Auth::user()->lname,
				'confirmation_link' => $confirmation_link
			);
			Mail::queue('emails.invitation', $data, function($message) use ($data, $email)
			{
				$message->from('info@groopmate.com', $data['from']);
				$message->to($email)->subject('Group Invitation');
			});
		}
	}
	
	//return $group;
	return Redirect::to('groups/' . $group->id)->with('message', 'Group successfully created.');
});

Route::get('groups/create', function()
{
	return View::make('groups.creategroup');
});

Route::get('groups/{group}', function(Group $group){
	return Redirect::to('groups/'.$group->id.'/members');
});

Route::get('groups/{group}/members', function(Group $group){
	$data = array(
		'group' => $group,
		'members' => $group->members()->getResults()
	);
	return View::make('groups.members', $data);
});

Route::post('groups/{group_id}/invite', function($group_id){
	$email_addresses = explode(',', Input::get('emailinvite'));
	if (trim($email_addresses[0]) != ''){ //rudimentary email list check
		foreach ($email_addresses as $email){
			//generate confirmation link
			$random_hash = md5(uniqid(rand(), true));
			$confirmation_link = route('accept_invitation', array('code' => $random_hash));
			
			//insert invitation info into database
			$invitation = new Invitation;
			$invitation->email = $email;
			$invitation->code = $random_hash;
			$invitation->group_id = $group_id;
			$invitation->save();
			
			//send mail to invitees
			$data = array(
				'from' => Auth::user()->fname . ' ' . Auth::user()->lname,
				'confirmation_link' => $confirmation_link
			);
			Mail::queue('emails.invitation', $data, function($message) use ($data, $email)
			{
				$message->from('info@groopmate.com', $data['from']);
				$message->to($email)->subject('Group Invitation');
			});
		}
		
		return Redirect::to('groups/' . $group_id)->with('message', 'Invitations sent out successfully.');
	}
});

/*Route::get('/groups/ryanai', function()
{
	return View::make('groups.feed');
});

Route::get('/groups/ryanai/members', function()
{
	return View::make('groups.members');
});*/

Route::get('groups/{group}/createquiz', function(Group $group)
{
	$data = array(
		'group' => $group,
		'ajax_url' => url('groups/'.$group->id.'/createquiz')
	);
	return View::make('groups.createquiz', $data);
});

Route::post('groups/{group}/createquiz', function(Group $group)
{	
	//ajax - returns a redirect link to the view
	
	//create new quiz entry
	$quiz = new Quiz;
	$quiz->description = Input::get('desc');
	$quiz->user_id = Auth::user()->id;
	$quiz->group_id = $group->id;
	$quiz->save();

	//Create database entries for the questions in this quiz
	$json_questions = Input::get('questions');
	$questions = json_decode($json_questions);	
	foreach ($questions as $question){
		$quizQuestion = new Question;
		$quizQuestion->text = $question->text;
		$quizQuestion->quiz_id = $quiz->id;
		$quizQuestion->save();
		
		//add the options for this question to the database
		$options = $question->options;
		foreach ($options as $option){
			$quizOption = new Option;
			$quizOption->text = $option->text;
			$quizOption->correct = $option->correct;
			$quizOption->question_id = $quizQuestion->id;
			$quizOption->save();
		}
	}
	
	Session::flash('message', 'Quiz successfully created.');
	return url('groups/'.$group->id.'/quizzes');
});

Route::get('groups/{group}/takequiz/{quiz}', function(Group $group, Quiz $quiz){
	$option_ids = "";
	
	$questions = $quiz->questions()->getResults();
	foreach ($questions as $question){
		$correct_options = $question->options()->where('correct', '=', '1')->getResults();
		foreach ($correct_options as $option){
			$option_ids = $option_ids . $option->id . ',';
		}
	}
	
	$option_ids = $option_ids . "'X'";
	
	$data = array(
		'group' => $group,
		'quiz' => $quiz,
		'option_ids' => $option_ids
	);
	return View::make('groups.takequiz', $data);
});

/*Route::get('/groups/ryanai/takequiz', function()
{
	return View::make('groups.takequiz');
});

Route::get('groups/ryanai/files', function()
{
	return View::make('groups.files');
});*/

Route::get('groups/{group}/quizzes', function(Group $group)
{
	$quizzes = $group->quizzes()->orderBy('created_at', 'desc')->getResults();
	$data = array(
		'group' => $group,
		'quizzes' => $quizzes
	);
	return View::make('groups.quizzes', $data);
});

Route::get('groups/{group}/quizzes/taken', function(Group $group)
{
	$user = Auth::user();
	$quizzes_taken = $user->taken()->getResults();
	$data = array(
		'group' => $group,
		'quizzes' => $quizzes_taken
	);
	return View::make('groups.taken', $data);
});