<div class="row">
    <div class="col-md-4 offset-md-4 mb-4">
        <?php
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
                echo '<p class="card-text font-weight-bold">商品名:' . $Shohin['shohin_name'] . '</p><br><br>';
                echo '<p class="card-text font-weight-bold">個数:' . $Shohin['count'] . '</p><br><br>';
        ?>
            <?php
                $subtotal = $Shohin['price'] * $Shohin['count'];
                echo '<p class="card-text font-weight-bold">金額:￥' . $Shohin['price'] . '円</p><br><br>';
                echo '</td>';
                echo '<td>&nbsp;&nbsp;</td>';
                echo '<td><a href="cart-delete.php?shohin_id=' . $shohin_id . '" class="btn btn-light btn-rounded btn-fw">削除</a></td>';
                echo '<td>&nbsp;&nbsp;</td>';
                echo '</tr>';
                $total += $subtotal;
            }
            echo '</table>';
            ?>
            <div class="text-center">
                <br>
                <p class="card-text1 font-weight-bold">合計:￥<?php echo $total ?>円</p><br>
                <div class="define">
                <button type="submit" onclick="location.href='../G5-1/purchace-input.php'"  class="btn btn-primary">購入に進む</button>
                </div>
            </div>
        <?php
        } else {
            echo '<p>カートに商品がありません。</p>';
        }
        ?>
    </div>
</div>