<?php require '../others/db-connect.php'; ?>
<style>
    .my-4{
    font-family:  cursive; 
}

.card-text{
    color: transparent;
    background-color : black;
    text-shadow : rgba(255,255,255,0.5) 0 5px 6px, rgba(255,255,255,0.2) 1px 3px 3px;
    -webkit-background-clip : text;
}
.hart.is-checked {
  font-size: 20px;
  color: red;
}
</style>
<?php
if(isset($_SESSION['User'])){
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('SELECT * FROM 
    favorite, Shohin'.' WHERE user_id=? AND 
    favorite.shohin_id=Shohin.shohin_id');
    $sql->execute([$_SESSION['User']['user_id']]);
?>
<div class="container">
    <h1 class="my-4">お気に入り</h1>
    <div class="row">
        <?php foreach($sql as $row){
        $id=$row['shohin_id']; ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <h1 class="card-text"><?php echo $row['shohin_catch'] ?></h1>
                    <div class="example">
                        <a href="../G3-2/Shohin.php?shohin_id= <?php echo $row['shohin_id'] ?>">
                            <img src="../image/<?php echo $row['gazou_id'] ?>" class="card-img-top" alt="商品の画像">
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="category"><i>#<?php echo $row['cate1'] ?> #<?php echo $row['cate2'] ?>#<?php echo $row['cate3'] ?></i></h4>
                        <h3 class="card-title"><?php echo $row['shohin_name'] ?></h3>
                        <p class="card-text"><?php echo $row['shohin_setu'] ?></p>
                        <h3 class="card-text font-weight-bold"><?php echo $row['price'] ?>円</h3>
                    </div>
                </div>
            </div>
        <?php }
    }else{
        echo 'お気に入りを表示するには、ログインしてください。';
    }
        ?>
    </div>
</div>
<?php require '../others/footer.php'; ?>