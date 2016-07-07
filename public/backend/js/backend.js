$(document).ready(function () {
    $('#myTable').DataTable();
});

$('div.alert.error').delay(2000).slideUp();
function delconfirm(msg) {
    if (window.confirm(msg)) {
        return  true;
    }
    return false;
}
$('a.active').click(function(){
    var url = this.id;
    swal({title: "Business Active",
            text: "You want to active this business",
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
                    if (result == "OK"){
                        location.reload();
                    }
                }
            });
            
        })
})