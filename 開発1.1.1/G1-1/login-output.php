<?php session_start(); ?>
<?php require '../others/head.php'; ?>
<?php require '../others/header.php'; ?>
<?php require '../others/db-connect.php'; ?>
<?php
unset($_SESSION['User']);
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('select * from User where login=?');
$sql->execute([$_POST['login']]);
foreach ($sql as $row){
    if (password_verify($_POST['pass'],$row['password'])){
        $_SESSION['User']=[
            'id'=>$row['user_id'],'name'=>$row['user_name'],'address'=>$row['address'],
            'login'=>$row['login'],'password'=>$row['password']
        ];    
    }
}
    if (isset($_SESSION['User'])){
        echo 'いらっしゃいませ、',$_SESSION['User']['name'],'さん。';
    }else{
        echo 'ログイン名またはパスワードが違います。';
    }
    ?>
<?php require '../others/footer.php'; ?>  