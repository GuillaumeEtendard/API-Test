$(function(){

    $('form').submit(function(){
        $.ajax({
            url: '/api/authVerification',
            data: $(this),
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                console.log('dssdq');
                window.location.href = '/';
            },

            error: function (data, status, error) {

            }
        });
        return false;
    })
});