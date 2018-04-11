/* ------------------------------------------------------------------- */
/* ----------------------------- methods ----------------------------- */
/* ------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.showAvSliderSlideTop = function(index)
		{
		return this.each(function()
			{
			var
				needIndex      = parseInt(index - 1),
				$banner        = $(this).filter(".av-banner-top"),
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
	jQuery.fn.runAvSliderTopAutoplay = function(delay)
		{
		if(!window.bannerInterval) bannerInterval = {};

		return this.each(function()
			{
			var
				$banner       = $(this).filter(".av-banner-top"),
				$pager        = $banner.find(".pager"),
				delayDuration = parseInt(delay) ? parseInt(delay) : 2000,
			    randomString  = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
			if(!$banner.length || !$pager.length) return;

			$banner.attr("data-baner-id", randomString);
			bannerInterval[randomString] = setInterval(function()
				{
				var currentIndex = $pager.children(".selected").index() + 1;
				$banner.showAvSliderSlideTop(currentIndex == $pager.children().length ? 1 : currentIndex + 1);
				}, delayDuration);
			});
		};
	jQuery.fn.stopAvSliderTopAutoplay = function()
		{
		return this.each(function()
			{
			var bannerId = $(this).filter(".av-banner-top").attr("data-baner-id");
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
		$(".av-banner-top iframe.youtube").each(function()
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
	$(".av-banner-top")
		.runAvSliderTopAutoplay(5000)
		.on("vclick", ".pager > *", function()
			{
			$(this).closest(".av-banner-top")
				.showAvSliderSlideTop($(this).index() + 1);
			})
		.hover(function()
			{
			$(this).stopAvSliderTopAutoplay();
			})
		.mouseleave(function()
			{
			$(this).runAvSliderTopAutoplay(5000);
			})
		.find(".item:visible .image")
			.floodImage();

	$(window).resize(function()
		{
		$(".av-banner-top")
			.find(".item:visible .image")
			.floodImage();
		});
	});