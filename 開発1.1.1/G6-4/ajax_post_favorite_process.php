<script src=" https://code.jquery.com/jquery-3.4.1.min.js "></script>
<script src="./js/user_page.js"></script>
<?php
session_start();
session_regenerate_id(true);
require_once('config.php');

function check_favolite_duplicate($user_id,$post_id){
    $dsn='mysql:dbname=db;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh=new PDO($dsn,$user,$password);
    $sql = "SELECT *
            FROM favorite
            WHERE user_id = :user_id AND shohin_id = :shohin_id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id ,
                         ':shohin_id' => $shohin_id));
    $favorite = $stmt->fetch();
    return $favorite;
}

if(isset($_POST)){

  $current_user = get_user($_SESSION['user_id']);
  $shohin_id = $_POST['shohin_id'];

  $profile_user_id = $_POST['shohin_id'] ?: $current_user['user_id'];

  //既に登録されているか確認
  if(check_favolite_duplicate($current_user['user_id'],$shohin_id)){
    $action = '解除';
    $sql = "DELETE
            FROM favorite
            WHERE :user_id = user_id AND :shohn_id = shohin_id";
  }else{
    $action = '登録';
    $sql = "INSERT INTO favorite(user_id,shohin_id)
            VALUES(:user_id,:shohin_id)";
  }

  try{
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh=new PDO($dsn,$user,$password);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':user_id' => $current_user['code'] , ':shohin_id' => $shohin_id));

  } catch (\Exception $e) {
    error_log('エラー発生:' . $e->getMessage());
    set_flash('error',ERR_MSG1);
    echo json_encode("error");
  }
}