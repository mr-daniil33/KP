<?php
    session_start();
$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'nepomnyashchy');
$idtwo = $_SESSION['user']['id'];

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$idtwo'");
$user = mysqli_fetch_assoc($check_user);

$_SESSION['user'] = [
    "id" => $user['id'],
    "full_name" => $user['full_name'],
    "avatar" => $user['avatar'],
    "email" => $user['email'],
    "hash" => $user['hash'],
    "status" => $user['status'],
    "two-confirmed" => $user['two-confirmed']
];

if (($_SESSION['user']['two-confirmed'] == 0) ) {
    unset($_SESSION['user']);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="/assets/css/biblio.css">
</head>
<body>

<div id="header">
    <img src="assets/images/logo.png" alt="Пушкин" onclick="location.href='http://registration/main.php'">
    <?php


    if ($_SESSION['user'])
    {
        echo "
    <a href='http://registration/notif.php'><input value='Подписка' type='button' class='floating-button'' /> </a>
    <a href='http://registration/profile.php'><input value='Профиль' type='button' class='floating-button'' /> </a>";
    }

else echo "<a href='http://registration/register.php'> <input value='Регистрация' type='button' class='floating-button'' /> </a>
    <a href='http://registration/index.php'><input value='Войти' type='button' class='floating-button'' /> </a>"
    ?>

</div>

<div class="three"><h1>Библиотека имени Пушкина</h1></div>



<div class="choice">

    <?php





    if ($_SESSION['user'])
    {
        echo "
    <a href='http://registration/classica.php'><input value='Классика' name='classica' type='submit' class='pressed-button'/></a>";
    }

    else echo "<form method='post''><input name='classica' value = 'Классика' type=submit class='pressed-button' onClick= 'alert()' >";








?>

    <input value="Детские книги" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />
    <input value="Детективы" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />
    <input value="Триллеры" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />
    <input value="Религия и духовность" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />
    <input value="История" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />
    <input value="Любовные романы" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />
    <input value="Документальная литература" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />
    <input value="Дом и дача" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />
    <input value="Справочная литература" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />
    <input value="Юмор" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />
    <input value="Дом и семья" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />
    <input value="Приключения" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />
    <input value="Психология" type="button" class="pressed-button" onclick="location.href='http://registration/main.php'" />


    <?php

    $statuscheck = $_SESSION['user']['status'];
    //echo $statuscheck;
    if ($_SESSION['user'] && ($statuscheck == 2))
    {
        echo "
    <a href='http://registration/premium.php'><input value='Премиум' name='classica' type='submit' class='pressed-button-premium'/></a>";
    }

    else echo "<form method='post''><input name='classica' value = 'Премиум' type=submit class='pressed-button-premium' onClick= 'alert()' >";

    ?>

</div>

</body>
</html>