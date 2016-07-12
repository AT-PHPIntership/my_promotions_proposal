@extends('backend.layouts.master')
@section('title', trans('labels.admin'))
@section('content')
<!-- page content -->

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>{!! trans('labels.admin') !!} <small>{!! trans('labels.create') !!}</small></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<br />

			{!! Form::open(array('route' => 'admin.admins.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal form-label-left', 'id' => 'my-form')) !!}
				
				<div class="form-group">
					{{ Form::label('username', trans('labels.user_name'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
					 <span >{!! trans('labels.star') !!}</span>

					<div class="col-md-6 col-sm-6 col-xs-12">
					{{ Form::text('name', null, array_merge(['class' => 'form-control col-md-7 col-xs-12'])) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('email', trans('labels.email'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
					 <span class="required">{!! trans('labels.star') !!}</span>
					
					<div class="col-md-6 col-sm-6 col-xs-12">
					{{ Form::email('email', null, array_merge(['class' => 'form-control col-md-7 col-xs-12'])) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('password', trans('labels.password'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
					 <span class="required">{!! trans('labels.star') !!}</span>

					<div class="col-md-6 col-sm-6 col-xs-12">
					{{ Form::password('password', array('class' => 'form-control col-md-7 col-xs-12')) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('phone', trans('labels.phone'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
					
					<div class="col-md-6 col-sm-6 col-xs-12">
					{{ Form::number('phone', null, array_merge(['class' => 'form-control col-md-7 col-xs-12'])) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('address', trans('labels.address'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
					
					<div class="col-md-6 col-sm-6 col-xs-12">
					{{ Form::text('address', null, array_merge(['class' => 'form-control col-md-7 col-xs-12'])) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('image', trans('labels.image'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
					 <span class="required">{!! trans('labels.star') !!}</span>

					<div class="col-md-6 col-sm-6 col-xs-12">
					{{ Form::file('image', $attributes = array('class'=>'form-control col-md-7 col-xs-12')) }}
					</div>
				</div>

				<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						{{ link_to(route('admin.admins.index'), $title = trans('labels.cancel'), $attributes = array('class'=>'btn btn-primary'))}}
						{{ Form::submit(trans('labels.submit'), array('class' => 'btn btn-success')) }}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
<!-- /page content -->
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\Backend\AdminRequest', '#my-form'); !!}
@endsection
