<?php
host = 'mysql217.phy.lolipop.lan';
$dbname = 'LAA1517470-inful';
$user = 'LAA1517470';
$pass = 'Influenza';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("データベースに接続できませんでした。エラー: " . $e->getMessage());
}

// フォームの送信処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームデータの取得
    $last_name = $_POST["last_name"];
    $first_name = $_POST["first_name"];
    $katakana_sei = $_POST["katakana_sei"];
    $katakana_mei = $_POST["katakana_mei"];
    $user_name = $last_name . $first_name;
    $katakana_name = $katakana_sei . $katakana_mei;
    $tell = $_POST["tell"];
    $mail_address = $_POST["mail_address"];
    $post_code = $_POST["post_code"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $building_name = $_POST["building_name"];
    $shiha = $_POST["shiha"];
    $user_id = $_POST["user_id"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // データベースに挿入するためのSQLクエリ
    $sql = "INSERT INTO customers (user_name, katakana_name, tell, mail_address, post_code, address1, address2, building_name, shiha, user_id, password) VALUES ('$user_name', '$katakana_name', '$tell', '$mail_address', '$post_code', '$address1', '$address2', '$building_name', '$shiha', '$user_id', '$password')";

    // クエリの実行
    if ($conn->query($sql) === TRUE) {
        echo "新規登録が完了しました";
    } else {
        echo "エラー: " . $sql . "<br>" . $conn->error;
    }
}

// データベース接続のクローズ
$conn->close();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規登録</title>
  <!-- CSS や JavaScript のリンクなども追加 -->
</head>
<body>

<h2>新規登録フォーム</h2>

<form action="customer-input.php" method="post">
  <label for="last_name">姓:</label>
  <input type="text" id="last_name" name="last_name" required><br>

  <label for="first_name">名:</label>
  <input type="text" id="first_name" name="first_name" required><br>

  <label for="katakana_sei">カタカナ姓:</label>
  <input type="text" id="katakana_sei" name="katakana_sei" required><br>

  <label for="katakana_mei">カタカナ名:</label>
  <input type="text" id="katakana_mei" name="katakana_mei" required><br>

  <label for="user_name">ユーザー名:</label>
  <input type="text" id="user_name" name="user_name" required><br>

  <label for="tell">電話番号:</label>
  <input type="tel" id="tell" name="tell" required><br>

  <label for="mail_address">メールアドレス:</label>
  <input type="email" id="mail_address" name="mail_address" required><br>

  <label for="post_code">郵便番号:</label>
  <input type="text" id="post_code" name="post_code" onchange="fillAddress()" required><br>

  <label for="address1">都道府県:</label>
  <input type="text" id="address1" name="address1" readonly required><br>

  <label for="address2">市町村:</label>
  <input type="text" id="address2" name="address2" readonly required><br>
  <label for="building_name">建物名:</label>
  <input type="text" id="building_name" name="building_name">

  <!-- 他の住所の入力項目も同様に追加 -->

  <label for="shiha">支払い情報:</label>
  <select id="shiha" name="shiha">
    <option value="1">コンビニ支払い</option>
    <option value="2">代金引換</option>
    <option value="3">ツケ払い</option>
    <option value="4">クレジットカード</option>
  </select><br>

  <label for="user_id">ログインID:</label>
  <input type="text" id="user_id" name="user_id" required><br>

  <label for="password">パスワード:</label>
  <input type="password" id="password" name="password" required><br>

  <input type="submit" value="登録する">
</form>

<script>
  function fillAddress() {
    // 郵便番号から都道府県と市町村を取得して入力する処理
    // ここに実装するか、Ajax を使用するなどの方法があります
  }
</script>

</body>
</html>
