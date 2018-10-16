@extends('ProjectManager.Layouts.master')
@section('page-title')
New Project Duration
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
			<li><a href="#">Roster Data Upload</a></li>
		</li>
	</ul>
	<div class="row-fluid sortable">
		<div class="row-fluid span8 offset2">
			<h1 class="center">Roster Data Upload By {{\Crypt::decryptString($client_record->name)}}</h1>
		</div>
		@if($check_client_roster_data_count == 0)
		<div class="row-fluid span8 offset2">
			<div><b>Note: Before upload please download any format as given below and load your data:</b></div>
		</div>
		<div class="row-fluid span5 center padding10">
			<!-- <a href="{{url('downloadExcel/csv/'.Hashids::encode($client_record->client_id).'/'.Hashids::encode($project_record->project_id))}}" class="btn btn-primary">CSV <i class="halflings-icon download white"></i></a> -->
			<a href="{{url('downloadExcel/xls/'.Hashids::encode($client_record->client_id).'/'.Hashids::encode($project_record->project_id))}}" class="btn btn-primary">XLS <i class="halflings-icon download white"></i></a>
			<a href="{{url('downloadExcel/xlsx/'.Hashids::encode($client_record->client_id).'/'.Hashids::encode($project_record->project_id))}}" class="btn btn-primary">XLSX <i class="halflings-icon download white"></i></a>
		</div>
		<div class="row-fluid sortable">
			<div class="box span8 offset2">
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
					<form class="form-horizontal" method="POST" action="{{url('store_roster_file_data')}}" id="myform" enctype="multipart/form-data">
						{{ csrf_field() }}
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
									<input type="file" name="import_file">
								</div>
							</div>
							<div class="row-fluid span4 offset4">
								<button type="submit" class="btn btn-primary">Upload</button>
								<button type="button" onclick="goBack()" class="btn btn-importand">Go Back</button>
								
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		@else
		<div class="alert alert-success">
			<ul>
				<li>Your Roster Data has been Submited.</li>
			</ul>
		</div>
		@endif
		<div class="clearfix"></div>
	</div>
</div>
<script type="text/javascript">
	function goBack(){
window.location = "{{url('project_manager/active_projects')}}";
}
</script>
@endsection