//Инициализация слайдеров
$(document).ready(function () {
    //Иниц. слайдера изображений на главной
    $('.main__slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        zIndex: 500,
        autoplay: true,
        autoplaySpeed: 1000,
    });
    //Иниц. слайдера отзывов на главной
    $('.review__slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        zIndex: 500,
        autoplay: true,
        autoplaySpeed: 1000,
    });
    //Иниц. слайдера работ на главной
    $('.works__slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        zIndex: 500,
        autoplay: true,
        autoplaySpeed: 1000,
    });
});

