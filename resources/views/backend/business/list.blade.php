@extends('backend.layouts.master')
@section('title', trans('labels.business'))
@section('content')
<!-- page content -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{!! trans('labels.business') !!}<small>{!! trans('labels.list') !!}</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="myTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{!! trans('labels.user_name') !!}</th>
                                    <th>{!! trans('labels.business_name') !!}</th>
                                    <th>{!! trans('labels.status') !!}</th>
                                    <th>{!! trans('labels.action') !!}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($businesses as $business)
                                <tr>
                                    <td>{{ $business->user_name }}</td>
                                    <td>{{ $business->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-xs">{{ $business->status_label }}</button>
                                        @if($business->status == config('app.inactive'))
                                            <a id="{{ route('admin.business.update',['id' => $business->id])  }}" class="btn active btn-warning btn-xs">{!! trans('labels.clickactive') !!}</a>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('admin.business.show',['id' => $business->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> {!! trans('labels.view') !!} </a>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<!-- /page content -->
@endsection