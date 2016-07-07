@extends('backend.layouts.master')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{!! trans('labels.business') !!} <small>{!! trans('labels.manager') !!}</small></h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @if (Session::has('error'))
                        <div class="alert error alert-danger"><b>{{ Session::get('error') }}</b></div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection