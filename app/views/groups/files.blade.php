@extends('groups.group')

@section('groupcontent')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#groupnav li.active').removeClass('active');
			$('#files').addClass('active');
		});
	</script>
	<div class="headerbuttonbar" style="">
		<div class="pull-left heading3">Files</div>
		<div class="headerbutton">
			<a href="#" data-toggle="modal" data-target="#uploadModal" class="btn pull-right btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Upload File</a>
		</div>
	</div><br/>
	<div class="panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title">DataRequirements.pdf</h3>
		</div>
		<div class="panel-body">
			This file contains sample code for the Reinforcement Learning homework in Artificial Intelligence class.<br/><br/>
			<a href="#" class="btn btn-primary btn-sm">Download File</a> &nbsp;&nbsp;&nbsp;<strong><small>Uploaded by <a href="#">Ryan Michaels</a></small></strong>
		</div>
	</div>
	
	<!-- Upload file modal -->
	<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="uploadModalLabel">Upload File</h4>
				</div>
				<div class="modal-body">
					<form role="form" class="">
						<div class="form-group">
							<textarea class="form-control" name="emails" id="emails" placeholder="Say something about this file..."></textarea>
						</div>
						<div class="form-group">
							<label for="inputFile">Select a file on your computer (Max size 25MB)</label>
							<input type="file" id="inputFile" />
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Upload File</button>
				</div>
			</div>
		</div>
	</div>
@stop