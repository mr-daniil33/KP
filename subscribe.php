<?php
session_start();


$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'nepomnyashchy');

$idsub = $_SESSION['user']['id'];

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

if
(mysqli_query($connect, "UPDATE `users` SET `status`= '2' WHERE `id` = '$idsub'")){
echo "<h1>Вы успешно активировали подписку!</h1>";
echo "<a href='http://registration/main.php'> <input value=' Главная' type='button' class='floating-button'' /> </a>";}
else {
    echo "<h1>Ошибка активации подписки</h1>";
    echo "<a href='http://registration/main.php'> <input value=' Главная' type='button' class='floating-button'' /> </a>";
}

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$idsub'");
$user = mysqli_fetch_assoc($check_user);

$_SESSION['user'] = [
    "id" => $user['id'],
    "full_name" => $user['full_name'],
    "avatar" => $user['avatar'],
    "email" => $user['email'],
    "hash" => $user['hash'],
    "status" => $user['status']
];

?>