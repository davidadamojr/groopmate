@extends('groups.group')

@section('groupcontent')
	<script type="text/javascript">
		$(document).ready(function(){
			$('li.active').removeClass('active');
			$('#members').addClass('active');
			
			$('#emailinvite').tagsInput({
				width: '500',
				defaultText: 'Add comma-separated email addresses'
			});
			
			$('#emailinvite_tagsinput').addClass('form-control');
			//$('#emailinvite_tag').addClass('validation[required]');
		});
	</script>
	<script type="text/javascript" src="{{ asset('js/jquery.tagsinput.min.js') }}"></script>
	<div class="headerbuttonbar" style="">
		<div class="pull-left heading4">{{ count($members) }} Members</div>
		<div class="headerbutton">
			<button data-toggle="modal" data-target="#addPeopleModal" class="btn pull-right btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add People</button>
		</div>
	</div>
	<div class="row stubrow" style="margin-top:20px;">
		@foreach ($members as $member)
			<div class="col-md-3 userstub">
				<div class="row">
					<div class="col-md-4">
						<img width="70" height="66" src="{{ $member->photo }}" alt="img-rounded" />
					</div>
					<div class="col-md-8">
						<h5>{{ $member->fname . ' ' . $member->lname }}</h5>
						<!--<p>Reputation: 256</p>-->
					</div>
				</div>
			</div>
		@endforeach
	</div>
	
	
	<!-- Add people modal -->
	<div class="modal fade" id="addPeopleModal" tabindex="-1" role="dialog" aria-labelledby="addPeopleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form role="form" class="" action="{{ url('groups/'.$group->id.'/invite') }}" method="post">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="addPeopleModalLabel">Add People</h4>
					</div>
					<div class="modal-body">	
						<div class="form-group">
							<label class="control-label">From</label>
							<div class="form-static-control">
								<p><a href="#">{{ Auth::user()->fname . ' ' . Auth::user()->lname }}</a></p>
							</div>
						</div>
						<!--<div class="form-group">
							<label class="control-label" for="friends_to_invite">Names</label>
							<textarea class="form-control" name="friends_to_invite" id="friends_to_invite">Ruth Brendan, Quentin Mayo, Natavia Jones</textarea>
						</div>-->
						<div class="form-group">
							<label class="control-label" for="emailinvite">Email Addresses</label>
							<textarea class="form-control" name="emailinvite" id="emailinvite">davidadamojr@gmail.com, davidtadamojr@yahoo.com</textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Send Invitation</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop