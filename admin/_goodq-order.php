<?php
include("_mysql.php");
include("_additional.php");
$headers  = 'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charset=utf-8'."\r\n".'From: '.$additional[2].' <noreplay@'.$_SERVER['SERVER_NAME'].'>'."\r\n";
mail($additional[11], 'Вопрос по товару', '<p>Имя: <b>'.$_POST['name'].'</b><br/>Тел.: <b>'.$_POST['tel'].'</b><br/>Вопрос: <b>'.$_POST['usluga'].'</b><br/><br/>Отправлено со страницы товара <a href="'.$_SERVER['HTTP_REFERER'].'">'.$_POST['good']['name'].'</a></p>', $headers);
?>
<p style="color:green">Вопрос отправлен. Менеджер свяжется с Вами в ближайшее время.</p>