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
