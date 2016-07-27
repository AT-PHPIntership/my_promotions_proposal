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
        <div id="info_business">
            <div class="jumbotron jumbo-business">
                <img id="business-logo" src="{{ config('define.image_default') }}"/>
                <h1 id="business-nane">Jumbotron</h1>
                <p><a href="#" class="btn btn-success btn-sm">Follow</a></p>
                <p id="business-create">20/12/2016</p>
                <p id="business-email">ngk.quan@gmail.com</p>
                <p id="business-phone">1234566</p>
                <p id="business-description">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac
                    cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta
                    sem malesuada magna mollis euismod. Donec sed odio dui.</p>
            </div>
        </div>
        <div id="list_business_promotion" class="row">
            <div class="col-lg-3 col-md-4 col-sm-7 promotion-items">
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
        <h1><a href="#">{!! trans('labels.promotion_business') !!}</a></h1>
    </div>
    @include('frontend.layouts.partials.side_bar')
</div>
@endsection
@section('script')
    <script src="{{ asset('frontend/js/show_business.js') }}"></script>
@endsection