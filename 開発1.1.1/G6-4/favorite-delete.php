<?php session_start();?>
<?php require '../others/head.php';?>
<?php require '../others/header.php';?>
<?php require '../others/db-connect.php'; ?>
<?php
if (isset($_SESSION['User'])) {
$pdo = new PDO($connect, USER, PASS);
$sql=$pdo->prepare('delete from favorite where user_id=? and shohin_id=?');
 $sql->execute([$_SESSION['User'] ['user_id'], $_GET['shohin_?id']]);
echo 'お気に入りから商品を削除しました。';
echo '<hr>';
} else{
    unset($_SESSION['Shohin'][$_GET['shohin_id']]);
echo '気に入りから商品を削除しました。';
echo '<hr>';
}
require 'favorite.php';
?>
<?php require '../others/footer.php'; ?>