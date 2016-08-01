$(document).ready(function(){
	var url_pro = $('#url_promotion').val();
	var table = $('#list_promotions').DataTable({
		processing: true,
		serverSide: true,
		ajax: url_pro,
		columns: [
			{ data: 'id', name: 'id' },
			{ data: 'title', name: 'title' },
			{ data: 'image', name: 'image' },
	        {data:'action',width:'5%',
	            mRender: function (data, type, full)
	            {
	            var action = '<button class="btn btn-danger btn-xs delete" value="'+ url_delete + '/' + full['id']+'">Delete</button>';
	            action += '<button class="btn btn-warning btn-xs edit open-modal" value="'+ url_edit + '/' + full['id']+'" id="'+ url_update + '/' + full['id'] +'">Edit</button>';
	            return action;
	            }
	        }
		]
	});
});
