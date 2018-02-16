$(function() {
	$('.av-carousel-parthners').slick ({
		accessibility : false,
		arrows        : false,
		autoplay      : true,
		speed         : 4000,
		slidesToShow  : 5,
		slidesToScroll: 1,

			responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2
                }
			}, {
				breakpoint: 321,
				settings: {
                    slidesToShow: 1
                }

			}]
		});
	});

