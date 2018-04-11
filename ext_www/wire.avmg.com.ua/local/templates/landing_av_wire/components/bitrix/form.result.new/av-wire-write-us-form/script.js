$(function() {
	$('.av-form-wrap-2  input,.av-form-wrap-2 textarea').each(function() {
		if($(this).val()) {
			$(this).prev(".av-form-wrap-2 span[title]").attr("up", true)
		}
	});

	$('body').on('focus', '.av-form-wrap-2  input, .av-form-wrap-2 textarea', function() {
		$(this).prev(".av-form-wrap-2 span[title]").attr("up", true);
	});

	$('body').on('focusout', '.av-form-wrap-2 input, .av-form-wrap textarea', function() {
		if(!$(this).val()){ $(this).prev(".av-form-wrap-2 span[title]").removeAttr("up")}
	});

// проверка формы на заполненность////////
	$('body').on('click', '.av-form-wrap-2 [name=web_form_submit]', function()
	{
        $('[data-form-input-error]').remove();
		var
			$form     = $(this).closest('form'),
			formError = false,
			t = 0;
		$form.find('[form-error]').removeAttr("form-error");
		$form.find('.required input[type=text], .required textarea ').each(function()
			{
			if(!$(this).val()) {
					$(this).attr("form-error","true" );
					formError = true;
					$('.av-form-wrap-2  input,.av-form-wrap-2 textarea').each(function() {
						if($(this).val()) {
							$(this).prev(".av-form-wrap-2 span[title]").attr("up", true)
						}
					});
				}
			});

		if(formError != false){
			event.preventDefault();
			$('[data-form-input-error-123]').addClass("show");
			}
			else  $(this).attr("disable", true);
			});
//---------------------------УДАЛЕНИЕ КРАСНЫХ ПОЛЕЙ ПРИ ВВОДЕ В INPUT-------------------------//
	$('body').on('input', '.av-form-wrap-2 .required input, .av-form-wrap-2 .required textarea', function()
		{
		if($(this).val().length > 0 ){
            $(this).removeAttr("form-error");
		}
		else {
            $(this).attr("form-error", true);
		}
		});
//---------------------------ОТМЕНА ВВОДА КИРИЛЛИЦИ В ПОЛЕ ЕMAIL-------------------------//
	$('body').on('input', '.av-form-wrap-2 .required[field-types=email] input', function()
		{
  var reg = /[а-яА-ЯёЁ]/g;
    if (this.value.search(reg) !=  -1) {
        this.value  =  this.value.replace(reg, '');
    }
	});


    //---------------------------ОЧИСТКА ПОЛЕЙ-------------------------//
    // $('.write-form-submit input').on('click', function() {
    //     $(".av-form-wrap-2 .inputtext, .av-form-wrap-2 .inputtextarea").each(function() {
    //         console.log($(this).val());
    //
    //         if($('font').hasClass('errortext')) {
    //         	console.log($('font').text());
    //             $(this).val("");
    //             //$(".av-alert-popup").hide();
		// 	} else {
    //             //$(".av-alert-popup").show();
		// 	}
    //     });
    // });
});