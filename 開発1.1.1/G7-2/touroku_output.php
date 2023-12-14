<?php
    const SERVER = 'mysql217.phy.lolipop.lan';
    const DBNAME = 'LAA1517470-inful';
    const USER = 'LAA1517470';
    const PASS = 'Influenza';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
  <!DOCTYPE html>
  <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>登録確認</title>
</head>
<body>
<link rel="stylesheet" href="css/touroku_output.css">
<h1>登録確認</h1>
<form action="../G7-2/stock.php" method="post">
    <button type="submit">戻る</button>
    </form>
    <hr>
    <?php
    try {
        $todays = date("Y-m-d");
        $pdo = new PDO($connect, USER, PASS);
    
        // SQLステートメントを準備
        $sql = $pdo->prepare('insert into Shohins(shohin_id,color,size,stock_id,gazou_id) values(?,?,?,?,?)');
    
        if (!preg_match('/^\d+$/', $_POST['shohin_id'])) {
            echo '商品idを整数で入力してください';
        } elseif (empty($_POST['color'])) {
            echo 'カラーを入力してください';
        } elseif (empty($_POST['size'])) {
            echo 'サイズを入力してください';
        } elseif (!preg_match('/^[0-9]+$/', $_POST['stock_id'])) {
            echo '商品価格を整数で入力してください';
        } elseif (empty($_POST['gazou_id'])) {
            echo '商品画像ファイル名を入力してください';
        } elseif ($sql->execute([$_POST['shohin_id'], $_POST['color'], $_POST['size'], $_POST['stock_id'], $_POST['gazou_id']])) {
            echo '<font color="red">追加に成功しました。</font>';
        } else {
            // 重複エントリ違反のためのカスタムエラーメッセージを表示
            echo '<font color="red">データが重複しています。</font>';
        }
    } catch (PDOException $e) {
        // 例外が重複エントリに関連しているかどうかを確認
        if ($e->getCode() == 23000) {
            echo '<font color="red">データが重複しています。</font>';
        } else {
            // 他のPDO例外を処理
            echo '<font color="red">追加に失敗しました</font>';
        }
    }
    ?>
    <br><hr><br>
    <table>
    <?php
    echo"<table><th>商品id</th><th>カラー</th><th>サイズ</th><th>在庫</th><th>画像</th>";
    foreach($pdo->query('select * from Shohins')as $row){
        echo '<tr>';
        echo '<td>', $row['shohin_id'],'</td>';
        echo '<td>', $row['color'],'</td>';
        echo '<td>', $row['size'],'</td>';
        echo '<td>', $row['stock_id'],'</td>';
        echo '<td>', $row['gazou_id'],'</td>';
         echo '</tr>';
         echo "\n";
    }
    echo "</table>";
    ?>
    <form action="stock.php" method="post">
    
    </form>
    </body>
</html>

