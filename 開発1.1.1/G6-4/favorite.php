<?php
if (isset($_SESSION['User'])) {
echo '<table>';
echo '<tr><th>商品番号</th><th>商品名</th>'; 
echo '<th>価格</th><th></th></tr>';
$pdo = new PDO($connect, USER, PASS);
$sql=$pdo->prepare(
'select * from Hart, Shohin '.'where user_id=? and shohin_id=shohin_id');
$sql->execute([$_SESSION['User']['user_id']]);
foreach ($sql as $row) { 
    $id=$row['shohin_id'];
    echo '<tr>';
    echo '<td>', $id, '</td>';
    echo '<td><a href="detail.php?shohin_id='.$id. '">', $row['shohin_name'],
    '</a></td>';
    echo '<td>', $row['price'], '</td>'; echo '<td><a href="favorite-delete.php?shohin_id=', $id,'">削除</a></td>';
    echo '</tr>';
} echo '</table>';
} else {
    echo 'お気に入りに商品がありません。';
    }
?>
