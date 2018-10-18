@extends('ProjectManager.Layouts.master')
@section('page-title')
Trainee Surveyors
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('project_manager/dashboard')}}">Dashboard</a>
		</li>
		<i class="icon-angle-right"></i>
		<li><a href="#">Manage Surveyors</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="{{url('project_manager/trainee_surveyors')}}">Trainee Surveyors</a></li>
	</ul>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;Trainee Surveyors</h2>
				<div class="box-icon">
					<!-- <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a> -->
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<!-- <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a> -->
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Sr No. <a><i class="icon-sort"></i></a> </th>
							<th>Surveyor Name <a><i class="icon-sort"></i></a> </th>
							<th>Working Project <a><i class="icon-sort"></i></a> </th>
							<th>Survey Status <a><i class="icon-sort"></i></a> </th>
							<th class="center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						@foreach($trainee_surveyors as $surveyor)
						<tr>
							<td>{{$i++}}</td>
							<td>{{ucfirst(\Crypt::decryptString($surveyor->first_name))}} {{ucfirst(\Crypt::decryptString($surveyor->last_name))}}</td>
							<td>-</td>
							<td>-</td>
							<td class="center">
								<abbr title="Surveyor Information">
									<a class="btn btn-primary" href="{{url('project_manager/trainee_surveyor_info/'.Hashids::encode($surveyor->main_user_id).'/'.Hashids::encode($surveyor->user_type_id))}}">
										<i class="halflings-icon white zoom-in"></i>
									</a>
								</abbr>
								@if($surveyor->active == 0)
								<abbr title="Inactive">
									<a class="btn btn-danger">
										<i class="halflings-icon white remove"></i>
									</a>
								</abbr>
								@else
								<abbr title="Active">
									<a class="btn btn-success">
										<i class="halflings-icon ok white"></i>
									</a>
								</abbr>
								@endif
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
toastr.options.timeOut = 1500;
toastr.success("{{ Session::get('message') }}");
@endif
@if(Session::has('error'))
toastr.options.timeOut = 1500;
toastr.error("{{ Session::get('error') }}");
@endif
</script>
@endsection