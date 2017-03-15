$(document).ready(function() {
    var url_follow_promotion = $('#follow_promotion').val();
    var link_business = $("#link_index").val() +'/business/';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: url_follow_promotion,
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            var div = $('#list_follow_business');
            var index = order_number;
            var link_business = $("#link_index").val() +'/business/';
            $.each(result, function(key, value) {
                index++;
                var business_item = $("a.follow-items").clone().attr("id", "business_" + index);
                business_item.removeClass("follow-items");
                business_item.find("p").text(value.name);
                business_item.attr("href",link_business + value.id);
                div.append(business_item);
            });
        }
    });
})