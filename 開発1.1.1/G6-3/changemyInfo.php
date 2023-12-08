<?php session_start(); ?>
<?php require '../others/db-connect.php'; ?>
<?php
unset($_SESSION['User']);//セッションのデータを消す
if(isset($_POST['User'])){
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('select * from User where user_name=?');
$sql->execute([$_POST['User']]);
foreach ($sql as $row){
    if (password_verify($_POST['password'],$row['password'])){
        $_SESSION['User']=[
            'user_id'=>$row['user_id'],
            'user_name'=>$row['user_name'],
            'password'=>$row['password'],
            'private_name'=>$row['private_name'],
            'katakana_name'=>$row['katakana_name'],
            'post_code'=>$row['post_code'],
            'address1'=>$row['address1'],
            'settlement'=>$row['settlement'],
            'credit_id'=>$row['credit_id'],
            'credit_date'=>$row['credit_date'],
            'security_code'=>$row['security_code'],
            'tell'=>$row['tell']
        ];
    }
}
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
        <?php
    if(isset($_POST['User']['user_name'])){
        echo $_POST['User']['User_name'];
    }else{
        echo 'データなし';
    }
    ?>


        <label for="user_name">ユーザー名:</label>
        <?php
        echo '<input type="text" id="user_name" name="user_name" value="',$_SESSION['User']['user_name'],'" requid>';
        ?>
        <label for="tell">電話番号</label>
        <?php
        echo '<input type="text" id="tell" name="tell" value="',$user['tell'],'" required><br>';
        ?>
        <label for="mail_address">メールアドレス</label>
        <?php
        echo '<input type="text" id="mail_address" name="mail_address" value="',$user['mail_address'],'" required><br>';
        ?>
        <p>お支払い方法</p>
        <label for="settlement">支払い情報:</label>
        <?php
        echo '<input type="text" id="settlement" name="settlement" value="',$user['settlement'],'" required><br>';
        ?>
        <option value="1">コンビニ支払い</option>
        <option value="2">代金引換</option>
        <option value="3">ツケ払い</option>
        <option value="4">クレジットカード</option>
    </select><br>
        <p>お届け先住所</p>
        <label for="post_code">郵便番号:</label>
        <?php
        echo '<input type="text" id="post_code" name="post_code" value="',$user['post_code'],'" required><br>';
        ?>

    <label for="address1">都道府県:</label>
    <?php
        echo '<input type="text" id="address1" name="address1" value="',$user['address1'],'" required><br>';
        ?>

        <input type="submit" value="情報を変更">
    </form>
</body>
</html>
