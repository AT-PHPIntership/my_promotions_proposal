$(document).ready(function () {
    
	var url = $('#url_cate').val();
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
                promotion.find('#category').text(item.category.name);
                promotion.find('#title').text(item.title);
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
                    promotion.find('#category').text(item.category.name);
                    promotion.find('#title').text(item.title);
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
