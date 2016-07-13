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
                                    <th>{!! trans('labels.username') !!}</th>
                                    <th>{!! trans('labels.businessname') !!}</th>
                                    <th>{!! trans('labels.status') !!}</th>
                                    <th>{!! trans('labels.action') !!}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($businesses as $business)
                                <tr>
                                    <td>{{ $business->user_name }}</td>
                                    <td>{{ $business->name }}</td>
                                    @if($business->status == config('app.inactive'))
                                        <td><label class="btn btn-warning btn-xs" disabled="disabled">{!! trans('labels.inactive') !!}</label>
                                            <a id="{{ route('admin.business.update',['id' => $business->id])  }}" class="btn active btn-success btn-xs">{!! trans('labels.clickactive') !!}</a>
                                        </td>
                                    @else
                                        <td><button type="button" class="btn btn-success btn-xs">{!! trans('labels.actived') !!}</button></td>
                                    @endif
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