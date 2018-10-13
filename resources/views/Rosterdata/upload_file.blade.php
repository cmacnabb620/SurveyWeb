<!DOCTYPE html>
<html lang="en">
<head>
	@include('MasterLayout.header_part')
	<title>Data Upload</title>
	<style type="text/css">
		.download-btn{
			padding: 20px 0 20px 0;
			text-align: right; 
			margin-left: 25.205128% !important;
		}
	</style>
</head>
<body>
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
		
	<div class="row-fluid">
		<!-- start: Content-->
		<div class="row-fluid span6 offset3" style="text-align: center;">
			<h1>Roster Data Upload</h1>
		</div>
		<div class="row-fluid span6 offset3 download-btn">
 			<button type="button" class="btn btn-primary">Download</button>
 		</div>
 		
		<div class="row-fluid sortable">
			<div class="box span6 offset3">
				<div class="box-header" data-original-title>
					<h2>
					<i class="halflings-icon white edit"></i>
					<span>Roster Data Upload</span></h2>
					<div class="box-icon">
						<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-down"></i></a>
					</div>
				</div>
				<div class="box-content offset1">
					<form class="form-horizontal" method="POST" id="myform" enctype="multipart/form-data">
						<div class="row-fluid ">
							<div class="control-group">
			                   <label class="control-label" for="projectname">Client</label>
			                  <div class="controls">
			                    <select data-placeholder="Select Client" data-rel="chosen" name="client_id" id="client_id">
			                      <option value="clientA">Client A</option>
			                      <option value="clientB">Client B</option>
			                      <option value="clientC">Client C</option>
			                      <option value="clientD">Client D</option>
			                    </select>
			                  </div>
			                </div>  
			           
							<div class="control-group">
				                <label class="control-label" for="name">File Upload</label>
				                <div class="controls">
				                 <input type="file" name="file_upload">
				                </div>
			             	</div>
			             	<div class="row-fluid span2 offset4">
			             		<button type="submit" class="btn btn-primary">Upload</button>
			             	</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</body>
</html>