@extends('backend.layouts.master')

@section('content')

<!-- page content --> 
<div class="right_col" role="main"> 
    <div class=""> 
        <div class="page-title"> 
            <div class="title_left"> 
                <h3>{{ trans('labels.label_city') }} <small>{{ trans('labels.label_manager') }}</small></h3> 
            </div> 
        </div> 

        <div class="clearfix"></div> 
        <div class="row"> 
            <div class="col-md-12 col-sm-12 col-xs-12"> 
                <div class="x_panel"> 
                    <div class="x_title"> 
                        <h2>{{ trans('labels.label_city') }}<small>{{ trans('labels.label_list') }}</small></h2>
                        <div class="clearfix"></div> 
                        
                    </div> 
                    <div class="x_content">  
                        <table id="myTable" class="table table-striped table-bordered">
                            <thead> 
                                <tr> 
                                    <th>{{ trans('labels.label_id') }}</th> 
                                    <th>{{ trans('labels.label_name') }}</th> 
                                    <th>{{ trans('labels.label_action') }}</th> 
                                </tr> 
                            </thead> 
                            <tbody> 
                                @foreach ($cities as $citie)
                                <tr> 
                                    <td>{{$citie['id']}}</td> 
                                    <td>{{$citie['name']}}</td>
                                    <td>
                                        <a class="btn btn-info btn-xs" href="#">Edit</a>
                                        <a class="btn btn-danger btn-xs" href="#">Delete</a>
                                    </td> 
                                </tr> 
                                @endforeach
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