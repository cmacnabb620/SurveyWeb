 <!-- ********************Modal for Add New Survey: Start********************************** -->
<div id="add_new_pm" class="modal hide fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Add New Project Manager</h3>
	</div>
	<div class="modal-body">
		 <div class="box-content">
        <form class="form-horizontal" action="{{url('admin/submit_user_details')}}" method="POST" id="myform">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="user_type" value="2">
          <fieldset>
            <div class="span6">
              <div class="control-group">
                <label class="control-label" for="name"><b>First Name<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" class="form-control" id="fname" name="fname"  placeholder="Enter First Name" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="name"><b>Last Name<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" class="form-control" id="lname" name="lname"  placeholder="Enter Last Name" maxlength="50">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="name"><b>Email<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="email" class="form-control" id="email" name="email"  placeholder="Enter Email" maxlength="50" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="name"><b>Phone Number<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" maxlength="14" maxlength="14"/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"><b>Date of Birth<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" id="date" class="form-control datepicker" name="date" data-format="mm/dd/yyyy" placeholder="Enter Date of Birth">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"><b>Start Date<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" id="start_date" class="form-control datepicker" name="start_date" data-format="mm/dd/yyyy" placeholder="Enter Start Date">
                </div>
              </div>
            </div>
            <div class="span6">
              <div class="control-group">
                <label class="control-label" for="country"><b>Country<span style="color:red">*</span></b></label>
                <div class="controls">
                  <select data-placeholder="" id="country"  name="country">
                    
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="state"><b>State<span style="color:red">*</span></b></label>
                <div class="controls">
                  <select data-placeholder="Select State" id="state" name="state">
                    <!-- <option>Select State</option> -->
                    
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="city"><b>City<span style="color:red">*</span></b></label>
                <div class="controls">
                  <input type="text" name="city" class="form-control" id="city"  placeholder="Enter City" maxlength="50" >
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label" for="address"><b>Address<span style="color:red">*</span></b></label>
                <div class="controls">
                  <textarea rows="3" cols="50" name="address" id="address" placeholder="Address..."></textarea>
                </div>
              </div>
            </div>
            <div class="row-fluid span12">
              <div class="span5 offset4">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                <button type="button"  class="btn btn-primary" onclick="javascript:return managerValidationCheck();" >Save</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
	</div>
</div>
<!-- ********************Modal for Add New Survey: End************************************ -->


