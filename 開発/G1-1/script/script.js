document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("exampleInputPassword1");
    const viewIcon = document.getElementById("view");

    viewIcon.addEventListener("click", function () {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            viewIcon.innerHTML = '<i class="far fa-eye"></i>';
        } else {
            passwordInput.type = "password";
            viewIcon.innerHTML = '<i class="far fa-eye-slash"></i>';
        }
    });
});
