@extends('backend.layouts.master')
@section('title', trans('labels.county'))
@section('content')
<!-- page content -->
<div class="col-md-12 col-sm-12 col-xs-12"> 
	<div class="x_panel">
	@if (count($counties) > 0)
		<div class="x_title"> 
			<a class="btn btn-md btn-primary" href="{{ route('admin.county.create') }}">{!! trans('labels.add_new') !!}</a>
			<div class="clearfix"></div> 
		</div>
		<div class="x_content">
			<table id="list_counties" class="table table-striped table-bordered">
				<thead> 
					<tr> 
						<th>{!! trans('labels.id') !!}</th> 
						<th>{!! trans('labels.name') !!}</th> 
						<th>{!! trans('labels.city_name') !!}</th>
						<th>{!! trans('labels.action') !!}</th> 
					</tr> 
				</thead> 
				<tbody> 
				@foreach($counties as $county)
					<tr> 
						<td>{{ $county->id }}</td> 
						<td>{{ $county->name }}</td>
						<td>{{ $county->city->name }}</td>
						<td>
							<a class="btn btn-info btn-xs" href="{{ route('admin.county.edit', ['id' => $county->id]) }}">{!! trans('labels.edit') !!}</a>

							<a class="btn btn-danger btn-xs delete" name="{!! trans('labels.county') !!}" url="{{ route('admin.county.destroy', ['id' => $county->id]) }}">{!! trans('labels.delete') !!}</a>
						</td> 
					</tr>
				@endforeach
				</tbody> 
			</table> 
		</div>
		@else
			{!! trans('labels.no_data') !!}			
		@endif
	</div>
</div>
<!-- /page content -->
@endsection
