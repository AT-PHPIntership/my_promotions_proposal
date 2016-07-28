@extends('frontend.layouts.master')
@section('content')
@section('title', trans('labels.business'))
<div class="alert alert-danger" id="message">
    <ul id="errors"></ul>
</div>
<div class="row">
    <div class="col-lg-9 col-md-8 col-sm-7">
        <input type="hidden" id="detail_business" value="{{ route('postbusiness', $id) }}" />
        <input type="hidden" id="link_index" value="{{ route('index') }}"/>
        <div id="intro-business">
            <div class="jumbotron jumbo-business detail-business">
                <img id="business-logo" src="{{ config('define.image_default') }}"/>
                <h1 id="business-nane"></h1>
                <p><a href="#" class="btn btn-success btn-sm">{!! trans('labels.follow') !!}</a></p>
                <p id="business-create"></p>
                <p id="business-email"></p>
                <p id="business-phone"></p>
                <p id="business-description"></p>
            </div>
            <div class="clearleft"></div>
        </div>

        <h1><a href="#">{!! trans('labels.promotion_business') !!}</a></h1>
        <div id="list_business_promotion" class="row">
            <div class="col-lg-3 col-md-4 col-sm-7 promotion-business">
                <div class="post-card">
                    <a href="#" class="entry-thumb-link">
                        <div class="entry-thumb-wrapper"><img class = "img-promotion" href="#" src="">
                            <div class="entry-thumb-overlay"></div>
                        </div>
                    </a>
                    <div class="entry-meta">
                        <span class="entry-date"><a class = "business-promotion" href="#"></a></span>
                        <span class="entry-cats"><a class = "category-promotion" href="#" rel="category tag"></a></span>
                    </div>
                    <h1 class="entry-title"><a href="" class = "title-promotion" ></a></h1>
                    <div class="entry-excerpt intro-promotion"><p></p>
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
    <script src="{{ asset('frontend/js/show_business.js') }}"></script>
@endsection