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
		
		<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
			<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
			<div class="number">854<i class="icon-arrow-up"></i></div>
			<div class="title">visits</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
		<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
			<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
			<div class="number">123<i class="icon-arrow-up"></i></div>
			<div class="title">sales</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
		<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
			<div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
			<div class="number">982<i class="icon-arrow-up"></i></div>
			<div class="title">orders</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
		<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
			<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
			<div class="number">678<i class="icon-arrow-down"></i></div>
			<div class="title">visits</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
		
	</div>
	<div class="row-fluid">
		
		<div class="span8 widget blue" onTablet="span7" onDesktop="span8">
			
			<div id="stats-chart2"  style="height:282px" ></div>
			
		</div>
		
		<div class="sparkLineStats span4 widget green" onTablet="span5" onDesktop="span4">
			<ul class="unstyled">
				
				<li><span class="sparkLineStats3"></span>
				Pageviews:
				<span class="number">781</span>
			</li>
			<li><span class="sparkLineStats4"></span>
			Pages / Visit:
			<span class="number">2,19</span>
		</li>
		<li><span class="sparkLineStats5"></span>
		Avg. Visit Duration:
		<span class="number">00:02:58</span>
	</li>
	<li><span class="sparkLineStats6"></span>
	Bounce Rate: <span class="number">59,83%</span>
</li>
<li><span class="sparkLineStats7"></span>
% New Visits:
<span class="number">70,79%</span>
</li>
<li><span class="sparkLineStats8"></span>
% Returning Visitor:
<span class="number">29,21%</span>
</li>
</ul>
<div class="clearfix"></div>
</div><!-- End .sparkStats -->
</div>
<div class="row-fluid">
<div class="widget blue span5" onTablet="span6" onDesktop="span5">
<h2><span class="glyphicons globe"><i></i></span> Demographics</h2>
<hr>
<div class="content">

<div class="verticalChart">

<div class="singleBar">
	
	<div class="bar">
		
		<div class="value">
			<span>37%</span>
		</div>
		
	</div>
	
	<div class="title">US</div>
	
</div>

<div class="singleBar">
	
	<div class="bar">
		
		<div class="value">
			<span>16%</span>
		</div>
		
	</div>
	
	<div class="title">PL</div>
	
</div>

<div class="singleBar">
	
	<div class="bar">
		
		<div class="value">
			<span>12%</span>
		</div>
		
	</div>
	
	<div class="title">GB</div>
	
</div>

<div class="singleBar">
	
	<div class="bar">
		
		<div class="value">
			<span>9%</span>
		</div>
		
	</div>
	
	<div class="title">DE</div>
	
</div>

<div class="singleBar">
	
	<div class="bar">
		
		<div class="value">
			<span>7%</span>
		</div>
		
	</div>
	
	<div class="title">NL</div>
	
</div>

<div class="singleBar">
	
	<div class="bar">
		
		<div class="value">
			<span>6%</span>
		</div>
		
	</div>
	
	<div class="title">CA</div>
	
</div>

<div class="singleBar">
	
	<div class="bar">
		
		<div class="value">
			<span>5%</span>
		</div>
		
	</div>
	
	<div class="title">FI</div>
	
</div>

<div class="singleBar">
	
	<div class="bar">
		
		<div class="value">
			<span>4%</span>
		</div>
		
	</div>
	
	<div class="title">RU</div>
	
</div>

<div class="singleBar">
	
	<div class="bar">
		
		<div class="value">
			<span>3%</span>
		</div>
		
	</div>
	
	<div class="title">AU</div>
	
</div>

<div class="singleBar">
	
	<div class="bar">
		
		<div class="value">
			<span>1%</span>
		</div>
		
	</div>
	
	<div class="title">N/A</div>
	
</div>

<div class="clearfix"></div>

</div>

</div>
</div><!--/span-->
<div class="widget span3 red" onTablet="span6" onDesktop="span3">

<h2><span class="glyphicons pie_chart"><i></i></span> Browsers</h2>

<hr>

<div class="content">

<div class="browserStat big">
	<img src="{{ asset('crossroads/img/browser-chrome-big.png')}}" alt="Chrome">
	<span>34%</span>
</div>
<div class="browserStat big">
	<img src="{{ asset('crossroads/img/browser-firefox-big.png')}}" alt="Firefox">
	<span>34%</span>
</div>
<div class="browserStat">
	<img src="{{ asset('crossroads/img/browser-ie.png')}}" alt="Internet Explorer">
	<span>34%</span>
</div>
<div class="browserStat">
	<img src="{{ asset('crossroads/img/browser-safari.png')}}" alt="Safari">
	<span>34%</span>
</div>
<div class="browserStat">
	<img src="{{ asset('crossroads/img/browser-opera.png')}}" alt="Opera">
	<span>34%</span>
</div>


</div>
</div>
<div class="widget yellow span4 noMargin" onTablet="span12" onDesktop="span4">
<h2><span class="glyphicons fire"><i></i></span> Server Load</h2>
<hr>
<div class="content">
<div id="serverLoad2" style="height:224px;"></div>
</div>
</div>
</div>

<div class="clearfix"></div>
@endsection