@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7">
                    <h1><a href="#">{!! trans('labels.promotion_featured') !!}</a></h1>
                    <input type="hidden" id="featured_promotion" value="{{ route('promotionfeatured') }}" />
                    <div id="list_featured_promotion" class="row">
                        <div class="col-lg-3 col-md-4 col-sm-7 promotion-featured">
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
                    <h1><a href="#">{!! trans('labels.promotion_new') !!}</a></h1>
                    <input type="hidden" id="new_promotion" value="{{ route('postpromotion') }}" />
                    <div id="list_new_promotions" class="row">
                        <div class="col-lg-3 col-md-4 col-sm-7 promotion-new">
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
                </div>
                @include('frontend.layouts.partials.side_bar')
            </div>
@endsection
@section('script')
    <script src="{{ asset('frontend/js/show_list.js') }}"></script>
@endsection