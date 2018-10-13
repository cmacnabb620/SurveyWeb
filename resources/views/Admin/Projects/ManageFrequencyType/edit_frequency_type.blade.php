@extends('Admin.Layouts.master')
@section('page-title')
Edit Survey Type
@endsection
@section('local-style')
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('admin/dashboard')}}">Dashboard</a>
			<i class="icon-angle-right"></i>
		</li>
		<li>
			<a href="{{url('admin/manage_frequency_types')}}">Manage Frequency Types</a>
			<i class="icon-angle-right"></i>
		</li>
		<li>
			<a href="#">Edit Frequency Type</a>
		</li>
	</ul>
	
	<div class="row-fluid">
		<div class="statbox purple rolebox border-radius" onTablet="span8 offset2" onDesktop="span6 offset3">
			<!-- Create new role form start -->
			<form action="{{url('admin/update_frequency_type')}}" method="post">
				<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
				<div class="formname">
					<div class="form-group span12">
						<label for="role-name" class="control-lable span4 lable-name">Edit Frequency Type</label>
						<input type="text" class="form-control span8 border-radius" name="report_frequency" value="{{$edit_record['report_frequency']}}" id="report_frequency" placeholder="Enter Survey Type" maxlength="20">
						<input type="hidden" name="report_freq_id" value="{{$edit_record['report_freq_id']}}">
						<input type="hidden" name="report_frequency_name" value="{{$edit_record['report_frequency']}}">
					</div>
					<div class="form-group">
						<div class="span5 offset5">
							<a href="{{url('admin/manage_frequency_types')}}" class="btn btn-warning">Cancel</a>
							<button type="Submit" class="btn btn-success">Update</button>
						</div>
						
					</div>
				</div>
			</form>
			<!-- Create new role form end -->
		</div>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header">
			<h2><i class="halflings-icon white align-justify"></i></span>Manage Frequency Types</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable table-responsive">
				<thead>
					<tr>
						<th>Sr No. <a><i class="icon-sort"></i></a> </th>
						<th>Report Frequency<a><i class="icon-sort"></i></a></th>
						<th>Updated Date <a><i class="icon-sort"></i></a></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@include('Admin.Projects.ManageFrequencyType.crud_operations')
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
@endsection
@section('page-script')
<script type="text/javascript">
	@if($errors->any())
@foreach($errors->all() as $error)
toastr.options.timeOut = 1500;
toastr.error("{{$error }}");
@endforeach
@endif
@if(Session::has('message'))
toastr.success("{{ Session::get('message') }}");
@endif
@if(Session::has('fail'))
toastr.error("{{ Session::get('fail') }}");
@endif
</script>
@endsection