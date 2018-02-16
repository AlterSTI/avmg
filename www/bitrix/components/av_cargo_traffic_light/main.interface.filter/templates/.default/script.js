$(function()
	{
	var filterCondition = 'closed';
	$.each(document.cookie.split(";"), function(index, value)
		{
		var cookieInfo = value.split("=");
		if(cookieInfo[0] == 'AV_CTL_FILTER_CONDITION' && cookieInfo[1] == 'open') filterCondition = 'open';
		});

	$(document)
		.on("vclick", '.av-cargo-traffic-light-filter > h3 > .open-button', function()
			{
			var
				$openButton = $(this),
				$rows       = $openButton.closest('form').find('.fields-row:not(:first-child)');

			if($openButton.is('.active'))
				{
				$openButton.removeClass("active");
				$rows.slideUp();
				document.cookie = 'AV_CTL_FILTER_CONDITION=closed';
				}
			else
				{
				$openButton.addClass("active");
				$rows.slideDown();
				document.cookie = 'AV_CTL_FILTER_CONDITION=open';
				}
			})
		.on("vclick", '.av-cargo-traffic-light-filter [data-clear-filter]', function()
			{
			var $form = $(this).closest('form');
			$form.getFormElememt().each(function()
				{
				$(this).setFormElememtParam("value", '');
				});
			$form.find('input[type=submit]').click();
			});
	});