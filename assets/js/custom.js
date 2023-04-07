
jQuery('.c-banner-w').slick({
    slidesToShow: 1,
    arrows: false,
    dots: true,
    adaptiveHeight: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2500,
});

jQuery('.c-blog-list').slick({
    slidesToShow: 2,
    autoplay: true,
    infinite: true,
    autoplaySpeed: 3000,
    speed: 500,
    arrows: true,
    prevArrow: "<button type='button' class='slick-prev pull-left'><img src='wp-content/themes/kadence-child/assets/img/product-arrow-1.png'></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><img src='wp-content/themes/kadence-child/assets/img/product-arrow-2.png'></button>",

    responsive: [
        {
            breakpoint: 1199,
            settings: {

                slidesToShow: 2
            }
        },
        {
            breakpoint: 767,
            settings: {

                centerPadding: '0',
                slidesToShow: 1
            }
        }
    ]
});
