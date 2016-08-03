@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')

    @include('frontend.business.partials.side_bar')
    <div class="col-lg-9 col-md-8 col-sm-7">
        <input type="hidden" id="url_list_ratings" value="{{ route('list.Rating',[Auth::user()->id, $id] ) }}" /> 
        <div class="x_panel">
        <div class="x_title"> 
            <div class="clearfix"></div> 
        </div> 
        <div class="x_content">  
            <table  class="table table-striped table-bordered" id="list_ratings" >
                <thead> 
                    <tr> 
                        <th>{!! trans('labels.name') !!}</th> 
                        <th>{!! trans('labels.title') !!}</th> 
                        <th>{!! trans('labels.content') !!}</th> 
                        <th>{!! trans('labels.score') !!}</th> 
                    </tr> 
                </thead> 
            </table> 
        </div> 
      </div>  
    </div>
@endsection
@section('script')
<script src="{{ asset('frontend/js/list_rating.js') }}"></script>
@endsection
