
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
function showCreditCardFields() {
    var creditCardFields = document.getElementById("creditCardFields");
    creditCardFields.style.display = "block";
  }

  function hideCreditCardFields() {
    var creditCardFields = document.getElementById("creditCardFields");
    creditCardFields.style.display = "none";
  }
  {
  // プルダウンメニューが変更されたときに実行される関数
  document.getElementById('addressSelect').addEventListener('change', function() {
      // 選択された住所の値を取得
      var selectedAddress = document.getElementById('addressSelect').value;
      
      // 選択された住所を表示するための要素に表示
      document.getElementById('displayAddress').textContent = "選択された住所: " + selectedAddress;
  });
  }



  function navigateTabs(direction) {
    var userInfoTab = document.getElementById('user_info_tab');
    var addressTab = document.getElementById('address_tab');
    var paymentMethodTab = document.getElementById('payment_method_tab');

    var userInfoContent = document.getElementById('user_info_content');
    var addressContent = document.getElementById('address_content');
    var paymentMethodContent = document.getElementById('payment_method_content');

    if (direction === 'next') {
      if (userInfoTab.checked) {
        userInfoTab.checked = false;
        addressTab.checked = true;
        userInfoContent.style.display = 'none';
        addressContent.style.display = 'block';
      } else if (addressTab.checked) {
        addressTab.checked = false;
        paymentMethodTab.checked = true;
        addressContent.style.display = 'none';
        paymentMethodContent.style.display = 'block';
      } else {
        // Handle any specific logic for the last tab if needed
      }
    } else if (direction === 'back') {
      if (paymentMethodTab.checked) {
        paymentMethodTab.checked = false;
        addressTab.checked = true;
        paymentMethodContent.style.display = 'none';
        addressContent.style.display = 'block';
      } else if (addressTab.checked) {
        addressTab.checked = false;
        userInfoTab.checked = true;
        addressContent.style.display = 'none';
        userInfoContent.style.display = 'block';
      } else {
        // Handle any specific logic for the first tab if needed
      }
    }
  }
