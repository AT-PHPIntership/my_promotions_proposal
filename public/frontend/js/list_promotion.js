$(document).ready(function(){
	var url_pro = $('#url_promotion').val();
	var table = $('#list_promotions').DataTable({
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

	// display modal form when click button edit
    table.on('click', 'button.delete', function(e){
        var id_delete = $(this).val();
        var url_del = $('#url_delete').val() + '/' + id_delete;
        swal({
            title: messages.confirm_delete_title,
            text: messages.confirm_delete_promotion,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: messages.delete,
            closeOnConfirm: false
        }, function () {
            $.ajax({
	            url : url_del,
	            type : 'DELETE',
	            dataType: 'json',
	            success : function (result) {
	            	table.clear().draw();
	            	swal({
                        title: result.message,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: messages.ok,
                    });
	            },
	            error : function (data) {
		            var err = eval("(" + data.responseText + ")");
		            $('#message').html(err.error);
		            $('#message').css('display', 'block');
	            }
	        });  
        });
        
    });
});
