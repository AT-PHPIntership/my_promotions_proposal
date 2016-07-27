@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
<div class="row">
    <div class="col-lg-9 col-md-8 col-sm-7">
        <input type="hidden" id="show_promotion" value="{{ route('promotion.post.show', $id) }}" /> 
        <div class="row" id="promotions">
          <h1 class="entry-title" id="title"></h1>
                    <div class="row">
                        <div class="">
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
                                <h3 class="entry-title" id="intro" ></h3>
                                <div class="entry-excerpt">
                                    <p id="content"></p>
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
<script src="{{ asset('frontend/js/show_promotion.js') }}"></script>
@endsection
