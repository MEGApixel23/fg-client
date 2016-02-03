$(document).ready(function() {
    var url = '/wallet';

    Requester.make({
        url: url,
        successCallback: function (data) {
            for (var i = 0; i < data.length; i++) {
                var $tr = $('<tr></tr>');
                $tr.append($('<td></td>').html(data[i].name));
                $('#wallets-table tbody').append($tr);
            }
        }
    });
});