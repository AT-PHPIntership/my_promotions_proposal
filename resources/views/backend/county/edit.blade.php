@extends('backend.layouts.master')
@section('title', trans('labels.county'))
@section('content')
<!-- page content --> 
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>{!! trans('labels.county') !!} <small>{!! trans('labels.edit') !!}</small></h2>
			<div class="clearfix"></div>
			
		</div>
		<div class="x_content">
			<br />

			{!! Form::open(['route' => ['admin.county.update', $county->id], 'method' => 'put', 'id' => 'frmEditCounty', 'class' => 'form-horizontal form-label-left'] ) !!}

			<div class="form-group">
				{!! Form::label('name', trans('labels.city_name') , ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}<span class="required">{!! trans('labels.star') !!}</span>
				<div class="col-md-6 col-sm-6 col-xs-12">
					{!! Form::select('city_id', $cities, $county->city_id, ['class' => 'form-control col-md-7 col-xs-12']) !!}
				</div>
			</div>
			
			<div class="form-group">
				{!! Form::label('name', trans('labels.county_name') , ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}<span class="required">{!! trans('labels.star') !!}</span>
				<div class="col-md-6 col-sm-6 col-xs-12">
					{!! Form::text('name', $county->name, ['class' => 'form-control col-md-7 col-xs-12']) !!}
				</div>
			</div>

			<div class="ln_solid"></div>
			<div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					{!! link_to(route('admin.county.index'), trans('labels.cancel'), ['class'=>'btn btn-primary'])!!}
					{!! Form::submit( trans('labels.submit') , array('class' => 'btn btn-success')) !!}
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
<!-- /page content -->
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\Backend\CountyRequest', '#frmEditCounty'); !!}
@endsection
