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

function pushHideButton1() {
    var txtPass = document.getElementById("password");
    var btnEye = document.getElementById("buttonEye");
  
    // 入力タイプを確認し、表示/非表示を切り替える
    if (txtPass.type === "password") {
      txtPass.type = "text";
      btnEye.className = "fa fa-eye";
  
    } else {
      txtPass.type = "password";
      btnEye.className = "fa fa-eye-slash";
    }
  }
  function pushHideButton2() {
    var txtPass = document.getElementById("confirmPassword");
    var btnEye = document.getElementById("buttonEye2");
  
    // 入力タイプを確認し、表示/非表示を切り替える
    if (txtPass.type === "password") {
      txtPass.type = "text";
      btnEye.className = "fa fa-eye";
  
    } else {
      txtPass.type = "password";
      btnEye.className = "fa fa-eye-slash";
    }
  }
  

function showCreditCardFields() {
    var creditCardFields = document.getElementById("creditCardFields");
    creditCardFields.style.display = "block";
  }

  function hideCreditCardFields() {
    var creditCardFields = document.getElementById("creditCardFields");
    creditCardFields.style.display = "none";
  }



  document.getElementById("registrationButton").addEventListener("click", function() {
    window.location.href = "../G1-2/index.html";
});
  