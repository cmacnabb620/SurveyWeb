<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="{{{ (Request::is('surveyor/dashboard') ? 'active' : '') }}}"><a href="{{url('surveyor/dashboard')}}"><i class="icon-bar-chart"></i>
				<span class="hidden-tablet">&emsp;Dashboard</span></a></li>
				<li>
					<a class="dropmenu" href="#"><i class="icon-edit"></i>
					<span class="hidden-tablet">&emsp;Manage Projects</span></a>
					<ul>
						<li class="{{{ (Request::is('surveyor/working_projects') || Request::is('surveyor/working_project_info/*') ? 'active' : '') }}}">
							<a class="submenu" href="{{ url('surveyor/working_projects') }}">
								<i class="icon-file-alt"></i>
								<span class="hidden-tablet">&nbsp;Working Projects</span>
							</a>
						</li>
						<li>
							<a class="submenu" href="{{ url('surveyor/completed_projects') }}">
								<i class="icon-file-alt"></i>
								<span class="hidden-tablet">&nbsp;Completed Projects</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="{{{ (Request::is('surveyor/qc') ? 'active' : '') }}}">
					<!-- <a href="{{ url('surveyor/surveyor_qcreports') }}"><i class="icon-list-alt"></i> -->
					<a href="#"><i class="icon-list-alt"></i>
						<span class="hidden-tablet">&emsp;QC Reports</span>
					</a>
				</li>
				<li class="{{{ (Request::is('surveyor/in') ? 'active' : '') }}}">
					<!-- <a href="{{ url('surveyor/surveyor_invoice') }}"><i class="icon-file"></i> -->
					<a href="#"><i class="icon-file"></i>
						<span class="hidden-tablet">&emsp;Invoices</span>
					</a>
				</li>
				<li class="{{{ (Request::is('surveyor/settings') ? 'active' : '') }}}">
					<a href="{{ url('surveyor/settings') }}"><i class="icon-cog"></i>
						<!-- <a href="#"><i class="icon-cog"></i> -->
						<span class="hidden-tablet">&emsp;Settings</span>
					</a>
				</li>
			</ul>
		</div>
	</div>