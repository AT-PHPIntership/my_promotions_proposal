@extends('backend.layouts.master')
@section('content')
<!-- page content -->

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>{!! trans('labels.admin') !!} <small>{!! trans('labels.create') !!}</small></h2>
			<div class="clearfix"></div>
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
		<div class="x_content">
			<br />
			<form class="form-horizontal form-label-left" method="POST" action="{{ route('admin.account.store') }}" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">{!! trans('labels.user_name') !!} <span class="required">{!! trans('labels.star') !!}</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">{!! trans('labels.email') !!} <span class="required">{!! trans('labels.star') !!}</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('labels.password') !!} <span class="required">{!! trans('labels.star') !!}</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="password" class="form-control col-md-7 col-xs-12" type="password" name="password">
					</div>
				</div>

				<div class="form-group">
					<label for="phone" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('labels.phone') !!}
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="phone" class="form-control col-md-7 col-xs-12" type="number" name="phone">
					</div>
				</div>

				<div class="form-group">
					<label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('labels.address') !!}
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="address" name="address" class="form-control col-md-7 col-xs-12" type="text">
					</div>
				</div>

				<div class="form-group">
					<label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">{!! trans('labels.image') !!} <span class="required">{!! trans('labels.star') !!}</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input id="image" class="form-control col-md-7 col-xs-12" type="file" name="image">
					</div>
				</div>

				<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<a href="{{ route('admin.account.index') }}" class="btn btn-primary">{!! trans('labels.cancel') !!}</a>
						<button type="submit" class="btn btn-success">{!! trans('labels.submit') !!}</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>

<!-- /page content -->
@endsection
