<?php
session_start();
require '../others/db-connect.php';

if(!isset($_POST['change'])){
    $_ref=$_SERVER['HTTP_REFERER'];
    $_SESSION['change']=$_ref;
}else{
    $_ref=$_SESSION['change'];
}
$pdo = new PDO($connect, USER, PASS);
$errors = array(); // エラーメッセージを格納するための配列

if (isset($_POST['user_id'])) {
    // 各フィールドが空でないかを確認
    if (empty($_POST['user_name'])) {
        $errors[] = 'ユーザー名を入力してください。';
    }

    // 他のフィールドに対しても同様にチェック

    // エラーがなければ更新処理を行う
    if (empty($errors)) {
        // ユーザー情報更新
        $sql = $pdo->prepare('UPDATE User SET user_name=?, tell=?, mail_address=?, settlement=?, post_code=?, address1=?, credit_id=?, credit_data=?, security_code=? WHERE user_id=?');
        $sql->execute([
            $_POST['user_name'],
            $_POST['tell'],
            $_POST['mail_address'],
            $_POST['settlement'],
            $_POST['post_code'],
            $_POST['address1'],
            $_POST['credit_id'],
            $_POST['credit_data'],
            $_POST['security_code'],
            $_POST['user_id']
        ]);

        // ユーザー更新後セッション詰めなおし
        $_SESSION['User'] = [
            'user_id' => $_POST['user_id'],
            'user_name' => $_POST['user_name'],
            'tell' => $_POST['tell'],
            'mail_address' => $_POST['mail_address'],
            'settlement' => $_POST['settlement'],
            'post_code' => $_POST['post_code'],
            'address1' => $_POST['address1'],
            'credit_id' => $_POST['credit_id'],
            'credit_data' => $_POST['credit_data'],
            'security_code' => $_POST['security_code'],
        ];
    }
} else {
    // 何かしらの処理
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>情報変更</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../Sample/template/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../Sample/template/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Sample/template/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../Sample/template/images/favicon.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo" style="text-align: center">
                            <img src="..\image\AsoCityロゴ2.png" alt="ここに画像アイコン入る">
                        </div>
                        <h2>情報変更</h2>
                        <form action="changemyInfo.php" method="post">
                            <?php
                            if (!empty($errors)) {
                                foreach ($errors as $error) {
                                    echo '<p class="error">' . $error . '</p>';
                                }
                            }
                            ?>

                            
                            <label for="user_name">ユーザー名</label><br>
                            <?php
                            echo '<input type="text" id="user_name" class="form-control form-control-lg" name="user_name" value="', $_SESSION['User']['user_name'], '" required>';
                            ?><br>
                            <label for="tell">電話番号</label><br>
                            <?php
                            echo '<input type="text" id="tell" class="form-control form-control-lg" name="tell" value="', $_SESSION['User']['tell'], '" required><br>';
                            ?>
                            <label for="mail_address">メールアドレス</label><br>
                            <?php
                            echo '<input type="text" id="mail_address" class="form-control form-control-lg" name="mail_address" value="', $_SESSION['User']['mail_address'], '" required><br>';
                            ?>
                            <p>お支払い方法</p>
                            <label for="settlement">支払い情報:</label>
                            <select id="settlement" name="settlement">
                                <option value="1">コンビニ支払い</option>
                                <option value="2">代金引換</option>
                                <option value="3">ツケ払い</option>
                                <option value="4">クレジットカード</option>
                            </select><br>
                            <!-- クレジットカード情報の入力フォーム -->
                            <div id="credit_card_fields">
                                <label for="credit_id">クレジットカード番号:</label>
                                <?php
                                echo '<input type="text" id="credit_id" class="form-control form-control-lg" name="credit_id" value="', $_SESSION['User']['credit_id'], '" required>';
                                ?>
                                <label for="credit_data">有効期限:</label>
                                <?PHP
                                echo '<input type="text" id="credit_data" class="form-control form-control-lg" name="credit_data" value="', $_SESSION['User']['credit_data'], '" required>';
                                ?>
                                <label for="security_code">セキュリティコード:</label>
                                <?PHP
                                echo '<input type="text" id="security_code" class="form-control form-control-lg" name="security_code" value="', $_SESSION['User']['security_code'], '" required>';
                                ?>
                            </div>
                            <label for="post_code">郵便番号</label>
                            <?php
                            echo '<input type="text" id="post_code" class="form-control form-control-lg" name="post_code" value="', $_SESSION['User']['post_code'], '" required><br>';
                            ?>
                            <label for="address1">お届け先住所</label>
                            <?php
                            echo '<input type="text" id="address1" class="form-control form-control-lg" name="address1" value="', $_SESSION['User']['address1'], '" required><br>';
                            ?>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['User']['user_id'] ?>">
                            <input type="submit" name="change" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                value="情報を変更"><br>
                                <button type="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="window.location='<?php echo $_ref ?>'" class="btn btn-info">戻る</button>

                        </form>
                        <!-- 選択された支払い方法がクレジットカードの場合にのみクレジットカード情報を表示 -->
<script>
    // セレクトボックスが変更されたときに呼び出される関数
    function handlePaymentMethodChange() {
        var paymentMethod = document.getElementById("settlement").value;
        var creditCardFields = document.getElementById("credit_card_fields");

        // クレジットカード情報のフィールドを表示または非表示にする
        creditCardFields.style.display = (paymentMethod == 4) ? "block" : "none";
    }

    // セレクトボックスが変更されたときに関数を実行
    document.getElementById("settlement").addEventListener("change", handlePaymentMethodChange);

    // 初期状態でクレジットカード情報を非表示にする
    document.addEventListener("DOMContentLoaded", function() {
        handlePaymentMethodChange();
    });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function getAddress(postalCode) {
        if (postalCode.length === 7) {
            $.getJSON('https://zipcloud.ibsnet.co.jp/api/search?zipcode=' + postalCode, function(data) {
                if (data.status === 200) {
                    $('#add1').val(data.results[0].address1);
                    $('#add2').val(data.results[0].address2);
                    $('#add3').val(data.results[0].address3); // 町域の情報も追加
                } else {
                    $('#add1').val('');
                    $('#add2').val('');
                    $('#add3').val('');
                }
            });
        } else {
            $('#add1').val('');
            $('#add2').val('');
            $('#add3').val('');
        }
    }
</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


