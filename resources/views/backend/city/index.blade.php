@extends('backend.layouts.master')
@section('title', trans('labels.city'))
@section('content')

<!-- page content --> 
<div class="col-md-12 col-sm-12 col-xs-12"> 
    <div class="x_panel">
        @if (count($cities) > 0)
        <div class="x_title"> 
            <a class="btn btn-md btn-primary" href="{{ route('admin.city.create') }}">{!! trans('labels.add_new') !!}</a>
            <div class="clearfix"></div> 

        </div> 
        <div class="x_content">  
            <table id="datatable" class="table table-striped table-bordered">
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
                        <td>{{ $city->id }}</td> 
                        <td>{{ $city->name }}</td>
                        <td>
                            <a class="btn btn-info btn-xs" id="edit" href="{{ route('admin.city.edit', ['id' => $city->id]) }}">{!! trans('labels.edit') !!}</a>
                            <a  class="btn btn-danger btn-xs delete" name="{!! trans('labels.city') !!}" url="{{ route('admin.city.destroy', ['id' => $city->id]) }}">{!! trans('labels.delete') !!}</a>
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
<!-- /page content -->
@endsection
