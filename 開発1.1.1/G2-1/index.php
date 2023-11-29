<?php require '../others/head.php'; ?>
<form action="../G3-2/Shohin.php" method="post">
商品検索
<input type="text" name="keyword">
<input type="submit" value="検索">
<?php require '../others/header.php'; ?>
</form>
<?php require '../others/advertise.php'; ?>
<?php require '../others/db-connect.php'; ?>
<hr>
<?php
    echo '<table>'; 
    echo '<tr><th>商品番号</th><th>商品名</th><th>商品説明</th><th>商品画像</th><th>カテゴリー</th><th>価格</th>'; 
    $pdo = new PDO($connect, USER, PASS);

if(isset($_POST['keyword'])){
    $sql=$pdo->prepare('select * from Shohin where name like ?');
    $sql->execute(['%'.$_POST['keyword'].'%']);
}else{
    $sql=$pdo->query('select * from Shohin');
}
foreach($sql as $row){
    $id=$row['shohin_id'];
    echo '<tr>'; 
    echo '<td>',$id,'</td>';
    echo '<td>';
    echo '<a href="../G3-2/Shohin.php?shohin_id=',$id,'">',$row['shohin_name'],'</a>';
    echo '</td>';
    echo '<td>',$row['shohin_catch'],'</td>';
    echo '<td>',$row['shohin_setu'],'</td>';
    echo '<td>',$row['gazou_id'],'</td>';
    echo '<td>',$row['cate1'],'</td>';
    echo '<td>',$row['price'],'</td>';
    echo '</tr>';
}
echo '</table>';
?>
<?php require '../others/footer.php'; ?>