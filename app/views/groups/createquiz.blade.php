@extends('groups.group')

@section('groupcontent')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#groupnav li.active').removeClass('active');
			$('#quizzes').addClass('active');
			bindNewOption();
		});
		
		function bindNewOption(){
			var createOptionHtml = "<div class='col-md-10 createoption'><div class='input-group'><span class='input-group-addon'><input type='checkbox'>" + 
									"</span><input type='text' class='newoption form-control' placeholder='Click to add new option' /></div></div>";
			$('.newoption').click(function(){
				$(this).unbind('click');
				$(this).removeClass('newoption');
				$('#optionsList').append(createOptionHtml);
				bindNewOption();
			});
		}
	</script>
	
	<h3 class="heading4">Create Quiz</h3><br/>
	<div class="row">
		<div class="col-md-6">
			<form role="form" class="">
				<div class="form-group">
					<label class="control-label" for="questiontext">Question Text</label>
					<textarea class="form-control" name="questiontext" id="questiontext" placeholder="Enter question text">Is breadth-first search optimal?</textarea>
				</div>
				<small>Tick the correct answers.</small><br/><br/>
				<div id="optionsList" class="options">
					<div class="col-md-10 createoption">
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox">
							</span>
							<input type="text" class="newoption form-control" placeholder="Click to add new option" />
						</div>
					</div>
				</div>
				<div class="smallfiller"></div>
				<div class="createquizactions" style=""><a href="{{ url('groups/ryanai/quizzes') }}" class="btn btn-default">Cancel Quiz</a>&nbsp;&nbsp;<a href="#" disabled class="btn btn-default">Save & Continue</a>&nbsp;&nbsp;&nbsp;<a href="{{ url('groups/ryanai/quizzes') }}" class="btn btn-primary">Finish Quiz</a></div>
			</form>
		</div>
		<div class="col-md-3">
			<ul class="list-group">
				<li class="list-group-item"><a href="#">Question 1</a> &nbsp;&nbsp;&nbsp;<a href="#"><span class="badge">Delete</span></a></li>
				<!--<li class="list-group-item"><a href="#">Question 2</a> &nbsp;&nbsp;&nbsp;<a href="#"><span class="badge">Delete</span></a></li>-->
			</ul>
		</div>
	</div>
@stop