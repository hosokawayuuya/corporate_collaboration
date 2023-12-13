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
        <link rel="stylesheet" href="css/delete.css">
        <title>削除確認</title>
</head>
<body>
<h1>削除確認</h1>
<form action="../G7-2/stock.php" method="post">
    <button type="submit">戻る</button>
    </form>

    <hr>
    <?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from Shohins where shohin_id=? and color=? and size=?');
    if($sql->execute([$_POST['shohin_id'], $_POST['color'], $_POST['size']])){
        echo '削除に成功しました。';
    }
    else{
        echo '削除に失敗しました。';
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
    </table>
    <form action="stock.php" metod="post">
        <button onclick="location.href='stock.php'">トップへ戻る</button>
</form>
</body>
</html>

