<?php
require '../others/db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginId = $_POST['user_id'];
    $password = $_POST['password'];

    if (empty($loginId) || empty($password)) {
        $error = "ログインIDまたはパスワードを入力してください！";
    } else {
        // ログインIDを基にユーザーを取得するクエリ
        $query = "SELECT * FROM User WHERE user_id = :loginId";
        // 適切なデータベース接続でクエリを実行

        // ユーザーデータを取得
        // $user = ... // クエリの結果からユーザーデータを取得

        if ($user && isset($user['user_id'])) {
            if (password_verify($password, $user['password'])) {
                // パスワードが正しい場合
                header("Location: ../G2-1/index.php");
                exit();
            } else {
                $error = "パスワードが一致しません";
            }
        } else {
            $error = "ユーザーの登録がありません！";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h2>ログイン</h2>
    <form action="login-input.php" method="post">
        <label for="loginId">ログインID</label>
        <input type="text" name="user_id" required><br>

        <label for="password">パスワード</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>

    <?php
    if (isset($error)) {
        echo "<p class='error'>$error</p>";
    }
    ?>
</body>
</html>




