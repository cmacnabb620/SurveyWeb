<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="{{{ (Request::is('quality_user/dashboard') ? 'active' : '') }}}"><a href="{{url('quality_user/dashboard')}}"><i class="icon-bar-chart"></i>
				<span class="hidden-tablet">&nbsp;Dashboard</span></a>
			</li>
			<li class="{{{ (Request::is('quality_user/projects_reviews') || Request::is('quality_user/project_review_info/*') ? 'active' : '') }}}">
				<a href="{{ url('quality_user/projects_reviews') }}"><i class="icon-edit"></i>
					<!-- <a href="#"><i class="icon-edit"></i> -->
					<span class="hidden-tablet">&nbsp;Projects Reviews</span>
				</a>
			</li>
			<li class="{{{ (Request::is('quality_user/my_surveyors') || Request::is('quality_user/surveyor_projects_info/*') ? 'active' : '') }}}">
				<a class="submenu" href="{{ url('quality_user/my_surveyors') }}">
				<!-- <a class="submenu" href="#"> -->
					<i class="icon-file-alt"></i>
					<span class="hidden-tablet">&nbsp;My Surveyors</span>
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