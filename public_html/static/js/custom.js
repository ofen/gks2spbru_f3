$('form').on('submit', function(e) {
    e.preventDefault();
    var form = $(this);

    $.ajax({
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            console.log(data);
            $('div').find('.has-error').remove();
            $('div').find('.help-block').remove();

            if (data.result == 'OK') {
                form[0].reset();
                $('#submitModal').modal();
            } else {
                for (error in data.result) {
                    $(`#${error}`).parents('.form-group').addClass('has-error');
                    $(`#${error}`).parents('.form-group').append(`<span class="help-block">${data.result[error]}</span>`);
                }
            }
            
            
        }
    });
});

$("#house_search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#house_list tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});