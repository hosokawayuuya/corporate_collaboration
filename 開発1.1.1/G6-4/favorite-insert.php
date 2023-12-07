<?php require '../others/head.php'; ?>
<?php require '../others/header.php'; ?>
<?php require '../others/db-connect.php'; ?>
<?php
if (isset($_SESSION['User'])){
$pdo = new PDO($connect, USER, PASS);
$sql=$pdo->prepare('insert into favorite values(?,?)');
$sql->execute([$_SESSION['User']['user_id'], $_GET['user_id']]);
echo 'お気に入りに商品を追加しました。';
echo '<hr>';
require 'favorite.php';
}else{
    echo 'お気に入りに登録するにはログインする必要があります。';
}
?>
<?php require 'footer.php'; ?>