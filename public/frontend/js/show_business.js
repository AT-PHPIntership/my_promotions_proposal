$(document).ready(function () {
    var url_business = $('#show_business').val();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        url: url_business,
        type: 'POST',
        dataType: 'json',
        success: function (result) {
            console.log(result);
            var business = $('#businesses');
            business.find('#logo').prop('src', image);
            business.find('#email').text(result.email);
            business.find('#name').text(result.name);
            business.find('#phone').text(result.phone);
            business.find('#description').text(result.description);
            business.find('#created_at').text(result.created_at);
            business.find('#updated_at').text(result.updated_at);
        }
    });
});
