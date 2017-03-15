$(document).ready(function() {
    $('#frmCreatePromotion').submit(function() {
        // form don't submit.
        event.preventDefault();
        // get data in form.
        var formData = new FormData(this);
        // url create promotion.
        var url_create_promotion = $('#route_promotion_create').val();

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr("content")},
            url: url_create_promotion,
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(result) {
                $('#message').html(result.message);
                $('#message').css('display', 'block');
            },
            error: function (result) {
                var err = eval("(" + result.responseText + ")");
                var $errors = $('#errors');
                $errors.empty();
                $.each (err, function(key, value) {
                    $errors.append(('<li>' + value + '</li>'));
                });
                $('#message').css('display', 'block');
            }
        });
    })
    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
    });
})