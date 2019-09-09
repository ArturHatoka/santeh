    <title><?=$seo['title']?><?=(strlen($_GET['text'])>0?' &quot;'.$_GET['text'].'&quot;':'')?><? if(isset($_GET['p']) && is_numeric($_GET['p']) && $_GET['p']>1){ echo ' (Страница '.$_GET['p'].')'; } ?></title>
	<meta name="description" content="<?=$seo['description']?>" />
	<meta name="keywords" content="<?=$seo['keywords']?>" />
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/src/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/src/app/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="/src/app/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="/src/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/src/css/media.css" />
	<meta property="og:image" content="/<?=$additional[100]?>" />
	<meta name="twitter:image" content="/<?=$additional[100]?>" />
	<meta name="vk:image" content="/<?=$additional[100]?>" />
	<meta http-equiv="Content-Language" content="ru" />
	
	<?=$additional[6]?>

	<?=$additional[7]?>
