@extends('groups.group')

@section('groupcontent')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#groupnav li.active').removeClass('active');
			$('#quizzes').addClass('active');
		});
	</script>
	<h3 class="heading4">Quizzes</h3><br/>
	<div class="headerbuttonbar" style="">
		<div class="pull-left">
			<ul class="nav nav-pills">
				<li><a href="{{ url('groups/ryanai/quizzes') }}">New</a></li>
				<li class="active"><a href="{{ url('groups/ryanai/quizzes/taken') }}">Taken</a></li>
			</ul>
		</div>
		<div class="headerbutton">
			<a href="{{ url('groups/ryanai/createquiz') }}" class="btn pull-right btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Create Quiz</a>
		</div>
	</div>
	</br>
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