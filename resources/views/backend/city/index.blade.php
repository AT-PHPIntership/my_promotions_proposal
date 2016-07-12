@extends('backend.layouts.master')

@section('content')

<!-- page content --> 
<div class="right_col" role="main">
    <div class=""> 
        <div class="page-title"> 
            <div class="title_left"> 
                <h3>{!! trans('labels.city') !!} <small>{!! trans('labels.manager') !!}</small></h3> 
            </div> 
        </div> 

        <div class="clearfix"></div> 
        <div class="row"> 
            <div class="col-md-12 col-sm-12 col-xs-12"> 
                <div class="x_panel">
                    @if (count($cities) > 0)
                    <div class="x_title"> 
                        <a class="btn btn-md btn-primary" href="{{ url('admin/city/create') }}">{!! trans('labels.add_new') !!}</a>
                        <div class="clearfix"></div> 

                        @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @elseif (Session::has('message-warning'))
                        <div class="alert alert-danger">{{ Session::get('message-warning') }}</div>
                        @endif       
                    </div> 
                    <div class="x_content">  
                        <table id="myTable" class="table table-striped table-bordered">
                            <thead> 
                                <tr> 
                                    <th>{!! trans('labels.id') !!}</th> 
                                    <th>{!! trans('labels.name') !!}</th> 
                                    <th>{!! trans('labels.action') !!}</th> 
                                </tr> 
                            </thead> 
                            <tbody> 
                                @foreach ($cities as $city)
                                <tr> 
                                    <td>{!! $city->id !!}</td> 
                                    <td>{!! $city->name !!}</td>
                                    <td>
                                        <a class="btn btn-info btn-xs" id="edit" href="{{ url('admin/city/'.$city->id.'/edit') }}">{!! trans('labels.edit') !!}</a>
                                        <form action="{{ url('admin/city/'. $city->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs">{!! trans('labels.delete') !!}</button>
                                        </form>

                                    </td> 
                                </tr> 
                                @endforeach
                            </tbody> 
                        </table> 
                    </div> 
                    @else
                        {!! trans('labels.no_data') !!}
                    @endif
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
<!-- /page content -->
@endsection
