@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')

	<legend>{!! trans('labels.update_profile') !!}</legend>

	{!! Form::open(['route' => ['user.post.profile', Auth::user()->id], 'files' => true, 'class' => 'form-horizontal form-label-left', 'id' => 'frmUpdateProfile']) !!}
	<div class="form-group">
		{{ Form::label('name', trans('labels.user_name'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
		<span >{!! trans('labels.star') !!}</span>

		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('name', $user->name, ['class' => 'form-control col-md-7 col-xs-12']) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('email', trans('labels.email'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
		<span class="required">{!! trans('labels.star') !!}</span>

		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::label('email', $user->email, ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'disabledInput', 'disabled']) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('password', trans('labels.password'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}

		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::password('password', ['class' => 'form-control col-md-7 col-xs-12']) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('phone', trans('labels.phone'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}

		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::number('phone', $user->phone, ['class' => 'form-control col-md-7 col-xs-12']) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('address', trans('labels.address'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}

		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('address', $user->address, ['class' => 'form-control col-md-7 col-xs-12']) }}
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('image', trans('labels.image'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
		<span class="required">{!! trans('labels.star') !!}</span>

		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::file('image', ['class'=>'form-control col-md-7 col-xs-12']) }}
			<img src="{{ asset(config('upload.user_path').$user->image) }}" width="100px" height="100px">
		</div>
	</div>

	<div class="ln_solid"></div>
	<div class="form-group">
		<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
			{{ link_to(route('index'), trans('labels.cancel'), ['class'=>'btn btn-primary'])}}
			{{ Form::submit(trans('labels.submit'), ['class' => 'btn btn-success']) }}
		</div>
	</div>
	{!! Form::close() !!}

<!-- /page content -->
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\Frontend\UserRequest', '#frmUpdateProfile'); !!}
@endsection
