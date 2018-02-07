$(function() {

	$("body").on("click ","#av-blur-screen",function(){$(".av-alert-popup").remove();AvBlurScreen("off");});

	/* ------------------ ОТМЕНА ВВОДА БУКВ В INPUT PHONE ----------------------------*/
	$(document).on("keydown", ".inputtext.phone", function(event) {
		// Разрешаем нажатие клавиш backspace, del, tab и esc
		if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
			// Разрешаем выделение: Ctrl+A
			(event.keyCode == 65 && event.ctrlKey === true) ||
			// Разрешаем клавиши навигации: home, end, left, right
			(event.keyCode >= 35 && event.keyCode <= 39)) {
			return;
		} else {
			// Запрещаем всё, кроме клавиш цифр на основной клавиатуре, а также Num-клавиатуре
			if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
				event.preventDefault();
			}
		}
	});
$('li[call-btn]').on('click', function() {
		AvBlurScreen("on", "999");
		$('[call-back-form]').fadeIn().positionCenter(9999).on('remove', function() {
			AvBlurScreen("off");
			$('body').removeClass("stop-scrolling");
		});
	});

	$('body').on('click', '#av-blur-screen', function() {
		AvBlurScreen("off");
		$('.popUp').fadeOut();
	});

	$("#hamburger").click(function() {
		$('.av-alert-popup').remove();
		$(this).toggleClass('open');
		$('.bg-mobile-menu').fadeToggle(400, 'swing').toggleClass('hidden');
		$('.bg-mobile-menu').bind('touchmove', function(e) {
			e.preventDefault()
		});
	});
	$('#mobile-menu li a').on('click', function() {
		$('.bg-mobile-menu').toggleClass('hidden');
		$('#hamburger').toggleClass('open');
	});

$('[close-form2]').on('click', function() {
AvBlurScreen("off");
$('.popUp').fadeOut(); 
	});
});
$("body").on("click touchstart","#av-blur-screen",function(){$(".av-alert-popup").remove();AvBlurScreen("off");});

function CreateAvAlertPopup2(html, type) {
	$('.av-alert-popup').remove();
	return $('<div class="av-alert-popup">' + html + '<div close-form2></div>' + '</div>').appendTo('body').on('click', '[close-form2]', function() {
		$(this).closest('.av-alert-popup').remove();
		$('[form-input-error-123]').removeClass("show");
		AvBlurScreen("off");
	});
}
function ShowPopUp() {
	AvBlurScreen("off");
	AvBlurScreen("on", 1000);
	$('#form-anwer123').hide()
	CreateAvAlertPopup2($('#form-anwer123').html(), "").positionCenter(9999).on('remove', function() {
		$('body').removeClass("stop-scrolling");AvBlurScreen("off");
	});
}
