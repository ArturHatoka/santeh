	<main class="main">
		<section class="main__header">
			<h2 class="header__title"><?=$seo['h1']?></h2>
			<hr class="header__splash">
			<div class="header__crumbs">
				<a href="/" class="crumbs__link">Главная</a>
				<img class="crumbs__arrow" src="/src/img/crumb_arrow.svg" alt="" /><span class="crumbs__active"><?=$seo['menu']?></span>
			</div>
		</section>
		<section class="main__category">
			<? include('_left.php'); ?>
			<div class="category__wrap">
				<div class="category__text">
					<h1 class="text__title"><?=$seo['h1']?></h1>
					<div class="text__desc">
						<?=$seo['text']?>
						<form method="post" class="prcceed-form">
							<div class="fl-ll">
								<label>Ф.И.О.*:</label>
								<input class="text" type="text" name="name" />
							</div>
							<div class="fl-ll">
								<label>Контактный телефон*:</label>
								<input class="text" type="text" name="contacts" />
							</div>
							<div class="fl-ll">
								<label>E-mail*:</label>
								<input class="text" type="text" name="email" />
							</div>
							<div class="fl-ll">
								<label>Самовывоз:</label>
								<span class="ckeck"><input type="checkbox" name="self-shiping" value="1" /> Отметьте если хотите самостоятельно забрать товар с нашего склада.</span>
							</div>
							<div class="fl-ll">
								<label>Адрес доставки:</label>
								<textarea class="text" name="address"></textarea>
							</div>
							<div class="fl-ll">
								<label>Комментарии:</label>
								<textarea class="text" name="text"></textarea>
							</div>
							<div class="star-text">* Поля обязательные для заполнения</div>
							<div class="atttn-text">Пожалуйста, еще раз внимательно проверьте заполненные поля</div>
							<input type="hidden" name="robo" value="no" />
						</form>
						<a class="send-order" style="float:right;margin-right:20px" rel="Перейти к оплате" rel2="Завершить оформление">Завершить оформление</a>
						<?php if($additional[55]==1){ ?><label style="float:left;margin:15px 0 0 0" class="robo"><input type="checkbox" style="vertical-align:-1px"> <b style="font-size:110%">Оплатить онлайн с помощью</b> <img style="vertical-align:-2px" src="/admin/img/robo.png" /></label><?php } ?>
					</div>
				</div>
			</div>
		</section>
	</main>