$(document).ready(function () {

   $('#slider-container .navigation-slider .sow-image-grid-wrapper').slick({
        centerMode: true,
        slidesToShow: 3,
        centerPadding: '60px',
        asNavFor: '#slider-container .slick-background .sow-image-grid-wrapper',
        infinite: true,
        autoplay: false,
        autoplaySpeed: 3000,

        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: false,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: false,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });

    $('#slider-container .slick-background .sow-image-grid-wrapper').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '#slider-container .navigation-slider .sow-image-grid-wrapper'
    });

});