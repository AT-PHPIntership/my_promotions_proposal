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
                <li class="active"><a href="#rating" data-toggle="tab" aria-expanded="false">{!! trans('labels.rating') !!}</a></li>
                <li class=""><a href="#reviews" id="tab-reviews" data-toggle="tab" aria-expanded="true">{!! trans('labels.reviews') !!}</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="rating">
                    @if(Auth::guard('web')->check())
                        <div class="alert alert-danger" id="message_rating">
                            <ul id="errors_rating"></ul>
                        </div>
                        {!! Form::open(['class' => 'form-horizontal', 'id' => 'frmRating']) !!}
                        {!! Form::hidden(null, route('post.rating', $id), ['id' => 'route_rating']) !!}
                        {!! Form::label('name', trans('labels.rating'), ['class' => 'control-label label-rating']) !!}
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="score" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4" name="score" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3" name="score" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2" name="score" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1" name="score" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        </fieldset>
                        <div class="clearleft"></div>
                        {!! Form::label('name', trans('labels.comment'), ['class' => 'control-label']) !!}
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => 5, 'placeholder' => 'Please enter your review...', 'id' => 'comment']) !!}<br />
                        {!! Form::reset( trans('labels.reset') , array('class' => 'btn btn-default')) !!}
                        {!! Form::submit( trans('labels.submit') , array('class' => 'btn btn-primary')) !!}
                        {!! Form::close() !!}
                        {{--@else--}}
                            {{--<p><b>You has rating this promotion</b></p>--}}
                        {{--@endif--}}
                    @else
                        <p><b>Please login to rating this promotion</b></p>
                    @endif
                </div>
                <input type="hidden" id="review_rating" value="{{ route('post.promotion.review', $id) }}" />
                <div class="tab-pane fade" id="reviews">
                    <h3>Total rating: <a id="total"></a></h3>
                    <div class="review-items">
                        <p></p><b class="username"></b> | rating: <a class="score"></a></p>
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
