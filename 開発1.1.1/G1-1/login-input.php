<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>ログイン画面</h2>
    <form action="login-output.php" method="post">
        <label for="username">ユーザーID</label><br>
        <input type="text" name="username" required><br>

        <label for="password">パスワード</label><br>
        <input type="password" name="password" required><br>

        <input type="submit" value="ログインする">

    </form>

    <a href="..\G1-2\customer-input.php" class="text-primary">ーーーー新規登録ーーーー</a><br>

    <a href="..\G2-1\index.php" class="text-primary">ーーーーログインせずに進むーーーー</a>

</body>
</html>
