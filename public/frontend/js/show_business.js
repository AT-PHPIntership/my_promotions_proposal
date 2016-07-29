$('document').ready(function() {
    var url_info_business = $('#detail_business').val();
    var link_promotion = $("#link_index").val() +'/promotion/';
    var link_category = $("#link_index").val() +'/category/';
    var link_business = $("#link_index").val() +'/business/';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr("content")
        }
    });
    
    $.ajax({
        url: url_info_business,
        type: 'POST',
        dataType: 'json',
        success: function(result) {
            var div = $('#intro-business')
            var business = $('div .detail-business').clone().attr("id","business")
            business.removeClass("detail-business");
            business.find("#business-logo").prop('src', image);
            business.find("#business-nane").text(result.data[1].business.name);
            business.find("#business-create").text(result.data[1].business.created_at);
            business.find("#business-email").text(result.data[1].business.email);
            business.find("#business-phone").text(result.data[1].business.phone);
            business.find("#business-description").text(result.data[1].business.description);
            div.append(business)
        },
        error: function (result) {
            var err = eval("(" + result.responseText + ")");
            $('#message').html(err.error);
            $('#message').css("display", "block");
        }
    });
    $.ajax({
        url: url_info_business,
        type: 'POST',
        dataType: 'json',
        success: function(result) {
            var div = $('#list_business_promotion');
            var index = order_number;
            $.each(result.data, function(key, value) {
                index++;
                var promotion_item = $("div .promotion-business").clone().attr("id", "promotion_business" + index);
                promotion_item.removeClass("promotion-business");
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

            // show paginate
            for (var i = 1; i <= result.last_page; i++) {
                var li = $('li[id^="page"]:last');
                var num = get_num_id(li) + increment;
                var page = li.clone(true, true).prop('id', 'page'+num);
                page.find('a').text(i);
                li.after(page);
            };
        },
    });
    $('li[id^="page"]').click(function(){
        var num_page = get_num_id($(this));
        $(this).find('a').attr('href','javascript:void(0)');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            url: url_info_business + '?page=' + num_page,
            type: 'POST',
            dataType: 'json',
            success: function(result){
                // show data
                var div = $('#list_business_promotion');
                var index = order_number;
                var link_promotion = $("#link_index").val() +'/promotion/';
                var link_category = $("#link_index").val() +'/category/';
                $('div[id^="promotion_"]').remove();
                $.each (result.data, function(key, value) {
                    index++;
                    var promotion_item = $("div .promotion-business").clone().attr("id", "promotion_business" + index);
                    promotion_item.removeClass("promotion-business");
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
        })
    });
});

// function get number in atribute id of element.
function get_num_id(element){
    return parseInt( element.prop("id").match(/\d+/g) );
}
