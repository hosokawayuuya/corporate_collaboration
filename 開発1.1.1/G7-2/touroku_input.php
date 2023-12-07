<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/touroku_input.css">
        <title>商品登録</title>
</head>
<body>
    <h1>商品登録</h1>
    <hr>
    <form action="touroku_output.php" method="post">
        商品id:<input type="text" name="shohin_id"><br>
        カラー:<input type="text" name="color"><br>
        サイズ:<input type="text" name="size"><br>
        在庫:<input type="text" name="stock_id"><br>
        画像:<input type="text" name="gazou_id"><br>
        <button type="submit">追加</button>
</form>
</body>
</html>
    