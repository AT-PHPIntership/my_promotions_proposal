$(document).ready(function(){
	var url_list_ratings = $('#url_list_ratings').val();
	$('#list_ratings').DataTable({
		processing: true,
		serverSide: true,
		ajax: url_list_ratings,
		columns: [
			{ data: 'user.name', name: 'user.name' },
			{ data: 'promotion.title', name: 'promotion.title' },
			{ data: 'content', name: 'content' },
			{ data: 'score', name: 'score' }
		]
	});
});