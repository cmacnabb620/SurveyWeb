@extends('ProjectManager.Layouts.master')
@section('page-title')
Detail View Delay Project
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="{{url('project_manager/dashboard')}}">Dashboard</a> 
		</li>
		<i class="icon-angle-right"></i>
		<li><a href="#">Manage Projects</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="{{url('project_manager/delayed_projects')}}">Delayed Projects</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="#">Project Information</a></li>
	</ul>
	
	<div class="row-fluid">
		<div class="span3">
			<h2>Project Information:</h2>
		</div>
		<div class="span3">
			<h2>Project Name : </h2><span>Project A</span><br/>
			<h2>Language : </h2><span>English</span>
			<h2>Required Survey : </h2><span>20</span>
		</div>
		<div class="span3">
			<h2>Report Frequency : </h2><span>Yearly</span><br/>
			<h2>Status : </h2><span>New</span>
			<h2>Start Date : </h2><span>02/09/2018</span>
		</div>
		<div class="span3">
			<h2>Survey Type : </h2><span>Dental</span><br/>
			<h2>Posted On : </h2><span>26/08/2018</span>
			<h2>End Date : </h2><span>28/09/2018</span>
		</div>

	</div>
	<br/>
	<div class="row-fluid">
		<div class="span3">
			<h2>Client Information:</h2>
		</div>
		<div class="span3">
			<h2>Client Name : </h2><span>Client A</span><br/>
			<h2>Address 1: </h2><span>xyz street</span><br/>
			<h2>State : </h2><span>Florida</span>
		</div>
		<div class="span3">
			<h2>Org Abbrevation : </h2><span>Yearly</span><br/>
			<h2>Address 2 : </h2><span>park Avenue</span><br/>
			<h2>City : </h2><span>Tallahassee</span>
		</div>
		<div class="span3">
			<h2>Client Type : </h2><span>Dental</span>	
			<h2>Country : </h2><span>USA</span>
			<h2>Pin : </h2><span>123456</span>
		</div>

	</div>
	<br/>
	<div class="row-fluid">
		<div class="span4">
			<h2>QC Users:</h2>
		</div>
		<div class="span4">
			<h2>QC-A</h2>
		</div>
		<div class="span4">
			
		</div>

	</div>
</div>

@endsection