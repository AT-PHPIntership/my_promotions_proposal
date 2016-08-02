$(document).ready(function(){
	var url_follow = $('#url_follow').val();
	$('#list_follows').DataTable({
		processing: true,
		serverSide: true,
		ajax: url_follow,
		columns: [
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			{ data: 'email', name: 'email' },
			{ data: 'phone', name: 'phone' },
			{ data: 'address', name: 'address' }
		]
	});
});
