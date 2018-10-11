<!-- ********************Modal for Add New Language: Start******************************** -->
<div id="add_new_language" class="modal hide fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Add New Language</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="language"><b>Language Name<span style="color:red">*</span></b></label>
				<div class="controls">
					<input type="text" class="form-control" id="new_language" name="new_language" placeholder="Enter New Language" maxlength="50" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="language"><b>Language ISO Name</b></label>
				<div class="controls">
					<input type="text" class="form-control" id="new_iso_name" name="new_iso_name" placeholder="Language ISO Name" maxlength="10">
				</div>
			</div>
			<div class="center">
				<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
				<button type="button" onclick="javascript:return newLanguageAdd();" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
 <!-- ********************Modal for Add New Language: End********************************** -->