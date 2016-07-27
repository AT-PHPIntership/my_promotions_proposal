$('document').ready(function() {
    var url_info_business = $('#detail_business').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    
    $.ajax({
        url: url_info_business,
        type: 'POST',
        dataType: 'json',
        success: function(result) {
            var business = $('#info_business');
            business.find('#business-logo').prop('src', image);
            business.find('#business-nane').text(result.data[1].business.name);
            business.find('#business-create').text(result.data[1].business.created_at);
            business.find('#business-email').text(result.data[1].business.email);
            business.find('#business-phone').text(result.data[1].business.phone);
            business.find('#business-description').text(result.data[1].business.description);
        },
        error: function (result) {
            var err = eval("(" + result.responseText + ")");
            $('#message').html(err.error);
            $('#message').css('display', 'block');
        }
    });
    $.ajax({
        url: url_info_business,
        type: 'POST',
        dataType: 'json',
        // success: function(result) {
        //     console.log(result.data);
        //     var div = $('#list_business_promotion');
        //     var index = order_number;
        //     $.each(result.data, function(key, value) {
        //         index++;
        //         var promotion_item = $('#div .promotion-items').clone().attr("id", "business_" + index);
        //         promotion_item.find('#img-promotion').prop('src', image);
        //         promotion_item.find('#business-promotion').text(value.business.name);
        //         promotion_item.find('#category-promotion').text(value.category.name);
        //         promotion_item.find('#title-promotion').text(value.title);
        //         div.append(promotion_item);
        //     })
        success: function(result) {
            var div = $('#list_business_promotion');
            var index = order_number;
            var link_promotion = $("#link_index").val() +'/promotion/';
            var link_category = $("#link_index").val() +'/category/';
            $.each(result.data, function(key, value) {
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
        },
    });
});