@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
	<legend>{!! trans('labels.register_business') !!}</legend>

    <div class="alert alert-danger" id="message">
        <ul id="errors"></ul>
    </div>

	{!! Form::open(['class' => 'form-horizontal', 'id' => 'frmRegBusiness', 'files' => true] ) !!}
	
	{!! Form::hidden('route', route('business.post.register'), ['id' => 'route_create']) !!}
	{!! Form::hidden('route', route('get.ciy'), ['id' => 'cities']) !!}
	{!! Form::hidden('route', route('get.county'), ['id' => 'counties']) !!}
	<div class="form-group">
		{!! Form::label('name', trans('labels.username'), ['class' => 'col-lg-2 control-label']) !!}
		<div class="col-lg-10">
			{!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('email', trans('labels.email'), ['class' => 'col-lg-2 control-label']) !!}
		<div class="col-lg-10">
			{!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('phone', trans('labels.phone'), ['class' => 'col-lg-2 control-label']) !!}
		<div class="col-lg-10">
			{!! Form::number('phone', null, ['class' => 'form-control']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('description', trans('labels.description'), ['class' => 'col-lg-2 control-label']) !!}
		<div class="col-lg-10">
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('logo', trans('labels.logo'), ['class' => 'col-lg-2 control-label']) !!}
		<div class="col-lg-10">
			{!! Form::file('logo', ['class' => 'form-control']) !!}
		</div>
	</div>
	
	<div class="form-group">
		{!! Form::label('city', trans('labels.city'), ['class' => 'col-lg-2 control-label']) !!}
		<div class="col-lg-10">
			{!! Form::select('city', [], null, ['class' => 'form-control']) !!}
			<br>
		</div>
		{!! Form::label('county', trans('labels.county'), ['class' => 'col-lg-2 control-label']) !!}
		<div class="col-lg-10">
			{!! Form::select('county[]', [], null, ['placeholder' => trans('labels.choose_city'), 'multiple' => 'multiple', 'size' => 5, 'class' => 'form-control', 'id' => 'county']) !!} 		
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
			{!! Form::reset( trans('labels.reset') , array('class' => 'btn btn-default')) !!}
			{!! Form::submit( trans('labels.submit') , array('class' => 'btn btn-primary')) !!}
		</div>
	</div>

	{!! Form::close() !!}

@endsection
@section('script')
	<script src="{{ asset('frontend/js/business.js') }}"></script>
@endsection
