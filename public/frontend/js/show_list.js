$(document).ready(function() {
    var url_new_pormotion = $('#new_promotion').val();
    var url_rating_promtion = $('#featured_promotion').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: url_new_pormotion,
        type: 'post',
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
        url: url_rating_promtion,
        type: 'post',
        dataType: 'json',
        success: function(result) {
            console.log(result);
            var div = $('#list_featured_promotion');
            $.each(result.rating_promotions, function(key, value) {
                var promotion = '<div class="col-lg-3 col-md-4 col-sm-7">' +
                    '<div class="post-card">' +
                    '<a href="#" class="entry-thumb-link">' +
                    '<div class="entry-thumb-wrapper">' +
                    '<img src="'+ image +'">' +
                    '<div class="entry-thumb-overlay"></div>' +
                    '</div>' +
                    '</a>' +
                    '<div class="entry-meta">' +
                    '<span class="entry-date"><a href="#" id="'+ value.business.id +'">'+ value.business.name +'</a></span>' +
                    '<span class="entry-cats"><a href="#" rel="category tag" id="'+ value.category.id +'">'+ value.category.name +'</a></span>' +
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
            })
        }

    });
});
