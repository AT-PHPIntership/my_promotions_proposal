$(document).ready(function() {
    var url_new_pormotion = $('#new_promotion').val();
    var url_rating_promotion = $('#featured_promotion').val();
    var url_follow_promotion = $('#follow_promotion').val();
    var link_promotion = $("#link_index").val() +'/promotion/';
    var link_category = $("#link_index").val() +'/category/';
    var link_business = $("#link_index").val() +'/business/';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: url_new_pormotion,
        type: 'POST',
        dataType: 'json',
        success: function(result) {
            var div = $('#list_new_promotions');
            var index = order_number;
            $.each(result.promotions, function(key, value) {
                index++;
                var promotion_item = $("div .promotion-new").clone().attr("id", "promotion_new" + index);
                promotion_item.removeClass("promotion-new");
                promotion_item.find(".img-promotion").attr("src", image);
                promotion_item.find(".business-promotion").text(value.business.name);
                promotion_item.find("a.business-promotion").attr("href",link_business + value.business.id);
                promotion_item.find(".category-promotion").text(value.category.name);
                promotion_item.find("a.title-promotion").attr("href",link_promotion + value.id);
                promotion_item.find("a.more-link").attr("href",link_promotion + value.id);
                promotion_item.find("a.category-promotion").attr("href",link_category + value.category.id);
                promotion_item.find(".title-promotion").text(value.title);
                promotion_item.find(".intro-promotion > p").text(value.intro);
                div.append(promotion_item);
            });
        }
    });

    $.ajax({
        url: url_rating_promotion,
        type: 'POST',
        dataType: 'json',
        success: function(result) {
            var div = $('#list_featured_promotion');
            var index = order_number;
            $.each(result.rating_promotions, function(key, value) {
                index++;
                var promotion_item = $("div .promotion-featured").clone().attr("id", "promotion_featured_" + index);
                promotion_item.removeClass("promotion-featured");
                promotion_item.find(".img-promotion").attr("src", image);
                promotion_item.find(".business-promotion").text(value.business.name);
                promotion_item.find("a.business-promotion").attr("href",link_business + value.business.id);
                promotion_item.find(".category-promotion").text(value.category.name);
                promotion_item.find("a.title-promotion").attr("href",link_promotion + value.id);
                promotion_item.find("a.more-link").attr("href",link_promotion + value.id);
                promotion_item.find("a.category-promotion").attr("href",link_category + value.category.id);
                promotion_item.find(".title-promotion").text(value.title);
                promotion_item.find(".intro-promotion > p").text(value.intro);
                div.append(promotion_item);
            });
        }
    });

});