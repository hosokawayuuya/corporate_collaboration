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
    $id = $_POST['shohin_id'];

    if (!isset($_SESSION['Shohin'])) {
        $_SESSION['Shohin'] = [];
    }
    
    $count = 0;
    
    if (isset($_SESSION['Shohin'][$id])) {
        $count = $_SESSION['Shohin'][$id];
    }
    
    $_SESSION['Shohin'][$id] = [
        'shohin_name' => $_POST['shohin_name'],
        'price' => $_POST['price'],
    ];
    
    echo '<p>お気に入りに商品を追加しました。</p>';
    echo '<hr>';
    require 'favorite.php';
}
?>
<?php require 'footer.php'; ?>