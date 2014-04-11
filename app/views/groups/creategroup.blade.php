@extends('layouts.master')

@section('title', 'Create Group')

@section('content')
	<h2>Create Group</h2><br/>
	<form role="form">
		<div class="form-group">
			<label for="groupname">Group Name</label>	
			<input type="text" class="form-control width700" value="Ryan's AI Class Group" id="groupname" placeholder="Group Name" />
		</div>
		<div class="form-group">
			<label for="groupdesc">Group Description</label>
			<textarea class="form-control width700" name="groupdesc" id="groupdesc">This is a study and practice group for Dr. Swigger's Artificial Intelligence class for the Spring 2014 semester.</textarea>
		</div>
		<div class="form-group">
			<label for="members">Members</label>
			<textarea class="form-control width700" name="members" id="members">Keshavan Ravi, David Adamo</textarea>
		</div>
		<div class="form-group">
			<label for="emailinvite">Invite by email</label>
			<textarea class="form-control width700" name="emailinvite" id="emailinvite"></textarea>
		</div>
		<a href="{{ url('groups') }}" class="btn btn-primary">Submit</a>
	</form>
@stop