<?php
$host = 'mysql217.phy.lolipop.lan';
$dbname = 'LAA1517470-inful';
$user = 'LAA1517470';
$pass = 'Influenza';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("データベースに接続できませんでした。エラー: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームからのデータを取得
    $loginId = $_POST['user_id'];
    $password = $_POST['password'];

    // フォームの入力が空でないことを確認
    if (empty($loginId) || empty($password)) {
      $error = "ログインIDまたはパスワードが入力されていません。<br>登録していない方は下の新規登録からアカウントを作成してください。";

    } else {
        // ログインIDを基にユーザーを取得するクエリ
        $query = "SELECT * FROM User WHERE user_id = :loginId";

        // プリペアドステートメントを使用してクエリを実行
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':loginId', $loginId, PDO::PARAM_STR);
        $stmt->execute();

        // ユーザーデータを取得
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
       

        if ($user && isset($user['user_id'])) {
            // パスワードが一致するか確認
            if (password_verify($password, $user['password'])) {
                // ログイン成功
                session_start();
                // ユーザー情報をセッションに保存
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: ../G6-3/changemyInfo.php");
                exit();
            } else {
                // パスワードが一致しない場合の処理
                $error = "パスワードが一致しません";
            }
        } else {
            // ユーザーが存在しない場合または'user_id'キーが存在しない場合の処理
            $error = "ユーザーの登録がありません！";
        }
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
  <link rel="stylesheet" href="style.css">
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
    <label for="user_id">ログインID</label><br>
    <input type="text" name="user_id" class="form-control form-control-lg"><br>

    <label for="password">パスワード</label><br>
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
