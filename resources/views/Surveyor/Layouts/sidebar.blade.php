<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="{{{ (Request::is('surveyor/dashboard') ? 'active' : '') }}}"><a href="{{url('surveyor/dashboard')}}"><i class="icon-bar-chart"></i>
			<span class="hidden-tablet">&nbsp;Dashboard</span></a></li>	
			<li class="{{{ (Request::is('admin/manage-projects') ? 'active' : '') }}}">
				<!-- <a href="{{ url('admin/admin_manage_projects') }}"><i class="icon-edit"></i> -->
				<a href="#"><i class="icon-edit"></i>
				<span class="hidden-tablet">&nbsp;Manage Projects</span>
				</a>
			</li>
			<li class="{{{ (Request::is('admin/qc') ? 'active' : '') }}}">
				<!-- <a href="{{ url('admin/admin_qcreports') }}"><i class="icon-list-alt"></i> -->
				<a href="#"><i class="icon-list-alt"></i>
				<span class="hidden-tablet">&nbsp;QC Reports</span>
				</a>
			</li>
			<li class="{{{ (Request::is('admin/in') ? 'active' : '') }}}">
				<!-- <a href="{{ url('admin/admin_invoice') }}"><i class="icon-file"></i> -->
				<a href="#"><i class="icon-file"></i>
				<span class="hidden-tablet">&nbsp;Invoices</span>
				</a>
			</li>
			<li class="{{{ (Request::is('surveyor/settings') ? 'active' : '') }}}">
				<a href="{{ url('surveyor/settings') }}"><i class="icon-cog"></i>
				<!-- <a href="#"><i class="icon-cog"></i> -->
				<span class="hidden-tablet">&nbsp;Settings</span>
				</a>
			</li>
		</ul>
	</div>
</div>