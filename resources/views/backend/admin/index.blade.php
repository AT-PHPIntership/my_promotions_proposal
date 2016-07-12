@extends('backend.layouts.master')
@section('content')
<!-- page content -->

<div class="right_col" role="main"> 
	<div class=""> 
		<div class="page-title"> 
			<div class="title_left"> 
				<h3>{!! trans('labels.admin') !!} <small>{!! trans('labels.manager') !!}</small></h3> 
			</div> 
		</div> 
		<div class="clearfix"></div> 
		<div class="row"> 
			<div class="col-md-12 col-sm-12 col-xs-12"> 
				<div class="x_panel"> 
					<div class="x_title"> 
					<a class="btn btn-md btn-primary" href="{{ route('admin.account.create') }}">{!! trans('labels.add_new') !!}</a>
						<div class="clearfix"></div> 
					</div>
				@if (count($admins))
                    @include('flash::message')
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
										<a class="btn btn-info btn-xs" href="{{ route('admin.account.edit', ['id' => $admin->id]) }}">{!! trans('labels.edit') !!}</a>
										<form action="{{ route('admin.account.destroy', ['id' => $admin->id]) }}" method="POST">
							              {{ csrf_field() }}
							              {{ method_field('DELETE') }}
							              <button type="submit" class="btn btn-danger btn-xs">{!! trans('labels.delete') !!}</button>
							            </form>
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
		</div> 
	</div> 
</div> 
<!-- /page content -->
@endsection
