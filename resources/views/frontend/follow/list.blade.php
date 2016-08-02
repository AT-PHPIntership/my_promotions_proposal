@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
    @include('frontend.business.partials.side_bar')
    <input type="hidden" id="url_follow" value="{{ route('get.follow', $id) }}">
    <div class="col-lg-9 col-md-8 col-sm-7">
        <div class="x_content">
            <table id="list_follows" class="table table-striped table-bordered">
                <thead>
	                <tr>
	                    <th>{!! trans('labels.id') !!}</th>
                        <th>{!! trans('labels.name') !!}</th>
                        <th>{!! trans('labels.email') !!}</th>
                        <th>{!! trans('labels.phone') !!}</th>
	                    <th>{!! trans('labels.address') !!}</th>
	                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('frontend/js/show_business_follow.js') }}"></script>
@endsection
