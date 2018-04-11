$(function() {
	//Первая выпадайка
	$(".dropdown-top .address-more").click(function() {
		$(".base-top-data .base-top-data-inner:nth-child(odd), .base-top-data .base-top-data-inner:nth-child(even)").fadeToggle(500);
		$("body").toggleClass("dark-side");
		$(".dropdown-top, .base-top-data").toggleClass("dropdown-top-variant");
		$(this).toggleClass("rotate");
	});

	//Вторая выпадайка
	$(".address-box").click(function(event) {
		var e = event.target;
        var rezult = $(e).parent().parent().toggleClass("lololo");

        $(this).each(function(){
			if ($(this).hasClass("lololo") && $(this).parent().parent().children().hasClass("bank-map-data") && $(this).parent().parent().parent().children().hasClass("type-metall-block")) {
				$(".lololo .banks-main-address-box:nth-child(3), .lololo .bank-map-data").fadeIn(500);
                $(this).parent().parent().parent().children().fadeIn(500);
				$(this).parent().parent().children().fadeIn(500);
                $(".lololo .address-more").addClass("rotate");
			} else {
                $(".lololo .banks-main-address-box:nth-child(3), .bank-map-data, .type-metall-block ").fadeOut(500);
                $(".address-more").removeClass("rotate");
                // $(this).parent().parent().parent().children().fadeOut(500);
                //$(this).parent().parent().children().fadeOut(500);
			}
        });
	});
});