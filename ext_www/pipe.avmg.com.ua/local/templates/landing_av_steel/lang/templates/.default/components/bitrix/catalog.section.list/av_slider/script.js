$(function()
	{
	$(".av-catalog-section-list-slider")
		.on("slidingForwardUnable", ".slider-block",    function()
			{
			$(this)
				.parent()
				.find(".navigation.next")
				.css("visibility", "hidden");
			})
		.on("slidingForwardEnable", ".slider-block",    function()
			{
			$(this)
				.parent()
				.find(".navigation.next")
				.css("visibility", "visible");
			})
		.on("slidingBackUnable",    ".slider-block",    function()
			{
			$(this)
				.parent()
				.find(".navigation.prev")
				.css("visibility", "hidden");
			})
		.on("slidingBackEnable",    ".slider-block",    function()
			{
			$(this)
				.parent()
				.find(".navigation.prev")
				.css("visibility", "visible");
			})

		.on("vclick",               ".navigation.next", function()
			{
			$(this)
				.parent()
				.find(".slider-block")
				.slideAvSlider("forward");
			})
		.on("vclick",               ".navigation.prev", function()
			{
			$(this)
				.parent()
				.find(".slider-block")
				.slideAvSlider("back");
			})
		.find(".slider-block")
			.setAvSlider
				({
				slidesCount      : 3,
				slidesBreakpoints:
					{
					991: 2,
					767: 1
					}
				});
	});