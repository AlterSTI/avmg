$(function()
	{
	$(document)
		.on("vclick", ".av-pipe-partners-form [type=\"submit\"]", function()
			{
				console.log($(this).closest("form"));
			if($(this).closest("form").checkFormValidation()) {
                return true;
            }
			else
				{
				CreateAvAlertPopup(BX.message("AV_PIPE_PARTNER_FORM_FORM_VALIDATION_ALERT"), "alert")
					.positionCenter(1000, "Y")
					.onClickout(function() {$(this).remove()});
				return false;
				}
			});
	});