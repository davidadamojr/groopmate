@extends('layouts.master')

@section('title', 'Create Group')

@section('content')
	<script type="text/javascript" src="{{ asset('js/jquery.tagsinput.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.validationEngine.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.validationEngine-en.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#creategroupFrm').validationEngine({
				validateNonVisibleFields: true
			});
			
			$('#emailinvite').tagsInput({
				width: '700',
				defaultText: 'Add comma-separated email addresses'
			});
			
			$('#emailinvite_tagsinput').addClass('form-control');
			$('#emailinvite_tag').addClass('validation[required]');
		});
	</script>
	<h2>Create Group</h2><br/>
	<form role="form" id="creategroupFrm" action="{{ url('groups/create') }}" method="post">
		<div class="form-group">
			<label for="groupname">Group Name</label>	
			<input type="text" class="form-control width700 validate[required]" value="" name="group_name" id="groupname" placeholder="Group Name" />
		</div>
		<div class="form-group">
			<label for="groupdesc">Group Description</label>
			<textarea class="form-control width700 validate[required]" placeholder="Group description" name="description" id="groupdesc"></textarea>
		</div>
		<!--<div class="form-group">
			<label for="members">Members</label>
			<textarea class="form-control width700" name="members" id="members">Keshavan Ravi, David Adamo</textarea>
		</div>-->
		<div class="form-group">
			<label for="emailinvite">Invite by email (comma-separated email addresses)</label><br/>
			<textarea placeholder="Comma separated email addresses" class="form-control width700" name="emailinvite" id="emailinvite">dtgeadamo@yahoo.com, secretdesires613@yahoo.com</textarea>
			<!--<input type="text" class="form-control width700 validate[required]" data-role="tagsinput" value="" name="emailinvite" id="emailinvite" placeholder="Comma separated email addresses" />-->
		</div>
		<!--<a href="{{ url('groups') }}" class="btn btn-primary">Submit</a>-->
		<button class="btn btn-primary" type="submit">Submit</button>
	</form>
@stop