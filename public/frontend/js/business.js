$(document).ready(function() {
	// url get city.
	var url_cities = $('#cities').val();

	// run get city when load page.
	window.onload = function() {
		get_city(url_cities);
	};

	// even when selected in element select city. 
	$( 'select[id^="city"]' ).change(function () {
		// get address num
		var address_num = get_num_id($(this));

		// find option selected in element select.
		$(this).find(":selected").each(function() {
			// url get county with id city.
			var url_counties = $('#counties').val();
			// get id city in value of option selected.
			var id_city = $(this).prop('value');

            $.ajax({
            	headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
				url: url_counties, 
				type: 'post', 
				data: {'id': id_city},
				dataType: 'json',
				success: function(result) {
					// get element select county in address.
					var $county = $('#county'+address_num);
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
		})
	}).change();

	$('#frmRegBusiness').submit(function(event) {
		// form don't submit.
		event.preventDefault();
		// get data in form.
		var formData = new FormData(this);
        // url register.
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
	            var $errors = $('#errors');
	            $errors.empty();
				$.each (err, function(key, item) {
					$errors.append(('<li>' + item + '</li>'));
				});
	            $('#message').css('display', 'block');
			}
		});
	});

	// Add element div address.
	$('#add').click(function(){
		// get div address last.
		var $div = $('div[id^="address"]:last');
		// create number for element div address.
		var num = get_num_id($div) + increment;
		// create new div address with address number.
		var $address = $div.clone(true, true).prop('id', 'address'+num );
		// set id of select city with number.
		$address.find('select[id^="city"]').prop('id', 'city'+num);
		// set id of select county with number, and clear county.
		$address.find('select[id^="county"]').prop('id', 'county'+num).empty();
		// append div address.
		$div.after( $address );
		// set value for element select city.
		get_city(url_cities);
	});
});

// function get city.
function get_city(url_cities) {
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
		url: url_cities, 
		type: 'post', 
		dataType: 'json',
		success: function(result) {
			// get element div address last.
			var $div = $('div[id^="address"]:last');
			// get number of addrerss.
			var num = get_num_id($div);
			// get element select city of div address.
			var $city = $('#city'+num);
			// clear select city.
			$city.empty();

			$.each (result.cities, function(key, item) {
				$city.append($('<option>',
				{
					value: item.id,
					text : item.name
				}));
			});
			// set value default of select city is null.
			$city.val(null);
		}
	});
}

// function get number in atribute id of element.
function get_num_id(element){
	return parseInt( element.prop("id").match(/\d+/g) );
}
