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
        <h2 class="rest">残り〇個</h2>
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
                        <li><?php echo $row['shohin_setu'] ?></li>
                    </ul>
                </p>
            <p>個数</p>
            <div class="mb-3 mb-xl-0 pr-1">
                <div class="dropdown">
                    <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="typcn typcn-calendar-outline mr-2"></i>1
                    </button> 
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start"> 
                    <?php
                    for($i=1;$i<=10;$i++){
                        echo '<option value="',$i,'">',$i,'</option>';
                    }
                    ?>
                    </div> 
                </div>
            </div>
            <br>
            <p>色</p>
            <div class="mb-3 mb-xl-0 pr-1">
                <div class="dropdown">
                    <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="colorDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="typcn typcn-calendar-outline mr-2"></i>選択してください
                    </button> 
                    <div class="dropdown-menu" aria-labelledby="colorDropdown" data-x-placement="top-start"> 
                        <?php
                        // データベースから色の選択肢を取得するクエリ
                        $colors = $pdo->query('SELECT * FROM colors');
                        foreach ($colors as $color) {
                            echo '<a class="dropdown-item" href="#">' . $color['color_name'] . '</a>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
            <br>
            <p>サイズ</p>
            <div class="mb-3 mb-xl-0 pr-1">
                <div class="dropdown">
                    <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="sizeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="typcn typcn-calendar-outline mr-2"></i>選択してください
                    </button> 
                    <div class="dropdown-menu" aria-labelledby="sizeDropdown" data-x-placement="top-start"> 
                        <?php
                        // データベースからサイズの選択肢を取得するクエリ
                        $sizes = $pdo->query('SELECT * FROM sizes');
                        foreach ($sizes as $size) {
                            echo '<a class="dropdown-item" href="#">' . $size['size_name'] . '</a>';
                        }
                        ?>
                    </div> 
                </div>
            </div>
            <!--Cart (G4-1)へ情報を送る　このページでcart[]を作って送る　多分-->
            <button type="button" onclick="location.href='../G4-1/index.php'" class="btn btn-success" >カートへ</button></br>
            <button type="button" onclick="location.href='../G5-1/index.php'"  class="btn btn-primary">購入に進む</button>
            <button type="button" onclick="history.back()" class="btn btn-info">戻る</button>
        </div>
    </div>
    <h1 class="review">レビュー</h1>
    <div class="sum-review">
        <h3>総合:</h3><h3 class="sum-star">4.0★★★★☆</h3>
    </div>
    <hr>
    <div class="user">
        <h4>名前</h4><span class="evaluation">評価：</span><span class="star">5★★★★★</span>
    </div>
    <div class="com">
        <span class="icon">😊</span>
        <span class="comment">冬ロケで使ったけど寒すぎて次の日熱出たわ</br>まじでこれはやばい</span>
    </div>
    <div class="user">
        <h4>名前</h4><span class="evaluation">評価：</span><span class="star">5★★★★★</span>
    </div>
    <div class="com">
        <span class="icon">😊</span>
        <span class="comment">冬ロケで使ったけど寒すぎて次の日熱出たわ</br>まじでこれはやばい</span>
    </div>
<?php }?>

<?php require '../others/footer.php'; ?>