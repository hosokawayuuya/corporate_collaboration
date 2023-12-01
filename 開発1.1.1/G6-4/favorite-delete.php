<?php session_start();?>
<?php require '../others/head.php';?>
<?php require '../others/header.php';?>
<?php
unset($_SESSION['Shohin'][$_GET['shohin_id']]);
require 'favorite.php';
?>
<?php require '../others/footer.php'; ?>