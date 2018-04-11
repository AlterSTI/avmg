$(function()
	{
	var
		$imageBlock                     = $(".av-catalog-element .images-block"),
		$mainImage                      = $imageBlock.find(".main-image-wraper img:not(.default)"),
		$mainSliderBlock                = $imageBlock.find(".slider .slider-block"),
		$imageViewer                    = $(".av-catalog-element-image-viewer").appendTo("body"),
		$imageViewerMainSliderBlock     = $imageViewer.find(".slider-main     .slider-block"),
		$imageViewerVerticalSliderBlock = $imageViewer.find(".slider-vertical .slider-block");
	/* -------------------------------------------------------------------- */
	/* ----------------------- main slider preparing ---------------------- */
	/* -------------------------------------------------------------------- */
	$mainSliderBlock
		.setAvSlider
			({
			cyclicity           : true,
			slidesCount         : 3,
			slidesBreakpoints   :
				{
				767: 2
				}
			})
		.parent()
			.on("vclick", ".navigation.prev", function()
				{
				$mainSliderBlock.slideAvSlider("back");
				})
			.on("vclick", ".navigation.next", function()
				{
				$mainSliderBlock.slideAvSlider("forward");
				});
	/* -------------------------------------------------------------------- */
	/* ----------------------- image viewer behavior ---------------------- */
	/* -------------------------------------------------------------------- */
	$mainSliderBlock.find("img").add($mainImage)
		.on("vclick", function()
			{
			AvBlurScreen("on", 1000);
			$imageViewer
				.show()
				.positionCenter(1100, "Y", "Y")
				.data("calledImageSrc", $(this).attr("src"))
				.trigger("imageViewerDisplay")
				.onClickout(function()
					{
					$(this).find(".close").click();
					})
				.on("vclick", ".close", function()
					{
					$imageViewer
						.hide()
						.trigger("imageViewerHide");
					AvBlurScreen("off");
					});
			});
	/* -------------------------------------------------------------------- */
	/* ---------------- image viewer main slider preparing ---------------- */
	/* -------------------------------------------------------------------- */
	$imageViewer
		.on("imageViewerDisplay", function()
			{
			if($imageViewerMainSliderBlock.attr("data-slider-seted") == "Y") return;

			$imageViewerMainSliderBlock
				.attr("data-slider-seted", "Y")
				.setAvSlider
					({
					cyclicity       : true,
					slideAnimation  : "fade",
					slidesCount     : 1
					})
				.parent()
					.on("vclick", ".navigation.prev", function()
						{
						$imageViewerMainSliderBlock.slideAvSlider("back");
						})
					.on("vclick", ".navigation.next", function()
						{
						$imageViewerMainSliderBlock.slideAvSlider("forward");
						});
			});
	/* -------------------------------------------------------------------- */
	/* -------------- image viewer vertical slider preparing -------------- */
	/* -------------------------------------------------------------------- */
	$imageViewer
		.on("imageViewerDisplay", function()
			{
			if($imageViewerVerticalSliderBlock.attr("data-slider-seted") == "Y") return;

			$imageViewerVerticalSliderBlock
				.attr("data-slider-seted", "Y")
				.setAvSlider
					({
					cyclicity           : true,
					slidesCount         : 5,
					direction           : "vertical",
					slidesBreakpoints   :
						{
						991: 3
						}
					})
				.parent()
					.on("vclick", ".navigation.prev", function()
						{
						$imageViewerVerticalSliderBlock.slideAvSlider("back");
						})
					.on("vclick", ".navigation.next", function()
						{
						$imageViewerVerticalSliderBlock.slideAvSlider("forward");
						});
			});
	/* -------------------------------------------------------------------- */
	/* ----------------------- main slider autoplay ----------------------- */
	/* -------------------------------------------------------------------- */
	$mainSliderBlock
		.slideAutoAvSlider("forward", 5000)
		.add($mainImage)
			.hover(function()
				{
				$mainSliderBlock.stopSlideAutoAvSlider();
				})
			.mouseleave(function()
				{
				if(!$imageViewer.is(":visible"))
					$mainSliderBlock.slideAutoAvSlider("forward", 5000);
				});
	$imageViewer
		.on("imageViewerDisplay", function()
			{
			$mainSliderBlock.stopSlideAutoAvSlider();
			})
		.on("imageViewerHide", function()
			{
			$mainSliderBlock.slideAutoAvSlider("forward", 5000);
			});
	$mainSliderBlock
		.on("sliding-forward-autoplay-end", function()
			{
			$mainImage.attr
				(
				"src",
				$mainSliderBlock.getAvSliderSlide("first-active").find("img").attr("src")
				);
			});
	/* -------------------------------------------------------------------- */
	/* ------------ image viewer sliders jump to slide on call ------------ */
	/* -------------------------------------------------------------------- */
	$imageViewer
		.on("imageViewerDisplay", function()
			{
			var
				calledImageSrc           = $(this).data("calledImageSrc"),
			    $mainSliderNeedSlide     = $imageViewerMainSliderBlock    .find("img[src=\""+calledImageSrc+"\"]").parent(),
			    $verticalSliderNeedSlide = $imageViewerVerticalSliderBlock.find("img[src=\""+calledImageSrc+"\"]").parent();

			$imageViewerMainSliderBlock    .jumpToSlideAvSlider($mainSliderNeedSlide);
			$imageViewerVerticalSliderBlock.jumpToSlideAvSlider($verticalSliderNeedSlide);

			$imageViewerVerticalSliderBlock.children(".slider-image").removeClass("active");
			$verticalSliderNeedSlide                                 .addClass("active");
			});
	/* -------------------------------------------------------------------- */
	/* ------------ image viewer on select in vertical slider ------------- */
	/* -------------------------------------------------------------------- */
	$imageViewerVerticalSliderBlock
		.on("vclick", ".slider-image", function()
			{
			$imageViewerVerticalSliderBlock.children(".slider-image").removeClass("active");
			$(this)                                                  .addClass("active");

			$imageViewerMainSliderBlock
				.jumpToSlideAvSlider
					(
					$imageViewerMainSliderBlock
						.find("img[src=\""+$(this).find("img").attr("src")+"\"]")
						.parent()
					);
			});
	});