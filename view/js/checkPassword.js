function checkPasswordMatch() {
    let password = $("#password").val();
    let confirmPassword = $("#confirm_password").val();

    if (password !== confirmPassword) {
        $(".confirm-password-error").html("Пароли не совпадают");
        $("#sign_up_submit").attr("disabled", "disabled");
    }
    else {
        $(".confirm-password-error").html("");
        $("#sign_up_submit").removeAttr("disabled");
    }
}

$(document).ready(function () {
    $("#confirm_password").keyup(checkPasswordMatch);
});