@extends('ProjectManager.Layouts.master')
@section('page-title')
Project Information
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('project_manager/dashboard')}}">Dashboard</a>
			<i class="icon-angle-right"></i>
			<li><a href="{{ url('project_manager/new_projects') }}">New Projects</a></li>
			<i class="icon-angle-right"></i>
			<li><a href="#">Project Info</a></li>
		</li>
	</ul>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;Project Information</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				
				<div class="span12">
					<div class="span4">
						<div class="control-group">
							<span><b>Project Name:&ensp;</b>{{$data['project_name']}}</span>
						</div>
						<div class="control-group">
							<span><b>Language:&ensp;</b>{{$data['project_language']}}</span>
						</div>
						
						<div class="control-group">
							<span><b>Posted On:&ensp;</b>{{$data['posted']}}</span>
						</div>
						<div class="control-group">
							<span><b>Status:&ensp;</b>{{$data['project_status']}}</span>
						</div>
						<div class="control-group">
							<span><b>Report Freuency:&ensp;</b>{{$data['project_report_frequency']}}</span>
						</div>
						
						<div class="control-group">
							<span><b>Survey Type:&ensp;</b>{{$data['survey_type']}}</span>
						</div>
					</div>
					<div class="span4">
						
						
						<div class="control-group">
							<span><b>Client Name:&ensp;</b>{{$data['client_name']}}</span>
						</div>
						<div class="control-group">
							<span><b>Address-1:&ensp;</b>{{\Crypt::decryptString($data['client_address']->address)}}</span>
						</div>
						<div class="control-group">
							<span><b>Address-2:&ensp;</b>{{\Crypt::decryptString($data['client_address']->address2)}}</span>
						</div>
						<div class="control-group">
							<span><b>Country:&ensp;</b>{{\Crypt::decryptString($data['client_address']->country)}}</span>
						</div>
						<div class="control-group">
							<span><b>State:&ensp;</b>{{\Crypt::decryptString($data['client_address']->state)}}</span>
						</div>
						<div class="control-group">
							<span><b>City:&ensp;</b>{{\Crypt::decryptString($data['client_address']->city)}}</span>
						</div>
					</div>
					<div class="span4">
						
						<div class="control-group">
							<span><b>Org Abbrevation:&ensp;</b>{{$data['org_abbrev']}}</span>
						</div>
						
						<div class="control-group">
							<span><b>Client Type:&ensp;</b>{{$data['client_type']}}</span>
						</div>
						<div class="control-group">
							<span><b>No.of Working Surveyors:&ensp;</b>0</span>
						</div>
						<div class="control-group">
							<span><b>Completed Surveys:&ensp;</b>0</span>
						</div>
						<div class="control-group">
							<span><b>Pending Surveys:&ensp;</b>0</span>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="span6 offset3">
		<div class="span4">
			<label><b>Link Project Manager:</b></label>
		</div>
		<div class="span6">
			<div class="controls">
				<select data-placeholder="Project Manager" id="projectmanager" name="projectmanager">
		            <option selected="selected">{{$data['project_manager_name']}}</option>
		        </select>    
			</div>
		</div>
	</div>
	<div class="span6 offset3">
		<div class="span4">
			<label><b>Upload File:</b></label>
		</div>
		<div class="span6">
			<div class="controls">
				 <input type="file" name="file_upload">   
			</div>
		</div>
		
	</div>
	<!-- <div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;Assignment A</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content" style="display: none;">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Sr No.</th>
							<th>Project Name</th>
							<th>Associated With</th>
							<th>Required No. of Surveys</th>
							<th>Status</th>
							<th>Created Date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td> Project A</td>
							<td> Project Manager A</td>
							<td> 250</td>
							<td>
								<span class="label label-success">Active</span>
							</td>
							<td> 2012/02/13</td>
							<td>
								<a class="btn btn-success" href="{{ url('admin/project_info') }}">
									<i class="halflings-icon white zoom-in"></i>
								</a>
								<a class="btn btn-info" href="{{ url('admin/edit_project') }}">
									<i class="halflings-icon white edit"></i>
								</a>
								<a class="btn btn-danger" href="#">
									<i class="halflings-icon white trash"></i>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div> -->
</div>
@endsection