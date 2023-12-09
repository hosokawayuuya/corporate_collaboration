<?php
$host = 'mysql217.phy.lolipop.lan';
$dbname = 'LAA1517470-inful';
$user = 'LAA1517470';
$pass = 'Influenza';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("データベースに接続できませんでした。エラー: " . $e->getMessage());
}

// 初期化
$error = '';

// フォームの送信処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームデータの取得
    $last_name = $_POST["last_name"];
    $first_name = $_POST["first_name"];
    $katakana_sei = $_POST["katakana_sei"];
    $katakana_mei = $_POST["katakana_mei"];
    $private_name = $last_name . $first_name;
    $katakana_name = $katakana_sei . $katakana_mei;
    $user_name = $_POST["user_name"];
    $tell = $_POST["tell"];
    $mail_address = $_POST["mail_address"];
    $post_code = $_POST["post_code"];
    $add1 = $_POST["add1"];
    $add2 = $_POST["add2"];
    $add3 = $_POST["add3"];
    $building_name = isset($_POST["building_name"]) ? $_POST["building_name"] : '';
    $address1 = $add1 . $add2 . $add3 . $building_name;
    $settlement = isset($_POST["settlement"]) ? $_POST["settlement"] : '';
    $user_id = isset($_POST["user_id"]) ? $_POST["user_id"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';

    // 必須フィールドの検証
    $requiredFields = array($last_name, $first_name, $katakana_sei, $katakana_mei, $tell, $mail_address, $post_code, $add1, $add2, $add3, $user_id, $password);

    if (in_array("", $requiredFields)) {
        $error = "エラー: 入力していないところがあります！";
    }

    // エラーがない場合にのみデータベースに挿入
    if (empty($error)) {
        // パスワードとユーザーIDの組み合わせが重複していないか確認
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM User WHERE user_id = :user_id AND password = :password");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->fetchColumn() == 0) {
            // パスワードのチェックとハッシュ化
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // データベースへの挿入処理
            $stmt = $pdo->prepare("INSERT INTO User (private_name, user_name, katakana_name, tell, mail_address, post_code, address1, settlement, user_id, password) VALUES (:private_name, :user_name, :katakana_name, :tell, :mail_address, :post_code, :address1, :settlement, :user_id, :hashed_password)");
            $stmt->bindParam(':private_name', $private_name);
            $stmt->bindParam(':user_name', $user_name);
            $stmt->bindParam(':katakana_name', $katakana_name);
            $stmt->bindParam(':tell', $tell);
            $stmt->bindParam(':mail_address', $mail_address);
            $stmt->bindParam(':post_code', $post_code);
            $stmt->bindParam(':address1', $address1);
            $stmt->bindParam(':settlement', $settlement);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':hashed_password', $hashed_password);

            // クレジットカード情報の取得
            $credit_id = $_POST["credit_id"] ?? '';
            $credit_date = $_POST["credit_date"] ?? '';
            $security_code = $_POST["security_code"] ?? '';

            // クレジットカードの詳細を検証
            if ($settlement == 4 && (empty($credit_id) || empty($credit_date) || empty($security_code))) {
                $error = "エラー: クレジットカード情報を正しく入力してください！";
            }

            // エラーがない場合、クレジットカードの詳細をデータベースに保存
            if (empty($error)) {
                // データベースへの挿入処理を実装してくださ
                // プリペアドステートメントを実行
                if ($stmt->execute()) {
                    header("Location: ../G2-1/index.php");
                    exit();
                } else {
                    $error = "エラー: データベースへの挿入に失敗しました。";
                }
            }
        } else {
            $error = "エラー: 同じユーザーIDとパスワードの組み合わせが既に存在します。";
        }
    }
}

// データベース接続のクローズ
$pdo = null;
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="../Sample/template/vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="../Sample/template/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../Sample/template/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../Sample/template/images/favicon.png" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .error {
            color: red;
        }
    </style>
    <title>新規登録</title>
    <!-- CSS や JavaScript のリンクなども追加 -->
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

<form action="customer-input.php" method="post">
    <!-- ...（フォームの入力部分はそのまま） -->
    <label for="last_name">苗字</label>
    <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" ><br>

    <label for="first_name">名前</label>
    <input type="text" id="first_name" name="first_name" class="form-control form-control-lg"><br>

    <label for="katakana_sei">カタカナ苗字</label>
    <input type="text" id="katakana_sei" name="katakana_sei" class="form-control form-control-lg"><br>

    <label for="katakana_mei">カタカナ名前</label>
    <input type="text" id="katakana_mei" name="katakana_mei"class="form-control form-control-lg" ><br>

    <label for="user_name">ユーザー名</label>
    <input type="text" id="user_name" name="user_name" class="form-control form-control-lg"><br>

    <label for="tell">電話番号</label>
    <input type="tel" id="tell" name="tell" class="form-control form-control-lg"><br>

    <label for="mail_address">メールアドレス</label>
    <input type="email" id="mail_address" name="mail_address"class="form-control form-control-lg" ><br>

    <!-- 郵便番号の入力にoninputを使用して住所を取得 -->
    <label for="post_code">郵便番号</label>
    <input type="text" id="post_code" name="post_code" oninput="getAddress(this.value)" class="form-control form-control-lg"><br>
    
    <label for="add1">都道府県</label>
    <input type="text" id="add1" name="add1" readonly required class="form-control form-control-lg"><br>

    <label for="add2">市区町村</label>
    <input type="text" id="add2" name="add2" readonly required class="form-control form-control-lg"><br>

    <label for="add3">町域</label>
    <input type="text" id="add3" name="add3"class="form-control form-control-lg"><br>

    <!-- 住所の入力にbuilding_nameも含める場合 -->
    <label for="building_name">建物名:</label>
    <input type="text" id="building_name" name="building_name"class="form-control form-control-lg"><br>

    <!-- ...（他の住所の入力項目も同様に追加） -->
    <label for="settlement">支払い情報:</label>
    <select id="settlement" name="settlement">
        <option value="1">コンビニ支払い</option>
        <option value="2">代金引換</option>
        <option value="3">ツケ払い</option>
        <option value="4">クレジットカード</option>
    </select><br>
   <!-- クレジットカード情報の入力フォーム -->
<div id="credit_card_fields" style="display: none;">
    <label for="credit_id">クレジットカード番号:</label>
    <input type="text" id="credit_id" name="credit_id" class="form-control form-control-lg"><br>

    <label for="credit_data">有効期限:</label>
    <input type="text" id="credit_data" name="credit_data" placeholder="MM/YY" class="form-control form-control-lg"><br>

    <label for="security_code">セキュリティコード:</label>
    <input type="text" id="security_code" name="security_code" class="form-control form-control-lg"><br>
    </divsecurity_code>
    </div>
    <security_code for="user_id">ユーザーID:</label>
    <input type="text" id="user_id" name="user_id" class="form-control form-control-lg"><br>
    
    <!-- パスワードの入力 -->
    <label for="password">パスワード:</label>
    <input type="password" id="password" name="password" class="form-control form-control-lg"><br>
    <!-- エラーメッセージ表示 -->
    <?php
        if (!empty($error)) {
            echo "<p style='color: red;'>$error</p>";
        }
    ?>

    <input type="submit" value="登録する"class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >
</form>
<button type="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="history.back()" class="btn btn-info">ログイン画面へ</button>




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
</body>
</html>