<?php
session_start();
require '../others/db-connect.php';

$pdo = new PDO($connect, USER, PASS);

// セッションにユーザーが存在する場合としない場合でクエリを分岐
if (isset($_SESSION['User'])) {
    $id = $_SESSION['User']['id'];
    $sql = $pdo->prepare('select * from User where id!=? and user_id=?');
    $sql->execute([$id, $_POST['user_id']]);
} else {
    $sql = $pdo->prepare('select * from User where user_id=?');
    $sql->execute([$_POST['user_id']]);
}

// ログイン名が重複していないか確認
if (empty($sql->fetchAll())) {
    if (isset($_SESSION['User'])) {
        // セッションにユーザーが存在する場合は、ユーザー情報を更新
        $sql = $pdo->prepare('update User set user_name=?, address1=?, user_id=?, password=? where id=?');
        $sql->execute([
            $_POST['user_name'], $_POST['address1'],
            $_POST['user_id'], password_hash($_POST['password'], PASSWORD_DEFAULT), $id
        ]);
        $_SESSION['User'] = [
            'id' => $id, 'user_name' => $_POST['user_name'], 'address1' => $_POST['address1'],
            'user_id' => $_POST['user_id'], 'password' => $_POST['password']
        ];
        echo 'お客様情報を更新しました';
    } else {
        // セッションにユーザーが存在しない場合は、新規ユーザーを登録
        $sql = $pdo->prepare('insert into User (user_name, address1, user_id, password) values(?,?,?,?)');
$sql->execute([
    $_POST['user_name'], $_POST['address1'],
    $_POST['user_id'], password_hash($_POST['password'], PASSWORD_DEFAULT)
]);

        echo 'お客様情報を登録しました。';
    }
} else {
    echo 'ログイン名がすでに使用されていますので、別の名前を選択してください。';
}
?>
<?php require '../others/footer.php'; ?>