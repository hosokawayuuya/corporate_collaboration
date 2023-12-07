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
        <link rel="stylesheet" href="css/register_out.css">
        <title>更新確認</title>
</head>
<body>
<h1>更新確認</h1>
<button onclick="location.href='stock.php'">トップへ戻る</button>
    <hr>
    <?php
    $pdo=new PDO($connect, USER,PASS);
    $todays=date("Y-m-d");
    $sql=$pdo->prepare('update Shohins set color=?, size=?, stock_id=?, gazou_id=? where shohin_id=?');
    if(empty($_POST['color'])){
        echo 'カラーを入力して下さい';
    }
    else if(empty($_POST['size'])){
        echo 'サイズを入力してください';
    }
    else if(!preg_match('/^[0-9]+$/',$_POST['stock_id'])){
        echo '在庫を整数で入力してください';
    }
    else if(empty($_POST['gazou_id'])){
        echo '商品画像ファイル名を入力してください';
    }
    else if ($sql->execute([$_POST['color'],$_POST['size'],$_POST['stock_id'],$_POST['gazou_id'],$_POST['shohin_id']])){
        echo '更新に成功しました。';
    }
    else{
        echo '更新に失敗しました';
    }
    ?>
    <hr>
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
         
    </body>
</html>
