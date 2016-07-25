@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
<div class="row">
    <div class="col-lg-9 col-md-8 col-sm-7">
        <div class="row" id="promotions">
            <input type="hidden" id="show_promotion" value="{{ route('promotion.post.show', $id) }}" /> 

        </div>
    </div>
    @include('frontend.layouts.partials.side_bar')
</div>
@endsection
@section('script')
<script src="{{ asset('frontend/js/show_promotion.js') }}"></script>
@endsection
