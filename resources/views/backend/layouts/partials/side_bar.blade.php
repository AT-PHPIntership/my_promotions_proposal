<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>{{ trans('labels.label_promotion_admin') }}</span></a>
        </div>

        <div class="clearfix"></div>


        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> {{ trans('labels.label_dasboard') }} </a> 
                    <li><a href="{{ url('admin/business') }}"><i class="fa fa-home"></i> {{ trans('labels.label_business') }} </a>                
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->
    </div>
</div>
