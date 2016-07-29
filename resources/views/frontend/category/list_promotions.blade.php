@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
<input type="hidden" id="url_cate" value="{{ route('post.category', $id) }}">
<input type="hidden" id="link_index" value="{{ route('index') }}"/>
<div class="alert alert-danger" id="message">
	<ul id="errors"></ul>
</div>
<div class="row">
	<div class="col-lg-9 col-md-8 col-sm-7" align="center">
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
			<li id="page0"><a href="#"></a></li>
		</ul>
	</div>
	@include('frontend.layouts.partials.side_bar')
</div>
@endsection
@section('script')
<script src="{{ asset('frontend/js/category.js') }}"></script>
@endsection
