<?php session_start();?>

<form action="customer-output.php" method="post">
    <?php
    $name = $address = $login = $password = '';
    if (isset($_SESSION['User'])) {
        $name = $_SESSION['User']['name'];
        $address = $_SESSION['User']['address'];
        $login = $_SESSION['User']['login'];
        $password = $_SESSION['User']['password'];
    }
    echo '<form action="customer-output.php" method="post">';
    echo '<table>';
    echo '<tr><td>お名前</td><td>';
    echo '<input type="text" name="name" value="', $name, '">';
    echo '</td></tr>'; 
    echo '<tr><td>ご住所</td><td>';
    echo '<input type="text" name="address" value="', $address, '">';
    echo '</td></tr>'; 
    echo '<tr><td>ログイン</td><td>';
    echo '<input type="text" name="login" value="', $login, '">';
    echo '</td></tr>'; 
    echo '<tr><td>パスワード</td><td>';
    echo '<input type="password" name="password" value="', $password, '">';
    echo '</td></tr>'; 
    echo '</table>';
    echo '<input type="submit" value="確定">';
    echo '</form>';
?>

