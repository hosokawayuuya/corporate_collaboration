<?php require '../others/head.php'; ?>
<?php require '../others/header.php'; ?>
<?php require '../others/db-connect.php'; ?>
<form action="index.php" method="post">
商品検索
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>
<?php require '../others/advertise.php'; ?>
<?php
    echo '<table>'; 
    echo '<tr><th>商品番号</th><th>商品名</th><th>キャッチコピー</th><th>商品説明</th><th>商品画像</th><th>カテゴリー</th><th>価格</th>'; 
    $pdo = new PDO($connect, USER, PASS);

if(isset($_POST['keyword'])){
    $sql=$pdo->prepare('select * from Shohin where shohin_name like ?');
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
    echo '<td>','<img alt="image" height="400" src="../image/',$row['gazou_id'],'">','</td>';
    echo '<td>',$row['cate1'],'</td>';
    echo '<td>',$row['price'],'</td>';
    echo '</tr>';
}
echo '</table>';
?>
<div class="theme-setting-wrapper">
    <div id="settings-trigger">
        <i class="typcn typcn-cog-outline"></i>
    </div>
    <div id="theme-settings" class="settings-panel">
    <i class="settings-close typcn typcn-delete-outline"></i>
    <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles primary"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default border"></div>
        </div>
    </div>
</div>
<?php require '../others/footer.php'; ?>