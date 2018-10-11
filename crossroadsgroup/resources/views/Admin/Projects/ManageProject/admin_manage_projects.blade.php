@extends('Admin.Layouts.master')
@section('page-title')
Manage Projects
@endsection
@section('local-style')
<style>
form{
	padding: 10px;
}
</style>
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('admin/dashboard')}}">Dashboard</a> 
			<i class="icon-angle-right"></i>
			<li><a href="{{ url('admin/manage_projects') }}">Manage Projects</a></li>
		</li>
		
	</ul>
	<!-- <h2 class="center">Get Project's Survey Reports</h2> -->
	<!-- <div class="row-fluid padding10b">
		<form class="form-horizontal">
			<div class="span3">
				<select data-placeholder="Select Project" id="project">
                      <option disabled selected>Select Project</option>
                      <option value="">Project A</option>
                      <option value="">Project B</option>
                      <option value="">Project C</option>
                      <option value="">Project D</option>
                      <option value="">Project E</option>
                      <option value="">Project F</option>
                    </select>
			</div>
			<div class="span3">
					<select data-placeholder="Select Provider" id="provider">
                      <option disabled selected>Select Provider</option>
                      <option value="">Provider A</option>
                      <option value="">Provider B</option>
                      <option value="">Provider C</option>
                      <option value="">Provider D</option>
                      <option value="">Provider E</option>
                      <option value="">Provider F</option>
                    </select>
			</div>
			<div class="span3">
				<select data-placeholder="Select Duration" id="duration">
                      <option disabled selected>Select Duration</option>
                      <option value="">Daily</option>
                      <option value="">Weekly</option>
                      <option value="">Monthly</option>
                    </select>
			</div>
			<div class="span3">
				<button type="submit" class="btn btn-success">Get Report</button>
			</div>
		</form>	
	</div> -->
	<div class="row-fluid pm-buttons">
		<div class="span6">
			<!-- <button class="btn btn-primary">
			Export Excel
			<i class="halflings-icon file white"></i>
			</button> -->
		</div>
		<div class="span6">
			<a href="{{ url('admin/add_new_project') }}">
			<button class="btn btn-primary float-right">
			<i class="halflings-icon plus white"></i>	
			Add New Project</button>
			</a>
		</div>
	</div>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;Manage Projects</h2>
				<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>Sr No. <a><i class="icon-sort"></i></a> </th>
						  <th>Project <a><i class="icon-sort"></i></a> </th>
						  <th>Manager <a><i class="icon-sort"></i></a> </th>
						  <th>Client <a><i class="icon-sort"></i></a> </th>
						  <th>Required Surveys <a><i class="icon-sort"></i></a></th>
						  <th>Status <a><i class="icon-sort"></i></a> </th>
						  <th>Posted <a><i class="icon-sort"></i></a> </th>
						  <th>Last Updated <a><i class="icon-sort"></i></a></th>
						  <th>Actions</th>
					  </tr>
				  </thead>   
				  <tbody>
				  <?php $i=1;?>
				  @foreach($project_data as $project)
					<tr>                    
						<td>{{$i++}}</td>
						<td>{{$project['project_name']}}</td>
						<td>{{$project['project_manager_name']}}</td>
						<td>{{$project['client_name']}}</td>
						<td>-</td>
						<td><span class="label label-success">{{$project['project_status']}}</span></td>
						<td>
						@if($project['posted'] != NULL)
							<a class="btn btn-success"><i class="icon-ok white"></i></a>
						@else
							<a class="btn btn-info" href="{{url('admin/make_post/'.Hashids::encode($project['project_id']))}}"><i class="icon-remove white"></i></a>
						@endif
						</td>
						<td>{{$project['last_update']}}</td>
						<td> 
							<a class="btn btn-success" href="{{url('admin/project_info/'.Hashids::encode($project['project_id']))}}">
								<i class="halflings-icon white zoom-in"></i>
							</a>
							<a class="btn btn-info" href="{{ url('admin/edit_project/'.Hashids::encode($project['project_id'])) }}">
								<i class="halflings-icon white edit"></i>
							</a>
							<a class="btn btn-danger" href="{{url('admin/delete_project/'.Hashids::encode($project['project_id']))}}">
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
      toastr.options.timeOut = 1500; 
      toastr.success("{{ Session::get('message') }}");
  @endif
  @if(Session::has('error'))
      toastr.options.timeOut = 1500; 
      toastr.error("{{ Session::get('error') }}");
  @endif
</script>
@endsection	