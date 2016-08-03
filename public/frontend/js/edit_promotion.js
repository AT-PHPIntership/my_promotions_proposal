$(document).ready(function (){
    var url_edit_promotion = $('#route_promotion_edit').val();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr("content")},
        url: url_edit_promotion,
        type: 'POST',
        dataType: 'json',
        success: function(result) {
            var div = $('#frmEditPromotion');
            console.log(result[0]);

            $('#title').val(result[0].title);
            $('#intro').val(result[0].intro);
            $('#content').val(result[0].content);
            if(result[0].image != null){
                $('#image-photo').attr('src',result[0].image);
            }
            $('#expired_day').val(result[0].expired_day);
            
        },
        error: function (result) {
            var err = eval("(" + result.responseText + ")");
            $('#message').html(err.error);
            $('#message').css("display", "block");
        }
        
    })
})