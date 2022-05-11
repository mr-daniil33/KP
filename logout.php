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
mysqli_query($connect, "UPDATE `users` SET `two-confirmed`= '0' WHERE `id` = '$idtwo'");
mysqli_query($connect, "UPDATE `users` SET `two-factor`= '0' WHERE `id` = '$idtwo'");
unset($_SESSION['user']);
header('Location: /index.php');