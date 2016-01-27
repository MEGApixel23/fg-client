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

                            for (var attr in errors) {
                                var $error = $form.find('.errors[data-for=' + attr + ']'),
                                    $input = $form.find('[name=' + attr + ']');

                                $input.addClass('invalid');
                                $error.html(errors[attr].join(', '));
                            }
                        } else if (res.status == true) {
                            var user = res.data.user,
                                client = res.data.client;

                            AuthProvider.login(user, client);

                            window.location.href = '/site/session?userId=' + user.id + '&token=' + client.token +
                                '&tokenExpiresAt=' + client.token_expires_at;
                        }
                    }
                },
                error: function(res) {}
            });
        });
});