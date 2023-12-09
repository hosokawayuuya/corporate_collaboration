<?php session_start(); ?>
<?php require '../others/db-connect.php'; ?>
<?php

$pdo=new PDO($connect,USER,PASS);
// $sql=$pdo->prepare('UPDATE User SET user_name = '' WHERE user_id = 3434');

//　ユーザー更新判定
if (isset($_POST['user_id'])){
    // ユーザー情報更新
    $sql=$pdo->prepare('UPDATE User SET user_name=?, tell=?, mail_address=?, settlement=? , post_code=? , address1=? WHERE user_id=?');
    $sql->execute([$_POST['user_name'],$_POST['tell'],$_POST['mail_address'],$_POST['settlement'],$_POST['post_code'],$_POST['address1'],$_POST['user_id']]);
    // ユーザー更新後セッション詰めなおし
    $_SESSION['User']=[
        'user_id'=>$_POST['user_id'],
        'user_name'=>$_POST['user_name'],
        'tell'=>$_POST['tell'],
        'mail_address'=>$_POST['mail_address'],
        'settlement'=>$_POST['settlement'],
        'post_code'=>$_POST['post_code'],
        'address1'=>$_POST['address1'],
        
    ];
} else{

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>情報変更</title>
</head>
<body>
    <h2>情報変更</h2>
    <form action="changemyInfo.php" method="post">
<?isset()?>
        <label for="user_name">ユーザー名:</label><br>
        <?php
        echo '<input type="text" id="user_name" name="user_name" value="',$_SESSION['User']['user_name'],'" required>';
        ?>
        <label for="tell">電話番号</label><br>
        <?php
        echo '<input type="text" id="tell" name="tell" value="',$_SESSION['User']['tell'],'" required><br>';
        ?>
        <label for="mail_address">メールアドレス</label><br>
        <?php
        echo '<input type="text" id="mail_address" name="mail_address" value="',$_SESSION['User']['mail_address'],'" required><br>';
        ?>
        <p>お支払い方法</p>
        <label for="settlement">支払い情報:</label>
        <select name = "settlement">
            <option value="1">コンビニ支払い</option>
            <option value="2">代金引換</option>
            <option value="3">ツケ払い</option>
            <option value="4">クレジットカード</option>
        </select><br>
        <p>お届け先住所</p>
        <label for="post_code">郵便番号:</label>
        <?php
        echo '<input type="text" id="post_code" name="post_code" value="',$_SESSION['User']['post_code'],'" required><br>';
        ?>
    <label for="address1">都道府県:</label>
    <?php
        echo '<input type="text" id="address1" name="address1" value="',$_SESSION['User']['address1'],'" required><br>';
        ?>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['User']['user_id']?>">
        <input type="submit" value="情報を変更">
    </form>
</body>
</html>