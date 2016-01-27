$(document).ready(function() {
    Requester.getWallets(function (wallets) {
        for (var i = 0; i < wallets.length; i++) {
            var $tr = $('<tr></tr>');
            $tr.append($('<td></td>').html(wallets[i].name));
            $('#wallets-table tbody').append($tr);
        }
    });
});