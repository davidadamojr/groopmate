@extends('layouts.public')

@section('title', 'Welcome to Groopmate')

@section('content')
	<h3>Welcome!</h3><br/>
	<div class="alert alert-info">
		<strong>You are one step away from joining the group you've been invited to!</strong> Please log in to accept your invitation. We will <strong>NEVER</strong> post anything on Facebook without your permission.
		<br/><br/><a href="{{ url('login/fb') }}"><img src="{{ asset('img/fblogin.png') }}" alt="Facebook login" /></a><br/>
	</div>
@stop