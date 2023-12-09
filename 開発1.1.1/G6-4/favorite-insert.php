<?php
session_start();
require '../others/db-connect.php'; 
$pdo = new PDO($connect, USER, PASS);
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

if(isset($_POST)){

  $user_id = $_POST['user_id'];
  $shohin_id = $_POST['shohin_id'];

  var_dump($_POST);

  //既に登録されているか確認
  if(check_favolite_duplicate( $user_id,$shohin_id)){
    $action = '解除';
    $sql = "DELETE
            FROM favorite
            WHERE user_id = :user_id AND shohin_id = :shohin_id";
  }else{
    $action = '登録';
    $sql = "INSERT INTO favorite(user_id,shohin_id)
            VALUES(:user_id,:shohin_id)";
  }
echo $action;
  try{
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id , ':shohin_id' => $shohin_id));

  } catch (\Exception $e) {
    error_log('エラー発生:' . $e->getMessage());
    echo json_encode("error");
  }
}