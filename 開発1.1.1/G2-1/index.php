<?php session_start();?>
<?php require '../others/head.php'; ?>
<?php require '../others/header.php'; ?>
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
  font-size: 30px;
  color: red;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(function() {
        var $favorite = $('.hart'), //お気に入りボタンセレクタ
        productId;
        $favorite.on('click',function(e){
            userID = $favorite.data('user'); 
            console.log("userID=" + userID);
            if( userID == 0 ){
                alert("ログインしてください");
                exit();
            }
            //カスタム属性（postid）に格納された投稿ID取得
            productId =  $favorite.data('postid'); 
            console.log("ID=" + productId);
            if (!$(this).hasClass("is-checked")) {
                console.log("クリック前の処理");
                }
            $(this).toggleClass("is-checked");
            if ($(this).hasClass("is-checked")) {
                console.log("クリック後の処理");
            }
            $.ajax({
                    type: "POST",
                    url: "../G6-4/favorite-insert.php",
                    data: {product_id: productId, user_id: userID},
                    success: function(response) {
                        // レスポンスを処理する（必要に応じて）
                        console.log(response);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
                
                
        });
    });
</script>
<div class="col-md-6">
    <form action="index.php" method="post" class="form-inline">
        <div class="form-group">
            <input type="text" name="keyword" class="form-control mr-2" placeholder="AsoCityで検索">
            <input type="submit" value="検索" class="btn btn-sm btn-primary">
        </div>
        <?php
        $pdo = new PDO($connect, USER, PASS);

        if(isset($_SESSION['User']['user_name'])){
            echo '<div style="margin-left: 50px;">' . $_SESSION['User']['user_name'] . 'さん、ようこそ！</div>';
        } else {
            echo '<div style="margin-left: 50px;">ゲストさん、ようこそ！</div>';
        }
        ?>
    </form>
</div>
<?php
require '../others/advertise.php';
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
                        <?php $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:0 ?>             
                        <?php  echo '<button data-postid="', $id, '" data-user="', $user_id, '" id="hart" class="hart';
                        if( isset($_SESSION['user_id']) && check_favolite_duplicate($user_id,$id) ){
                            echo ' is-checked';
                        }
                        echo '">&#10084;</button>';
                        ?>
                        
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

<?php
//ユーザーIDと商品IDを元にお気に入り値の重複チェックを行っています
function check_favolite_duplicate($user_id,$shohin_id){
    global $pdo;
    $sql = "SELECT *
            FROM favorite
            WHERE user_id = :user_id AND shohin_id = :shohin_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id ,
                         ':shohin_id' => $shohin_id));
    $favorite = $stmt->fetch();
    return $favorite;
}
?>