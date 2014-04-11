@extends('groups.group')

@section('groupcontent')
	<textarea class="form-control" name="sharetext" rows="4" style="width:700px;" placeholder="Ask a question, or share an idea"></textarea><br/>
	<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-pushpin"></span> Post</a>
	<hr width="700" align="left" />
	<div class="questiontext">
		<a href="#"><strong>Ryan Michaels</strong></a>
		<p>I was looking around the Internet and found this really interesting use of Bayes Networks in trying to locate the missing Malaysian Airlines plane. http://www.interestinginfo.com</p>
		<p><small>Posted 2 mins ago</small></p>
		<div class="comments">
			<textarea name="newcomment" class="form-control" placeholder="Add a comment"></textarea><br/>
			<div class="onecomment">
				<strong><a href="#">David Adamo</a></strong>
				<p>Wow! This is really interesting.</p>
			</div>
			<div class="onecomment">
				<strong><a href="#">Keshavan Ravi</a></strong>
				<p>I really don't see how this helps the search... Maybe we can get Dr. Swigger to explain it.</p>
			</div>
		</div>
	</div>
	<div class="questiontext">
		<a href="#"><strong>Keshavan Ravi</strong></a>
		<p>I am having trouble understanding Bayes Network inference. Can anyone help me?</p>
		<p><small>Posted 2 mins ago</small></p>
		<div class="comments">
			<textarea name="newcomment" class="form-control" placeholder="Add a comment"></textarea><br/>
			<div class="onecomment">
				<strong><a href="#">David Adamo</a></strong>
				<p>Sure! Let's plan a time to meet up after class.</p>
			</div>
			<div class="onecomment">
				<strong><a href="#">Ryan Michaels</a></strong>
				<p>I am having serious problems understanding it too.</p>
			</div>
		</div>
	</div>
@stop