<?php
if (empty($_SESSION['User'])) {
    $cssFile = 'loggedIn.css';
    require '../others/head.php';
require '../others/header.php';
require '../others/footer.php'; 
    echo '<span class="lead">商品を購入するには、ログインしてください。</span>';
    echo '<a href="../G1-1/login-input.php" class="lead">ログインする</a>';

    exit();
} else {
    $cssFile = 'notLoggedIn.css';
}
?>
