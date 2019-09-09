<main class="main">
    <section class="main__header">
		<? $photogal_a = mysql_fetch_assoc(mysql_query("SELECT menu, url FROM ".MySQLprefix."_mypages WHERE id='64'")); ?>
        <h2 class="header__title"><?=$photogal_a['menu']?></h2>
        <hr class="header__splash">
        <div class="header__crumbs">
            <a href="/" class="crumbs__link">Главная</a>
            <img class="crumbs__arrow" src="/src/img/crumb_arrow.svg" alt="">
            <span class="crumbs__active"><?=$photogal_a['menu']?></span>
        </div>
    </section>
	<section class="main__category">
		<div class="category__wrap" style="max-width:100%">
			<div class="category__text">
				<h1 class="text__title"><hr/><?=$seo['h1']?></h1>
				<div class="text__desc" style="width:100%">
					<div class="thumbs">
						<?php
						$img_ = mysql_query("SELECT * FROM ".MySQLprefix."_photoalb WHERE p_id=0 AND id!=29 ORDER BY sort_id ASC");
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
						$img_ = mysql_query("SELECT * FROM ".MySQLprefix."_photogal WHERE p_id=0 ORDER BY sort_id ASC");
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