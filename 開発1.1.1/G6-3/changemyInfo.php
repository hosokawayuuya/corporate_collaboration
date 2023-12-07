<?php
session_start();

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
$success_message = '';

// フォームの送信処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ...（変更前のデータ取得の処理は省略）

    // フォームデータの取得と代入
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
    $building_name = $_POST["building_name"];
    $address1 = $add1 . $add2 . $add3 . $building_name;
    $building_name = isset($_POST["building_name"]) ? $_POST["building_name"] : '';
    $settlement= isset($_POST["settlement"]) ? $_POST["settlement"] : '';
    $user_id = isset($_POST["user_id"]) ? $_POST["user_id"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';

    // ...（他のフォームデータも同様に取得）

    // ...（データの変更処理は省略）
    $requiredFields = array($last_name, $first_name, $katakana_sei, $katakana_mei, $tell, $mail_address, $post_code, $add1, $add2, $add3, $user_id, $password);

    foreach ($requiredFields as $field) {
        if (empty($field)) {
            $error = "エラー: 入力していないところがあります！";
            break;
        }
    }

    // エラーがない場合にのみデータベースに挿入
    if (empty($error)) {
       // パスワードとユーザーIDの組み合わせが重複していないか確認
$stmt = $pdo->prepare("SELECT COUNT(*) FROM User WHERE user_id = :user_id AND password = :password");
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':password', $password);
$stmt->execute();
$count = $stmt->fetchColumn();

if ($count == 0) {
    // パスワードのチェックとハッシュ化
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // プリペアドステートメントを使用
    $stmt = $pdo->prepare("INSERT INTO User (private_name, user_name, katakana_name, tell, mail_address, post_code, address1, settlement, user_id, password) VALUES (:private_name, :user_name, :katakana_name, :tell, :mail_address, :post_code, :address1, :settlement, :user_id, :hashed_password)");

    // パラメーターをバインド
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

    // プリペアドステートメントを実行
    if ($stmt->execute()) {
        header("Location: ../G2-1/index.php");
        exit();
    } else {
        $error = "エラー: データベースへの挿入に失敗しました。";
    }
} else {
    $error = "エラー: 同じユーザーIDとパスワードの組み合わせが既に存在します。";
}
    }
}

    // 成功した場合のメッセージ
    $success_message = "変更が保存されました。";

    $user_id_to_update = $_SESSION['user_id'];
    $stmt = $pdo->prepare("SELECT * FROM User WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id_to_update);
    $stmt->execute();
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

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
    <title>プロフィール更新</title>
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

        .transparent-text {
            opacity: 0.5;
        }
    </style>
    <title>プロフィール更新</title>
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

                        <form action="update-profile.php" method="post">
                            <label for="last_name">姓:</label>
                            <input type="text" id="last_name" name="last_name" class="form-control form-control-lg <?php echo empty($last_name) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($last_name ?? $user_data['last_name']); ?>"><br>

                            <label for="first_name">名:</label>
                            <input type="text" id="first_name" name="first_name" class="form-control form-control-lg <?php echo empty($first_name) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($first_name ?? $user_data['first_name']); ?>"><br>

                            <label for="katakana_sei">カタカナ姓:</label>
        <input type="text" id="katakana_sei" name="katakana_sei" class="form-control form-control-lg<?php echo empty($katakana_sei) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($katakana_sei ?? $user_data['katakana_sei']); ?>"><br>

        <label for="katakana_mei">カタカナ名:</label>
        <input type="text" id="katakana_mei" name="katakana_mei" class="form-control form-control-lg<?php echo empty($katakana_mei) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($katakana_mei ?? $user_data['katakana_mei']); ?>"><br>

        <label for="user_name">ユーザー名:</label>
        <input type="text" id="user_name" name="user_name" class="form-control form-control-lg<?php echo empty($user_name) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($user_name ?? $user_data['user_name']); ?>"><br>

        <label for="tell">電話番号:</label>
        <input type="tel" id="tell" name="tell" class="form-control form-control-lg<?php echo empty($tell) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($tell ?? $user_data['tell']); ?>"><br>

        <label for="mail_address">メールアドレス:</label>
        <input type="email" id="mail_address" name="mail_address" class="form-control form-control-lg<?php echo empty($mail_address) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($mail_address ?? $user_data['mail_address']); ?>"><br>

    <!-- 郵便番号の入力にoninputを使用して住所を取得 -->
    <label for="post_code">郵便番号:</label>
    <input type="text" id="post_code" name="post_code" oninput="getAddress(this.value)" class="form-control form-control-lg<?php echo empty($last_name) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($last_name ?? $user_data['last_name']); ?>"><br>
    
    <label for="add1">都道府県:</label>
    <input type="text" id="add1" name="add1" readonly required class="form-control form-control-lg<?php echo empty($last_name) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($last_name ?? $user_data['last_name']); ?>"><br>

    <label for="add2">市区町村:</label>
    <input type="text" id="add2" name="add2" readonly required class="form-control form-control-lg<?php echo empty($last_name) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($last_name ?? $user_data['last_name']); ?>"><br>

    <label for="add3">町域:</label>
    <input type="text" id="add3" name="add3"class="form-control form-control-lg<?php echo empty($last_name) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($last_name ?? $user_data['last_name']); ?>"><br>

    <!-- 住所の入力にbuilding_nameも含める場合 -->
    <label for="building_name">建物名:</label>
    <input type="text" id="building_name" name="building_name"class="form-control form-control-lg<?php echo empty($last_name) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($last_name ?? $user_data['last_name']); ?>"><br>

    <!-- ...（他の住所の入力項目も同様に追加） -->
    <label for="settlement">支払い情報:</label>
    <select id="settlement" name="settlement"<?php echo empty($last_name) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($last_name ?? $user_data['last_name']); ?>">
        <option value="1">コンビニ支払い</option>
        <option value="2">代金引換</option>
        <option value="3">ツケ払い</option>
        <option value="4">クレジットカード</option>
    </select><br>

    <label for="user_id">ユーザーID:</label>
    <input type="text" id="user_id" name="user_id" class="form-control form-control-lg<?php echo empty($last_name) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($last_name ?? $user_data['last_name']); ?>"><br>

    <!-- パスワードの入力 -->
    <label for="password">パスワード:</label>
    <input type="password" id="password" name="password" class="form-control form-control-lg<?php echo empty($last_name) ? 'transparent-text' : ''; ?>" value="<?php echo htmlspecialchars($last_name ?? $user_data['last_name']); ?>"><br>
    <!-- エラーメッセージ表示 -->
    <?php
        if (!empty($error)) {
            echo "<p style='color: red;'>$error</p>";
        }
    ?>
                            <input type="submit" value="変更する" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                        </form>

                        <?php
                        if (!empty($error)) {
                            echo "<p style='color: red;'>$error</p>";
                        }

                        if (!empty($success_message)) {
                            echo "<p style='color: black;'>$success_message</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>


