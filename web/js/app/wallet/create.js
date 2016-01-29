$(document).ready(function() {
    $('#create-wallet').submit(function(e) {
        e.preventDefault();

        var $form = $(this),
            url = $form.attr('action');

        Requester.make({
            method: 'POST',
            url: url,
            data: $(this).serialize(),
            successCallback: function (data) {
                window.location.href = '/wallet';
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