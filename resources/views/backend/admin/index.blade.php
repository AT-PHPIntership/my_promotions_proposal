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
					<a class="btn btn-md btn-primary" href="{{ url('admin/account/create') }}">Add New</a>
						<div class="clearfix"></div> 
					</div> 
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
										<a class="btn btn-info btn-xs" href="#">Edit</a>
										<a class="btn btn-danger btn-xs" href="#">Delete</a>
									</td> 
								</tr> 
								@endforeach
							</tbody> 
						</table> 
					</div> 
				</div> 
			</div> 
		</div> 
	</div> 
</div> 
<!-- /page content -->
@endsection
