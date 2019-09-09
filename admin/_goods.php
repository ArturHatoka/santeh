	<main class="main">
		<section class="main__header">
			<h2 class="header__title"><?=$seo['h1']?></h2>
			<hr class="header__splash">
			<div class="header__crumbs">
				<a href="/" class="crumbs__link">Главная</a><img class="crumbs__arrow" src="/src/img/crumb_arrow.svg" alt="" /><a class="crumbs__link" href="<?=$cur_city[0]?>/<?=$katalog_a['url']?>/"><?=$katalog_a['menu']?></a>
				<?
				$tree = '<img class="crumbs__arrow" src="/src/img/crumb_arrow.svg" alt="" /><span class="crumbs__active">'.$seo['name'].'</span>';
				$tree_cat_ar[] = $seo['id'];
				$cat_ids = explode("|", substr($seo['cat_ids'],1,strlen($seo['cat_ids'])-2));
				$parent = $cat_ids[0];
				$first_pid = 0;
				$first_i = 0;
				while($parent!=0){
					$first_i++;
					if(isset($par_data))
						unset($par_data);
					$par_r = mysql_query("SELECT ".MySQLprefix."_urls.url, ".MySQLprefix."_categories.id, ".MySQLprefix."_categories.name, ".MySQLprefix."_categories.p_id FROM ".MySQLprefix."_categories, ".MySQLprefix."_urls WHERE ".MySQLprefix."_categories.id=".$parent." AND ".MySQLprefix."_urls.target_type='categories' AND ".MySQLprefix."_urls.target_id=".MySQLprefix."_categories.id LIMIT 0, 1");
					if($par_r && mysql_num_rows($par_r)==1)
						$par_data = mysql_fetch_assoc($par_r);
					if($first_i==2)
						$first_pid = $par_data['id'];
					$tree = '<img class="crumbs__arrow" src="/src/img/crumb_arrow.svg" alt="" /><a class="crumbs__link" href="'.$cur_city[0].'/'.$par_data['url'].'/">'.$par_data['name'].'</a>'.$tree;
					$tree_cat_ar[] = $par_data['id'];
					$parent = $par_data['p_id'];
				}
				?>
				<?=$tree?>
			</div>
		</section>
		<section class="main__item">
			<? include('_left.php'); ?>
			<div class="item__wrap">
				<div class="item__header">
					<h3 class="item__title"><?=$seo['h1']?></h3>
					<div class="item__links">
						<a class="links__button" href='javascript:window.print(); void 0;'>
							<svg class="links__print" xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20"><g><g><path d="M19 4c1.049 0 2 .913 2 2v8c0 1.086-.951 2-2 2h-3v3c0 .234-.773 1-1 1H6c-.227 0-1-.766-1-1v-3H2c-1.049 0-2-.914-2-2V6c0-1.087.951-2 2-2h2V1c0-.723.303-1 1-1h11c.697 0 1 .277 1 1v3zM5 4h11V2c0-.254-.755-1-1-1H6c-.245 0-1 .746-1 1zm10 8H6v7h9zm5-6c0-.618-.404-1-1-1H2c-.597 0-1 .382-1 1v8c0 .618.403 1 1 1h3v-3c0-.235.773-1 1-1h9c.227 0 1 .765 1 1v3h3c.597 0 1-.382 1-1zm-6.425 9.014c.242 0 .437.218.437.486s-.195.485-.437.485h-6.15c-.242 0-.438-.217-.438-.485s.196-.486.438-.486zm.039 1.977c.22 0 .397.225.397.503s-.178.504-.397.504h-1.205c-.22 0-.398-.226-.398-.504s.178-.503.398-.503zm-5.023 0c.22 0 .398.225.398.503s-.178.504-.398.504H7.386c-.22 0-.397-.226-.397-.504s.178-.503.397-.503zM13.575 13c.242 0 .437.226.437.504s-.195.504-.437.504h-6.15c-.242 0-.438-.226-.438-.504s.196-.503.438-.503zm1.938-6.995c.259 0 .468.226.468.504s-.21.503-.468.503H14.47c-.259 0-.469-.225-.469-.503s.21-.504.469-.504zm3.015 0c.259 0 .468.226.468.504s-.21.503-.468.503h-1.043c-.259 0-.468-.225-.468-.503s.21-.504.468-.504zM10.5 16.991c.278 0 .505.226.505.503a.505.505 0 0 1-1.01 0c0-.277.227-.503.505-.503z"/></g></g></svg>
							Печать
						</a>
						<?/*button class="links__share">
							<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"><g><g>
								<path d="M16.52 15.503A3.498 3.498 0 0 1 13.029 19a3.498 3.498 0 0 1-3.273-4.718l-3.542-2.015a3.499 3.499 0 0 1-2.723 1.308A3.498 3.498 0 0 1 0 10.079 3.498 3.498 0 0 1 3.49 6.583c1.168 0 2.252.59 2.895 1.541l2.436-1.128a5.212 5.212 0 0 1-.298-1.75C8.524 2.353 10.874 0 13.762 0 16.65 0 19 2.353 19 5.246c0 2.892-2.35 5.246-5.238 5.246a5.215 5.215 0 0 1-2.825-.828A5.257 5.257 0 0 1 9.303 8l-2.45 1.134a3.51 3.51 0 0 1-.09 2.165l3.543 2.015a3.5 3.5 0 0 1 2.723-1.307 3.498 3.498 0 0 1 3.491 3.496zm-2.758-14.39a4.133 4.133 0 0 0 0 8.265 4.133 4.133 0 0 0 0-8.265zM1.113 10.08a2.383 2.383 0 0 0 2.378 2.383 2.384 2.384 0 0 0 0-4.766 2.383 2.383 0 0 0-2.378 2.383zm9.537 5.424a2.384 2.384 0 0 0 2.379 2.383 2.383 2.383 0 0 0 0-4.766 2.384 2.384 0 0 0-2.379 2.383z"/></g></g>
							</svg>
						</button*/?>
					</div>
				</div>
				<div class="item__block">
					<?php
					$good_pics = explode('|', $seo['logo']);
					if(is_array($good_pics) && count($good_pics)>0){
						for($gp=0; $gp<count($good_pics); $gp++)
							if(strlen($good_pics[$gp])==0)
								unset($good_pics[$gp]);
						$good_pic = array_values($good_pics);
					}
					?>
					<div class="item__img">
						<img src="/<?=$good_pic[0]?>" alt="" />
					</div>
					<div class="item__character">
						<div class="item__row">
							<span>Артикул</span>
							<hr class="item__splash">
							<span><?=$seo['g_art']?></span>
						</div>
						<?
						$more_cats_r = mysql_query("SELECT ".MySQLprefix."_good_chars.id, ".MySQLprefix."_good_chars.ed AS char_ed, ".MySQLprefix."_good_chars.name AS char_name, ".MySQLprefix."_good_chars_val.char_val FROM ".MySQLprefix."_good_chars, ".MySQLprefix."_good_chars_val WHERE ".MySQLprefix."_good_chars.id=".MySQLprefix."_good_chars_val.char_id AND ".MySQLprefix."_good_chars_val.good_id=".$seo["id"]." ORDER BY ".MySQLprefix."_good_chars.sort_id");
						if($more_cats_r && mysql_num_rows($more_cats_r)>0)
							while($more_cats = mysql_fetch_assoc($more_cats_r)){
								?>
						<div class="item__row">
							<span><?=$more_cats['char_name']?></span>
							<hr class="item__splash">
							<span><?=$more_cats['char_val']?><?=(strlen($more_cats['char_ed'])>0?',&nbsp;'.$more_cats['char_ed']:'')?></span>
						</div>
								<?
							}
						?>
					</div>
					<div class="item__question">
						<span class="question__desc">Есть вопросы по товару?</span>
						<a href="#" class="question__link">Задайте их нам</a>
					</div>
					<div class="item__price">
						<div class="price__wrap">
							<span class="price__title">Цена на товар</span>
							<span class="price__summ"><b><?=$seo['price']?></b> руб.-</span>
							<a href="#" data-id="<?=$seo['id']?>" class="price__button">в корзину</a>
						</div>
					</div>
				</div>
				<? if(strlen($seo['desc_full'])>0){ ?>
				<div class="item__desc">
					<ul class="desc__list">
						<li class="desc__point active">
							О товаре
						</li>
						<div class="desc__deep active">
							<?=$seo['desc_full']?>
						</div>
					</ul>
				</div>
				<? } ?>
				<?
				$result = mysql_query("SELECT ".MySQLprefix."_urls.url, ".MySQLprefix."_categories.child_cnt, ".MySQLprefix."_categories.name, ".MySQLprefix."_categories.id, ".MySQLprefix."_categories.p_id FROM ".MySQLprefix."_categories, ".MySQLprefix."_urls WHERE ".MySQLprefix."_categories.id=".MySQLprefix."_urls.target_id AND ".MySQLprefix."_urls.target_type='categories' AND ".MySQLprefix."_categories.p_id=".$first_pid." GROUP BY ".MySQLprefix."_categories.id ORDER BY ".MySQLprefix."_categories.p_id ASC, ".MySQLprefix."_categories.sort_id ASC");
				if($result){
					?>
				<div class="item__related">
					<h3 class="related__title">Похожие разделы:</h3>
					<div class="related__wrap">
					<?
					while($row = mysql_fetch_assoc($result)){
						?>
						<a href="<?=$cur_city[0]?>/<?=$row['url']?>/" class="related__button"><?=$row['name']?></a>
						<?
					}
					?>
					</div>
				</div>
					<?
				}
				?>
				<?php
				$with_its2 = json_decode($seo['with_it'], true);
				foreach($with_its2 AS $id => $t)
					$with_its[] = $id;
				$result = mysql_query("SELECT logo, id, name, price FROM ".MySQLprefix."_goods WHERE id!='".$seo['id']."' AND id IN (".implode(", ", $with_its).") GROUP BY RAND() ORDER BY sort_id DESC");
				if($result && mysql_num_rows($result)>0){
					?>
				<div class="item__adds">
					<h3 class="adds__title">
						<hr>Сопутствующие товары
					</h3>
					<div class="adds__slider">
						<?
						while($goodi = mysql_fetch_assoc($result)){
							$pic = 'admin/uploads/nophoto.png';
							$pics = explode('|', $goodi['logo']);
							if(is_array($pics) && count($pics)>0)
								foreach($pics AS $picc)
									if(strlen($picc)>0 && $pic == 'admin/uploads/nophoto.png')
										$pic = $picc;
							?>
						<div class="adds__item">
							<div class="adds__img">
								<img src="/<?=$pic?>" alt="" />
							</div>
							<span class="adds__name"><?=$goodi['name']?></span>
							<div class="adds__bottom">
								<span class="adds__price"><?=$goodi['price']?> р.-</span>
								<a href="/goods/<?=$goodi['id']?>/" class="adds__cart">
									<img src="/src/img/cart.svg" alt="" />
								</a>
							</div>
						</div>
							<?
						}
						?>
					</div>
				</div>
					<?
				}
				?>
			</div>
		</section>
		<section class="main__request">
			<h2 class="request__title--white">
				<hr>Оставьте заявку и получите 15% скидку!*
			</h2>
			<form action="" class="request__form">
				<input type="text" name="name" placeholder="Как к вам обращаться?" />
				<input type="text" name="tel" placeholder="+7 (999) 999-99-99" required />
				<input type="submit" value="Рассчитать стоимость со скидкой" />
			</form>
			<span class="request__desc">
				*оставь заявку до конца сегодняшнего дня и получи 15% скидку при расчете стоимости
			</span>
		</section>
	</main>