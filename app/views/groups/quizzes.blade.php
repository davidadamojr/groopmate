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
				<li class="active"><a href="{{ url('groups/'.$group->id.'/quizzes') }}">All</a></li>
				<li><a href="{{ url('groups/'.$group->id.'/quizzes/taken') }}">Taken</a></li>
			</ul>
		</div>
		<div class="headerbutton">
			<a href="{{ url('groups/'.$group->id.'/createquiz') }}" class="btn pull-right btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Create Quiz</a>
		</div>
	</div>
	</br>
	@if (count($quizzes) > 0)
		@foreach ($quizzes as $quiz)
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Quiz by {{ $quiz->user()->getResults()->fname . ' ' . $quiz->user()->getResults()->lname }}</h3>
				</div>
				<div class="panel-body">
					{{ $quiz->description }}<br/><br/>
					<a href="{{ url('groups/'.$group->id.'/takequiz/'.$quiz->id) }}" class="btn btn-primary btn-sm">Take Quiz</a> <!--&nbsp;&nbsp;&nbsp;<strong><small>Already taken by 2 group members</small></strong>-->
				</div>
			</div>
		@endforeach
	@else
		<strong>No quizzes at the moment.</strong>
	@endif
@stop