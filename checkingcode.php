<?php
session_start();

$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'nepomnyashchy');
$checkmail = $connect->real_escape_string($_POST['two-factor']);

$checking = $_SESSION['user2']['two-factor'];



?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Проверка кода</title>
        <link rel="stylesheet" href="/assets/css/biblio.css">
    </head>
    <body>



    </body>
    </html>


<?php

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


If ($checking == $checkmail && !empty($checking) && !empty($checkmail) )
{
    echo "<h1>Код подтвержден! Теперь вы можете перейти на главную страницу!</h1>";
    echo "<a href='http://registration/main.php'> <input value=' Главная' type='button' class='floating-button'' /> </a>";
    mysqli_query($connect, "UPDATE `users` SET `two-confirmed`= '1' WHERE `id` = '$idtwo'");

}

else {
    echo "<h1>Неверный код. Ваша сессия была прекращена.</h1>";
    unset($_SESSION['user']);
    echo "<a href='http://registration/index.php'> <input value='Авторизация' type='button' class='floating-button'' /> </a>";

}

