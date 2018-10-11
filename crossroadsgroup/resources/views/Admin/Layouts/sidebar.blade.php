<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="{{{ (Request::is('admin/dashboard') ? 'active' : '') }}}"><a href="{{url('admin/dashboard')}}"><i class="icon-bar-chart"></i>
			<span class="hidden-tablet">&emsp;Dashboard</span></a></li>	
			<li class="{{{ (Request::is('admin/roles') || Request::is('admin/roles/edit-role/*')  ? 'active' : '') }}}">
			   <a href="{{url('admin/roles')}}"><i class="icon-group"></i>
			   <span class="hidden-tablet">&emsp;Roles</span></a>
			</li>
			<li>
				<a class="dropmenu" href="#"><i class="icon-user"></i>
				<span class="hidden-tablet">&emsp;Manage Users</span></a>
				<ul style="display:{{{ (Request::is('admin/admin_users') || Request::is('admin/add_admin_users') || Request::is('admin/edit_admin_users/*') || Request::is('admin/admin_users_info/*')||Request::is('admin/project_managers') || Request::is('admin/add_project_managers')|| Request::is('admin/edit_project_manager/*') || Request::is('admin/project_manager_info/*') ||Request::is('admin/active_surveyors') || Request::is('admin/prospective_surveyors')|| Request::is('admin/trainee_surveyors') || Request::is('admin/add_surveyors') || Request::is('admin/surveyors/*')  || Request::is('admin/add_surveyors') || Request::is('admin/edit_surveyor/*') || Request::is('admin/surveyor_info/*') || Request::is('admin/qc_users') || Request::is('admin/add_qc_users') || Request::is('admin/edit_qcuser/*') || Request::is('admin/qcuser_info/*') ||Request::is('admin/finance_users') ||Request::is('admin/add_finance_users') || Request::is('admin/edit_finance_user/*') || Request::is('admin/finance_user_info/*') ? 'block' : '') }}}">

                    @if(Auth::user()->user_id == 1)
					<li class="{{{ (Request::is('admin/admin_users') || Request::is('admin/add_admin_users') || Request::is('admin/edit_admin_users/*') || Request::is('admin/admin_users_info/*')  ? 'active' : '') }}}">
						<a class="submenu" href="{{url('admin/admin_users')}}">
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Admin Users</span>
						</a>
					</li>
					@endif
                   
					<li class="{{{ (Request::is('admin/project_managers') || Request::is('admin/add_project_managers') || Request::is('admin/edit_project_manager/*') || Request::is('admin/project_manager_info/*')  ? 'active' : '') }}}">
						<a class="submenu" href="{{url('admin/project_managers')}}">
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Project Managers</span>
						</a>
					</li>
					
					<li class="{{{ (Request::is('admin/active_surveyors') || Request::is('admin/prospective_surveyors')|| Request::is('admin/trainee_surveyors') || Request::is('admin/add_surveyors') || Request::is('admin/edit_surveyor/*') || Request::is('admin/surveyor_info/*')  ? 'active' : '') }}}">
						<a class="submenu" href="{{ url('admin/prospective_surveyors') }}">
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Surveyors</span>
						</a>
					</li>

					<li class="{{{ (Request::is('admin/qc_users') || Request::is('admin/add_qc_users') || Request::is('admin/edit_qcuser/*') || Request::is('admin/qcuser_info/*')  ? 'active' : '') }}}">
						<a class="submenu" href="{{ url('admin/qc_users') }}">
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Quality Users</span>
						</a>
					</li>

					<li class="{{{ (Request::is('admin/finance_users') || Request::is('admin/add_finance_users') || Request::is('admin/edit_finance_user/*') || Request::is('admin/finance_user_info/*')  ? 'active' : '') }}}">
						<a class="submenu" href="{{ url('admin/finance_users') }}">
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Finance Users</span>
						</a>
					</li>
				</ul>	
			</li>
			<li>
				<a class="dropmenu" href="#"><i class="icon-th-list"></i>
				<span class="hidden-tablet">&emsp;Manage Projects</span></a>
				<ul style="display:{{{ (Request::is('admin/manage_frequency_types') || Request::is('admin/edit_frequency_type/*') || Request::is('admin/manage_survey_types')|| Request::is('admin/edit_survey_type/*') || Request::is('admin/manage_language') || Request::is('admin/edit_language/*') || Request::is('admin/manage_dist_type') || Request::is('admin/edit_dist_type/*') || Request::is('admin/manage_client') || Request::is('admin/add_new_client') || Request::is('admin/manage_projects') || Request::is('admin/add_new_project') || Request::is('admin/edit_project') || Request::is('admin/project_info') || Request::is('admin/edit_client/*') ? 'block' : '') }}}">
                    <li class="{{{ (Request::is('admin/manage_frequency_types') || Request::is('admin/edit_frequency_type/*') ? 'active' : '') }}}">
						<a class="submenu" href="{{url('admin/manage_frequency_types')}}">
						<!-- <a class="submenu" href="#"> -->
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Frequency Types</span>
						</a>
					</li>
					<li class="{{{ (Request::is('admin/manage_survey_types') || Request::is('admin/edit_survey_type/*') ? 'active' : '') }}}">
						<a class="submenu" href="{{url('admin/manage_survey_types')}}">
						<!-- <a class="submenu" href="#"> -->
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Survey Types</span>
						</a>
					</li>
					<li class="{{{ (Request::is('admin/manage_language') || Request::is('admin/edit_language/*') ? 'active' : '') }}}">
						<a class="submenu" href="{{ url('admin/manage_language') }}">
						<!-- <a class="submenu" href="#"> -->
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Languages</span>
						</a>
					</li>
					<li class="{{{ (Request::is('admin/manage_dist_type') || Request::is('admin/edit_dist_type/*') ? 'active' : '') }}}">
						<a class="submenu" href="{{url('admin/manage_dist_type')}}">
						<!-- <a class="submenu" href="#"> -->
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Distribution Types</span>
						</a>
					</li>
					
					<li class="{{{ (Request::is('admin/manage_client') || Request::is('admin/edit_client/*')|| Request::is('admin/add_new_client') ? 'active' : '') }}}">
						<a class="submenu" href="{{ url('admin/manage_client') }}">
						<!-- <a class="submenu" href="#"> -->
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;All Clients</span>
						</a>
					</li>
					<li class="{{{ (Request::is('admin/manage_projects') || Request::is('admin/add_new_project')|| Request::is('admin/edit_project')|| Request::is('admin/project_info') ? 'active' : '') }}}">
						<a class="submenu" href="{{url('admin/manage_projects')}}">
							<i class="icon-file-alt"></i>
							<span class="hidden-tablet">&nbsp;Projects List</span>
						</a>
					</li>
				</ul>	
			</li>
			<li class="{{{ (Request::is('admin/qc') ? 'active' : '') }}}">
				<!-- <a href="{{ url('admin/admin_qcreports') }}"><i class="icon-list-alt"></i> -->
				<a href="#"><i class="icon-list-alt"></i>
				<span class="hidden-tablet">&emsp;QC Reports</span>
				</a>
			</li>
			<li class="{{{ (Request::is('admin/in') ? 'active' : '') }}}">
				<!-- <a href="{{ url('admin/admin_invoice') }}"><i class="icon-file"></i> -->
				<a href="#"><i class="icon-file"></i>
				<span class="hidden-tablet">&emsp;Invoices</span>
				</a>
			</li>
			<li class="{{{ (Request::is('admin/settings') ? 'active' : '') }}}">
				<a href="{{ url('admin/admin_settings') }}"><i class="icon-cog"></i>
				<!-- <a href="#"><i class="icon-cog"></i> -->
				<span class="hidden-tablet">&emsp;Settings</span>
				</a>
			</li>
		</ul>
	</div>
</div>