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
                                    <td>{{ $business->user->name }}</td>
                                    <td>{{ $business->name }}</td>
                                    @if($business->status == 0)
                                        <td><label class="btn btn-warning btn-xs" disabled="disabled">Inactive</label><a id="{{ route('admin.business.update',['id' => $business->id])  }}" class="btn active btn-success btn-xs">Click to Active</a></td>
                                    @else
                                        <td><button type="button" class="btn btn-success btn-xs">Actived</button></td>
                                    @endif
                                    <td><a href="{{ route('admin.business.show',['id' => $business->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View </a>
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