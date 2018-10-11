@extends('Admin.Layouts.master')
@section('page-title')
Admin Roles
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('admin/dashboard')}}">Dashboard</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Manage Roles</a></li>
	</ul>
	
	<div class="row-fluid">
		<div class="statbox purple rolebox border-radius" onTablet="span8 offset2" onDesktop="span6 offset3">
		<!-- Create new role form start -->
			<form action="{{url('admin/add-role')}}" method="post">
			   <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
				<div class="formname">
				  <div class="form-group span8 offset2">
				   	<label for="role-name" class="control-lable span4 lable-name">Role Name</label>
				    <input type="text" class="form-control span8 border-radius" name="role_name" value="{{old('role_name')}}" id="role_name" aria-describedby="role-name" placeholder="Enter Role Name" maxlength="20">
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
				<h2><i class="halflings-icon white align-justify"></i></span>Manage Roles</h2>
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
							  <th>Role Name <a><i class="icon-sort"></i></a> </th>
							  <th>Updated Date <a><i class="icon-sort"></i></a> </th>
							  <th>Action</th>                                          
						  </tr>
					  </thead>   
					  <tbody>
					   @include('Admin.Roles.common_curd_records')                              
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