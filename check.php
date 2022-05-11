<?php


session_start();


$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'nepomnyashchy');
$test2 = $_SESSION['user2']['hash'];
$hash = $test2;
$twoemail = $_SESSION['user2']['email'];
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}

// Output: iNCHNGzByPjhApvn7XBD



$twocode = generate_string($permitted_chars, 10);
$idtest = $_SESSION['user']['id'];

?>


    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Проверка кода</title>
        <link rel="stylesheet" href="/assets/css/biblio.css">
    </head>
    <body>

    <a href='http://registration/two.php'> <input value='Вернуться' type='button' class='floating-button'' /> </a>

    </body>
    </html>

<?php
mysqli_query($connect, "UPDATE `users` SET `two-factor`= '$twocode' WHERE `id` = '$idtest'");




$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "To: <$twoemail>\r\n";
$headers .= "From: <bibliotekaOmsk55@gmail.com>\r\n";
// Сообщение для Email
$message = '
                <html>
                <head>
                <title>Двухфакторная аутентификация</title>
                </head>
                <body>
                <p>Ваш сгенерированный код: ' . $twocode . '</p>
                </body>
                </html>
                ';
if (mail($twoemail, "Двухфакторная аутентификация", $message, $headers))
    echo " <h1>Сообщение отправлено на ваш email: $twoemail</h1>";

else
    echo "Ошибка отправки";



?>