<?php
    session_start();
    $_SESSION['Shohin'] = array(); 
    ?>
<!DOCTYPE html>
  <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>購入完了</title>
        <style>
        body {
            background-image: url('../image/購入完了.png');
            margin: 0;
            padding: 0;
        }
        button {
            position: fixed;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            background-color: blue; 
            color: white; 
            border: none; 
            padding: 20px 40px; 
            border-radius: 40px; 
      cursor: pointer; 
        }

    </style>
</head>
<body>
<button onclick="location.href='../G2-1/index.php'">ホームに戻る</button>
</body>
</html>

