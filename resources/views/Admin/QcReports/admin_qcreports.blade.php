@extends('Admin.Layouts.master')
@section('page-title')
Admin QC Reports
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('admin/dashboard')}}">Dashboard</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{url('admin/admin_qcreports')}}">QC Reviewed Projects</a></li>
	</ul>

	<div class="row-fluid span8 offset2 padding10b">
		<div class="span4">
			<select class="form-control" data-placeholder="Select Project Name" id="project" data-rel="chosen">
              <option value=""></option>
              <option value="">Project A</option>
              <option value="">Project B</option>
              <option value="">Project C</option>
            </select>
		</div>
		<div class="span4">
			<select class="form-control" data-placeholder="Select Project Manager" id="projectmanager" data-rel="chosen">
              <option value=""></option>
              <option value="">Project Manager A</option>
              <option value="">Project Manager B</option>
              <option value="">Project Manager C</option>
            </select>
		</div>
	</div>
	<br/>

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
						  <th>Project Manager</th>
						  <th>QC Name</th>
						  <th class="center">Quality Report</th>
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td>1</td>
						<td> Project A</td>
						<td class="center">
							<span class="label label-success ">12</span>
						</td>
						<td>Project Manager A</td>
						<td>QC A</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('admin/view_admin_qcreports') }}">
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
						<td>Project Manager B</td>
						<td>QC B</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('admin/view_admin_qcreports') }}">
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
						<td>Project Manager C</td>
						<td>QC C</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('admin/view_admin_qcreports') }}">
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
						<td>Project Manager D</td>
						<td>QC D</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('admin/view_admin_qcreports') }}">
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
						<td>Project Manager E</td>
						<td>QC E</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('admin/view_admin_qcreports') }}">
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
</div>
@endsection