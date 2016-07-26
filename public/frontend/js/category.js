$(document).ready(function () {
    //$('#hidden').css('display', 'inline-block');
	var url = $('#url_cate').val();
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
		url: url,
		type: 'POST',
		dataType: 'json',
		success: function(result) {
            console.log(result);
            // $.each (result, function(key, item) {
            //     var div = $('div[id^=promotion]:last');
            //     var num = get_num_id(div) + increment;
            //     var promotion = div.clone(true, true).prop('id', 'promotion'+num);
            //     promotion.find('#image').prop('src', item.image);
            //     promotion.find('#business').text(item.business.name);
            //     promotion.find('#category').text(item.category.name);
            //     promotion.find('#title').text(item.title);
            //     promotion.find('#intro').text(item.intro);
            //     div.after(promotion); 
            // });
		},
		error: function(data) {
			var err = eval("(" + data.responseText + ")");
			console.log(err);
            $('#message').html(err.error);
            $('#message').css('display', 'block');
		}
	})
});

// function get number in atribute id of element.
function get_num_id(element){
    return parseInt( element.prop("id").match(/\d+/g) );
}
