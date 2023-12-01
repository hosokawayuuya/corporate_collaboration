<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php require 'db-connect.php';?>
<?php
if (isset($_SESSION['User'])){
$pdo = new PDO($connect, USER, PASS);
$sql=$pdo->prepare('insert into Hart values(?,?)');
$sql->execute([$_SESSION['User']['user_id'], $_GET['shohin_id']]);
echo 'お気に入りに商品を追加しました。';
echo '<hr>';
require 'favorite.php';
}else{
    $shohin_id = $_POST['shohin_id']; 
    if (!isset($_SESSION['Shohin'])) {
        $_SESSION['Shohin'] = []; 
    }
    $count = 0;
    if (isset($_SESSION['Shohin'][$shohin_id])) {; 
    }
    $_SESSION['Shohin'][$shohin_id] = [
        'name' => $_POST['shohin_name'], 
        'price' => $_POST['price']
    ];
    require 'index.php';
}
?>
<?php require 'footer.php'; ?>
