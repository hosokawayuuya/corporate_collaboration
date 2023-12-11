<?php session_start();?>
<?php require '../others/head.php';?>
<?php require '../others/header.php';?>
<?php require '../others/db-connect.php'; ?>
<div class="text-center">
<?php
if(isset($_SESSION['User'])){
    echo '<p class="lead">','お名前：', $_SESSION['User']['private_name'],'</p>';
    echo '<p class="lead">','住所：', $_SESSION['User']['address1'],'</p>';
    echo '<p class="lead">','支払方法：', $_SESSION['User']['settlement'],'</p>';
    echo '<p class="lead">内容をご確認いただき、購入を確定してください。</p>';
    if(isset($_GET['shohin_id'])){
        $pdo = new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('select * from Shohin where shohin_id=?');
        $sql->execute([$_GET['shohin_id']]);
    ?>
    <?php foreach($sql as $row){ ?>
    <div class="itemlist">
        <div class="item-left">
            <img src="../image/<?php echo $row['gazou_id'] ?>" class="card-img-top" alt="商品の画像" style="width: 400px;">
        </div>
        <div class="item-right">
        <h3 class="card-text font-weight-bold">商品名：<?php echo $row['shohin_name'] ?></h3><br><br>
        <h3 class="card-text font-weight-bold">個数：<?php echo $row['count']?></h3><br><br>;
        <h3 class="card-text font-weight-bold">金額：<?php echo $row['price'] ?>円</h3><br><br>
        </div>
    </div>
    <form action="../G5-2/confirm-single.php" method="post">
        <input type="hidden" name="shohin_id" value="<?php echo $row['shohin_id']; ?>">
        <input type="hidden" name="shohin_name" value="<?php echo $row['shohin_name']; ?>">
        <input type="hidden" name="gazou_id" value="<?php echo $row['gazou_id']; ?>">
        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
        <a href="../G6-3/changemyInfo.php" class="btn btn-info">変更する</a>
        <button type="submit" class="btn btn-primary">購入を確定する</button>
    </form>
    </div>
    <?php }
    }
}else{
    echo '<span class="lead">商品を購入するには、ログインしてください。</span>';
    echo '<a href="../G1-1/login-input.php" class="lead">ログインする</a>';
}
?>
<?php require '../others/footer.php';?>