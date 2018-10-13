@extends('Admin.Layouts.master')
@section('page-title')
Admin Invoice
@endsection
@section('local-style')
<style type="text/css">

.custom-height{
	height: 28px !important;
}

.custom-height-box{
	height: 35px !important;
}
input[type="text"]{
	height: 28px !important;
}
/*.span2{
	padding: 5px !important;
}	*/
</style>
@endsection
@section('content')
<div id="content" class="span12">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('admin/dashboard')}}">Dashboard</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{url('admin/admin_invoice')}}">Invoice Reports</a></li>
	</ul>
	
	<!-- ***************DatePicker Start************************* -->
	<div class="row-fluid review-row">
		<div class="span3">
		<label>Start Date</label>
		    <div class="control-group">
             <div class='input-group date'>
		            <input type='text' class="custom-height" id='datetimepicker6' />
		        </div>
            </div>
		</div>
		<div class="span3">
		<label>End Date</label>
		    <div class="control-group">
             <div class='input-group date'>
		            <input type='text' class="custom-height" id='datetimepicker7' />
		        </div>
            </div>
		</div>
		<!-- ***************DatePicker End************************* -->		
		<div class="span3">
		<label></label>
			<div class="form-group">
				<select class="form-control" placeholder="Select Project Name" id="project">
	              	<option value="">Project A</option>
	              	<option value="">Project B</option>
	              	<option value="">Project C</option>
	            </select>
            </div>
		</div>
		<div class="span3">
		<label></label>
			<div class="form-group">
				<select class="form-control" placeholder="Select Project Manager" id="projectmanager">
	              	<option value="">Project Manager A</option>
	              	<option value="">Project Manager B</option>
	              	<option value="">Project Manager C</option>
	            </select>
            </div>
		</div>
		<!-- *****Search Button start if need!******* -->
			<!-- <div class="span2">
				<label></label>
				<button class="btn btn-primary">Search</button>
			</div> -->
		<!-- *****Search Button end if need!******* -->
	</div>

	<br/>
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header custom-height-box" data-original-title>
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
						  <th>Project Manager</th>	
						  <th>Finance User</th>	
						  <th class="center">No. of Invoices Released</th>
						  <th class="center">Quality Report</th>
					  </tr>
				  </thead>   
				  <tbody>
					<tr>
						<td>1</td>
						<td> Project A</td>
						<td> Project Manager A</td>
						<td> Finance User A</td>
						<td class="center">
							<span class="label label-success ">4</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('admin/view_invoice') }}">
							<i class="halflings-icon white edit"></i>
							 View Details
						   </a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td> Project D</td>
						<td> Project Manager D</td>
						<td> Finance User D</td>
						<td class="center">
							<span class="label label-success ">8</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('admin/view_invoice') }}">
							<i class="halflings-icon white edit"></i>
							 View Details
						   </a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td> Project F</td>
						<td> Project Manager F</td>
						<td> Finance User F</td>
						<td class="center">
							<span class="label label-success ">2</span>
						</td>
						<td class="center">
							<a class="btn btn-info" href="{{ url('admin/view_invoice') }}">
							<i class="halflings-icon white edit"></i>
							 View Details
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

@section('page-script')
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> -->
<link id="base-style" href="{{asset('crossroads/css/bootstrap-glyphicons.css')}}" rel="stylesheet">
<script type="text/javascript">
	$(document).ready(function() {
	  $(function() {
	    $('#datetimepicker6').datetimepicker();
	    $('#datetimepicker7').datetimepicker({
	      useCurrent: false //Important! See issue #1075
	    });
	    $("#datetimepicker6").on("dp.change", function(e) {
	      $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
	    });
	    $("#datetimepicker7").on("dp.change", function(e) {
	      $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
	    });
	  });
	});
</script>
@endsection
