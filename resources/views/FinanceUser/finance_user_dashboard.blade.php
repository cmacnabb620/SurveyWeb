@extends('FinanceUser.Layouts.master')
@section('page-title')
Finance User Dashboard
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a>
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{ url('finance_user/dashboard') }}">Dashboard</a></li>
	</ul>
	<div class="row-fluid">
		
		<div class="span3 statbox pinklight" onTablet="span6" onDesktop="span3">
			<div class="number">854<i class="icon-arrow-up"></i></div>
			<div class="title">visits</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
		<div class="span3 statbox orangeLight" onTablet="span6" onDesktop="span3">
			<div class="number">123<i class="icon-arrow-up"></i></div>
			<div class="title">sales</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
		<div class="span3 statbox blueLight" onTablet="span6" onDesktop="span3">
			<div class="number">982<i class="icon-arrow-up"></i></div>
			<div class="title">orders</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
		<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
			<div class="number">678<i class="icon-arrow-down"></i></div>
			<div class="title">visits</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
	</div>
<div class="clearfix"></div>
@endsection