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
	        {data:'action',width:'15%',
	            mRender: function (data, type, full)
	            {
	            var action = '<button class="btn btn-danger btn-xs delete" value="'+ full['id'] + '">'+ labels.delete +'</button> ';
	            	action += '<button class="btn btn-warning btn-xs edit" value="'+ full['id'] + '">'+ labels.edit +'</button>';
	            return action;
	            }
	        }
		]
	});
});
