<?php require '../others/head.php'; ?>
<?php require '../others/header.php'; ?>
<?php require '../others/db-connect.php'; ?>
<form action="index.php" method="post">
<input type="text" name="keyword" class="form-control" placeholder="AsoCityで検索">
<input type="submit" value="検索" class="btn btn-sm btn-primary">
</form>
<style>
form{
  text-align: left;
}
.checkbox {
  text-align: left;
  float: left;
  width: 30px;
  height: 30px;
  cursor: pointer;
  -moz-border-radius: 100px;
  -webkit-border-radius: 100px;
  border-radius: 100px;
  display: block;
  background-color:rgb(247, 229, 239);
  margin: 0;
  -moz-transition: all 0.15s cubic-bezier(0.5, 0, 0, 1.5);
  -o-transition: all 0.15s cubic-bezier(0.5, 0, 0, 1.5);
  -webkit-transition: all 0.15s cubic-bezier(0.5, 0, 0, 1.5);
  transition: all 0.15s cubic-bezier(0.5, 0, 0, 1.5);
}
 
.checkbox:hover {
  background-color:rgb(247, 229, 239);
}
 
.checkbox:hover:after {
  color: red;/*チェック前マウス*/
}
 
.checkbox:after {
  line-height: 30px;
  font-family: "FontAwesome";
  display: block;
  content: "\f004"; /* ハートアイコン */
  color: rgba(255, 255, 255, 0.5);/*チェック前ハートの中*/
  text-align: center;
  width: 100%;
  height: 100%;
  -moz-transform: scale(0.5);
  -ms-transform: scale(0.5);
  -webkit-transform: scale(0.5);
  transform: scale(0.5);
  -moz-border-radius: 100%;
  -webkit-border-radius: 100%;
  border-radius: 100%;
  font-size: 10px;
  -moz-transition: all 0.15s cubic-bezier(0.5, 0, 0, 1.5), font-size 0.35s cubic-bezier(0.5, 0, 0, 3);
  -o-transition: all 0.15s cubic-bezier(0.5, 0, 0, 1.5), font-size 0.35s cubic-bezier(0.5, 0, 0, 3);
  -webkit-transition: all 0.15s cubic-bezier(0.5, 0, 0, 1.5), font-size 0.35s cubic-bezier(0.5, 0, 0, 3);
  transition: all 0.15s cubic-bezier(0.5, 0, 0, 1.5), font-size 0.35s cubic-bezier(0.5, 0, 0, 3);
}
 
.checkbox.is-checked:after {
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -webkit-transform: scale(1);
  transform: scale(1);
  font-size: 20px;
  color: red;
}
 
.checkbox.is-checked:hover:after {
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="../../others/script/favorite.js"></script>
<?php require '../others/advertise.php'; ?>
<?php
    echo '<table>'; 
    echo '<tr><th>商品番号</th><th>商品名</th><th>キャッチコピー</th><th>商品説明</th><th>商品画像</th><th>カテゴリー</th><th>価格</th><th>お気に入り</th>'; 
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
    echo '<td><div class="checkbox heart" data-postid="', $id, '">お気に入り</div></td>';
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




<?php require '../others/head.php'; ?>
<?php require '../others/header.php'; ?>
<?php require '../others/db-connect.php'; ?>
<div class="col-md-6">
    <form action="index.php" method="post" class="form-inline">
        <div class="form-group">
            <input type="text" name="keyword" class="form-control mr-2" placeholder="AsoCityで検索">
            <input type="submit" value="検索" class="btn btn-sm btn-primary">
        </div>
    </form>
    
</div>
<?php require '../others/advertise.php'; ?>
<?php
$pdo = new PDO($connect, USER, PASS);

if(isset($_POST['keyword'])){
    $sql=$pdo->prepare('select * from Shohin where shohin_name like ?');
    $sql->execute(['%'.$_POST['keyword'].'%']);
}else{
    $sql=$pdo->query('select * from Shohin');
}
$products = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h1 class="my-4">商品一覧</h1>
    <?php if (empty($products)) : ?>
        <p><h2>該当する商品がありません。</h2></p>
    <?php else : ?>
    <div class="row">
        <?php foreach($products as $row){
        $id=$row['shohin_id']; ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <h1 class="card-text"><?php echo $row['shohin_catch'] ?></h1>
                    <div class="example">
                        <a href="../G3-2/Shohin.php?shohin_id= <?php echo $row['shohin_id'] ?>">
                            <img src="../image/<?php echo $row['gazou_id'] ?>" class="card-img-top" alt="商品の画像">
                        </a>
                        <td><div class="checkbox heart" data-postid="', $id, '">お気に入り</div></td>';
                    </div>
                    <div class="card-body">
                        <h5 class="category"><i>#<?php echo $row['cate1'] ?> #<?php echo $row['cate2'] ?>#<?php echo $row['cate3'] ?></i></h5>
                        <h5 class="card-title"><?php echo $row['shohin_name'] ?></h5>
                        <p class="card-text"><?php echo $row['shohin_setu'] ?></p>
                        <p class="card-text font-weight-bold">評価</p>
                        <p class="card-text font-weight-bold"><?php echo $row['price'] ?>円</p>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
    <?php endif; ?>
</div>
<?php require '../others/footer.php'; ?>