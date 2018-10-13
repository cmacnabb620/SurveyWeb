@extends('ProjectManager.Layouts.master')
@section('page-title')
Manage Providers
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
	</ul>
	<div class="row-fluid pm-buttons">
		<div class="span6">
			<button class="btn btn-primary">
			Export Excel
			<i class="halflings-icon file white"></i>
			</button>
		</div>
		<div class="span6">
			<a href="{{ url('project_manager/add_new_provider') }}">
				<button class="btn btn-primary float-right">
				<i class="halflings-icon plus white"></i>
				Add New Provider</button>
			</a>
		</div>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;Manage Providers</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Sr No. <a><i class="icon-sort"></i></a> </th>
							<th>Providers Name<a><i class="icon-sort"></i></a> </th>
							<th>Surveys Required<a><i class="icon-sort"></i></a> </th>
							<th>Surveys Completed<a><i class="icon-sort"></i></a> </th>
							<th>Last Updated <a><i class="icon-sort"></i></a> </th>
							<th>Status<a><i class="icon-sort"></i></a> </th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						@foreach($providers as $provider)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$provider->first_name}}&nbsp;{{$provider->last_name}}</td>
							<td>{{$provider->surveys_required}}</td>
							<td>{{$provider->surveys_completed}}</td>
							<td>{{$provider->last_update}}</td>
							<td>
								<span class="label label-success">Active</span>
							</td>
							<td>
								<!-- <a class="btn btn-success" href="{{ url('#') }}">
											<i class="halflings-icon white zoom-in"></i>
								</a> -->
								<a class="btn btn-info" href="{{ url('project_manager/edit_provider/'.Hashids::encode($provider->NPI)) }}">
									<i class="halflings-icon white edit"></i>
								</a>
								<a class="btn btn-danger" href="{{ url('project_manager/delete_provider/'.Hashids::encode($provider->NPI)) }}">
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