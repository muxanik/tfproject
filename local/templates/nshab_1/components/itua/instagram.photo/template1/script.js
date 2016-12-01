$(document).ready(function(e) {
    if($('#instagram-slider').length>0)
    {
    $('#instagram-slider').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 100000,
        nextArrow: '<div class="next"></div>',
        prevArrow: '<div class="prev"></div>',
        responsive: [
                {
                breakpoint: 1024,
                settings: {
                        slidesToShow: 1,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                }
                },
                {
                breakpoint: 600,
                settings: {
                        slidesToShow: 1,
                        slidesToScroll: 2
                }
                },
                {
                breakpoint: 480,
                settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                }
                }
        ]
        });
    }
});