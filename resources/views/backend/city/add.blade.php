@extends('backend.layouts.master')
@section('title', trans('labels.city'))
@section('content')

<!-- page content --> 

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>{!! trans('labels.city') !!} <small>{!! trans('labels.create') !!}</small></h2>
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
			<form class="form-horizontal form-label-left" method="POST" action="{{ route('admin.city.index') }}">
				{!! csrf_field() !!}
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{!! trans('labels.city_name') !!} <span class="required">{!! trans('labels.star') !!}</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<a href="{{ route('admin.city.index') }}" class="btn btn-primary">{!! trans('labels.cancel') !!}</a>
						<button type="submit" class="btn btn-success">{!! trans('labels.submit') !!}</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /page content -->
@endsection

