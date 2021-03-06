@extends('Admin.Layouts.master')
@section('page-title')
View QC Report
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
		<i class="icon-angle-right"></i>
		<li><a href="#">QC A (Project)</a></li>
	</ul>
	<!-- ********************************Table 1 Start*************************-->
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon file white"></i>&ensp;Surveyor A</h2>
				<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<div class="row-fluid">
					<div class="span3">
						<span><b>No. of Surveys: 100</b></span>
					</div>          
					<div class="span3">
						<span><b>QC Review Score: 6</b></span>
					</div>
				</div>
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>Sr No. <a><i class="icon-sort"></i></a> </th>
						  <th>Provider <a><i class="icon-sort"></i></a> </th>
						  <th>Clinic <a><i class="icon-sort"></i></a> </th>
						  <th>Speciality <a><i class="icon-sort"></i></a> </th>
						  <th>Patient Name <a><i class="icon-sort"></i></a> </th>
						  <th>DOB <a><i class="icon-sort"></i></a> </th>
						  <th>Phone <a><i class="icon-sort"></i></a> </th>
						  <th>Status</th>
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td>1</td>
						<td>Provider A</td>
						<td>Clinic A </td>
						<td>Sepec 1</td>
						<td>Patient A</td>
						<td>23/08/1996</td>
						<td>64584512</td>
						<td>
							<span class="label label-warning">In-progress</span>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Provider B</td>
						<td>Clinic A</td>
						<td>Sepec 2</td>
						<td>Patient B</td>
						<td>23/08/1996</td>
						<td>64584512</td>
						<td>
							<span class="label label-success">Completed</span>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Provider C</td>
						<td>Clinic C </td>
						<td>Sepec 3</td>
						<td>Patient C</td>
						<td>23/08/1996</td>
						<td>64584512</td>
						<td>
							<span class="label label-important">No Answer</span>
						</td>
					</tr>
				  </tbody>
			  </table>            
			</div>
		</div>
	</div>
	<!-- ********************************Table 1 End*************************-->
	<!-- ********************************Table 2 Start*************************-->
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon file white"></i>&ensp;Surveyor B</h2>
				<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<div class="row-fluid">
					<div class="span3">
						<span><b>No. of Surveys: 50</b></span>
					</div>          
					<div class="span3">
						<span><b>QC Review Score: 2</b></span>
					</div>
				</div>
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>Sr No. <a><i class="icon-sort"></i></a> </th>
						  <th>Provider <a><i class="icon-sort"></i></a> </th>
						  <th>Clinic <a><i class="icon-sort"></i></a> </th>
						  <th>Speciality <a><i class="icon-sort"></i></a> </th>
						  <th>Patient Name <a><i class="icon-sort"></i></a> </th>
						  <th>DOB <a><i class="icon-sort"></i></a> </th>
						  <th>Phone <a><i class="icon-sort"></i></a> </th>
						  <th>Status</th>
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td>1</td>
						<td>Provider A</td>
						<td>Clinic A </td>
						<td>Sepec 1</td>
						<td>Patient A</td>
						<td>23/08/1996</td>
						<td>64584512</td>
						<td>
							<span class="label label-warning">NO ANSWER</span>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Provider B</td>
						<td>Clinic A</td>
						<td>Sepec 2</td>
						<td>Patient B</td>
						<td>23/08/1996</td>
						<td>64584512</td>
						<td>
							<span class="label label-success">COMPLETED</span>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Provider C</td>
						<td>Clinic C </td>
						<td>Sepec 3</td>
						<td>Patient C</td>
						<td>23/08/1996</td>
						<td>64584512</td>
						<td>
							<span class="label label-important">DO NOT CALL</span>
						</td>
					</tr>
				  </tbody>
			  </table>            
			</div>
		</div>
	</div>
	<!-- ********************************Table 2 Start*************************-->
</div>
@endsection