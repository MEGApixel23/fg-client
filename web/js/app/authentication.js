$(document).ready(function() {
    $('body')
        .off('submit', '#sign-up-form, #auth-form')
        .on('submit', '#sign-up-form, #auth-form', function(e) {
            e.preventDefault();
            var $form = $(this),
                url = $form.attr('action');

            Requester.make({
                method: 'POST',
                url: url,
                data: $(this).serialize(),
                successCallback: function (data) {
                    var user = data.user,
                        client = data.client;

                    AuthProvider.login(user, client);

                    window.location.href = '/site/session?userId=' + user.id + '&token=' + client.token +
                        '&tokenExpiresAt=' + client.token_expires_at;
                },
                errorCallback: function (data) {
                    var errors = data;

                    for (var attr in errors) {
                        var $error = $form.find('.errors[data-for=' + attr + ']'),
                            $input = $form.find('[name=' + attr + ']');

                        $input.addClass('invalid');
                        $error.html(errors[attr].join(', '));
                    }
                }
            });
        });
});