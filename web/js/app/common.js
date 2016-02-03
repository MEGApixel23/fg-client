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

Requester.make = function (options) {
    var data = options.hasOwnProperty('data') ? options.data : null,
        url = options.hasOwnProperty('url') ? options.url : '',
        successCallback = options.hasOwnProperty('successCallback') ? options.successCallback : null,
        errorCallback = options.hasOwnProperty('errorCallback') ? options.errorCallback : null,
        method = options.hasOwnProperty('method') ? options.method : 'GET';

    $.ajax({
        type: method,
        url: apiUrl + url,
        dataType: 'json',
        data: data,
        complete: function () {},
        success: function(res) {
            var data = Requester.processResponse(res);

            if ((data.status === true) && successCallback) {
                successCallback(data.data);
            }

            if ((data.status === false) && errorCallback) {
                errorCallback(data.data, data.error, data.error_code);
            }
        },
        error: function(res) {}
    });
};

Requester.processResponse = function (response) {
    if (response.hasOwnProperty('status')) {
        if (response.status == false) {
            if (response.error_code === 'NO_TOKEN' || response.error_code === 'WRONG_TOKEN') {
                window.location.href = '/site/auth';
                return false;
            }
        }
    }

    return response;
};