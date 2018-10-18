@extends('QualityUser.Layouts.master')
@section('page-title')
Projects Reviews
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a>
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="{{url('quality_user/projects_reviews')}}">Project Reviews</a></li>
	</ul>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon th-list white"></i>&ensp;Project Reviews</h2>
				<div class="box-icon">
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Sr No. <a><i class="icon-sort"></i></a></th>
							<th>Project Name <a><i class="icon-sort"></i></a></th>
							<th>Report Frequency <a><i class="icon-sort"></i></a></th>
							<th>Total Worked Surveyor <a><i class="icon-sort"></i></a></th>
							<th>Total Surveys <a><i class="icon-sort"></i></a></th>
							<th>QC Review Status <a><i class="icon-sort"></i></a></th>
							<th class="center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1;?>
						@if(isset($project_data))
						@foreach($project_data as $project)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$project['project_name']}}</td>
							<td>{{$project['project_report_frequency']}}</td>
							<td>-</td>
							<td>-</td>
							<td class="center"><span class="label label-important">Not Completed</span></td>
							<td class="center">
								<abbr title="Project Information">
									<a class="btn btn-primary" href="{{url('quality_user/project_review_info/'.Hashids::encode($project['project_id']))}}">
									Review Project
										
									</a>
								</abbr>
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection	