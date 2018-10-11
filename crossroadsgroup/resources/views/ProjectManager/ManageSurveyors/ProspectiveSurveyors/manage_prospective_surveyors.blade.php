@extends('ProjectManager.Layouts.master')
@section('page-title')
Trainee Surveyors
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('project_manager/dashboard')}}">Dashboard</a> 
		</li>
		<i class="icon-angle-right"></i>
		<li><a href="#">Manage Surveyors</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="{{url('project_manager/prospective_surveyors')}}">Prospective Surveyors</a></li>
	</ul>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon file white"></i>&ensp;Prospective Surveyors</h2>
				<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>Sr No.</th>
						  <th>Surveyor Name</th>
						  <th>Current Working Projects</th>
						  <th>Completed Surveys</th>
						  <th>Total Assigned Surveys</th>
						  <th class="center">Actions</th>
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td>1</td>
						<td>Surveyor A</td>
						<td class="center">
							<span class="label label-success ">12</span>
						</td>
						<td class="center">
							<span class="label label-important center">5</span>
						</td>
						<td class="center">
							<span class="label label-warning">21</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/active_surveyor_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View
						   </a>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Surveyor B</td>
						<td class="center">
							<span class="label label-success">21</span>
						</td>
						<td class="center">
							<span class="label label-important">35</span>
						</td>
						<td class="center">
							<span class="label label-warning">130</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/active_surveyor_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View
						   </a>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Surveyor C</td>
						<td class="center">
							<span class="label label-success">54</span>
						</td>
						<td class="center">
							<span class="label label-important">34</span>
						</td>
						<td class="center">
							<span class="label label-warning">120</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/active_surveyor_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View
						   </a>
						</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Surveyor D</td>
						<td class="center">
							<span class="label label-success">11</span>
						</td>
						<td class="center">
							<span class="label label-important">54</span>
						</td>
						<td class="center">
							<span class="label label-warning">65</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/active_surveyor_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View
						   </a>
						</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Surveyor E</td>
						<td class="center">
							<span class="label label-success">45</span>
						</td>
						<td class="center">
							<span class="label label-important">18</span>
						</td>
						<td class="center">
							<span class="label label-warning">40</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/active_surveyor_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View 
						   </a>
						</td>
					</tr>
					<tr>
						<td>6</td>
						<td>Surveyor F</td>
						<td class="center">
							<span class="label label-success">32</span>
						</td>
						<td class="center">
							<span class="label label-important">74</span>
						</td>
						<td class="center">
							<span class="label label-warning">80</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/active_surveyor_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View
						   </a>
						</td>
					</tr>
					<tr>
						<td>7</td>
						<td>Surveyor G</td>
						<td class="center">
							<span class="label label-success">32</span>
						</td>
						<td class="center">
							<span class="label label-important">25</span>
						</td>
						<td class="center">
							<span class="label label-warning">34</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/active_surveyor_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View
						   </a>
						</td>
					</tr>
				  </tbody>
			  </table>            
			</div>
		</div>
	</div>

@endsection
