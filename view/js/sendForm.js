$(document).ready(function() {
    $('form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: '/test-project' + $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                handleResult($.parseJSON(response).msg);
            },
        });
    });
});

function handleResult(msg) {
    switch (msg) {
        case "no_error":
            window.location.href = "sign-in.php";
            break;
        case "login_error":
            setError("login", "login_error", "Логин уже зарегистрирован");
            break;
        case "confirm_password_error":
            setError("confirm_password", "confirm_password_error", "Пароли не совпадают");
            break;
        case "email_error":
            setError("email", "email_error", "Email уже зарегистрирован");
            break;
        case "wrong_login":
            setError("login", "wrong_login", "Неверный логин");
            break;
        case "wrong_password":
            setError("password", "wrong_password", "Неверный пароль");
            break;
        case "exit":
            location.reload();
            break;
    }
}

function setError(field, error_field, error_message) {
    removeError();
    resetPasswordFields();
    $('#' + error_field).html(error_message);
    $('#' + field).addClass('red-style');
}

function removeError() {
    $('.error-field').html('');
    $('.form-control').removeClass('red-style');
}

function resetPasswordFields() {
    $('#password').val('');
    $('#confirm_password').val('');
}
