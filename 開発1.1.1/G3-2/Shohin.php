<?php session_start(); ?>
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
        <h1 class="card-text"><?php echo $row['shohin_catch'] ?></h1>
    </div>

    <div class="itemlist">
        <div class="item-left">
            <img src="../image/<?php echo $row['gazou_id'] ?>" class="card-img-top" alt="商品の画像" style="width: 400px;">
        </div>

        <div class="item-right" >
            <h1 class="name"><?php echo $row['shohin_name'] ?></h1>
            <h3 class="category"><i>#<?php echo $row['cate1'] ?> #<?php echo $row['cate2'] ?>#<?php echo $row['cate3'] ?></i></h3>
            <h1><b><?php echo $row['price'] ?>円</b></h1>
            <ul><h3 class="setu">
                    <?php echo $row['shohin_setu'] ?></h3>
                </ul>
            
            <form action="../G4-1/cart-insert.php" method="post">
                <div class="d-flex align-items-center mb-3">
                    <?php
                        echo '<h3>個数：</h3><select class="btn-warning dropdown-toggle" name="count">';
                        for($i=1;$i<=10;$i++){
                            echo '<option value="',$i,'">',$i,'</option>';
                        }
                        echo '</select>';
                    ?>
                    
                    <?php
                        echo '<input type="hidden" name="shohin_id" value="',$row['shohin_id'],'">';
                        echo '<input type="hidden" name="shohin_name" value="',$row['shohin_name'],'">';
                        echo '<input type="hidden" name="gazou_id" value="',$row['gazou_id'],'">';
                        echo '<input type="hidden" name="price" value="',$row['price'],'">';
                    ?>
                    <br>
                    </div>
                    <div>
                    <button type="submit" class="btn btn-success me-2" style='font-family: fantasy;'>カートに入れる</button>
                </div>
            </form>
            <button type="submit" onclick="location.href='../G5-1/purchace-single.php?shohin_id=<?php echo $row['shohin_id']; ?>'" class="btn btn-primary">購入に進む</button>
            <br><button type="button" onclick="history.back()" class="btn btn-info">戻る</button>
        </div>
    </div>
<?php }?>
<?php require '../others/footer.php'; ?>