<?php session_start(); ?>
<?php require '../others/db-connect.php';
unset($_SESSION['User']);//セッションのデータを消す
if(isset($_POST['user_name'])){
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('select * from User where user_name=?');
$sql->execute([$_POST['user_name']]);
foreach ($sql as $row){
    if(password_verify($_POST['password'],$row['password'])){
        $_SESSION['User']=[
            'user_id'=>$row['user_id'],
            'user_name'=>$row['user_name'],
            'password'=>$row['password'],
            'private_name'=>$row['private_name'],
            'katakana_name'=>$row['katakana_name'],
            'mail_address'=>$row['mail_address'],
            'post_code'=>$row['post_code'],
            'address1'=>$row['address1'],
            'settlement'=>$row['settlement'],
            'credit_id'=>$row['credit_id'],
            'credit_data'=>$row['credit_data'],
            'security_code'=>$row['security_code'],
            'tell'=>$row['tell']];
    }
}
    if (isset($_SESSION['User'])){
        header("Location: ../G6-3/changemyInfo.php");
        exit();
    }else{
        $error = "パスワードが一致しません";
    }
}
    ?>
 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="../Sample/template/vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="../Sample/template/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../Sample/template/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../Sample/template/images/favicon.png" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo" style="text-align: center">
                <img src="..\image\AsoCityロゴ2.png" alt="ここに画像アイコン入る">
              </div>
             
    <form action="login-input.php" method="post">
    <p>ログインID</p>
    <input type="text" name="user_name" class="form-control form-control-lg"><br>
 
    <p>パスワード</p>
<input type="password" name="password" id="txtPass" class="form-control form-control-lg"><br>
<span id="buttonEye" class="fa fa-eye-slash" onclick="togglePasswordVisibility()"><br></span>
<script>
function togglePasswordVisibility() {
    var txtPass = document.getElementById("txtPass");
    var btnEye = document.getElementById("buttonEye");
 
    if (txtPass.type === "password") {
        txtPass.type = "text";
        btnEye.className = "fa fa-eye";
    } else {
        txtPass.type = "password";
        btnEye.className = "fa fa-eye-slash";
    }
}
</script>
<!-- エラーメッセージ -->
<?php
    if(isset($error)) {
        echo "<p class='error'>$error</p>";
    }
    ?>
 
    <input type="submit" value="ログイン" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
</form>
<div class="text-center mt-4 font-weight-light">
  <br>
                <a href="../G1-2/customer-input.php" class="text-primary">ーーーー新規登録ーーーー</a>
                <div class="text-center mt-4 font-weight-light">
                  <a href="../G2-1/index.php" class="text-primary">ーーログインせずに進むーー</a>
                </div><br>
 
   
</body>
</html>
 