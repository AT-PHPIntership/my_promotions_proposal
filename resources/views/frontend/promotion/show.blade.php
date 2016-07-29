@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
    <div class="alert alert-danger" id="message">
        <ul id="errors"></ul>
    </div>
<div class="row">
    <div class="col-lg-9 col-md-8 col-sm-7">
        <input type="hidden" id="show_promotion" value="{{ route('promotion.post.show', $id) }}" /> 
        <div class="row" id="promotions">
          <h1 class="entry-title" id="title"></h1>
            <div class="post-card">
                <a href="#" class="entry-thumb-link">
                    <div class="entry-thumb-wrapper">
                        <img src="" id="image">
                        <div class="entry-thumb-overlay"></div>
                    </div>
                </a>
                <div class="entry-meta">
                    <span class="entry-date" class="name-promotion" id="created_at"></span>
                    <span class="entry-cats" rel="category tag" id="expired_day"></span>
                </div>
                <h3 class="entry-title" id="intro"></h3>
                <div class="entry-excerpt">
                    <p id="content"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#rating" data-toggle="tab" aria-expanded="false">Rating</a></li>
                <li class=""><a href="#reviews" data-toggle="tab" aria-expanded="true">Reviews</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="rating">
                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                </div>
                <input type="hidden" id="review_rating" value="{{ route('post.promotion.review', $id) }}" />
                <div class="tab-pane fade" id="reviews">
                    <h3>Total rating: <a id="total"></a></h3>
                    <div class="review-items">
                        <p></p><b class="username"></b> | rating: <a class="rating"></a></p>
                        <i class="content"></i>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.layouts.partials.side_bar')
</div>
@endsection
@section('script')
<script src="{{ asset('frontend/js/show_promotion.js') }}"></script>
@endsection
