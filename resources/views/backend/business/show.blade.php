@extends('backend.layouts.master')
@section('title', trans('labels.business'))
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12 profile_left">

        <div class="profile_img">

            <!-- end of image cropping -->
            <div id="crop-avatar" class="col-md-2">
                <!-- Current avatar -->
                <img class="img-responsive avatar-view" src="{!! config('define.image_default') !!}" alt="Avatar" title="{!! trans('labels.business_avatar') !!}">


            </div>
            <!-- end of image cropping -->
            <div class="col-md-10">
            <h3>{{ $business->name }}</h3>

                <ul class="list-unstyled user_data">
                    <li><i class="fa fa-envelope"></i> {{ $business->email }}
                    </li>

                    <li>
                        <i class="fa fa-phone"></i> {{ $business->phone }}
                    </li>

                    <li>
                        <p>{{ $business->description }} </p>
                    </li>

                    <li>
                        <i class="fa fa-calendar"></i> {{ $business->created_at }}
                    </li>

                </ul> 
            </div>
        </div>

    </div>
@endsection