@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
    @include('frontend.business.partials.side_bar')
    <input type="hidden" id="url_promotion" value="{{ route('get.promotion', $id) }}">
    <div class="col-lg-9 col-md-8 col-sm-7">
    	<div class="x_title">
            <a href="{{ route('promotion.get.create', [Auth::user()->id, $id]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> {!! trans('labels.add_new') !!} </a>
        </div>
        <br>
        <div class="x_content">
            <table id="list_promotions" class="table table-striped table-bordered">
                <thead>
	                <tr>
	                    <th>{!! trans('labels.id') !!}</th>
                        <th>{!! trans('labels.title') !!}</th>
	                    <th>{!! trans('labels.category') !!}</th>
	                    <th>{!! trans('labels.action') !!}</th>
	                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('frontend/js/list_promotion.js') }}"></script>
@endsection
