@extends('ProjectManager.Layouts.master')
@section('page-title')
Inactive Surveyors
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
		<li><a href="{{url('project_manager/inactive_surveyors')}}">Inactive Surveyors</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="#">Detail View Inactive Surveyor</a></li>
	</ul>

@endsection