$('div.alert').delay(2500).slideUp();

$(document).ready(function () {
    $('#myTable').DataTable();

    $('a.delete').click(function () {
        var name = $(this).attr("name");
        var url  = $(this).attr("url");
        swal({
            title:"Are you sure?",
            text: "You want delete this " + name + "!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
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
