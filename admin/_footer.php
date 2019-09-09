	<footer class="footer">
        <div class="footer__wrap">
            <div class="footer__info">
                <img class="footer__logo" src="/<?=$additional[13]?>" alt="">
                <div class="footer__contacts">
                    <a class="footer__tel" href="tel:<?=str_replace(array(' ','(',')','-'),'',$additional[4])?>"><img src="/src/img/phone.png" alt=""> <?=$additional[4]?></a>
                    <a class="footer__mail" href="mailto:<?=$additional[11]?>"><img src="/src/img/mail.png" alt=""><?=$additional[11]?></a>
                </div>
                <div class="footer__buttons">
                    <button class="footer__button button__call"><img src="/src/img/phone-contact.png" alt="">Заказать звонок</button>
                    <button class="footer__button button__mail"><img src="/src/img/envelope.png" alt="">Отправить заявку</button>
                </div>
                <span class="footer__time">
                <?=$additional[9]?>
                </span>
                <span class="footer__copyright">
                <?=str_replace("\r\n","<br/>",$additional[12])?>
                </span>
            </div>
            <div class="footer__map">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A01c39859606da23d42862e64ce6461dd14fb0a2755af5ec191253b9c1ca192b6&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
        </div>


	</footer>
<!--	<section class="request__background w-form">-->
<!--		<div class="request__wrap main__form">-->
<!--			<button class="request__close"></button>-->
<!--			<h3 class="request__title">Закажите клининг в Казани</h3>-->
<!--			<span class="request__subtitle">Просто заполните форму, наш менеджер перезвонит Вам</span>-->
<!--			<form action="" class="form__box service-form">-->
<!--				<input type="text" class="form__input--small" name="name" placeholder="Как к вам обращаться?" />-->
<!--				<input type="text" class="form__input--small" name="tel" placeholder="+7 (999) 999-99-99" required />-->
<!--				<input type="text" class="form__input--small" name="data" placeholder="Дата и время заказа" />-->
<!--				<input type="text" class="form__input--big" name="adres" placeholder="укажите Адрес" />-->
<!--				<textarea class="form__input--big" rows="4" name="usluga" placeholder="Какая услуга требуется?"></textarea>-->
<!--				<input type="submit" class="form__button" value="Отправить заявку менеджеру" />-->
<!--			</form>-->
<!--		</div>-->
<!--	</section>-->