@extends('layouts.master')

@section('title', "Ryan's AI Group")

@section('content')
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<h2>Ryan's AI Group</h2><br/>
	<ul id="groupnav" class="nav nav-tabs">
		<li id="feed" class="active"><a href="{{ url('groups/ryanai') }}">Ryan's AI Group</a></li>
		<li id="members"><a href="{{ url('groups/ryanai/members') }}">Members</a></li>
		<li id="quizzes"><a href="{{ url('groups/ryanai/quizzes') }}">Quizzes</a></li>
		<li id="files"><a href="{{ url('groups/ryanai/files') }}">Files</a></li>
	</ul><br/>
	@yield('groupcontent')
	<div class="filler"></div>
@stop