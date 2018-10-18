@extends('Surveyor.Layouts.master')
@section('page-title')
Surveyor Dashboard
@endsection
@section('content')
<!-- start: Content -->
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<li><a href="{{url('surveyor/dashboard')}}">Dashboard</a></li>
		</li>
	</ul>
	<div class="row-fluid">
		<div class="span3 statbox orangeLight" onTablet="span6" onDesktop="span3">
			<div class="number">{{$working_projects}}<i class="icon-arrow-up"></i></div>
			<div class="title">Working Projects</div>
			<div class="footer">
				<a href="{{url('surveyor/working_projects')}}"> read full report</a>
			</div>
		</div>
		<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
			<div class="number">{{$completed_projects}}<i class="icon-arrow-up"></i></div>
			<div class="title">Completed Projects</div>
			<div class="footer">
				<a href="{{url('surveyor/completed_projects')}}"> read full report</a>
			</div>
		</div>
		<div class="span3 statbox blueLight noMargin" onTablet="span6" onDesktop="span3">
			<div class="number">#<i class="icon-arrow-up"></i></div>
			<div class="title">QC Reports</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
		<div class="span3 statbox pinklight" onTablet="span6" onDesktop="span3">
			<div class="number">#<i class="icon-arrow-up"></i></div>
			<div class="title">Invoices</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
		
	</div>
	<div class="row-fluid span12">
		<div class="span6"><div id="chartdivFirst"></div></div>
		<div class="span6"><div id="chartdivSecond"></div></div>
	</div>
</div>

@endsection
