<?php
if(mail('dannep@mail.ru', 'Тема письма', 'Отправка почты через локальный сервер openserver', 'From: bibliotekaOmsk55@gmail.com') ) {echo'Письмо успешно отправлено';
}else{echo 'Ошибка';}
?>