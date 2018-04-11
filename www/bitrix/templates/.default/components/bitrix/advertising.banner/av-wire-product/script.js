/* ------------------------------------------------------------------- */
/* ----------------------------- methods ----------------------------- */
/* ------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.showAvSliderSlideProduct = function(index)
		{
		return this.each(function()
			{
			var
				needIndex      = parseInt(index - 1),
				$banner        = $(this).filter(".av-banner-product"),
				$pager         = $banner.find(".pager"),
				$currentSlide  = $banner.children(".item:visible"),
				$needSlide     = $banner.children(".item").eq(needIndex),
				$needPagerPage = $pager .children()       .eq(needIndex);

			if
				(
				needIndex == parseInt($currentSlide.index())
				||
				!$needSlide.length || !$needPagerPage.length
				) return;

			$currentSlide
				.fadeOut(700);
			$needSlide
				.fadeIn(700)
				.find(".image")
					.floodImage();

			$pager.children().removeClass("selected");
			$needPagerPage.addClass("selected");
			});
		};
	jQuery.fn.runAvSliderAutoplayProduct = function(delay)
		{
		if(!window.bannerInterval) bannerInterval = {};

		return this.each(function()
			{
			var
				$banner       = $(this).filter(".av-banner-product"),
				$pager        = $banner.find(".pager"),
				delayDuration = parseInt(delay) ? parseInt(delay) : 2000,
			    randomString  = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
			if(!$banner.length || !$pager.length) return;

			$banner.attr("data-baner-id", randomString);
			bannerInterval[randomString] = setInterval(function()
				{
				var currentIndex = $pager.children(".selected").index() + 1;
				$banner.showAvSliderSlideProduct(currentIndex == $pager.children().length ? 1 : currentIndex + 1);
				}, delayDuration);
			});
		};
	jQuery.fn.stopAvSliderAutoplayProduct = function()
		{
		return this.each(function()
			{
			var bannerId = $(this).filter(".av-banner-product").attr("data-baner-id");
			if(window.bannerInterval) clearInterval(bannerInterval[bannerId]);
			});
		};
	})(jQuery);
/* ------------------------------------------------------------------- */
/* --------------------------- youtube api --------------------------- */
/* ------------------------------------------------------------------- */
$("head").append("<script src=\"https://www.youtube.com/iframe_api\"></script>");

window.onYouTubeIframeAPIReady = function()
	{
	$(function()
		{
		$(".av-banner-product iframe.youtube").each(function()
			{
			new YT.Player(this,
				{
				events:
					{
					"onReady":       onPlayerReady,
					"onStateChange": onPlayerStateChange
					}
				});
			});
		});
	};

function onPlayerReady(event)
	{
	var player = event.target;

	player.mute();
	player.playVideo();
	}

function onPlayerStateChange(event)
	{
	if(event.data === YT.PlayerState.ENDED)
		event.target.playVideo();
	}
/* ------------------------------------------------------------------- */
/* ---------------------------- handlers ----------------------------- */
/* ------------------------------------------------------------------- */
$(function()
	{
	$(".av-banner-product")
		.runAvSliderAutoplayProduct(5000)
		.on("vclick", ".pager > *, .sort-prod-top-wrap > *", function()
			{
			$(this).closest(".av-banner-product")
				.showAvSliderSlideProduct($(this).index() + 1);
			})
		.hover(function()
			{
			$(this).stopAvSliderAutoplayProduct();
			})
		.mouseleave(function()
			{
			$(this).runAvSliderAutoplayProduct(5000);
			})
		.find(".item:visible .image")
			.floodImage();

	$(window).resize(function()
		{
		$(".av-banner-product")
			.find(".item:visible .image")
			.floodImage();
		});
	});