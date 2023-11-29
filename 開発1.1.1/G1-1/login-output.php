<?php
session_start();

// 必要なファイルをインクルード
require '../others/head.php';
require '../others/header.php';
require '../others/db-connect.php';

// フォームが送信されたかどうかを確認
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ユーザー入力をサニタイズ
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $password_input = mysqli_real_escape_string($conn, $_POST['password']);

    // データベースからユーザー情報を取得
    $sql = "SELECT user_id, password FROM User WHERE user_id = '$user_id'";
    $result = $conn->query($sql);

    // ユーザーが存在するか確認
    if ($result->num_rows > 0) {
        // ユーザーが存在する場合はパスワードを検証
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password_input, $hashed_password)) {
            // ログイン成功
            $_SESSION['user_id'] = $user_id;  // ユーザーIDをセッションに保存
            header("Location:./G2-1/index.php");
            exit();
        } else {
            // パスワードが誤っている場合のエラーメッセージ
            $error_message = "パスワードが間違っています";
        }
    } else {
        // ユーザーが存在しない場合のエラーメッセージ
        $error_message = "ユーザーが存在しません";
    }
}

// フッターをインクルード
require '../others/footer.php';
?>
