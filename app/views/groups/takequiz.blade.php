@extends('groups.group')

@section('groupcontent')
	<script type="text/javascript" src="{{ asset('js/jquery.validationEngine.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.validationEngine-en.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#groupnav li.active').removeClass('active');
			$('#quizzes').addClass('active');
			
			$('#questions_form').validationEngine('attach', {
				autoHidePrompt: true,
				autoHideDelay: 2000
			});
			
			$('#btnCheckAnswers').click(function(event){
				validated = $('#questions_form').validationEngine('validate');
				if (validated){
					//highlight correct options
					option_list = $('input[name=array]').val();
					toHighlight = eval('[' + option_list + ']');
					$('.questionbox').find('.an_option').each(function(){
						var id = parseInt($(this).attr('id'));
						if ($.inArray(id, toHighlight) != -1){
						    //alert(id + " is in there.");
							$(this).parent().parent().css('background-color', '#dff0d8');
						}
						
						if ($(this).is(':checked')){
							if ($.inArray(id, toHighlight) == -1){
								$(this).parent().parent().css('background-color', '#f2dede');
							}
						}
					});
				} else {
					$('#attemptAll').show();
				}
			});
		});
	</script>
	<div class="alert alert-danger" id="attemptAll" style="width:700px;display:none;">
		Please attempt all the questions first.
	</div>
	<h3 class="heading4">Quiz by {{ $quiz->user()->getResults()->fname . ' ' . $quiz->user()->getResults()->lname }}</a></h3><br/>
	<?php $count = 1; ?>
	<form id="questions_form">
	@foreach ($quiz->questions()->getResults() as $question)
		<div class="row questionbox">
			<div class="col-md-9 question">
				<div class="questiontext">
					<p><strong>Question {{ $count }}</strong></p>
					<p>{{ $question->text }}</p>
				</div>
				<small>Tick the correct answer(s).</small><br/>
				<div id="optionsList" class="options">
					<div class="col-md-10 createoption" style="">
						@foreach ($question->options()->getResults() as $option)
							<div class="checkbox" style="padding:5px;">
								<label>
									<input style="margin-left:0px;" type="checkbox" name="option{{ $question->id }}" class="validate[minCheckbox[1]] an_option" value="{{ $option->id }}" id="{{ $option->id }}"> &nbsp;&nbsp;&nbsp;{{ $option->text }}
								</label>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<?php $count = $count + 1; ?>
	@endforeach
	</form>
	<input type="hidden" name="array" value="{{ $option_ids }}"/>
	<div class="smallfiller"></div>
	<div class="createquizactions" style=""><a href="{{ url('groups/'.$group->id.'/quizzes') }}" class="btn btn-default">&larr; Back to Quizzes</a>&nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-primary" id="btnCheckAnswers">Check Answers</a></div>
	<!--<div class="panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title">Quiz by <a href="#">Ryan Michaels</a></h3>
		</div>
		<div class="panel-body">
			This quiz covers the following topics in Dr. Swigger's Artificial Intelligence class: Reinforcement Learning and Naive Bayes.<br/><br/>
			<a href="takequiz.html" class="btn btn-primary btn-sm">Take Quiz</a> &nbsp;&nbsp;&nbsp;<strong><small>Already taken by 2 group members</small></strong>
		</div>
	</div>-->
@stop