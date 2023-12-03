<?php
$host = 'mysql217.phy.lolipop.lan';
$dbname = 'LAA1517470-inful';
$user = 'LAA1517470';
$pass = 'Influenza';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // その他の設定などを行うことができます
} catch (PDOException $e) {
    exit("データベースに接続できませんでした。エラー: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームからのデータを取得
    $loginId = $_POST['user_id'];
    $password = $_POST['password'];

    // フォームの入力が空でないことを確認
    if (empty($loginId) || empty($password)) {
        $error = "ログインIDまたはパスワードを入力してください！";
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
                header("Location:../G2-1/index.php");
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
        <label for="user_id">ログインID</label>
        <input type="text" name="user_id" ><br>

        <label for="password">パスワード</label>
        <input type="password" name="password" ><br>

        <input type="submit" value="Login">
    </form>

    <?php
    if(isset($error)) {
        echo "<p class='error'>$error</p>";
    }
    ?>
</body>
</html>
