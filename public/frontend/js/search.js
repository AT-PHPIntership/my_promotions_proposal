$(document).ready(function(){
	var url_search = $('#url_search').val();
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
		url: url_search,
		type: 'POST',
		dataType: 'json',
		success: function(result){
			console.log(result);
		}
	});
})
