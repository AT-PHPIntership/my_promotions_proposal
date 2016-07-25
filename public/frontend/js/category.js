$(document).ready(function () {
	var url = $('#url_cate').val();
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
		url: url,
		type: 'POST',
		dataType: 'json',
		success: function(result) {
			var div = $('#promotions_of_cate');
            $.each (result, function(key, value) {
                var promotion = '<div class="col-lg-3 col-md-4 col-sm-7">' +
                    '<div class="post-card">' +
                    '<a href="#" class="entry-thumb-link">' +
                    '<div class="entry-thumb-wrapper">' +
                    '<img src="'+ value.image +'">' +
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
		},
		error: function(data) {
			var err = eval("(" + data.responseText + ")");
			console.log(err);
            $('#message').html(err.error);
            $('#message').css('display', 'block');
		}
	})
});
