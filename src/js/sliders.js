//Инициализация слайдеров
$(document).ready(function () {
    //Иниц. слайдера изображений на главной
    $('.main__slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        zIndex: 500,
    });
});

