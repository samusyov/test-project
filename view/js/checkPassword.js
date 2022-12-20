function checkPasswordMatch() {
    let password = $("#password").val();
    let confirmPassword = $("#confirm_password").val();
    if (password !== confirmPassword) {
        $("#confirm_password_error").html("Пароли не совпадают");
        $('#password').addClass('red-border');
        $('#confirm_password').addClass('red-border');
        $("#sign_up_submit").attr("disabled", "disabled");
    } else {
        $("#confirm_password_error").html("");
        $('#password').removeClass('red-border');
        $('#confirm_password').removeClass('red-border');
        $("#sign_up_submit").removeAttr("disabled");
    }
}

$(document).ready(function () {
    $("#password").keyup(checkPasswordMatch);
    $("#confirm_password").keyup(checkPasswordMatch);
});