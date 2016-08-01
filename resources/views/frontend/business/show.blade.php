@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
<div class="col-lg-3 col-md-4 col-sm-5">
    <h1>{!! trans('labels.list') !!}</h1>
    <div class="list-group table-of-contents">
        <a class="list-group-item" href="#">{!! trans('labels.user_following') !!}</a>
        <a  href="{{ route('get.rating', $id) }}" class="list-group-item">{!! trans('labels.rating') !!}</a>
        <a class="list-group-item" href="#">{!! trans('labels.promotion') !!}</a>
    </div>
</div>
    <div class="col-lg-9 col-md-8 col-sm-7">
        <input type="hidden" id="show_business" value="{{ route('showBusiness', $id) }}" /> 
        <div class="profile_img" id="businesses">
            
            <!-- end of image cropping -->
                <!-- Current avatar -->
                <div class="entry-thumb-wrapper">
                    <img src="" id="logo">
                    <div class="entry-thumb-overlay"></div>
                </div>
                
            <!-- end of image cropping -->
                <h3 id="name"></h3>

                <ul class="list-unstyled user_data">
                    <li><i class="fa fa-envelope" id="email"></i> 
                    </li>

                    <li>
                        <i class="fa fa-phone" id="phone"></i> 
                    </li>

                    <li>
                        <p id="description"></p>
                    </li>

                    <li>
                        <i class="fa fa-calendar" id="created_at"></i> |
                        <i class="fa fa-calendar" id="updated_at"></i>
                    </li>
                </ul> 
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('frontend/js/show_business_manager.js') }}"></script>
@endsection