$(document).ready(function () {
    var url_promoion = $('#show_promotion').val();
    $.ajax({
        url: url_promoion,
        type: 'get',
        dataType: 'json',
        success: function (result) {
                var promotion = $('#promotions');
                promotion.find('#image').prop('src', result.image);
                promotion.find('#created_at').text(result.created_at);
                promotion.find('#expired_day').text(result.expired_day);
                promotion.find('#title').text(result.title);
                promotion.find('#intro').text(result.intro);
                promotion.find('#content').text(result.content);
        }
    });
});