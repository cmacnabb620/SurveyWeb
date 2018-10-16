@extends('Admin.Layouts.master')
@section('page-title')
Manage Client
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
            <li><a href="{{ url('admin/project_settings') }}">Project Settings</a></li>
			<i class="icon-angle-right"></i>
			<li><a href="{{ url('admin/manage_client') }}">Manage Clients</a></li>
		</li>
		
	</ul>
	<div class="row-fluid pm-buttons">
		<div class="span6">
			<!-- <button class="btn btn-primary">
			Export Excel
			<i class="halflings-icon file white"></i>
			</button> -->
		</div>
		<div class="span6">
			<a href="{{ url('admin/add_new_client') }}">
			<button class="btn btn-primary float-right">
			<i class="halflings-icon plus white"></i>	
			Add New Client</button>
			</a>
		</div>
	</div>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;Manage Clients</h2>
				<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>Sr No. <a><i class="icon-sort"></i></a> </th>
						  <th>Client Name <a><i class="icon-sort"></i></a> </th>
						  <th>Client Type <a><i class="icon-sort"></i></a> </th>
						  <th>Country <a><i class="icon-sort"></i></a> </th>
						  <th>Status <a><i class="icon-sort"></i></a> </th>
						  <th>Last Updated <a><i class="icon-sort"></i></a> </th>
						  <th>Actions</th>
					  </tr>
				  </thead>   
				  <tbody>
				  <?php $i=1; ?>
				  @foreach($clients as $client)
					<tr>
						<td>{{$i++}}</td>
						<td>{{(\Crypt::decryptString($client->name))}}</td>
						<td>{{(\Crypt::decryptString($client->client_type))}}</td>
						<td>{{(\Crypt::decryptString($client->country))}}</td>
						@if($client->client_status ==1)
						<td> 
							<span class="label label-success">Active</span>
						</td>
						@else
						<td> 
							<span class="label label-important">In Active</span>
						</td>
						@endif
						<td>{{$client->last_update}}</td>
						<td> 
							<!-- <a class="btn btn-success" href="{{ url('#') }}">
								<i class="halflings-icon white zoom-in"></i>                                            
							</a> -->
							<a class="btn btn-info" href="{{ url('admin/edit_client/'.Hashids::encode($client->client_id)) }}">
								<i class="halflings-icon white edit"></i>                                            
							</a>
							<a class="btn btn-danger" href="{{ url('admin/delete_client/'.Hashids::encode($client->client_id)) }}">
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