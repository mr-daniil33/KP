<?php

session_start();


$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'nepomnyashchy');

?>

<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Проверка кода</title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>



    </body>
    </html>

    <form action="subscribe.php" class = "sendcode" method="post">
        <label></label>
        <button type="submit" >Оформить подписку</button>

    </form>