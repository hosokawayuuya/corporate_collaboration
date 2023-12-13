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
    if (!empty($_SESSION['Shohin'])) {
        $total = 0;
        echo '<table width="600">';
        $isFirstItem = true;
        foreach ($_SESSION['Shohin'] as $shohin_id => $Shohin) {
            if (!$isFirstItem) {
                echo '<tr><td colspan="5">&nbsp;</td></tr>'; // 商品の間に余白を入れる
            } else {
                $isFirstItem = false; // 最初の商品フラグをfalseに設定する
            }
            echo '<tr>';
            echo '<td><a href="../G3-2/Shohin.php?shohin_id=' . $shohin_id . '"><img src="../image/' . $Shohin['gazou_id'] . '" width="300"></a></td>';
            echo '<td>&nbsp;</td>';
            echo '<td>';
            echo '<h3 class="card-text font-weight-bold">商品名:' . $Shohin['shohin_name'] . '</h3><br><br>';
            echo '<h3 class="card-text font-weight-bold">個数:' . $Shohin['count'] . '</h3><br><br>';
            $subtotal = $Shohin['price'] * $Shohin['count'];
            echo '<h3 class="card-text font-weight-bold">金額:￥' . $Shohin['price'] . '円</h3><br><br>';
            echo '</td>';
            echo '<td>&nbsp;&nbsp;</td>';
            echo '<td>&nbsp;&nbsp;</td>';
            echo '</tr>';
            $total += $subtotal;
        }
        echo '</table>';
        ?>
            <br>
            <h3 class="card-text1 font-weight-bold">合計:￥<?php echo $total ?>円</h3><br>
        <br><a href="../G6-3/changemyInfo.php" class="btn btn-info">変更する</a>
        <form action="../G5-2/confirm-cart.php" method="post">
            <button type="submit" class="btn btn-primary">購入を確定する</button>
        </form>
        </div>
    <?php
    } else {
        echo '<p class="lead">カートに商品がありません。</p>';
    }

    
}else{
    echo '<span class="lead">商品を購入するには、ログインしてください。</span>';
    echo '<a href="../G1-1/login-input.php" class="lead">ログインする</a>';
}

?>
<?php require '../others/footer.php';?>