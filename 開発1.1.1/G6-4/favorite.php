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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(function() {
        var $favorite = $('.hart'), //お気に入りボタンセレクタ
        productId;

        //var userID = <?php echo isset($_SESSION['User']['user_id']) ? $_SESSION['User']['user_id'] : 0; ?>;
        $favorite.on('click',function(e){

            userID = $favorite.data('user'); 
            console.log("userID=" + userID);
            if( userID == 0 ){
                alert("ログインしてください");
                exit();
            }
            //カスタム属性（postid）に格納された投稿ID取得
            productId = $(this).parents('.choice-list').data('postid'); 
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
                    data: {shohin_id: productId, user_id: userID},
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
                    <div class="example choice-list" data-postid="<?php echo $row['shohin_id'] ?>">
                        <a href="../G3-2/Shohin.php?shohin_id= <?php echo $row['shohin_id'] ?>">
                            <img src="../image/<?php echo $row['gazou_id'] ?>" class="card-img-top" alt="商品の画像">
                        </a>
                        <?php $user_id = isset($_SESSION['User']['user_id']) ? $_SESSION['User']['user_id'] : 0; ?>
                        <?php  echo '<button data-user="', $user_id, '" data-id="', $id, '" class="hart';
                        
                        if( isset($_SESSION['User']['user_id']) && check_favolite_duplicate($user_id,$id)>0 ){
                            echo ' is-checked';
                        }
                        
                        echo '">&#10084;</button>';
                        ?>
                    </div>
                    <?php $user_id = isset($_SESSION['User']['user_id']) ? $_SESSION['User']['user_id'] : 0; ?>             
                        
                    <div class="card-body">
                        <h4 class="category"><i>#<?php echo $row['cate1'] ?> #<?php echo $row['cate2'] ?>#<?php echo $row['cate3'] ?></i></h4>
                        <h1><?php echo $row['shohin_name'] ?></h3>
                        <p class="lead"><?php echo $row['shohin_setu'] ?></p>
                        <h1><?php echo $row['price'] ?>円</h3>
                    </div>
                </div>
            </div>
        <?php }
    }else{
        echo '<span class="lead">お気に入りに登録するには、ログインしてください。</span>';
        echo '<a href="../G1-1/login-input.php" class="lead">ログインする</a>';
        }
        ?>
    </div>
</div>
<?php require '../others/footer.php'; ?>

<?php
//ユーザーIDと商品IDを元にお気に入り値の重複チェックを行っています
function check_favolite_duplicate($user_id, $shohin_id){
    global $pdo;
    //$user_id = isset($_SESSION['User']['user_id']) ? $_SESSION['User']['user_id'] : 0; 
    if( $user_id == 0 ) return false;
    $sql = "SELECT *
            FROM favorite
            WHERE user_id = :user_id AND shohin_id = :shohin_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id ,
                         ':shohin_id' => $shohin_id));
    $favorite = $stmt->fetch();
    if( $favorite == null ) return false;
    else return true;
    //return $favorite;
}
?>