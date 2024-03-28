$(document).ready(function () {
    $(".toggle-password").click(function () {
        $(this).toggleClass("admin-login-pasword-show-hide");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
});
