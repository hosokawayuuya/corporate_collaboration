<?php session_start(); ?>
<?php require '../others/head.php';?>
<?php require '../others/header.php';?>
<?php require '../others/db-connect.php'; ?>
<?php
$id = $_POST['id']; 
if (!isset($_SESSION['product'])) {
    $_SESSION['product'] = []; 
}
$count = 0;
if (isset($_SESSION['product'][$id])) {
    $count = $_SESSION['product'][$id]['count']; 
}
$_SESSION['product'][$id] = [
    'name' => $_POST['name'], 
    'price' => $_POST['price'], 
    'count' => $count + $_POST['count']
];
echo '<p>カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require 'footer.php'; ?>
