<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="{{{ (Request::is('quality_user/dashboard') ? 'active' : '') }}}"><a href="{{url('quality_user/dashboard')}}"><i class="icon-bar-chart"></i>
				<span class="hidden-tablet">&nbsp;Dashboard</span></a>
			</li>
			
			<li class="{{{ (Request::is('admin/active_surveyors') || Request::is('admin/prospective_surveyors')|| Request::is('admin/trainee_surveyors') || Request::is('admin/add_surveyors') || Request::is('admin/edit_surveyor/*') || Request::is('admin/surveyor_info/*')  ? 'active' : '') }}}">
				<!-- <a class="submenu" href="{{ url('admin/prospective_surveyors') }}"> -->
				<a class="submenu" href="#">
					<i class="icon-file-alt"></i>
					<span class="hidden-tablet">&nbsp;Surveyors</span>
				</a>
			</li>
			<li class="{{{ (Request::is('admin/manage-projects') ? 'active' : '') }}}">
				<!-- <a href="{{ url('admin/admin_manage_projects') }}"><i class="icon-edit"></i> -->
					<a href="#"><i class="icon-edit"></i>
					<span class="hidden-tablet">&nbsp;Manage Projects</span>
				</a>
			</li>
			<li class="{{{ (Request::is('quality_user/settings') ? 'active' : '') }}}">
				<a href="{{ url('quality_user/settings') }}"><i class="icon-cog"></i>
					<!-- <a href="#"><i class="icon-cog"></i> -->
					<span class="hidden-tablet">&nbsp;Settings</span>
				</a>
			</li>
		</ul>
	</div>
</div>