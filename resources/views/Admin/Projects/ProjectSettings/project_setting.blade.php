@extends('Admin.Layouts.master')
@section('page-title')
Admin Dashboard
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
		  <i class="icon-home"></i>
			<a href="{{url('admin/dashboard')}}">Dashboard</a>
			<i class="icon-angle-right"></i>
			<a href="#">Project Settings</a> 
		</li>
	</ul>
		<div class="row-fluid">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon cog white"></i>&emsp;Project Requirements</h2>
					</div>
					<div class="box-content">
						
						<a href="{{url('admin/manage_frequency_types')}}" class="quick-button span2">
							<i class="glyphicons-icon calendar"></i>
							<p>Frequency Types</p>
							<span class="notification green">{{$freq_types_count}}</span>
						</a>
						<a href="{{url('admin/manage_survey_types')}}" class="quick-button span2">
							<i class="glyphicons-icon list"></i>
							<p>Survey Types</p>
							<span class="notification green">{{$survey_types_count}}</span>
						</a>
						<a href="{{url('admin/manage_language')}}" class="quick-button span2">
							<i class="glyphicons-icon font"></i>
							<p>Languages</p>
							<span class="notification green">{{$languages_count}}</span>
						</a>
						<a href="{{url('admin/manage_dist_type')}}" class="quick-button span2">
							<i class="glyphicons-icon list"></i>
							<p>Distribution Types</p>
							<span class="notification green">{{$dist_types_count}}</span>
						</a>
						<a href="{{url('admin/manage_client')}}" class="quick-button span2">
							<i class="glyphicons-icon group"></i>
							<p>Clients</p>
							<span class="notification green">{{$clients_count}}</span>
						</a>
						<!-- <a class="quick-button span2">
							<i class="glyphicons-icon book"></i>
							<p>Other</p>
							<span class="notification red">0</span>
						</a> -->
						<div class="clearfix"></div>
					</div>	
				</div><!--/span-->
				
			</div><!--/row-->
			
			<hr>
</div>		
@endsection	    

