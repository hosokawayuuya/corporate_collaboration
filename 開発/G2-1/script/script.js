
          function restrictToNumeric(inputField) {
              inputField.value = inputField.value.replace(/[^0-9]/g, '');
      
          }
      
          function validateForm() {
              var isValid = true;
              var requiredFields = ["lastName", "firstName", "seiyomi", "meiyomi", "phoneNumber", "email", "username", "confirmUsername", "password", "confirmPassword"];
      
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