$(document).ready(function() {
    $('#sign-up-form').submit(function(e) {
        e.preventDefault();

        var url = $(this).attr('action'),
            $form = $(this);

        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function () {},
            complete: function () {},
            success: function(res) {
                if (res.hasOwnProperty('status')) {
                    $form.find('.errors').html('');
                    $form.find('input').removeClass('invalid');

                    if (res.status == false) {
                        var errors = res.error;

                        for (var attr in errors) {
                            var $error = $form.find('.errors[data-for=' + attr + ']');
                            var $input = $form.find('[name=' + attr + ']');

                            $input.addClass('invalid');
                            $error.html(errors[attr].join(', '));
                        }
                    } else if (res.status == true) {
                        var user = res.result.user;
                        var device = res.result.device;

                        window.localStorage.setItem('user_id', user.id);
                        window.localStorage.setItem('token', device.token);
                        window.localStorage.setItem('token_expires_at', device.token_expires_at);
                    }
                }
            },
            error: function(res) {}
        });
    });
});