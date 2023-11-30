<?php
require 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POSTリクエストからユーザー名とパスワードを取得
    $userid = $_POST['user_id'];
    $password = $_POST['password'];

    try {
        // データベースからユーザー情報を取得するクエリ
        $stmt = $connect->prepare("SELECT * FROM User WHERE user_id = :userid");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // ユーザーが存在する場合
            if ($password == $user['password']) {
                // パスワードが一致する場合

                // ログイン成功後のページにリダイレクト
                header('Location:../G2-1/index.php');
                exit;
            } else {
                // パスワードが一致しない場合
                echo "Invalid password";
            }
        } else {
            // ユーザーが存在しない場合
            echo "Invalid username";
        }
    } catch (PDOException $e) {
        echo 'エラー: ' . $e->getMessage();
    }
}
?>


