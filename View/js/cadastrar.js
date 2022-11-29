$(document).ready(function () {
    $("#esconderLogin").click(function () {
        $("#loginForm").hide();
        $("#cadastroForm").show();
    });

    $("#esconderCadastrar").click(function () {
        $("#loginForm").show();
        $("#cadastroForm").hide();
    });
});