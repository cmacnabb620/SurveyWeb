@extends('QualityUser.Layouts.master')
@section('page-title')
Review Project
@endsection
@section('local-style')
<style type="text/css">
.box-icon {
	margin-top: -5px !important;
}
</style>
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a>
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{url('quality_user/projects_reviews')}}">Project Reviews</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="#">Review Project Info</a></li>
	</ul>
	<!-- ********************************Table 1 Start*************************-->
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon file white"></i>&ensp;Surveyor A</h2>
				<div class="box-icon">
					<button data-toggle="modal" data-target="#myModal">Give Review Points</button>
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
				<h2><i class="halflings-icon file white"></i>&ensp;Surveyor B</h2>
				<div class="box-icon">
					<button>Give Review Points</button>
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
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="modal-title center">Give Review Points</h2>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="newclientform">
					<div class="control-group">
						<label class="control-label" for="project"><b>Project</b></label>
						<div class="controls">
							<input type="text" class="form-control" id="projectname" name="projectname"  maxlength="50">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="client"><b>Score</b></label>
						<div class="controls">
							<input type="number" class="form-control" id="score" name="score" min="0" max="10">
						</div>
					</div>
					<div class="center">
						<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection