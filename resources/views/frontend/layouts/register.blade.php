@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
<div class="container">
	<div class="page-header" id="banner">
		<div class="row">
			<legend>{!! trans('labels.sign_up') !!}</legend>

			{!! Form::open(['route' => 'user.post.register', 'class' => 'form-horizontal'] ) !!}

			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				{!! Form::label('name', trans('labels.username'), ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-10">
					{!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
					
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				{!! Form::label('email', trans('labels.email'), ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-10">
					{!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
					
					@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				{!! Form::label('password', trans('labels.password'), ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-10">
					{!! Form::password('password', ['class' => 'form-control']) !!}
					
					@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
				{!! Form::label('password-confirm', trans('labels.repassword'), ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-10">
					{!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm']) !!}
					
					@if ($errors->has('password_confirmation'))
					<span class="help-block">
						<strong>{{ $errors->first('password_confirmation') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					{!! Form::reset( trans('labels.reset') , array('class' => 'btn btn-default')) !!}
					{!! Form::submit( trans('labels.submit') , array('class' => 'btn btn-primary')) !!}
				</div>
			</div>

			{!! Form::close() !!}
                        
                        @include('frontend.layouts.partials.side_bar')
		</div>
	</div>
</div>
@endsection
