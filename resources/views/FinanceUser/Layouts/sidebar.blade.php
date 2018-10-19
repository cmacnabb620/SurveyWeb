<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="{{{ (Request::is('finance_user/dashboard') ? 'active' : '') }}}"><a href="{{url('finance_user/dashboard')}}"><i class="icon-bar-chart"></i>
			<span class="hidden-tablet">&nbsp;Dashboard</span></a></li>	
			
			<li class="{{{ (Request::is('admin/active_surveyors') || Request::is('admin/prospective_surveyors')|| Request::is('admin/trainee_surveyors') || Request::is('admin/add_surveyors') || Request::is('admin/edit_surveyor/*') || Request::is('admin/surveyor_info/*')  ? 'active' : '') }}}">
				<!-- <a class="submenu" href="{{ url('admin/prospective_surveyors') }}"> -->
				<a class="submenu" href="#">
					<i class="icon-file-alt"></i>
					<span class="hidden-tablet">&nbsp;Surveyors</span>
				</a>
			</li>
			<li class="{{{ (Request::is('admin/in') ? 'active' : '') }}}">
				<!-- <a href="{{ url('admin/admin_invoice') }}"><i class="icon-file"></i> -->
				<a href="#"><i class="icon-file"></i>
				<span class="hidden-tablet">&nbsp;Invoices</span>
				</a>
			</li>
			<li class="{{{ (Request::is('finance_user/settings') ? 'active' : '') }}}">
				<a href="{{ url('finance_user/settings') }}"><i class="icon-cog"></i>
				<!-- <a href="#"><i class="icon-cog"></i> -->
				<span class="hidden-tablet">&nbsp;Settings</span>
				</a>
			</li>
		</ul>
	</div>
</div>