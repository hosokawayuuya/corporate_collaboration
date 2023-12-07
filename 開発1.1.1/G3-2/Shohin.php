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
            
            <form action="../G4-1/cart-insert.php" method="post">
                <div class="d-flex align-items-center mb-3">
                    <?php
                        echo '個数：<select name="count">';
                        for($i=1;$i<=10;$i++){
                            echo '<option value="',$i,'">',$i,'</option>';
                        }
                        echo '</select>';
                    ?>
                    <p class="mb-0">色:
                        <select name="color" class="form-select mb-3 mb-xl-0 pr-1">
                            <option value="黒">黒</option>
                            <option value="白">白</option>
                            <option value="赤">赤</option>
                            <option value="青">青</option>
                            <option value="ベージュ">ベージュ</option>
                            <option value="茶色">茶色</option>
                            <option value="グレー">グレー</option>
                        </select>
                    </p>
                    <p class="mb-0">サイズ:
                        <select name="size" class="form-select mb-3 mb-xl-0 pr-1">
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                    </p>
                    <?php
                        echo '<input type="hidden" name="shohin_id" value="',$row['shohin_id'],'">';
                        echo '<input type="hidden" name="shohin_name" value="',$row['shohin_name'],'">';
                        echo '<input type="hidden" name="gazou_id" value="',$row['gazou_id'],'">';
                        echo '<input type="hidden" name="price" value="',$row['price'],'">';
                    ?>
                    <button type="submit" class="btn btn-success me-2">カートへ</button>
                </div>
            </form>
			<button type="button" onclick="location.href='../G5-1/purchace.php'"  class="btn btn-primary">購入に進む</button>
            <button type="button" onclick="history.back()" class="btn btn-info">戻る</button>
        </div>
    </div>
<?php }?>
<?php require '../others/footer.php'; ?>