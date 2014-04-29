@extends('groups.group')

@section('groupcontent')
	<script type="text/javascript" src="{{ asset('js/jquery.validationEngine.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.validationEngine-en.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#groupnav li.active').removeClass('active');
			$('#quizzes').addClass('active');
			
			$('#addNew').click(function(event){
				$('.questions').append($('.question_template').html());
				$('.delete_question').bind('click', function(event){
					$(event.target).parent().parent().parent().remove();
				});
				
				bindEvents();
			});
			
			$('#btnSaveExit').click(function(event){
				validated = $('#quiz_form').validationEngine('validate');
				if (validated){
					//create json data containing the quiz information
					var questions = [];
					//iterate through all the questions and generate an object for each
					questionNodes = $('#quiz_form').find('.question_set');
					for (var i=0; i < questionNodes.length; i++){
						var question = new Object();
						question.text = $(questionNodes[i]).find('.questioninfo').val();
						var options = [];
						var optionsList = $(questionNodes[i]).find('.createoption');
						for (var j=0; j < optionsList.length; j++){
							var option = new Object();
							if ($(optionsList[j]).find('.correct').is(':checked')){
								option.correct = 1;
							} else {
								option.correct = 0;
							}
							option.text = $(optionsList[j]).find('.newoption').val();
							options.push(option);
						}
						question.options = options;
						questions.push(question);
					}
					
					strQuestions = JSON.stringify(questions);
					ajax_url = $('input[name=ajax_url]').val();
					description = $('textarea[name=quiz_desc]').val();
					$.post(ajax_url, {questions: strQuestions, desc: description}).done(function(data){
						window.location = data;
					});
				}
			});
			
			bindEvents();
		});
		
		function bindEvents(){
			$('.add_options').click(function(event){
				optionsList = $(event.target).parent().parent().prev();
				optionsList.append($('.option_template').html());
			});
				
			$('.delete_options').click(function(event){
				//you must have at least two options
				optionsList = $(event.target).parent().parent().prev();
				options = $(optionsList).children();
				if (options.length > 2){
					$(options[options.length-1]).remove();
				}
			});
		}
	</script>
	
	<h3 class="heading4">Create Quiz</h3><br/>
	<div class="col-md-8">
		<form role="form" id="quiz_form">
			<div class="form-group">
				<label class="control-label" for="quizdescription">Quiz Overview</label>
				<textarea class="form-control validate[required]" name="quiz_desc" placeholder="Please provide a brief description or overview of this quiz."></textarea>
			</div>
			<div class="questions">
				<div class="question_set">
					<div class="form-group">
						<label class="control-label" for="questiontext">Question Text</label>
						<textarea class="form-control validate[required] questioninfo" placeholder="Enter question text"></textarea>
					</div>
					<small>Tick the correct answers.</small><br/><br/>
					<div class="optionsList" class="options">
						<div class="col-md-10 createoption">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" class="correct"/>
								</span>
								<input type="text" class="newoption form-control validate[required]" placeholder="Click to add new option" />
							</div>
						</div>
						<div class="col-md-10 createoption">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" class="correct"/>
								</span>
								<input type="text" class="newoption form-control validate[required]" placeholder="Click to add new option" />
							</div>
						</div>
						<div class="col-md-10 createoption">
							<div class="input-group">
								<span class="input-group-addon">
									<input type="checkbox" class="correct"/>
								</span>
								<input type="text" class="newoption form-control validate[required]" placeholder="Click to add new option" />
							</div>
						</div>
					</div>
					<div class="option_btns">
						<div class="col-md-8">
							<a class="btn btn-default add_options" href="#">Add Options</a>&nbsp;&nbsp;<a class="btn btn-default delete_options" href="#">Delete Options</a>
						</div>
					</div>
				</div>
			</div>
			<a href="#" id="addNew" class="btn btn-default">Add New Question</a><br/>
			<div class="createquizactions" style="margin-top:40px;"><a href="{{ url('groups/'.$group->id.'/quizzes') }}" class="btn btn-default">Cancel Quiz</a>&nbsp;&nbsp;<a href="#" class="btn btn-primary" id="btnSaveExit">Save & Exit</a></div>
		</form>
		
		<div class="option_template" style="display:none;">
			<div class="col-md-10 createoption">
				<div class="input-group">
					<span class="input-group-addon">
						<input type="checkbox" class="correct">
					</span>
					<input type="text" class="newoption form-control validate[required]" placeholder="Click to add new option" />
				</div>
			</div>
		</div>
		
		<div class="question_template" style="display:none;">
			<div class="question_set">
				<div class="form-group">
					<label class="control-label" for="questiontext">Question Text</label>
					<textarea class="form-control validate[required] questioninfo" placeholder="Enter question text"></textarea>
				</div>
				<small>Tick the correct answers.</small><br/><br/>
				<div class="optionsList" class="options">
					<div class="col-md-10 createoption">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" class="correct">
							</span>
							<input type="text" class="newoption form-control validate[required]" placeholder="Click to add new option" />
						</div>
					</div>
					<div class="col-md-10 createoption">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" class="correct">
							</span>
							<input type="text" class="newoption form-control validate[required]" placeholder="Click to add new option" />
						</div>
					</div>
					<div class="col-md-10 createoption">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" class="correct" />
							</span>
							<input type="text" class="newoption form-control validate[required]" placeholder="Click to add new option" />
						</div>
					</div>
				</div>
				<div class="option_btns">
					<div class="col-md-8">
						<a class="btn btn-default add_options" href="#">Add Options</a>&nbsp;&nbsp;<a class="btn btn-default delete_options" href="#">Delete Options</a>
						&nbsp;&nbsp;<a href="#" class="delete_question">Delete Question</a>
					</div>
				</div>
				
				<input type="hidden" name="ajax_url" value="{{ $ajax_url }}" />
			</div>
		</div>
	</div>
@stop