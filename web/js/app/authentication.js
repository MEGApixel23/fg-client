$(document).ready(function() {
    $('body')
        .off('submit', '#sign-up-form, #auth-form')
        .on('submit', '#sign-up-form, #auth-form', function(e) {
            e.preventDefault();

            var $form = $(this),
                url = $form.attr('action');

            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: $(this).serialize(),
                beforeSend: function () {},
                complete: function () {},
                success: function(res) {
                    if (res.hasOwnProperty('status')) {

                        if (res.status == false) {
                            var errors = res.data;

                            if (errors.length > 0) {
                                for (var attr in errors) {
                                    var $error = $form.find('.errors[data-for=' + attr + ']');
                                    var $input = $form.find('[name=' + attr + ']');

                                    $input.addClass('invalid');
                                    $error.html(errors[attr].join(', '));
                                }
                            }
                        } else if (res.status == true) {
                            var user = res.result.user;
                            var device = res.result.device;

                            window.localStorage.setItem('user_id', user.id);
                            window.localStorage.setItem('token', device.token);
                            window.localStorage.setItem('token_expires_at', device.token_expires_at);

                            window.location.href =
                                '/site/session?userId=' + user.id + '&token=' + device.token +
                                '&tokenExpiresAt=' + device.token_expires_at;
                        }
                    }
                },
                error: function(res) {}
            });
        });
});