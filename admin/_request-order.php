<?php
include("_mysql.php");
include("_additional.php");
$headers  = 'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charset=utf-8'."\r\n".'From: '.$additional[2].' <noreplay@'.$_SERVER['SERVER_NAME'].'>'."\r\n";
mail($additional[11], 'Рассчет скидки', '<p>Имя: <b>'.$_POST['name'].'</b><br/>Тел.: <b>'.$_POST['tel'].'</b><br/><br/>Отправлено со страницы <a href="'.$_SERVER['HTTP_REFERER'].'">'.$_SERVER['HTTP_REFERER'].'</a></p>', $headers);
?>
<p style="color:green;width:100%;position:absolute;left:0;bottom:10px;text-align:center">Заявка принята. Менеджер свяжется с Вами в ближайшее время.</p>