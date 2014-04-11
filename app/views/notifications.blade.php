@extends('layouts.master')

@section('title', 'Notifications')

@section('content')
	<h3 class="notif_header">Notifications</h3>
	<div class="notif_box">
		<p class="pull-left"><a href="#">Ryan Michaels</a> invited you to join the <a href="#">Artificial Intelligence group</a></p>
		<div class="notif_actions pull-right">
			<a href="{{ url('groups/ryanai') }}" class="btn btn-sm btn-primary">Accept</a>&nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-sm btn-default">Ignore</a>
		</div>
	</div>
	<div class="notif_box">
		<p class="pull-left"><a href="#">Keshavan Ravi</a> just created a quiz in the <a href="#">Artificial Intelligence group</a></p>
		<div class="notif_actions pull-right">
			<a href="{{ url('groups/ryanai/takequiz') }}" class="btn btn-sm btn-primary">Take Quiz</a>&nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-sm btn-default">Ignore</a>
		</div>
	</div>
@stop