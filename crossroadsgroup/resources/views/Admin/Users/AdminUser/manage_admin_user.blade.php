@extends('Admin.Layouts.master')
@section('page-title')
 Manage Admin Users
@endsection
@section('content')s
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('admin/dashboard')}}">Dashboard</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{ url('admin/admin_users') }}">Admin Users</a></li>
	</ul>
	<div class="row-fluid pm-buttons">
		<div class="span6">
			<!-- <button class="btn btn-primary">Export Excel</button> -->
		</div>
		<div class="span6">

			<a href="{{ url('admin/add_admin_users') }}">
			<button class="btn btn-primary float-right">
			<i class="halflings-icon plus white"></i>
			Add New Admin User</button>
			</a>
		</div>
	</div>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;Manage Admin Users</h2>
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
						  <th>Admin User Name <a><i class="icon-sort"></i></a> </th>
						  <th>Username <a><i class="icon-sort"></i></a> </th>
						  <th>Start Date <a><i class="icon-sort"></i></a> </th>
						  <th class="center">Last Login Details</th>
						  <th class="center">Actions</th>
						   <th class="center">User Status</th>
					  </tr>
				  </thead>   
				  <tbody>
				  <?php $i=1; ?>
				@foreach($admin_users as $admin_user)
					<tr>
						<td>{{$i++}}</td>
						<td>{{ucfirst(\Crypt::decryptString($admin_user->first_name))}} {{ucfirst(\Crypt::decryptString($admin_user->last_name))}}</td>
						<td>{{$admin_user->username}}</td>
						<td>{{$admin_user->start_date}}</td>
						<td class="center">
						  <input type="hidden" id="userid{{$admin_user->main_user_id}}" value="{{$admin_user->main_user_id}}">
						  <a href="javascript:void(0);" class="btn btn-primary" onclick="useId({{$admin_user->main_user_id}});" ><i class="halflings-icon white eye-open"></i></a>
						</td>
						<td class="center">
						    <a class="btn btn-success" href="{{url('admin/admin_users_info/'.Hashids::encode($admin_user->main_user_id))}}">
								<i class="halflings-icon white zoom-in"></i>  
							</a>
							@if($admin_user->main_user_id !=1)
							<a class="btn btn-info" href="{{url('admin/edit_admin_users/'.Hashids::encode($admin_user->main_user_id))}}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="{{url('admin/delete_admin_user/'.Hashids::encode($admin_user->main_user_id))}}">
								<i class="halflings-icon white trash"></i> 
							</a>
							@endif
						</td>
						<td class="center">
						@if($admin_user->active == 0)
							<a class="btn btn-danger" href="{{url('change_user_status/'.Hashids::encode($admin_user->main_user_id))}}">
							<i class="halflings-icon white remove"></i> 
							</a>
						@else
							<a class="btn btn-success" href="{{url('change_user_status/'.Hashids::encode($admin_user->main_user_id))}}">
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