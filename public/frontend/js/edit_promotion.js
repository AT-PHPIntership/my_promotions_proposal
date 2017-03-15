$(document).ready(function (){
    //url edit promotion
    var url_edit_promotion = $('#route_promotion_edit').val();
    var url_update_promotion = $('#route_promotion_update').val();
    var rediect_list_promotion = $('#route_promotion_show').val();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr("content")},
        url: url_edit_promotion,
        type: 'POST',
        dataType: 'json',
        success: function(result) {
            var div = $('#frmEditPromotion');
            $('#category_id').val(result[0].category_id);
            $('#title').val(result[0].title);
            $('#intro').val(result[0].intro);
            $('#content').val(result[0].content);
            if(result[0].image === ""){
                $('#image-photo').attr('src', image);
            } else {
                $('#image-photo').attr('src', result[0].image);
            }
            $('#expired_day').val(result[0].expired_day);

        },
        error: function (result) {
            $(location).attr('href',rediect_list_promotion);
            var err = eval("(" + result.responseText + ")");
            $('#message').html(err.error);
            $('#message').css("display", "block");
        }
    });
    $('#frmEditPromotion').submit(function (event) {
        // form don't submit.
        event.preventDefault();
        //get data in from
        var formData = new FormData(this);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr("content")},
            url: url_update_promotion,
            data: formData,
            type: "POST",
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(result) {
                $('#message').html(result.message);
                $('#message').css('display','block');
                $(location).attr('href',rediect_list_promotion);
            },
            error:function (result) {
                var err = eval("(" + result.responseText + ")");
                var $errors = $('#errors');
                $errors.empty();
                $.each (err, function(key, value) {
                    $errors.append(('<li>' + value + '</li>'));
                });
                $('#message').css('display', 'block');
            }
        })
    })
    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
    });
})