$(document).ready(function () {
    var url_promotion = $('#show_promotion').val();
    var url_promotion_review = $('#review_rating').val();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        url: url_promotion,
        type: 'POST',
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

    $('#tab-reviews').click(function() {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            url: url_promotion_review,
            type: 'POST',
            dataType: 'json',
            success: function(result) {
                var div = $('#reviews');
                var index = order_number;
                div.find('a#total').text(result.total_rating[0].total_score);
                $('div[id^="review_item_"]').remove();
                $.each(result.reviews, function(key, value) {
                    index++;
                    var review_item = $("div .review-items").clone().attr("id", "review_item_" + index);
                    review_item.removeClass('review-items');
                    review_item.find('b.username').text(value.user.name);
                    review_item.find('a.score').text(value.score);
                    review_item.find('i.content').text(value.content);
                    div.append(review_item);
                })
            }
        });
    })

    //submit form rating
    $('#frmRating').submit(function(event) {
        // form don't submit.
        event.preventDefault();
        // get data in form.
        var formData = $(this).serialize();
        // url rating.
        var url_rating = $('#route_rating').val();
        $.ajax({
            url: url_rating,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(result) {
                $('#message_rating').html(result.message);
                $('#message_rating').css('display', 'block');
            },
            error: function (result) {
                var err = eval("(" + result.responseText + ")");
                var $errors = $('#errors_rating');
                $errors.empty();
                $.each (err, function(key, value) {
                    $errors.append(('<li>' + value + '</li>'));
                });
                $('#message_rating').css('display', 'block');
            }
        })
    })
});