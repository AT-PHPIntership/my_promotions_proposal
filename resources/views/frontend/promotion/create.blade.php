@extends('frontend.layouts.master')
@section('title', trans('labels.add_promotion'))
@section('content')
    @include('frontend.business.partials.side_bar')
    <div class="col-lg-9 col-md-8 col-sm-7">
        <div class="alert alert-danger" id="message">
            <ul id="errors"></ul>
        </div>
        <h1>{!! trans('labels.add_promotion') !!}</h1>
        {!! Form::open(['class' => 'form-horizontal', 'id' => 'frmCreatePromotion',  'files' => true] ) !!}
        {!! Form::hidden(null, route('promotion.create', [Auth::user()->id, Auth::user()->business->id]), ['id' => 'route_promotion_create']) !!}
        <div class="form-group">
            {!! Form::label('category', trans('labels.category'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::select('category_id', $categories, null, ['placeholder' => trans('labels.choose_category'),'class' => 'form-control', 'id' => 'category_id']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('labels.title'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('title', old('title'), ['class' => 'form-control', 'id' => 'title']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('labels.intro'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('intro', old('intro'), ['class' => 'form-control', 'id' => 'intro']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('labels.content'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id' => 'content']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('labels.image'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::file('image', ['class' => 'form-control', 'id' => 'image']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('labels.expired_day'), ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10" class="input-append date">
                {!! Form::text('expired_day', old('expired_day'), ['class' => 'form-control datepicker', 'data-provide' => 'datepicker', 'id' => 'expired_day']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {!! Form::reset( trans('labels.reset') , array('class' => 'btn btn-default')) !!}
                {!! Form::submit( trans('labels.submit') , array('class' => 'btn btn-primary')) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
@section('script')
    <script src="{{ asset('frontend/js/create_promotion.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
@endsection
