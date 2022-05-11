<?php

session_start();
$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'nepomnyashchy');

if (!$connect) {
    die('Error connect to DataBase');
}



$login = $connect->real_escape_string(clean($_POST['login']));
$password = $connect->real_escape_string(md5(clean($_POST['password'])));



$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
if (mysqli_num_rows($check_user) > 0) {


    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
        "id" => $user['id'],
        "full_name" => $user['full_name'],
        "avatar" => $user['avatar'],
        "email" => $user['email'],
        "hash" => $user['hash'],
        "status" => $user['status']
    ];



    header('Location: /two.php');

} else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: /index.php');
}


function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}


?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>



