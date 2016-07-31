$(document).ready(function(){
    var url_search = $('#url_search').val();
    var cur_page = current_page;
    var form_page = page_from;
    var url_cities = $('#cities').val();
    var url_counties = $('#counties').val();

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        url: url_search,
        type: 'POST',
        dataType: 'json',
        success: function(result){
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

            // set active for paginate when load page.
            $('#page1').prop('class', 'active');
            set_disabled(form_page, result.last_page, cur_page);

            // set url for paginate
            $('ul.pagination').prop('id', url_search);
        },
        error: function(data) {
            var err = eval("(" + data.responseText + ")");
            $('#message').html(err.error);
            $('#message').css('display', 'block');
        }
    });

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        url: url_cities, 
        type: 'post', 
        dataType: 'json',
        success: function(result) {
            $.each (result.cities, function(key, item) {
                $('#city').append($('<option>',
                {
                    value: item.id,
                    text : item.name
                }));
            });
            $('#city').val(null);
        }
    });

    // even when selected in element select city. 
    $('#city').change(function () {
        $(this).find(":selected").each(function() {
            var id_city = $(this).prop('value');

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                url: url_counties, 
                type: 'post', 
                data: {'id': id_city},
                dataType: 'json',
                success: function(result) {
                    var $county = $('#county');
                    $county.empty();
                    $.each (result.counties, function(key, item) {
                        $county.append($('<option>',
                        {
                            value: item.id,
                            text : item.name
                        }));
                    });
                    $county.val(null);
                },
                error: function (data) {
                    var err = eval("(" + data.responseText + ")");
                    $('#message').html(err.error);
                    $('#message').css('display', 'block');
                }
            })
        })
    }).change();

    $('ul.pagination li').click(function () {

        var id = $(this).prop('id');
        // set number of page
        if(id != 'next' && id != 'pre'){
            var num_page = get_num_id($(this));
        } else {
            var num_page = $(this).prop('value');
        }

        $('#page'+cur_page).prop('class', '');
        $('#page'+num_page).prop('class', 'active');
        cur_page = num_page;

        var url_paginate = $('ul.pagination').prop('id') + '?page=' + num_page;

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            url: url_paginate,
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
                set_disabled(form_page, result.last_page, cur_page);
            }
        })
    });

    $('#frmSearchAdvance').submit(function(event) {
        // form don't submit.
        event.preventDefault();
        var url_search_advance = url_index +'/api/v1/search/'+ $('#info').val();

        // url search advance.
        if ($('#city').val() !== null) {
            
            url_search_advance += '/city/' + $('#city').val() +'/county/';
            
            if ($('#county').val() !== null) {
                url_search_advance += $('#county').val();
            }
        }

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            url: url_search_advance, 
            type: 'post', 
            dataType: 'json',
            success: function(result) {
                // show data
                var div = $('div[id^="promotion"]');
                div.slice(num_column).remove();
                $.each (result.data, function(key, item) {
                    var pro = $('div[id^="promotion"]:last');
                    var num = get_num_id(pro) + increment;
                    var promotion = pro.clone(true, true).prop('id', 'promotion'+num);
                    promotion.find('#image').prop('src', item.image);
                    promotion.find('#business').text(item.business.name);
                    promotion.find('#category').text(item.category.name);
                    promotion.find('#title').text(item.title);
                    promotion.find('#intro').text(item.intro);
                    pro.after(promotion);
                });
                // show paginate
                cur_page = current_page;
                form_page = page_from;
                var li = $('li[id^="page"]');
                li.slice(num_column).remove();
                for (var i = 1; i <= result.last_page; i++) {
                    var li = $('li[id^="page"]:last');
                    var num = get_num_id(li) + increment;
                    var page = li.clone(true, true).prop('id', 'page'+num);
                    page.find('a').text(i);
                    li.after(page); 
                };

                // set active for paginate when load page.
                $('#page1').prop('class', 'active');
                set_disabled(form_page, result.last_page, cur_page);

                // set url for paginate
                $('ul.pagination').prop('id', url_search_advance);
            },
            error: function (data) {
                var err = eval("(" + data.responseText + ")");
                $('#message').html(err.error);
                $('#message').css('display', 'block');
            }
        });
    });
})

// function get number in atribute id of element.
function get_num_id(element){
    return parseInt( element.prop("id").match(/\d+/g) );
}

// function set disabled for button next and pre.
function set_disabled(form_page, page_to, current_page) {
    if (current_page == form_page) {
       $('#pre').prop('class', 'disabled'); 
    } else {
       $('#pre').prop('class', '');
       $('#pre').prop('value', parseInt(current_page)-1); 
    }

    if (current_page == page_to) {
       $('#next').prop('class', 'disabled'); 
    } else {
       $('#next').prop('class', '');
       $('#next').prop('value', parseInt(current_page)+1); 
    }
}
