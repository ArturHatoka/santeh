<?php
include("_mysql.php");
include("_additional.php");
$headers  = 'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charset=utf-8'."\r\n".'From: '.$additional[2].' <noreplay@'.$_SERVER['SERVER_NAME'].'>'."\r\n";
mail($additional[11], 'Обратная связь', '<p>Имя: <b>'.$_POST['name'].'</b><br/>Тел.: <b>'.$_POST['tel'].'</b><br/>Дата: <b>'.$_POST['data'].'</b><br/>Адрес: <b>'.$_POST['adres'].'</b><br/>Вопрос: <b>'.$_POST['usluga'].'</b><br/><br/>Отправлено со страницы <a href="'.$_SERVER['HTTP_REFERER'].'">'.$_SERVER['HTTP_REFERER'].'</a></p>', $headers);
?>
<p style="color:green">Сообщение отправлено. Менеджер свяжется с Вами в ближайшее время.</p>