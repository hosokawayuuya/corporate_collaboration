<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>設定変更画面</title>
    <link rel="stylesheet" href="../Sample/template/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../Sample/template/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Sample/template/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../Sample/template/images/favicon.png" />
    <link rel="stylesheet" href="css/style.css">
  </head>
	<body>
		<h1>設定</h1>
    <a href="henpin.php" class="btn btn-link btn-rounded btn-fw">返品ポリシーについて</a>
    <br>
    <a href="point.php" class="btn btn-link btn-rounded btn-fw">ポイントについて</a>
    <br>
    <a href="privacy.php" class="btn btn-link btn-rounded btn-fw">利用規約とプライバシーポリシー</a>
    <br>
    <a href="campain.php" class="btn btn-link btn-rounded btn-fw">今だけの闇特別キャンペーン実施中！！</a>
    <br>
    <a href="..\G1-1\index.php" class="btn btn-light btn-rounded btn-fw">ログアウト</a>
	</body>
</html>

<?php session_start () ; ?>
<?php require 'header.php'; ?> 
<?php require 'menu.php'; ?> 
<?php
if(isset ($_SESSION['customer'])){
unset($_SESSION['customer']);
echo 'ログアウトしました。';
}else{
echo 'すでにログアウトしています。';
}
?>
<?php require 'footer.php'; ?>
