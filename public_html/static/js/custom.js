$(document).on('change', ':file', function() {
    var input = $(this);
    var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.parent().siblings("[id^=form_file-info]").val(label);
});

$(document).on('click', '[id^=form_file-info]', function() {
    var input = $(this);
    input.siblings('.input-group-btn').click();
});


$(window).on('load', function() {
    $('#myModal').modal('show');
});

$('#reception').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        data: $(this).serialize(),
        success: function(data) {
            console.log(data);
        }
    });

    var modal = `
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Вы успешно отправили сообщение</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    `;

    $(this)[0].reset();
    $('body').append(modal);
    $('#myModal').modal({
        backdrop: 'static'
    });
});

$("#myModal").on('hidden.bs.modal', function (e) {
    $('#myModal').remove();
});