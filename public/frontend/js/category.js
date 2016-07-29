$(document).ready(function () {
    
	var url = $('#url_cate').val();
    var link_promotion = $("#link_index").val() +'/promotion/';
    var link_category = $("#link_index").val() +'/category/';
    var link_business = $("#link_index").val() +'/business/';
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
		url: url,
		type: 'POST',
		dataType: 'json',
		success: function(result) {
            // show data
            $.each (result.data, function(key, item) {
                var div = $('div[id^="promotion"]:last');
                var num = get_num_id(div) + increment;
                var promotion = div.clone(true, true).prop('id', 'promotion'+num);
                promotion.find('#image').prop('src', item.image);
                promotion.find('#business').text(item.business.name);
                promotion.find("a#business").attr("href",link_business + item.business.id);
                promotion.find('#category').text(item.category.name);
                promotion.find("a#category").attr("href",link_category + item.category.id);
                promotion.find('#title').text(item.title);
                    promotion.find("a#title").attr("href",link_promotion + item.id);
                    promotion.find("a.more-link").attr("href",link_promotion + item.id);
                promotion.find('#intro').text(item.intro);
                div.after(promotion); 
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
		error: function(data) {
			var err = eval("(" + data.responseText + ")");
            $('#message').html(err.error);
            $('#message').css('display', 'block');
		}
	})

    $('li[id^="page"]').click(function(){
        var num_page = get_num_id($(this));
        $(this).find('a').attr('href','javascript:void(0)');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            url: url + '?page=' + num_page,
            type: 'POST',
            dataType: 'json',
            success: function(result){
                // show data
                var div = $('div[id^="promotion"]');
                div.slice(num_column).remove();
                $.each (result.data, function(key, item) {
                    var div = $('div[id^="promotion"]:last');
                    var num = get_num_id(div) + increment;
                    var promotion = div.clone(true, true).prop('id', 'promotion'+num);
                    promotion.find('#image').prop('src', item.image);
                    promotion.find('#business').text(item.business.name);
                    promotion.find("a#business").attr("href",link_business + item.business.id);
                    promotion.find('#category').text(item.category.name);
                    promotion.find("a#category").attr("href",link_category + item.category.id);
                    promotion.find('#title').text(item.title);
                    promotion.find("a#title").attr("href",link_promotion + item.id);
                    promotion.find("a.more-link").attr("href",link_promotion + item.id);
                    promotion.find('#intro').text(item.intro);
                    div.after(promotion); 
                });
            }
        })
    });
});

// function get number in atribute id of element.
function get_num_id(element){
    return parseInt( element.prop("id").match(/\d+/g) );
}
