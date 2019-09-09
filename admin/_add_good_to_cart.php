<?php
$HEVA_CMS = "3.1.5.20130222";
session_start();
//header("Content-type:application/json");
include('_mysql.php');
if(isset($_POST['good']) && strlen($_POST['good'])<10 && is_numeric($_POST['good'])){
	$kols = mysql_query("SELECT kol FROM ".MySQLprefix."_cart WHERE user='".$_SESSION['user']."' AND good='".$_POST['good']."' AND status=1");
	if(mysql_num_rows($kols)==0)
		$Query = "INSERT INTO `".MySQLprefix."_cart` (`kol`, `user`, `good`) VALUES ('".$_POST['kol']."', '".$_SESSION['user']."', '".$_POST['good']."')";
	else
		$Query = "UPDATE ".MySQLprefix."_cart SET kol=kol+".$_POST['kol']." WHERE user='".$_SESSION['user']."' AND good='".$_POST['good']."'";
}else{
	$data = explode('|', $_POST['good']);
	foreach($data AS $line)
		if(strlen($line) > 0)
			$good[] = explode(":", $line);
	$kols = mysql_query("SELECT kol FROM ".MySQLprefix."_cart WHERE user='".$_SESSION['user']."' AND good='".$good[count($good)-1][1]."' AND mods='".$_POST['good']."' AND status=1");
	if(mysql_num_rows($kols)==0)
		$Query = "INSERT INTO `".MySQLprefix."_cart` (`kol`, `user`, `good`, `mods`, `price`) VALUES ('".$_POST['kol']."', '".$_SESSION['user']."', '".$good[count($good)-1][1]."', '".$_POST['good']."', '".$good[count($good)-2][1]."')";
	else
		$Query = "UPDATE ".MySQLprefix."_cart SET kol=kol+".$_POST['kol']." WHERE user='".$_SESSION['user']."' AND good='".$good[count($good)-1][1]."' AND mods='".$_POST['good']."'";
}
$res3 = mysql_query($Query);
$carts = mysql_query("SELECT ".MySQLprefix."_cart.id, ".MySQLprefix."_goods.price AS price, ".MySQLprefix."_cart.price AS price2, ".MySQLprefix."_cart.kol AS kol, ".MySQLprefix."_cart.mods, ".MySQLprefix."_cart.good AS good, ".MySQLprefix."_goods.name AS title, ".MySQLprefix."_goods.logo AS pics FROM ".MySQLprefix."_cart, ".MySQLprefix."_goods WHERE ".MySQLprefix."_cart.user='".$_SESSION['user']."' AND ".MySQLprefix."_cart.status=1 AND ".MySQLprefix."_cart.good=".MySQLprefix."_goods.id");
if($carts && mysql_num_rows($carts)>0){
	while($cart = mysql_fetch_assoc($carts)){
		$pic = 'admin/uploads/nophoto.png';
		$pics = explode('|', $cart['pics']);
		if(is_array($pics) && count($pics)>0)
			foreach($pics AS $picc)
				if(strlen($picc)>0 && $pic == 'admin/uploads/nophoto.png')
					$pic = $picc;
		$preview__items[] = '
		<div class="preview__item" data-cnt="'.$cart['kol'].'">
			<img src="/'.$pic.'" alt="" class="item__img">
			<a href="/goods/'.$cart['good'].'/" class="item__desc">'.$cart['title'].'</a>
			<span class="item__price">'.($cart['kol']*(strlen($cart['price2'])>0?$cart['price2']:$cart['price'])).' р.-</span>
			<button class="item__delete" data-id="'.$cart['id'].'"></button>
		</div>';
	}
	echo implode('',$preview__items);
}
?>