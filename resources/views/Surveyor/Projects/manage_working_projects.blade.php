@extends('Surveyor.Layouts.master')
@section('page-title')
Working Projects
@endsection
@section('local-style')
<style type="text/css">
</style>
@endsection
@section('content')
<div id="content" class="span10">
 <ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<li><a href="{{url('surveyor/dashboard')}}">Dashboard</a></li>
			<i class="icon-angle-right"></i>
			<li><a href="{{url('surveyor/working_projects')}}">Working Projects</a></li>
		</li>
	</ul>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;Working Projects</h2>
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
						  <th>Project Duration <a><i class="icon-sort"></i></a></th>
						  <th>Total Surveys <a><i class="icon-sort"></i></a></th>
						  <th>Remaining Surveys <a><i class="icon-sort"></i></a></th>
						  <th>Completed Surveys <a><i class="icon-sort"></i></a></th>
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
						<td>{{$project['start_date']}} to {{$project['end_date']}}</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td class="center"> 
							<a class="btn btn-success" href="{{url('project_manager/project_info/'.Hashids::encode($project['project_id']))}}">
								<i class="halflings-icon white zoom-in"></i>
							</a>
						</td>
					</tr>
				@endforeach	
				@endif
				  </tbody>
			  </table>            
			</div>
		</div>
	</div>
@endsection  