$(document).on('change', ':file', function() {
    var input = $(this);
    var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.parent().siblings("[id^=file-info]").val(label);
});

$(document).on('click', '[id^=file-info]', function() {
    var input = $(this);
    input.siblings('.input-group-btn').click();
});


$(window).on('load', function() {
    $('#myModal').modal('show');
});