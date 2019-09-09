<main class="main">
    <section class="main__header">
		<? $photogal_a = mysql_fetch_assoc(mysql_query("SELECT menu, url FROM ".MySQLprefix."_mypages WHERE id='64'")); ?>
        <h2 class="header__title"><?=$seo['h1']?></h2>
        <hr class="header__splash">
		<div class="header__crumbs">
            <a href="/" class="crumbs__link">Главная</a>
			<img class="crumbs__arrow" src="/src/img/crumb_arrow.svg" alt="" /><a class="crumbs__link" href="/<?=$photogal_a['url']?>/"><?=$photogal_a['menu']?></a>
			<?php
			$tree = '';
			$tree_cat_ar[] = $urls[1];
			$parent = mysql_result(mysql_query("SELECT p_id FROM ".MySQLprefix."_photoalb WHERE id=".$urls[1]),0);
			while($parent!=0){
				if(isset($par_data))
					unset($par_data);
				$par_r = mysql_query("SELECT id, name, p_id FROM ".MySQLprefix."_photoalb WHERE id=".$parent." LIMIT 0, 1");
				if($par_r && mysql_num_rows($par_r)==1)
					$par_data = mysql_fetch_assoc($par_r);
				$tree = '<img class="crumbs__arrow" src="/src/img/crumb_arrow.svg" alt="" /><a class="crumbs__link" href="/photos/'.$par_data['id'].'/">'.$par_data['name'].'</a>'.$tree;
				$tree_cat_ar[] = $par_data['id'];
				$parent = $par_data['p_id'];
			}
			echo $tree;
			?>
			<img class="crumbs__arrow" src="/src/img/crumb_arrow.svg" alt="" /><span class="crumbs__active"><?=$seo['name']?></span>
        </div>
    </section>
	<section class="main__category">
		<div class="category__wrap" style="max-width:100%">
			<div class="category__text">
				<h1 class="text__title"><hr/><?=$seo['h1']?></h1>
				<div class="text__desc" style="width:100%">
					<div class="thumbs">
						<?php
						$img_ = mysql_query("SELECT * FROM ".MySQLprefix."_photoalb WHERE p_id=".$urls[1]." ORDER BY sort_id ASC");
						if($img_ && mysql_num_rows($img_)>0)
							while($img = mysql_fetch_assoc($img_)){
								?>
						<div class="photoalb">
							<a href="/photos/<?=$img['id']?>/">
								<img src="/<?=str_replace(".","_small.",$img['logo'])?>" />
							</a>
							<a href="/photos/<?=$img['id']?>/"><?=$img['name']?></a>
						</div>
								<?php
							}
						$img_ = mysql_query("SELECT * FROM ".MySQLprefix."_photogal WHERE p_id=".$urls[1]." ORDER BY sort_id ASC");
						if($img_ && mysql_num_rows($img_)>0)
							while($img = mysql_fetch_assoc($img_)){
								?>
						<div class="photoalb">
							<a rel="gal" href="/<?=$img['logo']?>">
								<img src="/<?=str_replace(".","_small.",$img['logo'])?>" />
							</a>
							<a><?=$img['name']?></a>
						</div>
								<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>