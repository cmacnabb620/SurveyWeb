@extends('ProjectManager.Layouts.master')
@section('page-title')
New Projects
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('project_manager/dashboard')}}">Dashboard</a>
			<i class="icon-angle-right"></i>
			<li><a href="{{ url('project_manager/new_projects') }}">New Projects</a></li>
		</li>
	</ul>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;New Projects</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Sr No. <a><i class="icon-sort"></i></a></th>
							<th>Project Name <a><i class="icon-sort"></i></a></th>
							<th>Admin Posted Date <a><i class="icon-sort"></i></a></th>
							<th>Required Surveys <a><i class="icon-sort"></i></a></th>
							<th>Project Duration <a><i class="icon-sort"></i></a></th>
							<th>Status <a><i class="icon-sort"></i></a></th>
							<th class="center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1;?>
						@if(isset($project_data))
						@foreach($project_data as $project)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$project['project_name']}}</td>
							<td>{{$project['admin_posted']}}({{$project['admin_posted_days_cont']}} Days Ago)</td>
							<td>-</td>
							<td>
								@if(isset($project['start_date']) && !empty($project['start_date']))
								<b>({{$project['start_date']}})</b> to <b>({{$project['end_date']}})</b>
								@else

								@if($project['admin_posted_days_cont']>6)
								<a href="{{url('project_manager/set_project_duration/'.Hashids::encode($project['project_id']))}}">
									<span class="label label-success">Add Project Duration</span>
								</a>
								@else
								  <a href="#">
									<span class="label label-warning">You Can't Add Schedule</span>
								</a>
								@endif
								@endif
							</td>
							<td><span class="label label-success">{{$project['project_status']}}</span></td>
							<td class="center">
								<abbr title="Project Information">
									<a class="btn btn-success" href="{{url('project_manager/new_project_info/'.Hashids::encode($project['project_id']))}}">
										<i class="halflings-icon white zoom-in"></i>
									</a>
								</abbr>
								@if($project['admin_posted_days_cont']>6)
								<abbr title="Upload Roster Data">
									<a class="btn btn-primary" href="{{url('project_manager/upload_roster_data/'.Hashids::encode($project['project_id']).'/'.Hashids::encode($project['client_id']))}}"><i class="halflings-icon upload white"></i></a>
								</abbr>
								@endif
								<!-- @if($project['pm_posted'] != NULL)
								<abbr title="Project Posted">
										<a class="btn btn-success"><i class="icon-ok white"></i></a>
								</abbr>
								@else
								<abbr title="Make Project Post">
									<a class="btn btn-info" href="{{url('project_manager/make_post/'.Hashids::encode($project['project_id']))}}"><i class="icon-remove white"></i></a>
								</abbr>
								@endif -->
								
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection