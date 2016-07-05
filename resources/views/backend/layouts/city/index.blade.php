@extends('backend.layouts.master')

@section('content')

<!-- page content --> 
<div class="right_col" role="main"> 
    <div class=""> 
        <div class="page-title"> 
            <div class="title_left"> 
                <h3>{{ trans('labels.label_user') }} <small>{{ trans('labels.label_manager') }}</small></h3> 
            </div> 
        </div> 

        <div class="clearfix"></div> 
        <div class="row"> 
            <div class="col-md-12 col-sm-12 col-xs-12"> 
                <div class="x_panel"> 
                    <div class="x_title"> 
                        <h2>{{ trans('labels.label_user') }}<small>{{ trans('labels.label_list') }}</small></h2>
                        <div class="clearfix"></div> 
                        
                    </div> 
                    <div class="x_content">  
                        <a href="{!! url('admin/account/create') !!}" class="btn btn-primary btn-sm pull-left " >
                                <i class="fa fa-plus-circle"></i> {{trans('labels.label_add_new')}}
                            </a>
                        <table id="datatable" class="table table-striped table-bordered"> 
                            <thead> 
                                <tr> 
                                    <th>{{ trans('labels.label_name') }}</th> 
                                    <th>{{ trans('labels.label_email') }}</th> 
                                    <th>{{ trans('labels.label_image') }}</th> 
                                    <th>{{ trans('labels.label_phone') }}</th> 
                                    <th>{{ trans('labels.label_address') }}</th> 
                                </tr> 
                            </thead> 
                            <tbody> 
                                <tr> 
                                    <td>Tiger Nixon</td> 
                                    <td>System Architect</td> 
                                    <td>Edinburgh</td> 
                                    <td>61</td> 
                                    <td>2011/04/25</td> 
                                </tr> 
                                
                            </tbody> 
                        </table> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
<!-- /page content -->
@endsection