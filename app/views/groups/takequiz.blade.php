@extends('groups.group')

@section('groupcontent')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#groupnav li.active').removeClass('active');
			$('#quizzes').addClass('active');
		});
	</script>
	<h3 class="heading4">Quiz by <a href="#">Keshavan Ravi</a></h3><br/>
	<div class="row">
		<div class="col-md-6">
			<div class="questiontext">
				<p><strong>Question 1</strong></p>
				<p>Is breadth-first search optimal?</p>
			</div>
			<small>Tick the correct answer(s).</small><br/>
			<div id="optionsList" class="options">
				<div class="col-md-10 createoption">
					<div class="checkbox">
						<label>
							<input type="checkbox"> Yes
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox"> No
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox"> Maybe
						</label>
					</div>
				</div>
			</div>
			<div class="smallfiller"></div>
			<div class="createquizactions" style=""><a href="{{ url('groups/ryanai/quizzes') }}" class="btn btn-default">Cancel Quiz</a>&nbsp;&nbsp;<a href="#" disabled class="btn btn-default">Save & Continue</a>&nbsp;&nbsp;&nbsp;<a href="{{ url('groups/ryanai/quizzes') }}" class="btn btn-primary">Finish Quiz</a></div>
		</div>
	</div>
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