$(function () {
    $("form").submit(function () {
        var $form = $(this);
        var id = $form.attr('id');
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();
        $.ajax({
            url: '/' + this.name,
            method: 'POST',
            data: data,
            dataType: 'json',
            contentType: false,
            processData: false,

            success: function (data) {
                    location.reload();
                console.log(data);
            },

            error: function (data, status, error) {
                $('form input, form select').removeClass('inputTxtError');
                $('label.error').remove();
                data = JSON.parse(data.responseText);

                $.each(data.errors, function(i, v) {
                    var msg = '<label class="error" for="'+i+'">'+v+'</label>';
                    $('input[name="' + i + '"], select[name="' + i + '"]').addClass('inputTxtError').after(msg);
                    $('textarea[name="' + i + '"], select[name="' + i + '"]').addClass('inputTxtError').after(msg);
                });
            }
        });
        return false;
    });

});