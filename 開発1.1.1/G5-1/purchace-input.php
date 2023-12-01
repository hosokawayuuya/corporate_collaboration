<?php session_start();?>
<?php require 'header.php';?>
<?php require 'menu.php';?>
<?php require 'db-connect.php'; ?>
<?php
if(isset($_SESSION['User'])){
    echo 'お名前：', $_SESSION['User']['user_name'];
    echo '住所：', $_SESSION['User']['address1'];
    require 'cart.php';
    echo '内容をご確認いただき、購入を確定してください。';
    echo '<a href="purchace-output.php">購入を確定する</a>';
}else{
    echo '商品を購入するには、ログインしてください。';
}
?>
<?php require 'footer.php';?>