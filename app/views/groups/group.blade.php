@extends('layouts.master')

@section('title', "Groopmate")

@section('content')
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<h2>{{ $group->group_name }}</h2><br/>
	
	@if (Session::has('message'))
		<div class="alert alert-success">
			{{ Session::get('message') }}
		</div>
	@endif
	
	<ul id="groupnav" class="nav nav-tabs">
		<!--<li id="feed" class="active"><a href="{{ url('groups/ryanai') }}">Ryan's AI Group</a></li>-->
		<li id="members"><a href="{{ url('groups/'.$group->id.'/members') }}">Members</a></li>
		<li id="quizzes"><a href="{{ url('groups/'.$group->id.'/quizzes') }}">Quizzes</a></li>
		<!--<li id="files"><a href="{{ url('groups/ryanai/files') }}">Files</a></li>-->
	</ul><br/>
	@yield('groupcontent')
	<div class="filler"></div>
@stop