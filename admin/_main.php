	<main class="main">

        <? include('_slider_on_main.php'); ?>

        <section class="main__service">
            <h2>Наши услуги</h2>
            <div class="service__wrap">
                <?
                $uslugi = mysql_query("SELECT ".MySQLprefix."_categories.name, ".MySQLprefix."_urls.url, ".MySQLprefix."_categories.logo FROM ".MySQLprefix."_categories, ".MySQLprefix."_urls WHERE ".MySQLprefix."_categories.logo!='' AND ".MySQLprefix."_categories.p_id=0 AND ".MySQLprefix."_urls.target_type='categories' AND ".MySQLprefix."_urls.target_id=".MySQLprefix."_categories.id");
                if($uslugi)
                    while($usluga = mysql_fetch_assoc($uslugi)){
                        ?>
                        <a class="service__item" href="/<?=$usluga['url']?>/">
                            <img class="service__img" src="/<?=$usluga['logo']?>" alt="">
                            <span class="service__desc" style="color: #f93f44;">
                            <?=$usluga['name']?>
                            </span>
                        </a>
                        <?
                    }
                ?>
            </div>
        </section>

        <?
        $img_ = mysql_query("SELECT * FROM ".MySQLprefix."_photogal WHERE p_id=29 ORDER BY sort_id ASC");
        if($img_ && mysql_num_rows($img_)>0){
            ?>
            <section class="main__review">
                <h2>Отзывы о нас</h2>
                <div class="review__slider">
                    <?
                    while($img = mysql_fetch_assoc($img_)){
                        ?>
                        <div class="review__slide">
                            <img src="/<?=$img['logo']?>" alt="" />
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </section>
            <?
        }
        ?>

        <section class="main__specs">
            <h2>Наши специалисты</h2>
            <div class="specs__wrap">
                <?
                $result = mysql_query("SELECT * FROM ".MySQLprefix."_spec ORDER BY id ASC");
                if ($result)
                while ($row = mysql_fetch_assoc($result)){
                ?>
                <div class="specs__box">
                    <img src="/<?=$row['logo']?>" alt="<?=$row['dolzh']?> <?=$row['name']?>" class="specs__img">
                    <span class="specs__name"><?=$row['name']?></span>
                    <span class="specs__exp">Опыт <?=$row['stazh']?></span>
                </div>
                    <?
                }
                ?>
            </div>
        </section>
        <?
        $img_ = mysql_query("SELECT * FROM ".MySQLprefix."_photogal WHERE p_id=31 ORDER BY sort_id ASC");
        if($img_ && mysql_num_rows($img_)>0){
        ?>
        <section class="main__works">
            <h2>Наши работы</h2>
            <div class="works__slider">
                <?
                while($img = mysql_fetch_assoc($img_)){
                ?>
                <div class="works__slide">
                    <img src="/<?=$img['logo']?>" alt="">
                </div>
                    <?php
                }
                ?>
            </div>
        </section>
            <?
        }
        ?>
		<section class="main__text">
			<h2><?=$seo['h1']?></h2>
			<?=$seo['text']?>
		</section>
		<section class="main__request">
			<h2 class="request__title--white">
				<hr>Оставьте заявку и получите скидку!*
			</h2>
			<form action="" class="request__form request-form">
				<input type="text" name="name" placeholder="Как к вам обращаться?" />
				<input type="text" name="tel" placeholder="+7 (999) 999-99-99" required />
				<input type="submit" value="Рассчитать стоимость со скидкой" />
			</form>
			<span class="request__desc">
				*оставь заявку до конца сегодняшнего дня и получи скидку при расчете стоимости
			</span>
		</section>
	</main>