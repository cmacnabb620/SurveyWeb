@extends('ProjectManager.Layouts.master')
@section('page-title')
QC Reports
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
		<li><a href="{{url('project_manager/qc_reports')}}">QC Reviewed Projects</a></li>
	</ul>

	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon file white"></i>&ensp;QC Reviewed Projects</h2>
				<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>Sr No.</th>
						  <th>Project Name</th>
						  <th class="center">Worked Surveyors</th>
						  <th class="center">QC Name</th>
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td>1</td>
						<td> Project A</td>
						<td class="center">
							<span class="label label-success ">12</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/view_qc_report') }}">
							<i class="halflings-icon white edit"></i>
							 View
						   </a>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td> Project B</td>
						<td class="center">
							<span class="label label-success">21</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/view_qc_report') }}">
							<i class="halflings-icon white edit"></i>
							 View
						   </a>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td> Project C</td>
						<td class="center">
							<span class="label label-success">54</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/view_qc_report') }}">
							<i class="halflings-icon white edit"></i>
							 View
						   </a>
						</td>
					</tr>
					<tr>
						<td>4</td>
						<td> Project D</td>
						<td class="center">
							<span class="label label-success">11</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/view_qc_report') }}">
							<i class="halflings-icon white edit"></i>
							 View
						   </a>
						</td>
					</tr>
					<tr>
						<td>5</td>
						<td> Project E</td>
						<td class="center">
							<span class="label label-success">45</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/view_qc_report') }}">
							<i class="halflings-icon white edit"></i>
							 View 
						   </a>
						</td>
					</tr>
					<tr>
						<td>6</td>
						<td> Project F</td>
						<td class="center">
							<span class="label label-success">32</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/view_qc_report') }}">
							<i class="halflings-icon white edit"></i>
							 View
						   </a>
						</td>
					</tr>
					<tr>
						<td>7</td>
						<td> Project G</td>
						<td class="center">
							<span class="label label-success">32</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/view_qc_report') }}">
							<i class="halflings-icon white edit"></i>
							 View
						   </a>
						</td>
					</tr>
				  </tbody>
			  </table>            
			</div>
		</div>
	</div>


@endsection	