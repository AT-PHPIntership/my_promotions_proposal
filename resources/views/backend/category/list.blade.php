@extends('backend.layouts.master')
@section('title', trans('labels.category'))
@section('content')
    <!-- page content -->
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @if (count($categories) > 0)
            <div class="x_title">
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary"><i class="fa fa-pencil"></i> {!! trans('labels.addcategory') !!} </a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="list_categories" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{!! trans('labels.category_parent') !!}</th>
                        <th>{!! trans('labels.category_name') !!}</th>
                        <th>{!! trans('labels.action') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->category_parent }}</td>
                            <td>{{ $category->name }}</td>
                            <td><a href="{{ route('admin.category.edit',['id' => $category->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {!! trans('labels.edit') !!} </a>
                                <a url="{{ route('admin.category.destroy', ['id' => $category->id]) }}" name="{!! trans('labels.category') !!}" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> {!! trans('labels.delete') !!} </a></td>
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