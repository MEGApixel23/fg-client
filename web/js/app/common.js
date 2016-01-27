function AuthProvider() {}

/**
 * @returns {boolean}
 */
AuthProvider.isAuthorized = function () {
    var isAuthorized = window.localStorage.getItem('is_authorized');

    return isAuthorized ? true : false;
};

AuthProvider.login = function (user, client) {
    window.localStorage.setItem('user_id', user.id);
    window.localStorage.setItem('token', client.token);
    window.localStorage.setItem('token_expires_at', client.token_expires_at);

    window.localStorage.setItem('is_authorized', true);
};

$.ajaxPrefilter(function (options) {
    if (!options.beforeSend) {
        options.beforeSend = function (xhr) {
            xhr.setRequestHeader('token', window.localStorage.getItem('token'));
        }
    }
});

AuthProvider.logout = function () {
    window.localStorage.removeItem('user_id');
    window.localStorage.removeItem('token');
    window.localStorage.removeItem('token_expires_at');

    window.localStorage.removeItem('is_authorized');
};

function Requester() {}

Requester.getWallets = function (callback) {
    $.ajax({
        type: 'GET',
        url: apiUrl + '/wallet',
        dataType: 'json',
        complete: function () {},
        success: function(res) {
            var data = Requester.processResponse(res);
            
            console.log(data);
        },
        error: function(res) {}
    });
};

Requester.processResponse = function (response) {
    if (response.hasOwnProperty('status')) {
        if (response.status == false) {
            if (response.error_code === 'NO_TOKEN' || response.error_code === 'WRONG_TOKEN') {
                window.location.href = '/site/auth';
            }
        } else if (response.status == true) {
            return response.data;
        }
    }

    return false;
};