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
    if(isset($_GET['shohin_id'])){
        $pdo = new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('select * from Shohin where shohin_id=?');
        $sql->execute([$_GET['shohin_id']]);
    ?>
    <?php foreach($sql as $row){ ?>
    <div class="item-head">
        <h1 class="catchpharase"><?php echo $row['shohin_catch'] ?></h1>
    </div>

    <div class="itemlist">
        <div class="item-left">
            <img src="../image/<?php echo $row['gazou_id'] ?>" class="card-img-top" alt="商品の画像" style="width: 400px;">
        </div>
        <div class="item-right">
            <h2 class="name"><?php echo $row['shohin_name'] ?></h2>
            <h5 class="category"><i>#<?php echo $row['cate1'] ?> #<?php echo $row['cate2'] ?>#<?php echo $row['cate3'] ?></i></h5>
            <h4><b><?php echo $row['price'] ?>円</b></h4>
        </div>
    </div>
    <form action="../G5-2/confirm-single.php" method="post">
        <input type="hidden" name="shohin_id" value="<?php echo $row['shohin_id']; ?>">
        <input type="hidden" name="shohin_name" value="<?php echo $row['shohin_name']; ?>">
        <input type="hidden" name="gazou_id" value="<?php echo $row['gazou_id']; ?>">
        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
        <button type="submit" class="btn btn-primary">購入を確定する</button>
    </form>
    <?php }
    }
}else{
    echo '<span class="lead">商品を購入するには、ログインしてください。</span>';
    echo '<a href="../G1-1/login-input.php" class="lead">ログインする</a>';
}
?>
<?php require '../others/footer.php';?>