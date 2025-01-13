$('document').ready(function() {
    $('a.btn-danger').on('click', function () {
        ele.preventDefault();

        var urlreg = $(this).attr('href');

        $.ajax(
            urlreg,
            {
                method: 'delete',
                data: {
                    '_token': $('#_token').val()
                },
                complete: function (resp) {
                    console.log(data);
                }
            });
    });
});
