@extends('ProjectManager.Layouts.master')
@section('page-title')
Add New Provider
@endsection
@section('local-style')
<style type="text/css">
</style>
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('project_manager/dashboard')}}">Dashboard</a>
		</li>
		<li>
			<i class="icon-angle-right"></i>
			<a href="{{ url('project_manager/manage_providers') }}">Manage Providers</a>
		</li>
		<li>
			<i class="icon-angle-right"></i>
			<a href="{{ url('project_manager/add_new_provider') }}">Add New Provider</a>
		</li>
	</ul>
	<div class="row-fluid sortable">
		<div class="box span7">
			<div class="box-header" data-original-title>
				<h2>
				<i class="halflings-icon white edit"></i>
				<span>Add New Client</span></h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				 <form class="form-horizontal" action="{{ url('project_manager/save_new_provider') }}" method="POST" id="addNewProvider">
				<!-- <form  class="form-horizontal" id="addNewProvider"> -->
					<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
					<fieldset>
						<div class="span8 offset1">
							<div class="control-group">
								<label class="control-label" for="fname"><b>Providers First Name</b></label>
								<div class="controls">
									<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" maxlength="50">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="lname"><b>Providers Last Name</b></label>
								<div class="controls">
									<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" maxlength="50">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="req_surveys"><b>Required Surveys</b></label>
								<div class="controls">
									<input type="text" class="form-control" id="req_surveys" name="req_surveys" placeholder="" maxlength="50" onkeypress="return isNumberKey(event)">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="completed_surveys"><b>Completed Surveys</b></label>
								<div class="controls">
									<input type="text" class="form-control" id="completed_surveys" name="completed_surveys" placeholder="" maxlength="50" onkeypress="return isNumberKey(event)">
								</div>
							</div>
						</div>
						<div class="span5 offset4">
							<button type="button" onclick="redirect()" class="btn btn-default"><i class="halflings-icon chevron-left white"></i>Go Back</button>
							<button type="button" onclick="reset()" class="btn btn-warning">Reset</button>
							<button type="submit" class="btn btn-primary">Save</button>
							<!-- <button type="button"  class="btn btn-primary" onclick="javascript:return providerDetailsCheck();" >Save</button> -->
						</div>
					</div>
					
				</fieldset>
			</form>
		</div>
	</div>
</div>
<!-- ************************Form Table : End****************************************** -->
<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }    
</script>
<script type="text/javascript">
function reset(){
	document.getElementById("addNewProvider").reset();
	}
function redirect(){
	window.location = "{{url('project_manager/manage_providers')}}";
}
</script>
@endsection
@section('page-script')
<script type="text/javascript">
@if(Session::has('message'))
toastr.options.timeOut = 1500;
toastr.success("{{ Session::get('message') }}");
@endif
@if(Session::has('error'))
toastr.options.timeOut = 1500;
toastr.error("{{ Session::get('error') }}");
@endif
</script>
@endsection