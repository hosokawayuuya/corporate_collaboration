<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $host = 'mysql217.phy.lolipop.lan';
    $dbname = 'LAA1517470-inful';
    $user = 'LAA1517470';
    $pass = 'Influenza';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // セッションからuser_idを取得
        $user_id = $_SESSION['user_id'];

        // ユーザーの現在の情報をデータベースから取得
        $query = "SELECT user_name, email FROM User WHERE user_id = :user_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // フォームが送信されたときの処理
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 新しいユーザー名とパスワードを取得
            $user_name = $_POST['user_name'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // データベースのユーザー情報を更新
            $query = "UPDATE User SET user_name = :user_name, password = :password WHERE user_id = :user_id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();

            // 更新後のユーザー情報を再取得
            $query = "SELECT user_name, FROM User WHERE user_id = :user_id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>情報変更</title>
</head>
<body>
    <h2>情報変更</h2>
    <form action="changemyInfo.php" method="post">
        <label for="user_name">ユーザー名:</label>
        <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars($user['user_name'], ENT_QUOTES, 'UTF-8'); ?>" required><br>

        <!-- emailの入力欄が存在していたが、それを表示させる場合はデータベースから取得する必要がある -->
        <!-- ここに取得したemailを表示させるコードを追加 -->

        <label for="password">新しいパスワード:</label>
        <input type="password" id="password" name="password" required><br>

        <!-- 他の情報も必要に応じて追加 -->

        <input type="submit" value="情報を変更">
    </form>
</body>
</html>

