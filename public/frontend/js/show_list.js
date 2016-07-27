$(document).ready(function() {
    var url_new_pormotion = $('#new_promotion').val();
    var url_rating_promotion = $('#featured_promotion').val();
    var url_follow_promotion = $('#follow_promotion').val();
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
            $.each (result.promotions, function(key, value) {
                var promotion = '<div class="col-lg-3 col-md-4 col-sm-7">' +
                    '<div class="post-card">' +
                    '<a href="#" class="entry-thumb-link">' +
                    '<div class="entry-thumb-wrapper">' +
                    '<img src="'+ image +'">' +
                '<div class="entry-thumb-overlay"></div>' +
                '</div>' +
                '</a>' +
                '<div class="entry-meta">' +
                '<span class="entry-date"><a href="#" id='+ value.business.id +'>'+ value.business.name +'</a></span>' +
                '<span class="entry-cats"><a href="#" rel="category tag" id='+ value.category.id +'>'+ value.category.name +'</a></span>' +
                '</div>' +
                '<h1 class="entry-title"><a href="#" id='+ value.id +'>' + value.title +'</a></h1>' +
                '<div class="entry-excerpt">' +
                '<p>'+ value.intro +'</p>' +
                '<div class="more-link-holder">' +
                '<a href="#" class="more-link">' + labels.read_more + '<i class="fa fa-angle-double-right"></i></a>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
                div.append(promotion);
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
            var link_promotion = $("#link_index").val() +'/promotion/';
            var link_category = $("#link_index").val() +'/category/';
            $.each(result.rating_promotions, function(key, value) {
                index++;
                var promotion_item = $("div .promotion-items").clone().attr("id", "promotion_" + index);
                promotion_item.removeClass("promotion-items");
                promotion_item.find(".img-promotion").attr("src", image);
                promotion_item.find(".business-promotion").text(value.business.name);
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
        url: url_follow_promotion,
        type: 'POST',
        dataType: 'json',
        success: function(result) {
            var div = $('#list_follow_business');
            var index = order_number;
            var link_business = $("#link_index").val() +'/business/';
            $.each(result, function(key, value) {
                console.log(value);
                index++;
                var business_item = $("a.follow-items").clone().attr("id", "business_" + index);
                business_item.removeClass("follow-items");
                business_item.find("p").text(value.name);
                business_item.attr("href",link_business + value.id);
                div.append(business_item);
            });
        }
    });
});