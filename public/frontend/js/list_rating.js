$('div.alert').delay(time).slideUp();

$(document).ready(function() {
   $('#list_ratings').DataTable();
   var url_rating = $('#list_rating').val();
   
   $ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       }
   });
   
   $ajax({
       url: url_rating,
       type: 'POST',
       datatype: 'json',
       success:function(result){
           var div = $('#ratings');
           $.each(result.ratings, function(key, value){
               var rating_item = $("div. list-rating").clone().attr("id", "list_rating" + index);
               rating_item.removeClass("list-rating");
               rating_item.find(".user").text(value.user.name);
            div.append(rating_item);   
           });
       }
   });
});


