@extends('ProjectManager.Layouts.master')
@section('page-title')
Active Projects
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('project_manager/dashboard')}}">Dashboard</a> 
		</li>
		<i class="icon-angle-right"></i>
		<li><a href="#">Manage Projects</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="{{url('project_manager/active_projects')}}">Active Projects</a></li>
	</ul>
	<br/>
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
						  <th>Project Status <a><i class="icon-sort"></i></a></th>
						  <th>Actions</th>
					  </tr>
				  </thead>   
				  <tbody>
				  <?php $i=1;?>
				  @if(isset($project_data))
				  @foreach($project_data as $project)
					<tr>                    
						<td>{{$i++}}</td>
						<td>{{$project['project_name']}}</td>
						<td>{{$project['admin_posted']}}</td>
						<td>-</td>
						<td><span class="label label-success">{{$project['project_status']}}</span></td>
						<td class="center">	
							<abbr title="Project and Roster Data Information">
							<a class="btn btn-success" href="{{url('project_manager/active_project_info/'.Hashids::encode($project['project_id']))}}">
								<i class="halflings-icon white zoom-in"></i>
							</a>
							</abbr>
							<abbr title="Project Schedule">
							<a class="btn btn-primary" href="{{url('project_manager/make_schedule/'.Hashids::encode($project['project_id']))}}">
								<i class="halflings-icon white edit"></i>
							</a>
							</abbr>
							<!-- <a class="btn btn-info" href="{{ url('admin/edit_project/'.Hashids::encode($project['project_id'])) }}">
								<i class="halflings-icon white edit"></i>
							</a>
							<a class="btn btn-danger" href="{{url('admin/delete_project/'.Hashids::encode($project['project_id']))}}">
								<i class="halflings-icon white trash"></i> 
							</a> -->
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