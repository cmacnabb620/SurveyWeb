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
		<li>
		 <a href="{{url('admin/roles')}}">Manage Roles</a>
		 <i class="icon-angle-right"></i>
		</li>
		<li>
		 <a href="#">Edit</a>
		</li>
	</ul>
	
	<div class="row-fluid">
		<div class="statbox purple rolebox border-radius" onTablet="span8 offset2" onDesktop="span6 offset3">
		<!-- Create new role form start -->
			<form action="{{url('admin/update-role')}}" method="post">
			   <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
				<div class="formname">
				  <div class="form-group span8 offset2">
				   	<label for="role-name" class="control-lable span4 lable-name">Edit Role</label>
				    <input type="text" class="form-control span8 border-radius" name="role_name" value="{{$edit_record['user_type_desc']}}" id="role_name" aria-describedby="role-name" placeholder="Enter Role Name" maxlength="20">
				    <input type="hidden" name="role_id" value="{{$edit_record['user_type_id']}}">
				    <input type="hidden" name="role_name_for_validation" value="{{$edit_record['user_type_desc']}}">
				  </div>
				  <div class="form-group">
					  <div class="span5 offset5">
					  	<a href="{{url('admin/roles')}}" class="btn btn-warning">Cancel</a>
					  	<button type="Submit" class="btn btn-success">Update</button> 
					  </div>
					 
				  </div>
				</div>
			</form>
		<!-- Create new role form end -->
		</div>
	</div>
	<div class="row-fluid">
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
				<table class="table table-striped">
					  <thead>
						  <tr>
							  <th>Sr No.</th>
							  <th>Role Name</th>
							  <th>Date</th>
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

  @if(Session::has('fail'))
      toastr.error("{{ Session::get('fail') }}");
  @endif
</script>
<!-- Script for login code end-->   
 <!--  <script>
   function roleValidationCheck()
     {
      var role_name      =  $('#role_name').val();
      if($.trim(role_name)=='')
      {
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please Enter Role Name.');
         return false;  
      }
      else if($.trim(role_name).length<4)
      {
         toastr.options.timeOut = 1500; // 1.5s
         toastr.error('Please enter Role Name more than 4 characters.');
         return false;  
      }
      else
      {
         makeRole();
      }
     }

     //post data
      function makeRole()
      {
         var url               = "{{url('admin/add-role')}}";
         var role_name     = $('#role_name').val();
         var csrf  = $('#_token').val();
        $.ajax({
              url: url,
              type: 'POST',
              data:{
              role_name:role_name,
              _token: '{{csrf_token()}}'
              },
             beforeSend: function()
             {
               showProcessingOverlay();
             },
             success: function(res)   
             {
              hideProcessingOverlay();
              if(res.status=="200")
              { 
                window.location = res.redirect_url;
              }
             },
             error: function (errormessage) {
                hideProcessingOverlay();
                toastr.options.timeOut = 1500; // 1.5s
                toastr.error('Some Thing Went Wrong.');
                return false; 
            }
        }); 
      }
  </script> -->
<!-- Script for login code end-->
@endsection