<?php require '../others/head.php'; ?>
<?php require '../others/header.php'; ?>
<?php require '../others/db-connect.php'; ?>
<?php
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
            <button id="hart" class="hart">&#10084;</button>
        </div>

        <div class="item-right">
            <h2 class="name"><?php echo $row['shohin_name'] ?></h2>
            <h5 class="category"><i>#<?php echo $row['cate1'] ?> #<?php echo $row['cate2'] ?>#<?php echo $row['cate3'] ?></i></h5>
            <h4><b><?php echo $row['price'] ?>円</b></h4>
            <p>
                <ul>
                    <?php echo $row['shohin_setu'] ?>
                </ul>
            </p>
            
            <form action="../G4-1/cart-insert.php" method="post">;
            <?php
                echo '<p>個数：<select name="count">';
                for($i=1;$i<=10;$i++){
                    echo '<option value="',$i,'">',$i,'</option>';
                }
                echo '</select>';
            ?>
            <?php
                echo '<p><input type="submit" class="btn btn-success value="カートに追加"></p>';
                echo '</form>';
                echo '<p><a href="favorite-insert.php?shohin_id=',$row['shohin_id'],
                    '">お気に入りに追加</a></p>';
            ?>
        </div>
    </div>
<?php }?>
<!--Cart (G4-1)へ情報を送る　このページでcart[]を作って送る　多分-->
<button type="button" onclick="location.href='../G4-1/index.php'" class="btn btn-success" >カートへ</button></br>
<button type="button" onclick="location.href='../G5-1/index.php'"  class="btn btn-primary">購入に進む</button>
<button type="button" onclick="history.back()" class="btn btn-info">戻る</button>
<?php require '../others/footer.php'; ?>