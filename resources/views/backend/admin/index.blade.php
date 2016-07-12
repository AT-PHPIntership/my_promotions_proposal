@extends('backend.layouts.master')
@section('title', trans('labels.admin'))
@section('content')
<!-- page content -->
<div class="col-md-12 col-sm-12 col-xs-12"> 
	<div class="x_panel"> 
		<div class="x_title"> 
			<a class="btn btn-md btn-primary" href="{{ route('admin.admins.create') }}">{!! trans('labels.add_new') !!}</a>
			<div class="clearfix"></div> 
		</div>
		@if (count($admins))
		<div class="x_content">
			<table id="myTable" class="table table-striped table-bordered">
				<thead> 
					<tr> 
						<th>{!! trans('labels.id') !!}</th> 
						<th>{!! trans('labels.name') !!}</th> 
						<th>{!! trans('labels.email') !!}</th> 
						<th>{!! trans('labels.phone') !!}</th> 
						<th>{!! trans('labels.address') !!}</th> 
						<th>{!! trans('labels.action') !!}</th> 
					</tr> 
				</thead> 
				<tbody> 
					@foreach ($admins as $admin)
					<tr> 
						<td>{{ $admin->id }}</td> 
						<td>{{ $admin->name }}</td>
						<td>{{ $admin->email }}</td>
						<td>{{ $admin->phone }}</td>
						<td>{{ $admin->address }}</td>
						<td>
							<a class="btn btn-info btn-xs" href="{{ route('admin.admins.edit', ['id' => $admin->id]) }}">{!! trans('labels.edit') !!}</a>

							<a class="btn btn-danger btn-xs delete" name="{!! trans('labels.admin') !!}" url="{{ route('admin.admins.destroy', ['id' => $admin->id]) }}">{!! trans('labels.delete') !!}</a>
						</td> 
					</tr> 
					@endforeach
				</tbody> 
			</table> 
		</div>
		@else
		<br>
		<div class="alert alert-info">
			{!! trans('labels.no_data') !!}
		</div>
		@endif
	</div> 
</div>
<!-- /page content -->
@endsection
