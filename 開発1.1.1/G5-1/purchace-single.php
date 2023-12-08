<?php session_start();?>
<?php require 'header.php';?>
<?php require 'menu.php';?>
<?php require 'db-connect.php'; ?>
<?php
if(isset($_SESSION['customer'])){
    $pdo = new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into purchace values($_SESSION['customer'])');
    $sql=$pdo->prepare('insert into purchace-detail values(?,?,?)');
    $sql->execute([$_SESSION['purchace']['id'],$_GET['id'],$_GET['count']]);
    echo '購入手続きが完了しました。ありがとうございます。';
    echo '<hr>';
    require 'purchace.php';
}else{
    echo 'お気に入りに商品を追加するには、ログインしてください。。';
}
?>
<?php require 'footer.php';?>