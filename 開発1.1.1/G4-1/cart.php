<div class="row">
    <div class="col-md-4 offset-md-4 mb-4">
        <?php
        if (!empty($_SESSION['Shohin'])) {
            $total = 0;
            echo '<table>';
            foreach ($_SESSION['Shohin'] as $shohin_id => $Shohin) {
                echo '<tr>';
                echo '<td><a href="../G3-2/Shohin.php?shohin_id=' . $shohin_id . '"><img src="../image/' . $Shohin['gazou_id'] . '" width="250"></a></td>';
                echo '<td>&nbsp;</td>';
                echo '<td>';
                ?>
                <p class="card-text font-weight-bold">個数</p>
                <select name="count">
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        echo '<option value="' . $i . '"';
                        if ($i == $Shohin['count']) {
                            echo ' selected';
                        }
                        echo '>' . $i . '</option>';
                    }
                    ?>
                </select>
                <?php
                echo '</td>';
                echo '<td>&nbsp;</td>';
                $subtotal = $Shohin['price'] * $Shohin['count'];
                echo '<td><a href="cart-delete.php?shohin_id=' . $shohin_id . '" class="btn btn-light btn-rounded btn-fw">削除</a></td>';
                echo '</tr>';
                $total += $subtotal;
                echo '<tr><td colspan="5"><p class="card-text font-weight-bold">金額:￥' . $subtotal . '円</p><br><br></td></tr>';
            }
            echo '</table>';
            ?>
            <p class="card-text1 font-weight-bold">合計:￥<?php echo $total ?></p><br>
        <?php
        } else {
            echo '<p class="card-text">カートに商品がありません。</p>';
        }
        ?>
        <div class="define">
            <button type="button" class="btn btn-light btn-rounded btn-fw" onclick="history.back()">戻る</button>
            <a href="../G5-1/index.php"><button type="button" class="btn btn-light btn-rounded btn-fw">購入へ</button></a>
        </div>
    </div>
</div>