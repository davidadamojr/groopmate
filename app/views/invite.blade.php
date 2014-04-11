@extends('layouts.master')

@section('title', 'Invite Friends')

@section('content')
	<h3>Invite Friends</h3><br/>
	<form role="form" class="">
		<div class="form-group">
			<label class="control-label">From</label>
			<div class="form-static-control">
				<p><a href="#">Ryan Michaels</a></p>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label" for="friends_to_invite">Friends to invite (Email Addresses)</label>
			<textarea class="form-control width700" name="friends_to_invite" id="friends_to_invite"></textarea>
		</div>
		<div class="form-group">
			<label class="control-label" for="message">Message</label>
			<textarea class="form-control width700" name="message" id="message"></textarea>
		</div>
		<a href="#" class="btn btn-primary">Send Invitation</a>
	</form>
@stop