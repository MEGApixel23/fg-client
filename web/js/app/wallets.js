$(document).ready(function() {
    function getData() {
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            beforeSend: function () {},
            complete: function () {},
            success: function(res) {},
            error: function(res) {}
        });
    }
});