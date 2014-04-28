@extends('layouts.master')

@section('title', 'Welcome to Groopmate')

@section('content')
	<h3>Welcome!</h3><br/>
	<div class="alert alert-info">
		<strong>Hey {{ Auth::user()->fname }}!</strong> It seems you are not yet a part of any groups. Create a group, maybe?
		<br/><br/><a class="btn btn-primary" href="{{ url('groups/create') }}"><span class="glyphicon glyphicon-plus"></span> Create Group</a>
	</div>
@stop