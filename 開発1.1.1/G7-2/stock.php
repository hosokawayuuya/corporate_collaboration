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
        <link rel="stylesheet" href="css/itiran.css">
        <title>商品一覧</title>
</head>
<body>
    <h1>商品一覧</h1>
    <form action="../G7-1/administrater.php" method="post">
    <button type="submit">トップへ戻る</button>
    </form>
    <hr>
    <button onclick="location.href='touroku_input.php'">商品登録</button>
    <?php
    $pdo=new PDO($connect,USER,PASS);
    echo"<table><th>商品id</th><th>カラー</th><th>サイズ</th><th>在庫</th><th>画像</th>";
    foreach($pdo->query('select * from Shohins') as $row){
        echo '<tr>';
        echo '<td>', $row['shohin_id'],'</td>';
        echo '<td>', $row['color'],'</td>';
        echo '<td>', $row['size'],'</td>';
        echo '<td>', $row['stock_id'],'</td>';
        echo '<td>', $row['gazou_id'],'</td>';
        echo '<td>';
        echo '<form action="register.php" method="post">';
        echo '<input type="hidden" name="shohin_id" value="',$row['shohin_id'],'">';
        echo '<button type="submit">更新</button>';
        echo '</form>';

        echo '</td>';
        echo '<td>';
        echo '<form action="delete.php" method="post">';
        echo '<input type="hidden" name="id" value="',$row['shohin_id'],'">';
        echo '<button type="submit">削除</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
    echo"</table>";
    ?>
    
    </body>
</html>