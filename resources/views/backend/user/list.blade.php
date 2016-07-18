@extends('backend.layouts.master')
@section('title', trans('labels.user'))
@section('content')
<!-- page content -->
                <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                        <div class="x_title">
                                                <h2>{!! trans('labels.user') !!}<small>{!! trans('labels.list') !!}</small></h2>
                                                <div class="clearfix"></div>
                                            </div>
                                        <div class="x_content">
                                                <table id="list_users" class="table table-striped table-bordered">
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
                                                            <tr>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                @if($user->image)
                                                                    <td><img src="{{ $user->image }}" width="50" /></td>
                                                                @else
                                                                    <td>{!! trans('labels.not_image') !!}</td>
                                                                @endif
                                                                <td>{{ $user->address }}</td>
                                                                <td>{{ $user->phone }}</td>
                                                                @if(!empty($user->business->id))
                                                                    <td><a href="{{ route('admin.user.show',['id' => $user->business->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i>{!! trans('labels.enable') !!}</a></td>
                                                                @else
                                                                    <td><label class="btn btn-warning btn-xs" disabled="disabled"><i class="fa fa-eye-slash"></i> {!! trans('labels.disable') !!} </label></td>
                                                                @endif
                                                                <td><a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {!! trans('labels.edit') !!} </a></td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                            </div>
                                    </div>
                            </div>
                    </div>
<!-- /page content -->
@endsection