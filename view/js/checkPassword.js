function checkPasswordMatch() {
    let password = $("#password").val();
    let confirmPassword = $("#confirm_password").val();
    if (password !== confirmPassword) {
        $("#confirm_password_error").html("Пароли не совпадают");
        $('#password').addClass('red-style');
        $('#confirm_password').addClass('red-style');
        $("#sign_up_submit").attr("disabled", "disabled");
    } else {
        $("#confirm_password_error").html("");
        $('#password').removeClass('red-style');
        $('#confirm_password').removeClass('red-style');
        $("#sign_up_submit").removeAttr("disabled");
    }
}

$(document).ready(function () {
    $("#password").keyup(checkPasswordMatch);
    $("#confirm_password").keyup(checkPasswordMatch);
});