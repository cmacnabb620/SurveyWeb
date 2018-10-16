<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="{{{ (Request::is('project_manager/dashboard') ? 'active' : '') }}}"><a href="{{url('project_manager/dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">&emsp;Dashboard</span></a></li>	
			<li>
				<a class="dropmenu" href="#"><i class="icon-user"></i><span class="hidden-tablet">&emsp;Manage Projects</span></a>
				<ul style="display:{{{ (Request::is('project_manager/new_projects') || Request::is('project_manager/active_project_info/*') || Request::is('project_manager/new_project_info/*') || Request::is('project_manager/set_project_duration/*')||Request::is('project_manager/make_schedule/*') || Request::is('project_manager/update_project_date')|| Request::is('project_manager/make_post') ? 'block' : '') }}}">
					<li class="{{{ (Request::is('project_manager/new_projects') || Request::is('project_manager/new_project_info/*') || Request::is('project_manager/set_project_duration/*') || Request::is('admin/admin_users_info/*')||Request::is('project_manager/update_project_date/*') || Request::is('project_manager/update_project_date')|| Request::is('project_manager/make_post')  ? 'active' : '') }}}">
						<a class="submenu" href="{{url('project_manager/new_projects')}}">
						<!-- <a class="submenu" href="#"> -->
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;New Projects</span>
						</a>
					</li>				
					<li class="{{{(Request::is('project_manager/active_projects') || Request::is('project_manager/make_schedule/*') || Request::is('project_manager/active_project_info/*') ? 'active' : '') }}}">
						<a class="submenu" href="{{url('project_manager/active_projects')}}">
						<!-- <a class="submenu" href="#"> -->
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Active Projects</span>
						</a>
					</li>

					<li>
						<!-- <a class="submenu" href="{{url('project_manager/delayed_projects')}}"> -->
						<a class="submenu" href="#">
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Delayed Projects</span>
						</a>
					</li>
					<li>
						<!-- <a class="submenu" href="{{ url('project_manager/completed_projects') }}"> -->
						<a class="submenu" href="#">
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Completed Projects</span>
						</a>
					</li>
				</ul>	
			</li>
			<li>
				<a class="dropmenu" href="#"><i class="icon-user"></i><span class="hidden-tablet">&emsp;Manage Surveyors</span></a>
				<ul style="display:{{{ (Request::is('project_manager/active_surveyors') || Request::is('project_manager/active_surveyor_info/*/*') || Request::is('project_manager/trainee_surveyors') || Request::is('project_manager/trainee_surveyor_info/*/*')||Request::is('project_manager/prospective_surveyors') || Request::is('project_manager/prospective_surveyor_info/*/*')|| Request::is('project_manager/inactive_surveyors') || Request::is('project_manager/inactive_surveyor_info/*/*') ? 'block' : '') }}}">
					
					<li class="{{{ (Request::is('project_manager/active_surveyors') || Request::is('project_manager/active_surveyor_info/*/*') ? 'active' : '') }}}">
						<a class="submenu" href="{{url('project_manager/active_surveyors')}}">
						<!-- <a class="submenu" href="#"> -->
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Active Type</span>
						</a>
					</li>
					<li  class="{{{ (Request::is('project_manager/trainee_surveyors') || Request::is('project_manager/trainee_surveyor_info/*/*') ? 'active' : '') }}}">
						<a class="submenu" href="{{url('project_manager/trainee_surveyors')}}">
						<!-- <a class="submenu" href="#"> -->
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Trainee Type</span>
						</a>
					</li>

					<li class="{{{ (Request::is('project_manager/prospective_surveyors') || Request::is('project_manager/prospective_surveyor_info/*/*') ? 'active' : '') }}}">
						<a class="submenu" href="{{url('project_manager/prospective_surveyors')}}">
						<!-- <a class="submenu" href="#"> -->
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Prospective Type</span>
						</a>
					</li>
					<li  class="{{{ (Request::is('project_manager/inactive_surveyors') || Request::is('project_manager/inactive_surveyor_info/*/*') ? 'active' : '') }}}">
						<a class="submenu" href="{{url('project_manager/inactive_surveyors')}}">
						<!-- <a class="submenu" href="#"> -->
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Inactive Type</span>
						</a>
					</li>
				</ul>	
			</li>
			<li>
				<a href="{{url('project_manager/manage_providers')}}"><i class="icon-list-alt"></i>
				<!-- <a href="#"><i class="icon-list-alt"></i> -->
				<span class="hidden-tablet">&emsp;Manage Providers</span>
				</a>
			</li>
			<li>
				<a href="{{url('project_manager/manage_specialty')}}"><i class="icon-list-alt"></i>
				<!-- <a href="#"><i class="icon-list-alt"></i> -->
				<span class="hidden-tablet">&emsp;Manage Specialty</span>
				</a>
			</li>
			<li>
				<!-- <a href="{{url('project_manager/qc_reports')}}"><i class="icon-list-alt"></i> -->
				<a href="#"><i class="icon-list-alt"></i>
				<span class="hidden-tablet">&emsp;QC Reports</span>
				</a>
			</li>
			<li>
				<a href="#"><i class="icon-file"></i>
				<span class="hidden-tablet">&emsp;Invoices</span>
				</a>
			</li>
			<li class="{{{ (Request::is('project_manager/settings') ? 'active' : '') }}}">
				<a href="{{ url('project_manager/settings') }}"><i class="icon-cog"></i>
				<!-- <a href="#"><i class="icon-cog"></i> -->
				<span class="hidden-tablet">&emsp;Settings</span>
				</a>
			</li>
		</ul>
	</div>
</div>