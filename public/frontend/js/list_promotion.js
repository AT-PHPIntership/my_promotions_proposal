$(document).ready(function(){
	var url_pro = $('#url_promotion').val();

	$('#list_promotions').DataTable({
		processing: true,
		serverSide: true,
		ajax: url_pro,
		columns: [
			{ data: 'id', name: 'id' },
			{ data: 'title', name: 'title' },
			{ data: 'category.name', name: 'category.name' },
	        {data:'action',width:'5%',
	            mRender: function (data)
	            {
	            var action = '<button class="btn btn-danger btn-xs">Delete</button>';
	            	action += '<button class="btn btn-warning btn-xs">Edit</button>';
	            return action;
	            }
	        }
		]
	});
});
