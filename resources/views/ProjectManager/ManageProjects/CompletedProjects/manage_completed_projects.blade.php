@extends('ProjectManager.Layouts.master')
@section('page-title')
Completed Projects
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('project_manager/dashboard')}}">Dashboard</a> 
		</li>
		<i class="icon-angle-right"></i>
		<li><a href="#">Manage Projects</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="{{url('project_manager/completed_projects')}}">Completed Projects</a></li>
	</ul>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon file white"></i>&ensp;Completed Projects</h2>
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
						  <th>No. of Surveys</th>
						  <th>Completed Surveys</th>
						  <th>Total Surveyors</th>
						  <th>Project Start</th>
						  <th>Project End</th>
						  <th>Actions</th>
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td>1</td>
						<td class="center">Project A</td>
						<td class="center">
							<span class="label label-success">12</span>
						</td>
						<td class="center">
							<span class="label label-important">21</span>
						</td>
						<td class="center">
							<span class="label label-warning">5</span>
						</td>
						<td class="center">2012/02/13</td>
						<td class="center">2012/02/13</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/completed_project_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View Project
						   </a>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td class="center">Project B</td>
						<td class="center">
							<span class="label label-success">21</span>
						</td>
						<td class="center">
							<span class="label label-important">65</span>
						</td>
						<td class="center">
							<span class="label label-warning">5</span>
						</td>
						<td class="center">2012/02/13</td>
						<td class="center">2012/02/13</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/completed_project_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View Project
						   </a>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td class="center">Project C</td>
						<td class="center">
							<span class="label label-success">54</span>
						</td>
						<td class="center">
							<span class="label label-important">34</span>
						</td>
						<td class="center">
							<span class="label label-warning">2</span>
						</td>
						<td class="center">2012/02/13</td>
						<td class="center">2012/02/13</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/completed_project_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View Project
						   </a>
						</td>
					</tr>
					<tr>
						<td>4</td>
						<td class="center">Project D</td>
						<td class="center">
							<span class="label label-success">11</span>
						</td>
						<td class="center">
							<span class="label label-important">33</span>
						</td>
						<td class="center">
							<span class="label label-warning">5</span>
						</td>
						<td class="center">2012/02/13</td>
						<td class="center">2012/02/13</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/completed_project_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View Project
						   </a>
						</td>
					</tr>
					<tr>
						<td>5</td>
						<td class="center">Project E</td>
						<td class="center">
							<span class="label label-success">45</span>
						</td>
						<td class="center">
							<span class="label label-important">23</span>
						</td>
						<td class="center">
							<span class="label label-warning">4</span>
						</td>
						<td class="center">2012/02/13</td>
						<td class="center">2012/02/13</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/completed_project_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View Project
						   </a>
						</td>
					</tr>
					<tr>
						<td>6</td>
						<td class="center">Project F</td>
						<td class="center">
							<span class="label label-success">32</span>
						</td>
						<td class="center">
							<span class="label label-important">54</span>
						</td>
						<td class="center">
							<span class="label label-warning">3</span>
						</td>
						<td class="center">2012/02/13</td>
						<td class="center">2012/02/13</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/completed_project_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View Project
						   </a>
						</td>
					</tr>
					<tr>
						<td>7</td>
						<td class="center">Project G</td>
						<td class="center">
							<span class="label label-success">32</span>
						</td>
						<td class="center">
							<span class="label label-important">21</span>
						</td>
						<td class="center">
							<span class="label label-warning">2</span>
						</td>
						<td class="center">2012/02/13</td>
						<td class="center">2012/02/13</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('project_manager/completed_project_detail') }}">
							<i class="halflings-icon white edit"></i>
							Detail View Project
						   </a>
						</td>
					</tr>
				  </tbody>
			  </table>            
			</div>
		</div>
	</div>
</div>

@endsection