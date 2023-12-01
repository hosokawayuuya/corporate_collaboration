<?php session_start();?>
<?php require '../others/db-connect.php'; ?>

<form action="customer-output.php" method="post">
    <?php
    $user_name = $address1 = $user_id = $password = '';
    if (isset($_SESSION['User'])) {
        $uer_name = $_SESSION['User']['user_name'];
        $address1 = $_SESSION['User']['address1'];
        $user_id = $_SESSION['User']['user_id'];
        $password = $_SESSION['User']['password'];
    }
    echo '<table>';
    echo '<tr><td>ユーザーID</td><td>';
    echo '<input type="text" name="user_name" value="', $user_name, '">';
    echo '</td></tr>'; 
    echo '<tr><td>ご住所</td><td>';
    echo '<input type="text" name="address1" value="', $address1, '">';
    echo '</td></tr>'; 
    echo '<tr><td>ログイン</td><td>';
    echo '<input type="text" name="user_id" value="', $user_id, '">';
    echo '</td></tr>'; 
    echo '<tr><td>パスワード</td><td>';
    echo '<input type="password" name="password" value="', $password, '">';
    echo '</td></tr>'; 
    echo '</table>';
    echo '<input type="submit" value="確定">';
    echo '</form>';
?>

<?php require '../others/footer.php'; ?>
