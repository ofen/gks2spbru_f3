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

// $('#reception').on('submit', function(e) {
//     e.preventDefault();

//     $.ajax({
//         type: 'POST',
//         data: $(this).serialize(),
//         success: console.log('POST SUCCESS: ' + $(this).serialize())
//     });

//     var flash = `
//         <div class="alert alert-success alert-dismissible fade in" role="alert">
//             <a class="close" data-dismiss="alert" aria-label="Close">×</a>
//             Вы успешно отправили сообщение!
//         </div>`;

//     $(this)[0].reset();
//     $(document).find('.flash').html(flash);
// });