@extends('ProjectManager.Layouts.master')
@section('page-title')
Manage Specialty
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
			<a href="{{ url('project_manager/manage_specialty') }}">Manage Specialty</a>
		</li>
	</ul>
	<div class="row-fluid pm-buttons">
		<div class="span6">
			<button class="btn btn-primary">
			Export Excel
			<i class="halflings-icon file white"></i>
			</button>
		</div>
		<div class="span6">
			<a href="{{ url('project_manager/add_new_specialty') }}">
				<button class="btn btn-primary float-right">
				<i class="halflings-icon plus white"></i>
				Add New Specialty</button>
			</a>
		</div>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon th-list white"></i>&ensp;Manage Specialty</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Sr No. <a><i class="icon-sort"></i></a> </th>
							<th>Specialty Name <a><i class="icon-sort"></i></a> </th>
							<th>Surveys Required <a><i class="icon-sort"></i></a> </th>
							<th>Status <a><i class="icon-sort"></i></a> </th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						@foreach($specialty as $special)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$special->specialty_name}}</td>
							<td>{{$special->surveys_required}}</td>
							<td>
								<span class="label label-success">Active</span>
							</td>
							<td>
								<!-- <a class="btn btn-success" href="{{ url('#') }}">
											<i class="halflings-icon white zoom-in"></i>
								</a> -->
								<a class="btn btn-info" href="{{ url('project_manager/edit_specialty/'.Hashids::encode($special->specialty_id)) }}">
									<i class="halflings-icon white edit"></i>
								</a>
								<a class="btn btn-danger" href="{{ url('project_manager/delete_specialty/'.Hashids::encode($special->specialty_id)) }}">
									<i class="halflings-icon white trash"></i>
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
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