$(document).ready(function() {
	var url_cities = $('#cities').val();

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
	$.ajax({
		url: url_cities, 
		type: 'post', 
		dataType: 'json',
		success: function(result) {
			var $city = $('#city');
			$city.empty();

			$.each (result.cities, function(key, item) {
				$city.append($('<option>',
				{
					value: item.id,
					text : item.name
				}));
			});
		}
	});

	$( "#city" ).change(function () {
		$("#city option:selected").each(function() {
			var url_counties = $('#counties').val();
			$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
			$.ajax({
				url: url_counties, 
				type: 'post', 
				data: {
					'id': $(this).prop('value')
				},
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
				},
				error: function (data) {
		            var err = eval("(" + data.responseText + ")");
		            $('#message').html(err.error);
		            $('#message').css('display', 'block');
				}
			})
		});
	}).change();;

	$('#frmRegBusiness').submit(function(event) {
		event.preventDefault();

		var formData = new FormData(this);
       
		var url_register = $('#route_create').val();
		
		$.ajax({
			url: url_register, 
			type: 'post', 
			data: formData,
		    dataType: 'json',
		    processData: false,
		    contentType: false,
			success: function(result) {
				$('#message').html(result.message);
	            $('#message').css('display', 'block');
			},
			error: function (data) {
	            var err = eval("(" + data.responseText + ")");
	            $('#message').html(err.message);
	            $('#message').css('display', 'block');
			}
		});
	});
});
