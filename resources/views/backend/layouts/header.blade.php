<header class="main-header">
	<!-- Logo -->
	<a href="{{ url('admin/dashboard') }}" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>{{ trans('labels.title_m') }}</b>{{ trans('labels.title_p') }}</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>{{ trans('labels.title_my') }}</b>{{ trans('labels.title_promotion') }}</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('asset/backend/images/admin/no_image.jpg') }}" class="user-image" alt="User Image">
						<span class="hidden-xs">Alexander Pierce</span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="{{ asset('asset/backend/images/admin/no_image.jpg') }}" class="img-circle" alt="User Image">
							<p>
								Alexander Pierce - Web Developer
								<small>Member since Nov. 2012</small>
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-default btn-flat">{{ trans('labels.btn_profile') }}</a>
							</div>
							<div class="pull-right">
								<a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat">{{ trans('labels.btn_signout') }}</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>
