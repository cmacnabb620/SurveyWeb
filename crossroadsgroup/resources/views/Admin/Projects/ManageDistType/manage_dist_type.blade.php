@extends('Admin.Layouts.master')
@section('page-title')
Manage Distribution Types
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
		<li><a href="{{url('admin/manage_dist_type')}}">Manage Distribution Types</a></li>
	</ul>
	
	<div class="row-fluid">
		<div class="statbox purple rolebox border-radius" onTablet="span8 offset2" onDesktop="span6 offset3">
			<!-- Create new role form start -->
			<form action="{{url('admin/add_new_dist_type')}}" method="post">
				<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
				<div class="formname">
					<div class="form-group span12">
						<label for="role-name" class="control-lable span4 lable-name"><b>Distribution Type</b></label>
						<input type="text" class="form-control span8 border-radius" name="dist_type" value="{{old('dist_type')}}" id="dist_type" aria-describedby="dist_type" placeholder="Enter Dist Type" maxlength="50">
					</div>
					<div class="form-group">
						<div class="span5 offset5">
							<button type="Submit" class="btn btn-success">Add</button>
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
			<h2><i class="halflings-icon white align-justify"></i></span>Manage Distribution Type</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable table-responsive">
				<thead>
					<tr>
						<th>Sr No. <a><i class="icon-sort"></i></a> </th>
						<th>Distribution Types<a><i class="icon-sort"></i></a></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@include('Admin.Projects.ManageDistType.crud_operations')
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
</script>
@endsection