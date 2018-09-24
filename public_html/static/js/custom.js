$(document).on('change', ':file', function () {
    var input = $(this);
    var id = input.get(0).id;
    var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.siblings("mark").text(label);
});