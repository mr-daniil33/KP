<?php
// Подключаем коннект к БД
$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'nepomnyashchy');

// Проверка есть ли хеш
if ($_GET['hash']) {
    $hash = $_GET['hash'];
    // Получаем id и подтверждено ли Email
    if ($result = mysqli_query($connect, "SELECT `id`, `email_confirmed` FROM `users` WHERE `hash`='" . $hash . "'")) {
        while( $row = mysqli_fetch_assoc($result) ) {
            //echo $row['id'] . " " . $row['email_confirmed'];
            // Проверяет получаем ли id и Email подтверждён ли
            if ($row['email_confirmed'] == 1) {
                // Если всё верно, то делаем подтверждение
                mysqli_query($connect, "UPDATE `users` SET `email_confirmed`=0 WHERE `id`=". $row['id'] );
                echo "<h1>Email подтверждён</h1>";
            } else {
                echo "Что то пошло не так1";
            }
        }
    } else {
        echo "Что то пошло не так2";
    }
} else {
    echo "Что то пошло не так3";
}