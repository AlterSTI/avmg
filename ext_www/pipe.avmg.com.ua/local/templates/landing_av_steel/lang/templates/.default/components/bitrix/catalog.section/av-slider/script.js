$(function()
	{
	setTimeout(function()
		{
		$(".av-catalog-section-slider .slider-block")
			.setAvSlider
				({
				cyclicity           : true,
				slidesCount         : 3,
				slidesBreakpoints   :
					{
					1199    : 2,
					991     : 1
					}
				})
			.hover(function()
				{
				$(this).slideAutoAvSlider("forward", 2000);
				})
			.mouseleave(function()
				{
				$(this).stopSlideAutoAvSlider();
				})
			.parent()
				.on("vclick", ".navigation.prev", function()
					{
					$(this).parent().find(".slider-block").slideAvSlider("back");
					})
				.on("vclick", ".navigation.next", function()
					{
					$(this).parent().find(".slider-block").slideAvSlider("forward");
					});
		}, 500);
	});