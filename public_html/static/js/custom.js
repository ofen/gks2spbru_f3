$(document).on('change', ':file', function() {
    var input = $(this);
    var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.parent().siblings("[id^=file-info]").val(label);
});

$(document).on('click', '[id^=file-info]', function() {
    $(this).siblings('.input-group-btn').click();
});

$('#reception').on('submit', function(e) {
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
        data: form.serialize(),
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
