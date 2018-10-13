@extends('ProjectManager.Layouts.master')
@section('page-title')
Trainee Surveyors
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('project_manager/dashboard')}}">Dashboard</a> 
		</li>
		<i class="icon-angle-right"></i>
		<li><a href="#">Manage Surveyors</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="{{url('project_manager/active_surveyors')}}">Trainee Surveyors</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="{{url('project_manager/active_surveyors')}}">Detail View Trainee Surveyor</a></li>
	</ul>

@endsection
