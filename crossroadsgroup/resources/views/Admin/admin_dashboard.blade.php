@extends('Admin.Layouts.master')
@section('page-title')
Admin Dashboard
@endsection
@section('content')
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="#">Dashboard</a> 
			<!-- 	 -->
		</li>
	</ul>
	<div class="row-fluid">			
				<div class="span4 statbox pinklight" onTablet="span6" onDesktop="span4">
					<div class="number">{{\EnvatoUser::user_type_list(2)->count()}}<i class="icon-arrow-up"></i></div>
					<div class="title">Project Manager</div>
					<div class="footer">
						<a href="{{url('admin/project_managers')}}"> read full report</a>
					</div>	
				</div>
				<div class="span4 statbox orangeLight" onTablet="span6" onDesktop="span4">
					<div class="number">{{\EnvatoUser::user_type_list(3)->count() + \EnvatoUser::user_type_list(4)->count() + \EnvatoUser::user_type_list(5)->count()}}<i class="icon-arrow-up"></i></div>
					<div class="title">Surveyors</div>
					<div class="footer">
						<a href="{{url('admin/active_surveyors')}}"> read full report</a>
					</div>
				</div>
				<div class="span4 statbox blueLight  noMargin" onTablet="span6" onDesktop="span4">
					<div class="number">{{\EnvatoUser::user_type_list(4)->count()}}<i class="icon-arrow-up"></i></div>
					<div class="title">Finance Users</div>
					<div class="footer">
						<a href="{{url('admin/finance_users')}}"> read full report</a>
					</div>
				</div>
				
	</div>
	<div class="row-fluid">
				<div class="span4 statbox purple" onTablet="span6" onDesktop="span4">
						<div class="number">{{\EnvatoUser::user_type_list(6)->count()}}<i class="icon-arrow-down"></i></div>
						<div class="title">QC Users</div>
						<div class="footer">
							<a href="{{url('admin/qc_users')}}"> read full report</a>
						</div>
					</div>	
					<div class="span4 statbox redLight" onTablet="span6" onDesktop="span4">
						<div class="number">{{\EnvatoUser::user_type_list(1)->count()}}<i class="icon-arrow-down"></i></div>
						<div class="title">Admin Users</div>
						<div class="footer">
							<a href="{{url('admin/admin_users')}}"> read full report</a>
						</div>
					</div>
					<div class="span4 statbox green" onTablet="span6" onDesktop="span4">
						<div class="number">{{\EnvatoUser::projects_count()}}<i class="icon-arrow-down"></i></div>
						<div class="title">Projects</div>
						<div class="footer">
							<a href="{{url('admin/manage_projects')}}"> read full report</a>
						</div>
					</div>
				</div>
             <!--display projects code start-->				
                <!-- <div class="row-fluid">
					<div class="box span12">
						<div class="box-header">
							<h2><i class="halflings-icon white align-justify"></i><span class="break"></span>Latest Projects</h2>
							<div class="box-icon">
								<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							</div>
						</div>
						<div class="box-content">
							<table class="table table-striped table-bordered bootstrap-datatable datatable table-responsive">
								  <thead>
									  <tr>
										  <th>Sr No. <a><i class="icon-sort"></i></a></th>
										  <th>Project Name <a><i class="icon-sort"></i></a></th>
										  <th>Client Name <a><i class="icon-sort"></i></a></th>
										  <th>Date <a><i class="icon-sort"></i></a></th>
										  <th>Action</th>                                          
									  </tr>
								  </thead>   
								  <tbody>
									<tr>
										<td>1</td>
										<td>Project One</td>
										<td>Jon Snow</td>
										<td>2012/01/01</td>
										<td>
											<a class="btn btn-success" href="#">
											<i class="halflings-icon white zoom-in"></i>  
											</a>
										</td>                                     
									</tr>
									<tr>
										<td>2</td>
										<td>Project Two</td>
										<td>Denny</td>
										<td>2012/01/015</td>
										<td>
											<a class="btn btn-success" href="#">
											<i class="halflings-icon white zoom-in"></i>  
											</a>
										</td>                                         
									</tr>
									<tr>
										<td>3</td>
										<td>Project Three</td>
										<td>Robb Stark</td>
										<td>2012/02/03</td>	
										<td>
											<a class="btn btn-success" href="#">
											<i class="halflings-icon white zoom-in"></i>  
											</a>
										</td>                                          
									</tr>
									<tr>
										<td>4</td>
										<td>Project Four</td>
										<td>Dario</td>
										<td>2012/02/07</td>
										<td>
											<a class="btn btn-success" href="#">
											<i class="halflings-icon white zoom-in"></i>  
											</a>
										</td>                                          
									</tr>
									<tr>
										<td>5</td>
										<td>Project Five</td>
										<td>Greyjoy</td>
										<td>2012/01/01</td>
										<td>
											<a class="btn btn-success" href="#">
											<i class="halflings-icon white zoom-in"></i>  
											</a>
										</td>                                          
									</tr>                                   
								  </tbody>
							 </table>    
						</div>
					</div>
				</div> -->
	      
	</div>
</div>		
@endsection	    

