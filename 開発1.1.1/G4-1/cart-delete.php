<?php session_start();?>
<?php require '../others/head.php';?>
<?php require '../others/header.php';?>
<?php
unset($_SESSION['Shohin'][$_GET['shohin_id']]);
echo '<p class="lead">カートから商品を削除しました</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require '../others/footer.php'; ?>