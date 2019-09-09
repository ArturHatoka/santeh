<main class="main">
	<section class="main__category" style="margin-top: 25px">
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