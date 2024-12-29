window.addEventListener('DOMContentLoaded', function (event) {
    new Glider(document.querySelector('.js-projects-slider'), {
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: true,
        arrows: {
            prev: '.arrow-prev',
            next: '.arrow-next'
        },
        responsive: [
            {
                breakpoint: 620,
                settings: {
                    slidesToShow: 2,
                    duration: 0.25
                }
            },{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    duration: 0.25
                }
            }
        ]
    });
})
