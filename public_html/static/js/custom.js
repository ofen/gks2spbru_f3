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

    var html = `
        <div class="modal fade" id="submitModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        Вы успешно отправили сообщение!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    `;

    $.ajax({
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            console.log(data);
            $('div').removeClass('has-error');
            $('div').find('.help-block').remove();

            if (data.result == 'OK') {

                form[0].reset();

                
                $(document.body).append(html);
                $('#submitModal').modal({backdrop: 'static'});
                $("#submitModal").on('hidden.bs.modal', function(e) {
                    $(this).remove();
                });

            } else {
                for (error in data.result) {
                    $(`#${error}`).parents('.form-group').addClass('has-error');
                    $(`#${error}`).parents('.form-group').append(`<span class="help-block">${data.result[error]}</span>`);
                }
            }
            
            
        }
    });
});
