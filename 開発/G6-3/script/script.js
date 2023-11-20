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
  

  function showAddress(address) {
    var address1Div = document.getElementById('address1');
    var address2Div = document.getElementById('address2');
    var address3Div = document.getElementById('address3');

    // すべての住所の表示を非表示にする
    address1Div.style.display = 'none';
    address2Div.style.display = 'none';
    address3Div.style.display = 'none';

    // 選択された住所を表示
    if (address === 'address1') {
        address1Div.style.display = 'block';
    } else if (address === 'address2') {
        address2Div.style.display = 'block';
    } else if (address === 'address3') {
        address3Div.style.display = 'block';
    }
}


function login() {
    var username = document.getElementById("exampleInputEmail1").value;
    var password = document.getElementById("exampleInputPassword1").value;
    var isValid = authenticate(username, password);
    if (!isValid) {
      document.getElementById("error-message").innerText = "ログイン名orパスワードが間違っています";
    } else {
      window.location.href = "../G2-1/index.html";
    }
  }

  function authenticate(username, password) {
//ここデータベースで値取得してから認証してください
      const demoUsername = "山田";
const demoPassword = "1111";
return username === demoUsername && password === demoPassword;
  }

 // JavaScript関数を追加
 function pushHideButton() {
  var txtPass = document.getElementById("exampleInputPassword1");
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









