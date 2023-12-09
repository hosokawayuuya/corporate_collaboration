<?php session_start();?>
<?php require '../others/head.php';?>
<?php require '../others/header.php';?>
<?php require '../others/db-connect.php'; ?>
<?php
if(isset($_SESSION['User'])){
    echo 'お名前：', $_SESSION['User']['private_name'];
    echo '住所：', $_SESSION['User']['address1'];
    echo '支払方法：', $_SESSION['User']['settlement'];

    echo '内容をご確認いただき、購入を確定してください。';
    echo '<a href="../G5-2/confirm-single.php">購入を確定する</a>';
}else{
    echo '商品を購入するには、ログインしてください。';
    echo '<a href="../G1-1/login-input.php">ログインする</a>';
}
?>
<?php require '../others/footer.php';?>