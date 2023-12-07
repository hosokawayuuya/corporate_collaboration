<?php
const SERVER='mysql214.phy.lolipop.lan';
const DBNAME='LAA1517469-shop';
const USER='LAA1517469';
const PASS='Pass0828';

$connect='mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8';
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
    <hr>
    <table>
<?php
     $pdo=new PDO($connect,USER,PASS);
     $sql=$pdo->prepare('select * from Shohins where shohin_id=?');
     $sql->execute([$_POST['shohin_id']]);
     echo"<table><th>商品id</th><th>カラー</th><th>サイズ</th><th>在庫</th><th>画像</th>";
     foreach($sql as $row){
        echo '<tr>';
        echo '<form action="register_out.php" method="POST">';

        echo '<td>';
        echo '<input type="text" name="color" value="', $row['color'], '">';
        echo '</td>';
        echo '<td>';
        echo '<input type="text" name="size" value="', $row['size'], '">';
        echo '</td>';
        echo '<td>';
        echo '<input type="text" name="stock_id" value="', $row['stock_id'], '">';
        echo '</td>';
        echo '<td>';
        echo '<input type="text" name="gazou_id" value="', $row['gazou_id'], '">';
        echo '</td>';

        echo '<td>';
        echo '<input type="hidden" name="id" value="', $_POST['id'], '">';
        echo '</td>';

        echo '<td><input type="submit" value="更新"></td>';
        echo '</form>';
        echo '</tr>';
        echo "\n";
     }
     echo "</table>";
     ?>
     </table>
     <button onclick="location.href='stock.php'">トップに戻る</button>
    </body>
</html>

