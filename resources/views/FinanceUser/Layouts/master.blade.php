<!DOCTYPE html>
<html lang="en">
	<head>
		@include('MasterLayout.header_part')
	</head>
	<body onload="noBack();"
		onpageshow="if (event.persisted) noBack();" onunload="">
		<div id='overlay' style="position: fixed;
			z-index: 111111111;
			height: 100%;
			width: 100%;
			background: rgba(0,0,0,0.7);
			padding-left: 47%;
			padding-top: 17%;">
			<div>
				<img style='max-width:67%' src="{{asset('Ellipsis-loader.gif')}}"/>
				<span style="font-size: 16px;color: #6effd2;font-weight: bold;">Loading . . .</span>
			</div>
		</div>
		<!-- start: Header -->
		@include('FinanceUser.Layouts.header')
		<!-- start: Header -->
		
		<div class="container-fluid-full">
			<div class="row-fluid">
				
				<!-- start: Main Menu -->
				@include('FinanceUser.Layouts.sidebar')
				<!-- end: Main Menu -->
				
				<!-- start: Content-->
				@yield('content')
				<!-- end: Content -->

				<!-- Modal Timeout Start -->
				@include('MasterLayout.timeout')
				<!-- Modal Timeout End -->
				
				<!-- Modal last_login_time From Here -->
				@include('MasterLayout.last_login_time_tracking_modal')
				<!-- Modal last_login_time End Here -->
			
			</div>
		</div>	
		<div class="clearfix"></div>
		@include('MasterLayout.master_footer_script')
		
	</body>
</html>