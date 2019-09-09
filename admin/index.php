<?php
$HEVA_CMS = "3.1.5.20130222";
if (ini_get('register_globals') == '1' || strtolower(ini_get('register_globals')) == 'on')
	die('Отключите register_globals в php.ini/.htaccess (угроза безопасности)');
session_start();
if (strpos($_SERVER['REQUEST_URI'], '_small.') > 0 && !file_exists("..".$_SERVER['REQUEST_URI'])){
	include("_small.php");
	die;
}
if(isset($_SESSION['user']))
	$user = $_SESSION['user'];
else{
	if (isset($_COOKIE['user']))
		$_SESSION['user'] = $user = $_COOKIE['user'];
	else{
		$_SESSION['user'] = $user = round(rand(10000000000,99999999999),0);
		setcookie("user", $user, time()+3600*24*30);
	}
}
ini_set('display_errors', 0);
include("_mysql.php");
include("_additional.php");
include("_url.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<? include("_head.php"); ?>
</head>
<body>
	<?php include("_header.php"); ?>
	<?php include("_".$url['target_type'].".php"); ?>
	<?php include("_footer.php"); ?>
	<?/*script src="/src/js/jquery.min.js"></script*/?>
	<script src="/src/js/jquery.1.8.3.min.js"></script>
	<script src="/src/app/slick/slick.min.js"></script>
	<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<? if($url['target_type']=='photogal' || $url['target_type']=='photoalb'){ ?>
	<link rel="stylesheet" type="text/css" href="/admin/css/jquery.fancybox-1.3.4.css" media="screen, projection" />
	<script type="text/javascript" src="/admin/js/jquery.fancybox-1.3.4.pack.js"></script>
	<script>
		$(document).ready(function(){
			$('a[rel="gal"]').fancybox({'transitionIn': 'none', 'transitionOut': 'none'});
		})
	</script>
	<? } ?>
	<? if($url['target_type']=='categories'){ ?>
	<link rel="stylesheet" type="text/css" href="/src/css/jquery-ui-1.8.10.custom.css" />
	<script src="/src/js/jquery-ui-1.8.10.custom.min.js"></script>
	<script src="/src/js/jqrangeslider.js"></script>
	<? } ?>
	<script src="/src/js/script.js"></script>
    <script src="/src/js/sliders.js"></script>
</body>
</html>