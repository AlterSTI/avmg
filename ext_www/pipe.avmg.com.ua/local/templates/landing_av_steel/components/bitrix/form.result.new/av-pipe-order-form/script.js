$(function()
	{
	$(document)
		.on("vclick", ".av-pipe-order-form [type=\"submit\"]", function()
			{
                /*console.log($(this).closest("form").checkFormValidation());*/

            if($(this).closest("form").checkFormValidation())
                return true;
            else
                {
                CreateAvAlertPopup(BX.message("AV_PIPE_ORDER_FORM_FORM_VALIDATION_ALERT"), "alert")
                    .positionCenter(10000000000, "Y")
                    .onClickout(function() {$(this).remove()});
                return false;
                }
            });
	});