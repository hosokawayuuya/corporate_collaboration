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
    <link rel="stylesheet" href="css/register.css">
    <title>更新</title>
</head>
<body>
    <h1>データ更新</h1>
    <form action="../G7-2/stock.php" method="post">
    <button type="submit">戻る</button>
    </form>

    <hr>
    <table>
        <?php
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('select * from Shohins where shohin_id=? and color=? and size=?');
        $sql->execute([$_POST['shohin_id'], $_POST['color'], $_POST['size']]);
        echo "<th>商品id</th><th>カラー</th><th>サイズ</th><th>在庫</th><th>画像</th>";
        foreach ($sql as $row) {
            echo '<tr>';
            echo '<form action="register_out.php" method="POST">';
            
            echo '<td>', $row['shohin_id'], '</td>';
            echo '<td>', $row['color'], '</td>';
            echo '<td>', $row['size'], '</td>';
            echo '<td>';
            echo '<input type="text" name="stock_id" value="', $row['stock_id'], '">';
            echo '</td>';
            echo '<td>';
            echo '<input type="text" name="gazou_id" value="', $row['gazou_id'], '">';
            echo '</td>';
            echo '<input type="hidden" name="shohin_id" value="',$row['shohin_id'],'">';
            echo '<input type="hidden" name="color" value="',$row['color'],'">';
            echo '<input type="hidden" name="size" value="',$row['size'],'">';
            echo '<td><input type="submit" value="更新"></td>';
            echo '</form>';
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>
    <button onclick="location.href='stock.php'">トップに戻る</button>
</body>
</html>
