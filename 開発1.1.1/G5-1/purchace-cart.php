<?php session_start();?>
<?php require 'header.php';?>
<?php require 'menu.php';?>
<?php require 'db-connect.php'; ?>
<?php
if(isset($_SESSION['User'])){
    echo 'お名前：', $_SESSION['User']['private_name'];
    echo '住所：', $_SESSION['User']['address1'];
    echo '支払方法：', $_SESSION['User']['settlement'];
    require '../G4-1/cart.php';
    echo '内容をご確認いただき、購入を確定してください。';
    echo '<a href="../G5-2/confilm.php">購入を確定する</a>';
}else{
    echo '商品を購入するには、ログインしてください。';
}
?>
<?php require 'footer.php';?>