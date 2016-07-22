@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
    <div class="container">
        <div class="page-header" id="banner">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7">
                    <h1><a href="#">{!! trans('labels.promotion_featured') !!}</a></h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-7">
                            <div class="post-card">
                                <a href="#" class="entry-thumb-link">
                                    <div class="entry-thumb-wrapper">
                                        <img src="{!! config('define.image_default') !!}">
                                        <div class="entry-thumb-overlay"></div>
                                    </div>
                                </a>
                                <div class="entry-meta">
                                    <span class="entry-date"><a href="#">February 16, 2016</a></span>
                                    <span class="entry-cats"><a href="#" rel="category tag">Travel</a></span>
                                </div>
                                <h1 class="entry-title"><a href="#">How to Make a Long Layover Enjoyable</a></h1>
                                <div class="entry-excerpt">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis amet porro velit rem necessitatibus eaque numquam, enim accusamus expedita modi ab nisi
                                    </p><div class="more-link-holder"> <a href="#" class="more-link">{!! trans('labels.read_more') !!} <i class="fa fa-angle-double-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1><a href="#">{!! trans('labels.promotion_new') !!}</a></h1>
                    <input type="hidden" id="new_promotion" value="{{ route('postpromotion') }}" />
                    <div id="list_new_promotions" class="row">

                    </div>
                    <h1><a href="#">{!! trans('labels.promotion_follow') !!}</a></h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-7">
                            <div class="post-card">
                                <a href="#" class="entry-thumb-link">
                                    <div class="entry-thumb-wrapper">
                                        <img src="{!! config('define.image_default') !!}">
                                        <div class="entry-thumb-overlay"></div>
                                    </div>
                                </a>
                                <div class="entry-meta">
                                    <span class="entry-date"><a href="#">February 16, 2016</a></span>
                                    <span class="entry-cats"><a href="#" rel="category tag">Travel</a></span>
                                </div>
                                <h1 class="entry-title"><a href="#">How to Make a Long Layover Enjoyable</a></h1>
                                <div class="entry-excerpt">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis amet porro velit rem necessitatibus eaque numquam, enim accusamus expedita modi ab nisi
                                    </p><div class="more-link-holder"> <a href="#" class="more-link">{!! trans('labels.read_more') !!} <i class="fa fa-angle-double-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('frontend.layouts.partials.side_bar')
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('frontend/js/show_list.js') }}"></script>
@endsection