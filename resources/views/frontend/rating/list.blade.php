@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
    <div class="col-lg-9 col-md-8 col-sm-7">
        <input type="hidden" id="list_ratings" value="{{ route('list.Rating',[Auth::user()->id, $id] ) }}" /> 
        <div class="x_panel" id="list_business_rating">
        <div class="x_title"> 
            <div class="clearfix"></div> 
        </div> 
        <div class="x_content">  
            <table  class="table table-striped table-bordered" >
                <thead> 
                    <tr> 
                        <th>User</th> 
                        <th>Promotion</th> 
                        <th>Content</th> 
                        <th>Score</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <tr> 
                        <td style="display: none" id="user"></td> 
                        <td style="display: none" id="promotion"></td> 
                        <td style="display: none" id="content"></td> 
                        <td style="display: none" id="score"></td> 
                    </tr> 
                </tbody> 
            </table> 
        </div> 
      </div>  
    </div>
@endsection
@section('script')
<!--<script src="{{ asset('frontend/js/list_rating.js') }}"></script>-->
<script>
//    $(document).ready(function() {
//        var url_list_rating = $('#list_rating').val();
//        $.ajaxSetup({
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//            }
//        });
//        
//        $.ajax({
//            url: url_list_rating,
//            type: 'POST',
//            datatype: 'json',
//            success: function(result){
//                console.log(result);
//
//            $.each(result, function (key, item) {
//                var div = $('div[id^=rating]:last');
//                var rating = div.clone(true, true).prop('id', 'rating' );
//                
//                rating.find('.user').text(result.user_id);
//                rating.find('.promotion').text(result.promotion_id);
//                rating.find('.content').text(result.content);
//                rating.find('.score').text(result.score);
//            div.after(rating);
//            });
//           }
//        });
//    });

$(document).ready(function() {
    var url_rating = $('#list_ratings').val();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    
    $.ajax({
        url: url_rating,
        type: 'POST',
        datatype: 'json',
        success: function(result){
            var div = $('#list_business_rating');
            var index = order_number;
            $.each(result.ratings, function(key, value){
                index++;
                var rating_item = $("div .list-rating").clone().attr("id", "list-rating" + index);
                rating_item.removeClass("list-rating");
                rating_item.find(".user").text(value.user_id);
                rating_item.find(".promotion").text(value.promotion_id);
                rating_item.find(".content").text(value.content);
                rating_item.find(".score").text(value.score);
                div.append(rating_item);
            });
        }
    });
});
</script>
@endsection
