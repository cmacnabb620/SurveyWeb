 <!-- ********************Modal for Add New Survey: Start********************************** -->
<div id="add-survey" class="modal hide fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Add New Survey</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal" action="#" method="POST" id="mysurveytypeform">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="control-group">
				<label class="control-label" for="surveytype"><b>Enter Survey Type<span style="color:red">*</span>	</b></label>
				<div class="controls">
					<input type="text" class="form-control" id="survey_new_type" name="survey_new_type" placeholder="Enter New Survey Type" maxlength="50">
				</div>
			</div>
			<div class="center">
				<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
				<button type="button" onclick="javascript:return surveyTypeCheck();" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
<!-- ********************Modal for Add New Survey: End************************************ -->


