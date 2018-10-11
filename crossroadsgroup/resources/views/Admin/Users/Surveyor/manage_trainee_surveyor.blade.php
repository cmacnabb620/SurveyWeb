@extends('Admin.Layouts.master')
@section('page-title')
 Manage Surveyors
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('admin/dashboard')}}">Dashboard</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{ url('admin/trainee_surveyors') }}">Surveyors</a></li>
	</ul>
	<div class="row-fluid pm-buttons">

	    <div class="span7">
	        <a href="{{ url('admin/prospective_surveyors') }}">
			<button class="btn btn-primary">Prospective Type ({{count($prospective_surveyors)}})</button>
			</a>
			<a href="{{ url('admin/trainee_surveyors') }}">
			<button class="btn btn-success">Trainee Type({{count($trainee_surveyors)}})</button>
			</a>
			<a href="{{ url('admin/active_surveyors') }}">
			<button class="btn btn-primary">Active Type({{count($active_surveyors)}})</button>
			</a>
			<a href="{{ url('admin/inactive_surveyors') }}">
			<button class="btn btn-primary">Inactive Type({{count($inactive_surveyors)}})</button>
			</a>
		</div>	
		<div class="span5">

			<a href="{{ url('admin/add_surveyors') }}">
			<button class="btn btn-primary float-right">
			<i class="halflings-icon plus white"></i>	
			Add New Surveyor</button>
			</a>
		</div>
	</div>
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
						  <th>Username <a><i class="icon-sort"></i></a> </th>
						  <th>Date <a><i class="icon-sort"></i></a> </th>
						  <th class="center">Last Login Details</th>
						  <th class="center">Actions</th>
						  <th class="center">User Status</th>
					  </tr>
				  </thead>   
				  <tbody>
				  <?php $i=1; ?>
				@foreach($trainee_surveyors as $surveyor)
					<tr>
						<td>{{$i++}}</td>
						<td>{{ucfirst(\Crypt::decryptString($surveyor->first_name))}} {{ucfirst(\Crypt::decryptString($surveyor->last_name))}}</td>
						<td>{{$surveyor->username}}</td>
						<td>{{$surveyor->start_date}}</td>
						<td class="center">
						  <input type="hidden" id="userid{{$surveyor->main_user_id}}" value="{{$surveyor->main_user_id}}">
						  <a href="javascript:void(0);" class="btn btn-primary" onclick="useId({{$surveyor->main_user_id}});" ><i class="halflings-icon white eye-open"></i></a>
						</td>
						<td class="center">
						    <a class="btn btn-success" href="{{url('admin/surveyor_info/'.Hashids::encode($surveyor->main_user_id).'/'.Hashids::encode($surveyor->user_type_id))}}">
								<i class="halflings-icon white zoom-in"></i>  
							</a>
							<a class="btn btn-info" href="{{url('admin/edit_surveyor/'.Hashids::encode($surveyor->main_user_id).'/'.Hashids::encode($surveyor->user_type_id))}}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="{{url('admin/delete_surveyor/'.Hashids::encode($surveyor->main_user_id))}}">
								<i class="halflings-icon white trash"></i> 
							</a>
						</td>
						<td class="center">
						@if($surveyor->active == 0)
							<a class="btn btn-danger" href="{{url('change_user_status/'.Hashids::encode($surveyor->main_user_id))}}">
							<i class="halflings-icon white remove"></i> 
							</a>
						@else
							<a class="btn btn-success" href="{{url('change_user_status/'.Hashids::encode($surveyor->main_user_id))}}">
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