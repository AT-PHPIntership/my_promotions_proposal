$(document).ready(function(){
    $('#myTable').DataTable();
});

$('div.alert').delay(time).slideUp();
function delconfirm(msg) {
    if (window.confirm(msg)) {
        return  true;
    }
    return false;
}
$('a.active').click(function(){
    var url = this.id;
    swal({title: messages.business_active,
            text: messages.question_active,
            type: "info",
            showCancelButton: true,
            closeOnConfirm: true,
            showLoaderOnConfirm: true,
        },
        function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url: url,
                type: "PUT",
                dataType: 'text',
                success: function(result){
                    if (result == messages.updated){
                        location.reload();
                    }
                }
            });

        })
})

$('a.delete').click(function () {
    var name = $(this).attr("name");
    var url = $(this).attr("url");
    swal({
        title: messages.confirm_delete_title,
        text: messages.confirm_delete_text + name ,
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
            type: 'DELETE',
            dataType: 'text',
            success: function (result) {
                swal(
                    result
                );
            }
        });
        
    });
});
