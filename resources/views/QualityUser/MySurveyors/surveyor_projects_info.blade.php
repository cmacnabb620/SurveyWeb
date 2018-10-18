@extends('QualityUser.Layouts.master')
@section('page-title')
Surveyor Projects Info
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
	<!-- <div class="row-fluid">
		<div class="span4 offset4">
			<select class="form-control">
				<option>All</option>
				<option>Completed Surveys</option>
				<option>Future Surveys</option>
			</select>
		</div>
	</div> -->
	<!-- ********************************Select Button End*************************-->
	<!-- ********************************Table 1 Start*************************-->
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon file white"></i>&ensp;Project A</h2>
				<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>Sr No.</th>
						  <th>Provider</th>
						  <th>Clinic</th>
						  <th>Speciality</th>
						  <th>Patient Name</th>
						  <th>DOB</th>
						  <th>Phone</th>
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
							<span class="label label-danger">No Answer</span>
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
				<h2><i class="halflings-icon file white"></i>&ensp;Project B</h2>
				<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>Sr No.</th>
						  <th>Provider</th>
						  <th>Clinic</th>
						  <th>Speciality</th>
						  <th>Patient Name</th>
						  <th>DOB</th>
						  <th>Phone</th>
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
							<span class="label label-danger">No Answer</span>
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