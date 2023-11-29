<?php session_start();?>
<?php require 'header.php';?>
<?php require 'menu.php';?>
<?php require 'db-connect.php';?>
<?php

unset($_SESSION['customer']);
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('select * from customer where login=?');
$sql->execute([$_POST['login']]);

foreach ($sql as $row) {
    if (password_verify($_POST['pass'], $row['password'])) {
        $_SESSION['customer'] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'address' => $row['address'],
            'login' => $row['login'],
            'password' => $row['password']
        ];
        echo 'いらっしゃいませ、', $_SESSION['customer']['login'], 'さん。';
        break;
    }
}

if (!isset($_SESSION['customer'])) {
    echo 'ログイン名またはパスワードが違います。';
}?>
<?php require 'footer.php';?>

