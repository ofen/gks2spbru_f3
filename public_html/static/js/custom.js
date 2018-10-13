$(':file').on('change', function() {
    var filename = null;
    if (this.files[0]) {
        filename = this.files[0].name;
    } else {
        filename = '';
    }
    $(this).parent().siblings("[id^=file-info]").val(filename);
});

$('[id^=file-info]').on('click', function() {
    $(this).siblings('.input-group-btn').click();
});

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
                $('#submitModal').modal({backdrop: 'static'});
            } else {
                for (error in data.result) {
                    $(`#${error}`).parents('.form-group').addClass('has-error');
                    $(`#${error}`).parents('.form-group').append(`<span class="help-block">${data.result[error]}</span>`);
                }
            }
            
            
        }
    });
});
