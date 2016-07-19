@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
<div class="container">
	<div class="page-header" id="banner">
		<div class="row">
			<legend>{!! trans('labels.sign_up') !!}</legend>

			{!! Form::open(['route' => 'user.post.register', 'id' => 'frmRegisterUser', 'class' => 'form-horizontal', 'files' => true] ) !!}

				<div class="form-group">
					{!! Form::label('name', trans('labels.username'), ['class' => 'col-lg-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('email', trans('labels.email'), ['class' => 'col-lg-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('email', null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('password', trans('labels.password'), ['class' => 'col-lg-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::password('password', ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('address', trans('labels.address'), ['class' => 'col-lg-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('address', null,['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('phone', trans('labels.phone'), ['class' => 'col-lg-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::number('phone', null,['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('image', trans('labels.image'), ['class' => 'col-lg-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::file('image',['class' => 'form-control']) !!}
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
	</div>
</div>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\Frontend\RegisterUserRequest', '#frmRegisterUser'); !!}
@endsection
