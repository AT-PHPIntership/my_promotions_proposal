$(document).ready(function () {
        var url_promoion = $('#show_promotion').val();
        $.ajaxSetup({
        });

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            url: url_promoion,
            type: 'post',
            dataType: 'json',
            success: function (result) {
                console.log(result)
                var div = $('#promotions');
                var promotion = '<div class="col-lg-3 col-md-4 col-sm-7">' +
                        '<h1><a href="#">' + result.title + '</a></h1>' +
                        '<div class="row">' +
                        '<div class="">' +
                        '<div class="post-card">' +
                        '<a href="#" class="entry-thumb-link">' +
                        '<div class="entry-thumb-wrapper">' +
                        '<img src="' + result.image + '">' +
                        '<div class="entry-thumb-overlay"></div>' +
                        '</div>' +
                        '</a>' +
                        '<div class="entry-meta">' +
                        '<span class="entry-date"><a href="#">' + result.create_at + '</a></span>' +
                        '<span class="entry-cats"><a href="#" rel="category tag">' + result.expired_day + '</a></span>' +
                        '</div>' +
                        '<h3 class="entry-title">' + result.intro + '</h3>' +
                        '<div class="entry-excerpt">' +
                        '<p>' + result.content + '</p>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                div.append(promotion);
            }
        });
    });