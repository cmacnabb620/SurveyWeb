@extends('ProjectManager.Layouts.master')
@section('page-title')
Edit Speicalty
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
			<a href="{{url('project_manager/manage_specialty')}}">Manage Specialty</a>
		</li>
		<li>
			<i class="icon-angle-right"></i>
			<a href="#">Edit Specialty</a>
		</li>
	</ul>
	<div class="row-fluid sortable">
		<div class="box span7">
			<div class="box-header" data-original-title>
				<h2>
				<i class="halflings-icon white edit"></i>
				<span>Edit Specialty</span></h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="{{ url('project_manager/update_specialty') }}" method="POST" id="editSpecialty">
					<!-- <form  class="form-horizontal" id="addNewspecialty"> -->
					<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
					<fieldset>
						<div class="span8 offset1">
							<input type="hidden" name="specialty_id" value="{{$specialty->specialty_id}}">
							<div class="control-group">
								<label class="control-label" for="fname"><b>Specialty Name</b></label>
								<div class="controls">
									<input type="text" class="form-control" id="name" name="name" value="{{$specialty->specialty_name}}" placeholder="Enter First Name" maxlength="50">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="req_surveys"><b>Required Surveys</b></label>
								<div class="controls">
									<input type="text" class="form-control" id="req_surveys" name="req_surveys" value="{{$specialty->surveys_required}}" placeholder="" maxlength="50">
								</div>
							</div>
						</div>
						<div class="span5 offset4">
							<button type="button" onclick="redirect()" class="btn btn-default"><i class="halflings-icon chevron-left white"></i>Go Back</button>
							<!-- <button type="button" onclick="reset()" class="btn btn-warning">Reset</button> -->
							<button type="submit" class="btn btn-primary">Save</button>
							<!-- <button type="button"  class="btn btn-primary" onclick="javascript:return specialtyDetailsCheck();" >Save</button> -->
						</div>
					</div>
					
				</fieldset>
			</form>
		</div>
	</div>
</div>
<!-- ************************Form Table : End****************************************** -->
<script type="text/javascript">
function reset(){
	document.getElementById("editSpecialty").reset();
	}
function redirect(){
	window.location = "{{url('project_manager/manage_specialty')}}";
}
</script>
@endsection
@section('page-script')
<script type="text/javascript">
@if(Session::has('message'))
toastr.options.timeOut = 3000;
toastr.success("{{ Session::get('message') }}");
@endif
@if(Session::has('error'))
toastr.options.timeOut = 3000;
toastr.error("{{ Session::get('error') }}");
@endif
</script>
@endsection