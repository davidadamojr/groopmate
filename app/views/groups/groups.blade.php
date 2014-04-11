@extends('layouts.master')

@section('title', 'My Groups')

@section('content')
	<div class="headerbuttonbar" style="">
		<div class="pull-left heading3">My Groups</div>
		<div class="headerbutton">
			<a href="{{ url('groups/create') }}" class="btn pull-right btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Create Group</a>
		</div>
	</div><br/>
	<div class="panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title"><a href="grouppage.html">Ryan's AI Class Group</a></h3>
		</div>
		<div class="panel-body">
			This is a study and practice group for Dr. Swigger's Artificial Intelligence class for the Spring 2014 semester.<br/><br/>
			<div class="row">
				<div class="col-lg-10">
					<a href="{{ url('groups/ryanai') }}" class="btn btn-primary btn-sm">Go to group page</a>
				</div>
				<div class="col-lg-2" style="text-align:right;">
					<strong><small>3 MEMBERS</small></strong>
				</div>
			</div>
		</div>
	</div>
	<!--<div class="panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title"><a href="grouppage.html">Human Computer Interaction Group</a></h3>
		</div>
		<div class="panel-body">
			This is a group for Dr. Swigger's Human Computer Interaction class.<br/><br/>
			<div class="row">
				<div class="col-lg-10">
					<a href="grouppage.html" class="btn btn-primary btn-sm">Go to group page</a>
				</div>
				<div class="col-lg-2" style="text-align:right;">
					<strong><small>8 MEMBERS</small></strong>
				</div>
			</div>
		</div>
	</div>-->
@stop