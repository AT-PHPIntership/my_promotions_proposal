@extends('backend.layouts.master')
@section('title', trans('labels.category'))
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Design <small>different form elements</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form action="{{ route('admin.category.store') }}" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Parent <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control">
                                @foreach($categories as $category)
                                    <option>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="last-name" name="cate_name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
                {!! Form::open(array('route' => 'admin.category.store', 'class' => 'form-horizontal form-label-left')) !!}
                    <div class="form-group">
                        {!! Form::label('name', trans('labels.categoryparent'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!} <span class="required">*</span>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('cate_parent', [
                            '1' => 'data'
                        ], null, ['class' => 'form-control', 'placeholder' => 'Please choose ...']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                            {!! Form::label('name', trans('labels.categoryname'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!} <span class="required">*</span>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('cate_name', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            {!! Form::submit('Cancel', ['class' => 'btn btn-primary']) !!}
                            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
      </div>
    </div>
@endsection