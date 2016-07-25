@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
<input type="hidden" id="url_cate" value="{{ route('post.category', $id) }}">
<div class="alert alert-danger" id="message">
    <ul id="errors"></ul>
</div>
<div class="row">
    <div class="col-lg-9 col-md-8 col-sm-7">
        <div class="row" id="promotions_of_cate"></div>
    </div>
    @include('frontend.layouts.partials.side_bar')
</div>
@endsection
@section('script')
<script src="{{ asset('frontend/js/category.js') }}"></script>
@endsection
