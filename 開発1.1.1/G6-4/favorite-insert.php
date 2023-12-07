<?php
session_start();
require 'db-connect.php';
function check_favolite_duplicate($customer_id,$product_id){
  global $pdo;

    $sql = "SELECT *
            FROM favorite
            WHERE customer_id = :customer_id AND product_id = :product_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':customer_id' => $customer_id ,
                         ':product_id' => $product_id));
    $favorite = $stmt->fetch();
    return $favorite;
}

if(isset($_POST)){

  $user_id = $_POST['user_id'];
  $product_id = $_POST['product_id'];

  var_dump($_POST);

  //既に登録されているか確認
  if(check_favolite_duplicate( $user_id,$product_id)){
    $action = '解除';
    $sql = "DELETE
            FROM favorite
            WHERE customer_id = :user_id AND product_id = :product_id";
  }else{
    $action = '登録';
    $sql = "INSERT INTO favorite(customer_id,product_id)
            VALUES(:user_id,:product_id)";
  }
echo $action;
  try{
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id , ':product_id' => $product_id));

  } catch (\Exception $e) {
    error_log('エラー発生:' . $e->getMessage());
    echo json_encode("error");
  }
}
