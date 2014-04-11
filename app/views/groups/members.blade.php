@extends('groups.group')

@section('groupcontent')
	<script type="text/javascript">
		$(document).ready(function(){
			$('li.active').removeClass('active');
			$('#members').addClass('active');
		});
	</script>
	<div class="headerbuttonbar" style="">
		<div class="pull-left heading4">3 Members</div>
		<div class="headerbutton">
			<button data-toggle="modal" data-target="#addPeopleModal" class="btn pull-right btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add People</button>
		</div>
	</div>
	<div class="row stubrow" style="margin-top:20px;">
		<div class="col-md-3 userstub">
			<div class="row">
				<div class="col-md-4">
					<img src="{{ asset('img/blank.jpg') }}" alt="img-rounded" />
				</div>
				<div class="col-md-8">
					<h5><a href="#">Keshavan Ravi</a></h5>
					<p>Reputation: 256</p>
				</div>
			</div>
		</div>
		<div class="col-md-3 userstub">
			<div class="row">
				<div class="col-md-4">
					<img src="{{ asset('img/blank.jpg') }}" alt="img-rounded" />
				</div>
				<div class="col-md-8">
					<h5><a href="#">Ryan Michaels</a></h5>
					<p>Reputation: 256</p>
				</div>
			</div>
		</div>
		<div class="col-md-3 userstub">
			<div class="row">
				<div class="col-md-4">
					<img src="{{ asset('img/blank.jpg') }}" alt="img-rounded" />
				</div>
				<div class="col-md-8">
					<h5><a href="#">David Adamo</a></h5>
					<p>Reputation: 256</p>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- Add people modal -->
	<div class="modal fade" id="addPeopleModal" tabindex="-1" role="dialog" aria-labelledby="addPeopleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="addPeopleModalLabel">Add People</h4>
				</div>
				<div class="modal-body">
					<form role="form" class="">
						<div class="form-group">
							<label class="control-label">From</label>
							<div class="form-static-control">
								<p><a href="#">Ryan Michaels</a></p>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label" for="friends_to_invite">Names</label>
							<textarea class="form-control" name="friends_to_invite" id="friends_to_invite">Ruth Brendan, Quentin Mayo, Natavia Jones</textarea>
						</div>
						<div class="form-group">
							<label class="control-label" for="emails">Email Addresses</label>
							<textarea class="form-control" name="emails" id="emails"></textarea>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Send Invitation</button>
				</div>
			</div>
		</div>
	</div>
</div>
@stop