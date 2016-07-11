@extends('backend.layouts.master')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
        <div class="">
                <div class="page-title">
                        <div class="title_left">
                                <h3>{!! trans('labels.user') !!} <small>{!! trans('labels.manager') !!}</small></h3>
                            </div>
                    </div>

                <div class="clearfix"></div>
                <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                                @if (Session::has('error'))
                                    <div class="alert error alert-danger"><b>{{ Session::get('error') }}</b></div>
                                @endif
                                <div class="x_panel">
                                        <div class="x_title">
                                                <h2>{!! trans('labels.user') !!}<small>{!! trans('labels.list') !!}</small></h2>
                                                <div class="clearfix"></div>
                                            </div>
                                        <div class="x_content">
                                                <table id="myTable" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                    <th>{!! trans('labels.username') !!}</th>
                                                                    <th>{!! trans('labels.email') !!}</th>
                                                                    <th>{!! trans('labels.image') !!}</th>
                                                                    <th>{!! trans('labels.address') !!}</th>
                                                                    <th>{!! trans('labels.phone') !!}</th>
                                                                    <th>{!! trans('labels.business') !!}</th>
                                                                    <th>{!! trans('labels.action') !!}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($users as $user)
                                                                {{--{{ dd($user->business->all()) }}--}}
                                                            <tr>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                @if($user->image != "")
                                                                    <td><img src="{{ $user->image }}" width="50" /></td>
                                                                @else
                                                                    <td>Not Image</td>
                                                                @endif
                                                                <td>{{ $user->address }}</td>
                                                                <td>{{ $user->phone }}</td>
                                                                @if($user->business['id'])
                                                                    <td><a href="{{ url('admin/user/'.$user->business->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Enable </a></td>
                                                                @else
                                                                    <td><label class="btn btn-warning btn-xs" disabled="disabled"><i class="fa fa-eye-slash"></i> Disable </label></td>
                                                                @endif
                                                                <td><a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a></td>
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