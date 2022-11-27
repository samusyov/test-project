$(document).ready(function() {
    $('form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                let result = $.parseJSON(response);
                switch (result.errorType) {
                    case "no-error":
                        window.location.href = "signin.php";
                        break;
                    case "login-error":
                        changeContent("login-error", "Логин уже зарегистрирован");
                        break;
                    case "confirm-password-error":
                        changeContent("confirm-password-error", "Пароли не совпадают");
                        break;
                    case "email-error":
                        changeContent("email-error", "Email уже зарегистрирован");
                        break;
                    case "wrong-login":
                        changeContent("wrong-login", "Неверный логин");
                        break;
                    case "wrong-password":
                        changeContent("wrong-password", "Неверный пароль");
                        break;
                    case "exit":
                        location.reload();
                        break;
                    default:
                        location.reload();
                }
            },
        });
    });
});

function changeContent(error_field, error_message) {
    $('.' + error_field).html(error_message);
}