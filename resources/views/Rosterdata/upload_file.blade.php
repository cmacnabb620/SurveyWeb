<!DOCTYPE html>
<html lang="en">
	<head>
		@include('MasterLayout.header_part')
		<title>Data Upload</title>
		<style type="text/css">
			.btn-row{
				padding: 20px 0 10px 0;
				margin-left: 25.70% !important;
			}
			.download-btn{
				padding: 2px;
			}
		</style>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
		<script src="{{asset('js/loader.js')}}"></script>
	</head>
	<body onload="noBack();"
		onpageshow="if (event.persisted) noBack();" onunload="">
		<div id='overlay' style="position: fixed;
			z-index: 111111111;
			height: 100%;
			width: 100%;
			background: rgba(0,0,0,0.7);
			padding-left: 47%;
			padding-top: 17%;">
			<div>
				<img style='max-width:67%' src="{{asset('Ellipsis-loader.gif')}}"/>
				<span style="font-size: 16px;color: #6effd2;font-weight: bold;">Loading . . .</span>
			</div>
		</div>
		<!-- start: Content-->
		<div class="row-fluid span4 offset4">
			<h1>Roster Data Upload By {{\Crypt::decryptString($client_record->name)}}</h1>
		</div>
		@if($check_client_roster_data_count == 0)
		<div class="row-fluid span6 offset3 btn-row">
			<div><b>Note: Before upload please download any format as given below and load your data:</b></div>
		</div>
		<div class="row-fluid span6 offset3 btn-row">
			<!-- <a href="{{url('downloadExcel/csv/'.Hashids::encode($client_record->client_id).'/'.Hashids::encode($project_record->project_id))}}" class="btn btn-primary">CSV <i class="halflings-icon download white"></i></a> -->
			<a href="{{url('downloadExcel/xls/'.Hashids::encode($client_record->client_id).'/'.Hashids::encode($project_record->project_id))}}" class="btn btn-primary">XLS <i class="halflings-icon download white"></i></a>
			<a href="{{url('downloadExcel/xlsx/'.Hashids::encode($client_record->client_id).'/'.Hashids::encode($project_record->project_id))}}" class="btn btn-primary">XLSX <i class="halflings-icon download white"></i></a>
		</div>
		<div class="row-fluid sortable">
			<div class="box span6 offset3">
				<div class="box-header" data-original-title>
					<h2>
					<i class="halflings-icon white edit"></i>
					<span>Roster Data Upload By {{\Crypt::decryptString($client_record->name)}}</span></h2>
					<div class="box-icon">
						<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-down"></i></a>
					</div>
				</div>
				@if (\Session::has('success'))
				<div class="alert alert-success">
					<ul>
						<li>{!! \Session::get('success') !!}</li>
					</ul>
				</div>
				@endif
				@foreach($errors->all() as $error)
				<div class="alert alert-error">
					<ul>
						<li>{{$error}}</li>
					</ul>
				</div>
				@endforeach
				<div class="box-content offset1">
					<!-- <form class="form-horizontal" method="POST" action="{{url('store_roster_file_data')}}" id="myform" enctype="multipart/form-data"> -->
					<form class="form-horizontal" method="POST" id="myform" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="client_id" value="{{$client_record->client_id}}">
						<input type="hidden" name="project_id" value="{{$project_record->project_id}}">
						<div class="row-fluid ">
							<div class="control-group">
								<label class="control-label" for="projectname">Client:</label>
								<div class="controls">
									<input type="text" name="client_name" value="{{\Crypt::decryptString($client_record->name)}}" readonly>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="projectname">Project:</label>
								<div class="controls">
									<input type="text" name="client_name" value="{{$project_record->project_name}}" readonly>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="name">File Upload:</label>
								<div class="controls">
									<input type="file" id="import_file" name="import_file">
								</div>
							</div>
							<div class="row-fluid span2 offset4">
								<button type="submit" class="btn btn-primary load_button">Upload</button>
								<!-- <button type="button" onclick="checkRosterData()" class="btn btn-primary load_button">Upload</button> -->
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		@else
		<div class="alert alert-success">
			<ul>
				<h2><li>Your Roster Data has been Submited.</li></h2>
			</ul>
		</div>
		@endif
		<div class="clearfix"></div>
	</body>
	<script type="text/javascript">
	$(document).ready(function (e) {
	$("#myform").on('submit',(function(e) {
	e.preventDefault();
	var import_file =  $('#import_file').val();
	if($.trim(import_file)=='')
	{
	toastr.options.timeOut = 1500; // 1.5s
	toastr.error('Please Upload File');
	return false;
	}else{
	showProcessingOverlay();
	var url    =  "{{url('store_roster_file_data')}}";
	$.ajax({
	url: url, // Url to which the request is send
	type: "POST",             // Type of request to be send, called as method
	data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
	contentType: false,       // The content type used when sending data to the server.
	cache: false,             // To unable request pages to be cached
	processData:false,        // To send DOMDocument or non processed data file it is set to false
	success: function(ress)
	{
	console.log(ress);
	alert(ress);
	hideProcessingOverlay();
	toastr.options.timeOut = 1500; // 1.5s
	toastr.success('File Uploaded successfully');
	location.reload();
	},
	error: function (errormessage) {
	console.log(errormessage);
	alert(errormessage);
	hideProcessingOverlay();
	toastr.options.timeOut = 1500; // 1.5s
	toastr.error('Something went Wrong');
	return false;
	}
	});
	}
	}));
	});
	</script>
	<script type="text/javascript">
	@if(Session::has('message'))
	toastr.options.timeOut = 1500;
	toastr.success("{{ Session::get('message') }}");
	@endif
	@if(Session::has('error'))
	toastr.options.timeOut = 1500;
	toastr.error("{{ Session::get('error') }}");
	@endif
	</script>
</html>