$(document).ready(function(){
	var url_pro = $('#url_promotion').val();
	$.ajax({
		url: url_pro,
		type: 'get',
		dataTyep: 'json',
		success: function(result){
			console.log(result);
		}
	})
	$('#list_promotions').DataTable({
		processing: true,
		serverSide: true,
		ajax: url_pro,
		columns: [
			{ data: 'id', name: 'id' },
			{ data: 'title', name: 'title' },
			{ data: 'category.name', name: 'category.name' },
	        {data:'action',width:'15%',
	            mRender: function (data, type, full)
	            {
	            var action = '<button class="btn btn-danger btn-xs delete" value="'+ full['id'] + '">Delete</button> ';
	            	action += '<button class="btn btn-warning btn-xs edit" value="'+ full['id'] + '">Edit</button>';
	            return action;
	            }
	        }
		]
	});
});
