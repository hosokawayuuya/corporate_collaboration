<?php session_start();?>
<?php require '../others/head.php';?>
<?php require '../others/header.php';?>
<?php require '../others/db-connect.php'; ?>
<?php
if(isset($_SESSION['User'])){
    echo '<p>','お名前：', $_SESSION['User']['private_name'],'</p>';
    echo '<p>','住所：', $_SESSION['User']['address1'],'</p>';
    echo '<p>','支払方法：', $_SESSION['User']['settlement'],'</p>';
    echo '内容をご確認いただき、購入を確定してください。';
    echo '<a href="../G6-3/changemyInfo.php" class="btn btn-info">変更する</a>';
    echo '<form action="../G5-2/confirm-cart.php" method="post">
        <button type="submit" class="btn btn-primary">購入を確定する</button>
    </form>';
    require '../G4-1/cart.php';
}else{
    echo '商品を購入するには、ログインしてください。';
    echo '<a href="../G1-1/login-input.php">ログインする</a>';
}

?>
<?php require '../others/footer.php';?>