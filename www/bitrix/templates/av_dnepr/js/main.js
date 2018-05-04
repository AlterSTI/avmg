$(function() {
	//Первая выпадайка
	$(".dropdown-top").click(function() {
		$(".base-top-data .base-top-data-inner:nth-child(odd), .base-top-data .base-top-data-inner:nth-child(even)").fadeToggle(500);
		$("body").toggleClass("dark-side");
		$(".dropdown-top, .base-top-data").toggleClass("dropdown-top-variant");
		$(".dropdown-top .address-more").toggleClass("rotate");
	});

	//Вторая выпадайка
    if ($(window).width() <= 991) {
        $(".banks-main-wrapper-box").click(function () {
            var rezult = $(this).toggleClass("banks-side-variant");
            console.log(rezult);
            $(this).each(function () {
				if ($(this).hasClass("banks-side-variant")) {
					$(".banks-side-variant .banks-main-address-box:nth-child(3), .banks-side-variant .bank-map-data").fadeIn(500);
					$(".banks-main-wrapper-box.banks-side-variant .type-metall-block").fadeIn(500);
					$(".banks-side-variant .address-more").addClass("rotate");
				} else {
					$(".address-box .banks-main-address-box:nth-child(3), .bank-map-data, .type-metall-block ").fadeOut(500);
					$(".address-more").removeClass("rotate");
				}
			});
        });

        $(".banks-address-popup").click(function () {
            $(".dropdown-top, .base-top-data").removeClass("dropdown-top-variant");
            $(".base-top-data .base-top-data-inner:nth-child(odd)").fadeOut();
            $(".base-top-data .base-top-data-inner:nth-child(even)").fadeIn();
            $(".dropdown-top .address-more").removeClass("rotate");
		});
    }

    // BUTTON UP CLICK
    $('#page-up-button').click(function() {
		$('html, body').stop().animate({scrollTop: 0}, 300);
	});
});

// BUTTON UP
function AvUpButtonBehavior()
{
    var $upButton = $('#page-up-button');
    if($(window).scrollTop() > $('.main').offset().top) $upButton.fadeIn();
    else
    	$upButton.fadeOut();
}

$(window).scroll(function() {
	AvUpButtonBehavior();
});