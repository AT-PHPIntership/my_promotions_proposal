@extends('frontend.layouts.master')
@section('title', trans('labels.promotions'))
@section('content')
    <div class="col-lg-9 col-md-8 col-sm-7">
        <input type="hidden" id="list_rating" value="{{ route('list.Rating', $id) }}" /> 
        <div class="x_panel" id="ratings">
        <div class="x_title"> 
            <div class="clearfix"></div> 
        </div> 
        <div class="x_content">  
            <table  class="table table-striped table-bordered">
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
                        <td id="user"></td> 
                        <td id="promotion"></td>
                        <td id="content"></td> 
                        <td id="score"></td> 
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
//        
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
//                var div = $('#list_ratings');
//                var index = order_number;
//                $.each(result.ratings, function(value){
//                    index++;
//                    var rating_item = $("div .list-rating").clone()attr("id", "list-rating" + index);
//                    rating_item.removeClass("list-rating");
//                    rating_item.find(".user").text(value.user_id)
//                });
//            }
//        });
//    });

//$(document).ready(function () {
//    var url_list_rating = $('#list_rating').val();
//    $.ajax({
//        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
//        url: url_list_rating,
//        type: 'POST',
//        dataType: 'json',
//        success: function (result) {
//            var rating = $('#ratings');
//            rating.find('#user').text(result.user_id);
//            rating.find('#promotion').text(result.promotion_id);
//            rating.find('#content').text(result.content);
//            rating.find('#score').text(result.score);
//        }
//    });
//});
</script>
@endsection