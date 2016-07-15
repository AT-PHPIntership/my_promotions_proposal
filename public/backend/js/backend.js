$('div.alert').delay(time).slideUp();

$(document).ready(function () {
    $('#list_admins').DataTable();
    $('#list_cities').DataTable();

    $('a.delete').click(function () {
        var name = $(this).attr("name");
        var url  = $(this).attr("url");
        swal({
            title: messages.confirm_delete_title,
            text: messages.confirm_delete_text + name,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: messages.delete,
            closeOnConfirm: false
        }, function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'text',
                success: function (result) {
                    swal(
                         result
                    )
                }

            });    		
    	});
    });
});
