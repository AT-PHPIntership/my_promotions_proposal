@extends('backend.layouts.master')
@section('title', trans('labels.category'))
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{!! trans('labels.category') !!}<small>{!! trans('labels.create') !!}</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                {!! Form::open(['route' => 'admin.category.store', 'id' => 'frmCreateCategory', 'class' => 'form-horizontal form-label-left']) !!}
                    <div class="form-group">
                        {!! Form::label('name', trans('labels.category_parent'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!} <span class="required">*</span>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('parent_id', $categories, null, ['placeholder' => trans('labels.root'),'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                            {!! Form::label('name', trans('labels.category_name'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!} <span class="required">*</span>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            {!! link_to(route('admin.category.index'), trans('labels.cancel'), ['class'=>'btn btn-primary'])!!}
                            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
      </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\Backend\CategoryRequest', '#frmCreateCategory'); !!}
@endsection