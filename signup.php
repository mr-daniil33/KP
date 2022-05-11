<?php

session_start();


$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'nepomnyashchy');

if (!$connect) {
    die('Error connect to DataBase');
}




//$full_name = clean($_POST['full_name']);
$full_name = $connect->real_escape_string(clean($_POST['full_name']));
//$login = clean($_POST['login']);
$login = $connect->real_escape_string(clean($_POST['login']));
//$email = clean($_POST['email']);
$email = $connect->real_escape_string(clean($_POST['email']));
//$password = clean($_POST['password']);
$password = $connect->real_escape_string(clean($_POST['password']));
//$password_confirm = clean($_POST['password_confirm']);
$password_confirm = $connect->real_escape_string(clean($_POST['password_confirm']));


if (!empty($full_name) && !empty($login) && !empty($email) && !empty($password) && !empty($password_confirm)) {
    $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (check_length($full_name, 2, 25) && check_length($login, 3, 15)  && $email_validate) {
        $_SESSION['message'] = 'Успешно';
        if ($password === $password_confirm) {

            $path = 'uploads/' . time() . $_FILES['avatar']['name'];
            move_uploaded_file($_FILES['avatar']['tmp_name'], $path);

            $password = md5($password);
            //$password = password_hash($password, PASSWORD_DEFAULT);

            // хешируем хеш, который состоит из логина и времени
            $hash = md5($login . time());

            // Переменная $headers нужна для Email заголовка
            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=utf-8\r\n";
            $headers .= "To: <$email>\r\n";
            $headers .= "From: <bibliotekaOmsk55@gmail.com>\r\n";
            // Сообщение для Email
            $message = '
                <html>
                <head>
                <title>Подтвердите Email</title>
                </head>
                <body>
                <p>Что бы подтвердить Email, перейдите по <a href="http://registration/confirm.php?hash=' . $hash . '">ссылка</a></p>
                </body>
                </html>
                ';

            mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`, `hash`, email_confirmed) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path', '$hash', 1)");
            mail($email, "Подтвердите Email на сайте", $message, $headers);
            $_SESSION['message'] = 'Регистрация прошла успешно!';
            header('Location: /index.php');


        } else {
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: /register.php');
        }
    } else { // добавили сообщение
        $_SESSION['message'] = 'Введенные данные некорректны!';
        header('Location: /register.php');


    }
} else { // добавили сообщение
    $_SESSION['message'] = 'Заполните пустые поля!';
    header('Location: /register.php');

}








?>


<?php
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}


?>
