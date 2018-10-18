@extends('QualityUser.Layouts.master')
@section('page-title')
My Surveyors
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<li><a href="{{url('quality_user/dashboard')}}">Dashboard</a></li>
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{url('quality_user/my_surveyors')}}">My Surveyors</a></li>
	</ul>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;My Surveyors</h2>
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
						  <th>Total Completed Surveys <a><i class="icon-sort"></i></a> </th>
						  <th class="center">Actions</th>
					  </tr>
				  </thead>   
				  <tbody>
				  <?php $i=1; ?>
				@foreach($active_surveyors as $surveyor)
					<tr>
						<td>{{$i++}}</td>
						<td>{{ucfirst(\Crypt::decryptString($surveyor->first_name))}} {{ucfirst(\Crypt::decryptString($surveyor->last_name))}}</td>
						<td>-</td>
						<td class="center">
							<abbr title="Surveyor Info">
						    <a class="btn btn-success" href="{{url('quality_user/surveyor_projects_info/'.Hashids::encode($surveyor->main_user_id).'/'.Hashids::encode($surveyor->user_type_id))}}">
						    <i class="halflings-icon white zoom-in"></i>  
							</a>
							</abbr>
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