/*function login() {
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
  */

  // 入力タイプを確認し、表示/非表示を切り替える
  if (txtPass.type === "password") {
    txtPass.type = "text";
    btnEye.className = "fa fa-eye";

  } else {
    txtPass.type = "password";
    btnEye.className = "fa fa-eye-slash";
  }

//}