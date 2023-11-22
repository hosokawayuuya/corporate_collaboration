<?php
if (!empty($_SESSION['product'])) {
    echo '<table>';
    echo '<tr><th>個数</th><th>商品名</th><th>価格</th><th>数量</th><th>小計</th><th></th></tr>';
    $total = 0;
    foreach ($_SESSION['product'] as $id => $product) {
        echo '<tr>';
        echo '<td>', $id, '</td>';
        echo '<td><a href="detail.php?id=', $id, '">', $product['name'], '</a></td>';
        echo '<td>', $product['price'], '</td>';
        echo '<td>', $product['count'], '</td>';
        $subtotal = $product['price'] * $product['count'];
        echo '<td>', $subtotal, '</td>';
        echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>'; 
        echo '</tr>';
        $total += $subtotal; 
    }
    echo '<tr><td>合計</td><td>', $total, '</td><td></td></tr>';
    echo '</table>';
} else {
    echo 'カートに商品がありません。';
}
