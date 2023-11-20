function validateForm() {
    var isValid = true;
    var requiredFields = ["lastName", "firstName", "seiyomi", "meiyomi", "phoneNumber", "email", "username", "confirmUsername", "password", "confirmPassword","postalCode","city", "streetAddress"];
    
    for (var i = 0; i < requiredFields.length; i++) {
        var fieldName = requiredFields[i];
        var fieldValue = document.getElementById(fieldName).value;
        var errorElement = document.getElementById(fieldName + "Error");

        if (fieldValue === "") {
            errorElement.textContent = "入力されていません";
            isValid = false;
        } else {
            errorElement.textContent = ""; 
        }
    }

    if (document.getElementById("username").value !== document.getElementById("confirmUsername").value) {
        document.getElementById("confirmUsernameError").textContent = "ユーザー名が一致しません";
        isValid = false;
    } else {
        document.getElementById("confirmUsernameError").textContent = "";
    }
    if (document.getElementById("password").value !== document.getElementById("confirmPassword").value) {
        document.getElementById("confirmPasswordError").textContent = "パスワードが一致しません";
        isValid = false;
    } else {
        document.getElementById("confirmPasswordError").textContent = "";
    }

    return isValid;
}



  function addressForm() {
    var isValid = true;
    var requiredFields = ["postalCode", "prefecture", "city", "streetAddress", "buildingName"];
    
    for (var i = 0; i < requiredFields.length; i++) {
        var fieldName = requiredFields[i];
        var fieldValue = document.getElementById(fieldName).value;
        var errorElement = document.getElementById(fieldName + "Error");

        if (fieldValue === "") {
            errorElement.textContent = "入力されていません";
            isValid = false;
        } else {
            errorElement.textContent = ""; 
        }
    }
}

let eye = document.getElementById("eye");
eye.addEventListener('click', function () {
     if (this.previousElementSibling.getAttribute('type') == 'password') {
          this.previousElementSibling.setAttribute('type', 'text');
          this.classList.toggle('fa-eye');
          this.classList.toggle('fa-eye-slash');
     } else {
          this.previousElementSibling.setAttribute('type', 'password');
          this.classList.toggle('fa-eye');
          this.classList.toggle('fa-eye-slash');
     }
})



function showCreditCardFields() {
    var creditCardFields = document.getElementById("creditCardFields");
    creditCardFields.style.display = "block";
  }

  function hideCreditCardFields() {
    var creditCardFields = document.getElementById("creditCardFields");
    creditCardFields.style.display = "none";
  }
  