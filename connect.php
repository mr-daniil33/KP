<?php

$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'nepomnyashchy');



if (!$connect) {
    die('Error connect to DataBase');
}