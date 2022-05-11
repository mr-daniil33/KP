<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}

$statuscheck = $_SESSION['user']['status'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>



<form class="sendcode">
    <img src="<?= $_SESSION['user']['avatar'] ?>"  alt="">
    <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
    <a href="#"><?= $_SESSION['user']['email'] ?></a>

    <?php
    if ($statuscheck == 2)
        echo "<p></h2>Подписка активирована</h2></p>";
    else
        echo "<p></h2>Подписка не активирована</h2></p>";

    ?>

    <a href="logout.php" class="logout">Выход</a>


</form>
<div class = "mainbutton">
<a href='http://registration/main.php'> <input value=' Главная' type='button' class='floating-button'' /> </a>
</div>
</body>
</html>