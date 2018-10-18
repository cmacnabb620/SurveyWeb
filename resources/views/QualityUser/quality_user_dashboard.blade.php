@extends('QualityUser.Layouts.master')
@section('page-title')
QC User Dashboard
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a>
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{url('quality_user/dashboard')}}">Dashboard</a></li>
	</ul>
	<div class="row-fluid">
		
		<div class="span4 statbox pinklight" onTablet="span6" onDesktop="span4">
			<div class="number">8<i class="icon-arrow-up"></i></div>
			<div class="title">Project's Reviews</div>
			<div class="footer">
				<a href="{{url('quality_user/projects_reviews')}}"> read full report</a>
			</div>
		</div>
		<div class="span4 statbox orangeLight" onTablet="span6" onDesktop="span4">
			<div class="number">4<i class="icon-arrow-up"></i></div>
			<div class="title">Reviewed Projects</div>
			<div class="footer">
				<a href="{{url('quality_user/projects_reviews')}}"> read full report</a>
			</div>
		</div>
		<div class="span4 statbox blueLight noMargin" onTablet="span6" onDesktop="span4">
			<div class="number">4<i class="icon-arrow-up"></i></div>
			<div class="title">Surveyors</div>
			<div class="footer">
				<a href="{{url('quality_user/my_surveyors')}}"> read full report</a>
			</div>
		</div>
	</div>
<div class="clearfix"></div>
@endsection