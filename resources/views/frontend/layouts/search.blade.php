@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
<div class="alert alert-danger" id="message">
	<ul id="errors"></ul>
</div>
<div class="row">
	<div class="col-lg-9 col-md-8 col-sm-7">
		<div class="row">
			{!! Form::open(['class' => 'form-horizontal', 'id' => 'frmSearchAdvance'] ) !!}
			
			{!! Form::hidden('url_search', route('post.search', $info), ['id' => 'url_search']) !!}
			{!! Form::hidden('cities', route('get.ciy'), ['id' => 'cities']) !!}
			{!! Form::hidden('counties', route('get.county'), ['id' => 'counties']) !!}
			<div class="col-lg-3">
			{!! Form::text('info', $info, ['class' => 'form-control', 'required' => true, 'id' => 'info']) !!}
			</div>
			<div class="col-lg-3">
				{!! Form::select('city', [], null, ['class' => 'form-control', 'id' => 'city']) !!}
			</div>
			<div class="col-lg-3">
				{!! Form::select('county', [], null, ['class' => 'form-control', 'id' => 'county']) !!} 		
			</div>

			<div class="col-lg-3">
			{!! Form::submit( trans('labels.search') , array('class' => 'btn btn-primary')) !!}
			</div>
			{!! Form::close() !!}
		</div><br>
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-7" id="promotion0">
				<div class="post-card">
					<a href="#" class="entry-thumb-link">
						<div class="entry-thumb-wrapper">
							<img src="" id="image">
							<div class="entry-thumb-overlay"></div>
						</div>
					</a>
					<div class="entry-meta">
						<span class="entry-date">
							<a href="#" class="name-promotion" id="business"></a>
						</span>
						<span class="entry-cats">
							<a href="#" rel="category tag" id="category"></a>
						</span>
					</div>
					<h1 class="entry-title"><a href="#" id="title"></a></h1>
					<div class="entry-excerpt"><p id="intro"></p>
						<div class="more-link-holder">
							<a href="#" class="more-link">{!! trans('labels.read_more') !!}<i class="fa fa-angle-double-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<ul class="pagination">
			<li id="pre" class="next-pre"><a href="#">{!! trans('labels.previous') !!}</a></li>
			<li id="page0"><a href="#"></a></li>
			<li id="next" class="next-pre"><a href="#">{!! trans('labels.next') !!}</a></li>
		</ul>
	</div>
	@include('frontend.layouts.partials.side_bar')
</div>
@endsection
@section('script')
<script>
	var url_index = {!! json_encode(route('index')) !!};
</script>
<script src="{{ asset('frontend/js/search.js') }}"></script>
@endsection
