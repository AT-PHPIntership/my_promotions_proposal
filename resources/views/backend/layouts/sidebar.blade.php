<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{ asset('asset/backend/images/admin/no_image.jpg') }}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Alexander Pierce</p>
			</div>
		</div>

		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">

		<!-- Dashboard -->
			<li class="header">{{ trans('labels.title_navigation') }}</li>
			<li>
              <a href="{{ url('admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> <span>{{ trans('labels.title_dashboard') }}</span>
              </a>
            </li>

		<!-- User -->
			<li>
              <a href="{{ url('admin/user') }}">
                <i class="fa fa-users"></i> <span>{{ trans('labels.title_user') }}</span>
              </a>
            </li>
            
	</section>
	<!-- /.sidebar -->
</aside>
