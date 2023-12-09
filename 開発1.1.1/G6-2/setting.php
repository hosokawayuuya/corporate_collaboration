<?php session_start();
    if (isset($_POST['logout'])) {
        if (isset($_SESSION['User'])) {
            // セッション破棄
            unset($_SESSION['User']);
            header("Location: ../G1-1/login-input.php");
            exit();
        } else {
            $error = "アカウントが存在しないか、すでにログアウトしています。";
        }
    }
    ?>
<?php require '../others/head.php'; ?>
<?php require '../others/header.php'; ?>
<?php require '../others/db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="../Sample/template/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../Sample/template/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Sample/template/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../Sample/template/images/favicon.png" />

  </head>
	<body>
    <style>
    body{
   text-align: center;
   padding: 30px;
   margin-top:20px;
   letter-spacing: 3px;
   line-height: 60px;
}

h1{
  font-size: 60px;
}

h{
   font-size: 60px;
   background-color: red;
}

p1{
   font-size: 20px;
}
h3{
   font-size: 40px;
   background-color: red;
}

h2{
   font-size: 30px; 
   color: red;
}

p{
   font-size: 20px;
   letter-spacing: 3px;
}

h4{
   font-size: 40px;
   background-color: red;
}

p2{
   font-size: 15px;
   letter-spacing: 2px;
}
.confirmation {
   text-align: center;
   padding: 70px;
   background-color: #fff;
   border-radius: 75px;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
   width: 550px;
   float: right;
   height: 250px;
}
.confirmation1 {
   text-align: center;
   padding: 70px;
   background-color: #fff;
   border-radius: 75px;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
   width: 550px;
   float: left;
   height: 300px;
}

.confirmation2 {
   text-align: center;
   padding: 70px;
   background-color: #fff;
   border-radius: 75px;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
   width: 550px;
   float: right;
   height: 400px;
}

.confirmation3 {
   text-align: center;
   padding: 70px;
   background-color: #fff;
   border-radius: 75px;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
   width: 550px;
   float: left;
   height: 300px;
}

.confirmation4 {
   text-align: center;
   padding: 70px;
   background-color: #fff;
   border-radius: 75px;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
   width: 800px;
   position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
		<h1>設定</h1>
    <a href="henpin.php" class="btn btn-link btn-rounded btn-fw">返品ポリシーについて</a>
    <br>
    <a href="point.php" class="btn btn-link btn-rounded btn-fw">ポイントについて</a>
    <br>
    <a href="privacy.php" class="btn btn-link btn-rounded btn-fw">利用規約とプライバシーポリシー</a>
    <br>
    <a href="campain.php" class="btn btn-link btn-rounded btn-fw">今だけの闇特別キャンペーン実施中！！</a>
    <br>
    <?php
    if(isset($error)) {
        echo "<p class='error'>$error</p>";
    }
    ?>
    <form action="setting.php" method="post" id="logoutForm">
    <button type="submit" name="logout" class="btn btn-light btn-rounded btn-fw">ログアウト</button>
</form>

<div id="error-container">
</div>
</body>
</html>
<?php require '../others/footer.php'; ?>