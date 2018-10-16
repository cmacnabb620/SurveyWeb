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
			<li><a href="{{ url('project_manager/active_projects') }}">Active Projects</a></li>
			<i class="icon-angle-right"></i>
			<li><a href="#">Project and Client Info</a></li>
		</li>
	</ul>
	<div class="span6 offset3">
		<div class="span5">
			<label><b>Linked Project Manager:</b></label>
		</div>
		<div class="span6">
			<div class="controls">
				<select data-placeholder="Project Manager" id="projectmanager" name="projectmanager">
					<option selected="selected">{{$data['project_manager_name']}}</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;Project and Client Information</h2>
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
							<span><b>Language:&ensp;</b>
								@if(isset($languages) && count($languages) > 0)
								@foreach ($languages as $lang)
								@if(in_array($lang->language_id, $survey_type_ids))
								{{ $lang->language }},
								@endif
								@endforeach
								@endif
							</span>
						</div>
						
						<div class="control-group">
							<span><b>Admin Posted On:&ensp;</b>{{$data['admin_posted']}}</span>
						</div>
						<div class="control-group">
							<span><b>Status:&ensp;</b>{{$data['project_status']}}</span>
						</div>
						<div class="control-group">
							<span><b>Report Freuency:&ensp;</b>{{$data['project_report_frequency']}}</span>
						</div>
						
						<div class="control-group">
							<span><b>Survey Type:&ensp;</b>
								@if(isset($survey_types) && count($survey_types) > 0)
								@foreach ($survey_types as $surveys)
								@if(in_array($surveys->survey_type_id, $survey_type_ids))
								{{ $surveys->survey_type }},
								@endif
								@endforeach
								@endif
							</span>
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
						<div class="control-group">
							<span><b>Project Duration:&ensp;</b>{{$data['weeks_count']}}</span>
						</div>
						<div class="control-group">
							<span><b>Project Start Date:&ensp;</b>{{$data['start_date']}}</span>
						</div>
						<div class="control-group">
							<span><b>Project End Date:&ensp;</b>{{$data['end_date']}}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i>&ensp;Assignment A</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			
			<div class="box-content" style="display:block;">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>Week Duration</th>
							<th>Startdate</th>
							<th>Roster Data Upload</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						<?php $j=$data['start_date']; ?>
						
						@for($i=1;$i<=$data['roster_data_loop_count'];$i++)
						<tr>
							<td>{{ $i }}</td>
							<td>Week {{ $i }}</td>
							<td>{{$j}}</td>
							<td>
								<abbr title="Upload Roster Data">
									<a class="btn btn-primary" href="{{url('project_manager/upload_roster_data/'.Hashids::encode($project['project_id']).'/'.Hashids::encode($project['client_id']))}}"><i class="halflings-icon upload white"></i></a>
								</abbr>
							</td>
						</tr>
						@endfor
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row-fluid padding10">
		<div class="span4 offset4 center">
			<button type="button" onclick="goBack()" class="btn btn-importand">Go Back</button>
		</div>
	</div>
</div>
<script type="text/javascript">
	function goBack(){
window.location = "{{url('project_manager/active_projects')}}";
}
</script>
@endsection