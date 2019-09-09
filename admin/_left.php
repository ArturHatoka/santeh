			<div class="<?=($url['target_type']=='goods'?'item':'category')?>__sidebar">
				<?/*div class="sidebar__box">
					<h3 class="box__title">Категории</h3>
					<ul class="box__categ">
						<li><a href="#" class="categ__link">Уборочные тележки <sup>0</sup></a></li>
						<li><a href="#" class="categ__link">Мопы <sup>2</sup> </a></li>
						<li><a href="#" class="categ__link">Микрофибра <sup>5</sup></a> </li>
						<li><a href="#" class="categ__link">Микроспан <sup>12</sup></a> </li>
						<li><a href="#" class="categ__link">Вафельное полотно <sup>32</sup></a> </li>
						<li><a href="#" class="categ__link">Вискоза <sup>12</sup></a> </li>
						<li><a href="#" class="categ__link">Махровые <sup>23</sup></a> </li>
					</ul>
				</div*/?>
				<?
				$undercats = 0;
				$undergoods = 0;
				if($url['target_type']=='categories')
					$undercats = mysql_result(mysql_query("SELECT count(*) FROM ".MySQLprefix."_categories WHERE p_id='".$seo['id']."'"),0);
				if($undercats == 0)
					$undergoods = mysql_result(mysql_query("SELECT count(*) FROM ".MySQLprefix."_goods WHERE cat_ids LIKE '%|".$seo['id']."|%' AND status=1"),0);
				if($url['target_type']=='categories' && $undercats == 0 && $undergoods > 0){
					$prices = mysql_fetch_assoc(mysql_query("SELECT min(price) AS pmin, max(price) AS pmax FROM ".MySQLprefix."_goods WHERE status=1 AND cat_ids LIKE '%|".$seo['id']."|%'"));
					?>
				<div class="sidebar__box">
					<h3 class="box__title">Цена, <i class="rub_icon">е</i></h3>
					<form method="get" action="/<?=$urls[0]?>/" class="box__price_form">
						<?
						if($_GET['p']==1)
							unset($_GET['p']);
						if(isset($_GET) && is_array($_GET) && count($_GET)>0)
							foreach($_GET AS $g => $v)
								if($g != 'pmin' && $g != 'pmax'){
									?><input type="hidden" name="<?=$g?>" value="<?=$v?>" /><?
								}
						?>
						<div id="defaultSlider"></div>
						<div class="price_form__wrap">
							<input class="price_form__input" type="number" placeholder="от" name="pmin" value="<?=$prices['pmin']?>" />
							<input class="price_form__input" type="number" placeholder="до" name="pmax" value="<?=$prices['pmax']?>" />
						</div>
						<input type="submit" value="Показать" />
						<? if(isset($_GET['pmin'])||isset($_GET['pmax'])){ ?>
						<? $get = $_GET; unset($get['pmax'], $get['pmin'])?>
						<a class="reset-price" href="/<?=$urls[0]?>/<?=(count($get)>0?'?'.http_build_query($get):'')?>">Сбросить</a>
						<? } ?>
					</form>
				</div>
				<? } ?>
				<div class="sidebar__box">
					<h3 class="box__title">Каталог товаров</h3>
					<ul class="box__catal">
						<?
						$result = mysql_query("SELECT ".MySQLprefix."_urls.url, ".MySQLprefix."_categories.child_cnt, ".MySQLprefix."_categories.name, ".MySQLprefix."_categories.id, ".MySQLprefix."_categories.p_id FROM ".MySQLprefix."_categories, ".MySQLprefix."_urls WHERE ".MySQLprefix."_categories.id=".MySQLprefix."_urls.target_id AND ".MySQLprefix."_urls.target_type='categories' GROUP BY ".MySQLprefix."_categories.id ORDER BY ".MySQLprefix."_categories.p_id ASC, ".MySQLprefix."_categories.sort_id ASC");
						unset($treeid, $treename, $treeurl, $treepid, $treelevel);
						if($result)
							while($row = mysql_fetch_assoc($result)){
								$treeid[] = $row["id"];
								$treename[] = $row["name"];
								$treeurl[] = $row["url"];
								$treepid[] = $row["p_id"];
								$treecc[] = $row["child_cnt"];
								$treelevel[] = 0;
							}
						$count = count($treeid);
						for($i=0; $i<$count-1; $i++){
							$g = $i;
							for($j=1; $j<$count; $j++)
								if($treepid[$j] == $treeid[$i]){
									$jid = $treeid[$j];
									$jpid = $treepid[$j];
									$jchild_cnt = $treecc[$j];
									$jname = $treename[$j];
									$jurl = $treeurl[$j];
									$jlevel = $treelevel[$i]+1;
									$k = $j;
									while ($k>$g+1){
										$treeid[$k] = $treeid[$k-1];
										$treepid[$k] = $treepid[$k-1];
										$treecc[$k] = $treecc[$k-1];
										$treename[$k] = $treename[$k-1];
										$treeurl[$k] = $treeurl[$k-1];
										$treelevel[$k] = $treelevel[$k-1];
										$k = $k - 1;
									}
									$treeid[$g+1] = $jid;
									$treepid[$g+1] = $jpid;
									$treecc[$g+1] = $jchild_cnt;
									$treename[$g+1] = $jname;
									$treeurl[$g+1] = $jurl;
									$treelevel[$g+1] = $jlevel;
									$g++;
								}
						}
						for($i=0; $i<$count; $i++){
							$levels[$treelevel[$i]] = $treeid[$i];
							?>
						<li>
							<a class="<?=($treelevel[$i]==0?'catal__point':($treelevel[$i]==1?'deep__point':'down__point'))?>" href="<?=$cur_city[0]?>/<?=$treeurl[$i]?>/"<?php if(isset($tree_cat_ar) && is_array($tree_cat_ar) && in_array($treeid[$i], $tree_cat_ar)){?> class="opnd"<?php } ?>><?=$treename[$i]?></a>
							<?php
							if(isset($treelevel[$i+1]) && $treelevel[$i+1] > $treelevel[$i]){
								?>
							<ul class="<?=($treelevel[$i]==0?'catal__deep':'deep__down')?>">
								<?php
							}
							if(isset($treelevel[$i+1]) && $treelevel[$i+1] == $treelevel[$i]){
								?>
						</li>
								<?php
							}
							if(isset($treelevel[$i+1]) && $treelevel[$i+1] < $treelevel[$i] || !isset($treelevel[$i+1])){
								?>
						</li>
								<?php
								for($m = 1; $m <= $treelevel[$i] - (isset($treelevel[$i+1])?$treelevel[$i+1]:0); $m++){
									?>
							</ul>
						</li>
									<?php
								}
							}
							for($m = $treelevel[$i]; $m >= 0; $m--)
								$treechilds[$levels[$m]][] = $treeid[$i];
						}
						?>
					</ul>
				</div>
				<div class="sidebar__advert">
					<div class="advert__box">
						<span class="advert__act">Акция!</span>
						<img class="advert__img" src="/<?=$additional[27]?>" alt="" />
					</div>
					<span class="advert__desc"><?=$additional[25]?></span>
					<a href="#" class="advert__button">заказать со скидкой</a>
				</div>
			</div>