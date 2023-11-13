document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("exampleInputPassword1");
    const showPasswordText = document.getElementById("showPassword");

    showPasswordText.addEventListener("click", function () {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
});
