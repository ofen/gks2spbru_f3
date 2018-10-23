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

$("#search_data").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#data_list tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});

$("#select_data").on("change", function() {
    var value = $(this).val().toLowerCase();
    $("#data_list tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});

var current_page = 1;

$('#load').on('click', function() {
    $.post({
        url: '/news',
        data: {page: current_page},
        success: function(data) {
            current_page += 1;
            console.log(data);
            $('#load').before(data);
        }
    });
});