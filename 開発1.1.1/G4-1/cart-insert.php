<?php session_start(); ?>
<?php require '../others/head.php';?>
<?php require '../others/header.php';?>
<?php require '../others/db-connect.php'; ?>
<?php
$id = $_POST['shohin_id']; 
if (!isset($_SESSION['Shohin'])) {
    $_SESSION['Shohin'] = []; 
}
$count = 0;
if (isset($_SESSION['Shohin'][$id])) {
    $count = $_SESSION['Shohin'][$id]['count']; 
}
$_SESSION['Shohin'][$id] = [
    'shohin_name' => $_POST['shohin_name'], 
    'price' => $_POST['price'], 
    'count' => $count + $_POST['count'],
    'gazou_id' => $_POST['gazou_id'],
];
echo '<p class="lead">カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require '../others/footer.php'; ?>
