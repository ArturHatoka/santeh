<?php
include("_mysql.php");
include("_additional.php");
$headers  = 'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charset=utf-8'."\r\n".'From: '.$additional[2].' <noreplay@'.$_SERVER['SERVER_NAME'].'>'."\r\n";
mail($additional[11], 'Спецпредложение', '<p><b>'.$_POST['name'].'</b> (<a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a>'.($_POST['phone']!=''?', <b>'.$_POST['phone'].'</b>':'').')'.($_POST['company']!=''?' из <b>'.$_POST['company'].'</b>':'').' подал заявку на получение спецпредложения.</p>', $headers);
?>
<p style="color:green">Сообщение отправлено. Менеджер свяжется с Вами в ближайшее время.</p>