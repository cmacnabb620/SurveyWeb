<!-- ********************Modal for Add New Client: Start********************************** -->
<div id="add-client" class="modal hide fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Add new Client</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal" id="newclientform">
		   <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="control-group">
				<label class="control-label" for="client"><b>Client Name:<span style="color:red">*</span></b></label>
				<div class="controls">
					<input type="text" class="form-control" id="client_name" name="client_name" placeholder="Enter Client Name" maxlength="50">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="client"><b>Org Abbrev:<span style="color:red">*</span></b></label>
				<div class="controls">
					<input type="text" class="form-control" id="org_abbrev" name="org_abbrev" placeholder="Enter Org Abbrev" maxlength="50">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="client"><b>Client Type:<span style="color:red">*</span></b></label>
				<div class="controls">
					<input type="text" class="form-control" id="client_type" name="client_type" placeholder="Enter Client Type" maxlength="50">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="client"><b>Address-1:<span style="color:red">*</span></b></label>
				<div class="controls">
					<textarea rows="3" cols="50" name="address_1" id="address_1" placeholder="Address One..."></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="client"><b>Address-2:<span style="color:red">*</span></b></label>
				<div class="controls">
					<textarea rows="3" cols="50" name="address_2" id="address_2" placeholder="Address Two..."></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="client"><b>Country:<span style="color:red">*</span></b></label>
				<div class="controls">
					<select data-placeholder="" id="country"  name="country"></select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="client"><b>State:<span style="color:red">*</span></b></label>
				<div class="controls">
					 <select data-placeholder="Select State" id="state" name="state"></select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="client"><b>City:<span style="color:red">*</span></b></label>
				<div class="controls">
					<input type="text" class="form-control" id="city" name="city" placeholder="Enter Enter City" maxlength="50">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="client"><b>Phone Number:<span style="color:red">*</span></b></label>
				<div class="controls">
					<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" maxlength="50">
				</div>
			</div>

			<div class="center">
				<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
				<button type="button" onclick="javascript:return newClientAdd();" class="btn btn-primary">Save</button>
			</div>
			</div>
		</form>
	</div>
</div>
 <!-- ********************Modal for Add New Client: End************************************ -->

 