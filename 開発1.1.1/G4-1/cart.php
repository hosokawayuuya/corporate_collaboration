<?php
if (!empty($_SESSION['Shohin'])) {
    echo '<br>','<br>','<br>','<br>';
    echo '<table>';
    echo '<tr><th>個数</th><th>商品名</th><th>価格</th><th>数量</th><th>小計</th><th></th></tr>';
    $total = 0;
    foreach ($_SESSION['Shohin'] as $id => $Shohin) {
        echo '<tr>';
        echo '<td>', $id, '</td>';
        echo '<td><a href="../G3-2/Shohin.php?shohin_id=', $id, '">', $Shohin['shohin_name'], '</a></td>';
        echo '<td>', $Shohin['price'], '</td>';
        echo '<td>', $Shohin['count'], '</td>';
        $subtotal = $Shohin['price'] * $Shohin['count'];
        echo '<td>', $subtotal, '</td>';
        echo '<td><a href="cart-delete.php?shohin_id=', $id, '">削除</a></td>'; 
        echo '</tr>';
        $total += $subtotal; 
    }
    echo '<tr><td>合計</td><td>', $total, '</td><td></td></tr>';
    echo '</table>';
} else {
    echo 'カートに商品がありません。';
}
