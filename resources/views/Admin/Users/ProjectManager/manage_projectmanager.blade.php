@extends('Admin.Layouts.master')
@section('page-title')
Project Managers
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('admin/dashboard')}}">Dashboard</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{ url('admin/project_managers') }}">Project Manager</a></li>
	</ul>
	<div class="row-fluid pm-buttons">
		<div class="span6">
			<!-- <button class="btn btn-primary">Export Excel</button> -->
		</div>
		<div class="span6">

			<a href="{{ url('admin/add_project_managers') }}">
			<button class="btn btn-primary float-right">
			<i class="halflings-icon plus white"></i>	
			Add New Project Manager</button>
			</a>
		</div>
	</div>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;Manage Project Managers</h2>
				<div class="box-icon">
					<!-- <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a> -->
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<!-- <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a> -->
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable table-responsive">
				  <thead>
					  <tr>
						  <th>Sr No. <a><i class="icon-sort"></i></a> </th>
						  <th>Project Manager Name <a><i class="icon-sort"></i></a> </th>
						  <th>Username <a><i class="icon-sort"></i></a> </th>
						  <th>Country <a><i class="icon-sort"></i></a> </th>
						  <th>Start Date <a><i class="icon-sort"></i></a> </th>
						  <th class="center">Last Login Details</th>
						  <th class="center">Actions</th>
						  <th class="center">User Status</th>
					  </tr>
				  </thead>   
				  <tbody>
				  <?php $i=1; ?>
				@foreach($project_managers as $project_manager)
					<tr>
						<td>{{$i++}}</td>
						<td>{{ucfirst(\Crypt::decryptString($project_manager->first_name))}} {{ucfirst(\Crypt::decryptString($project_manager->last_name))}}</td>
						<td>{{$project_manager->username}}</td>
						<td>{{\Crypt::decryptString($project_manager->country)}}</td>
						<td>{{$project_manager->start_date}}</td>
						<td class="center">
						  <input type="hidden" id="userid{{$project_manager->main_user_id}}" value="{{$project_manager->main_user_id}}">
						  <a href="javascript:void(0);" class="btn btn-primary" onclick="useId({{$project_manager->main_user_id}});" ><i class="halflings-icon white eye-open"></i></a>
						</td>
						<td class="center">
						    <a class="btn btn-success" href="{{url('admin/project_manager_info/'.Hashids::encode($project_manager->main_user_id))}}">
								<i class="halflings-icon white zoom-in"></i>  
							</a>
							<a class="btn btn-info" href="{{url('admin/edit_project_manager/'.Hashids::encode($project_manager->main_user_id))}}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="{{url('admin/delete_project_manager/'.Hashids::encode($project_manager->main_user_id))}}">
								<i class="halflings-icon white trash"></i> 
							</a>
						</td>
						<td class="center">
						@if($project_manager->active == 0)
							<a class="btn btn-danger" href="{{url('change_user_status/'.Hashids::encode($project_manager->main_user_id))}}">
							<i class="halflings-icon white remove"></i> 
							</a>
						@else
							<a class="btn btn-success" href="{{url('change_user_status/'.Hashids::encode($project_manager->main_user_id))}}">
							<i class="halflings-icon ok white"></i> 
							</a>
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