<?php
session_start();


$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'nepomnyashchy');

$emailtest = $_SESSION['user']['email'];
$idtest = $_SESSION['user']['id'];
$check_user2 = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$idtest'");
$user2 = mysqli_fetch_assoc($check_user2);

$_SESSION['user2'] = [

    "hash" => $user2['hash'],
    "id" => $user2['id'],
    "email" => $user2['email'],
    "two-factor" => $user2['two-factor'],
    "status" => $user2['status']
];
//print_r ($user2);

$test2 = $_SESSION['user2']['hash'];
//echo $test2;
$twoid = $_SESSION['user2']['id'];
$twoemail = $_SESSION['user2']['email'];

$checking = $_SESSION['user2']['two-factor'];
;


$hash = $test2;

// Проверка на то, что есть пользователь с таки хешом







/*

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "To: <$twoemail>\r\n";
$headers .= "From: <bibliotekaOmsk55@gmail.com>\r\n";
// Сообщение для Email
$message = '
                <html>
                <head>
                <title>Двухфакорная аутентификация</title>
                </head>
                <body>
                <p>Ваш сгенерированный код: ' . $twocode . '</p>
                </body>
                </html>
                ';
/* if (mail($twoemail, "Двухфакторная аутентификация", $message, $headers))
    echo "сообщение отправлено";
else
    echo "Ошибка отправки";
*/
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

    <form action="check.php" class = "sendcode" method="post">
        <label></label>
        <button type="submit" >Отправить код</button>

    </form>


    <form  action="checkingcode.php" class = "checkingcode" method="post">
        <label>Проверка кода</label>
        <input type="text" name="two-factor">
        <button type="submit">Введите код</button>


    </form>

<?php




?>