(function($)
	{
	/* -------------------------------------------------------------------- */
	/* -------------------------- create slider --------------------------- */
	/* -------------------------------------------------------------------- */
	jQuery.fn.setAvSlider = function()
		{
		return this.each(function()
			{
			var randomString = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);

			$(this)
				.addClass("av-slider")
				.attr("data-slider-id",    randomString)
				.attr("data-slides-count", 1)
				.attr("data-direction",    "horizontal")
				.attr("data-cyclicity",    "N");
			});
		};
	/* -------------------------------------------------------------------- */
	/* ----------------------- set navigation item ------------------------ */
	/* -------------------------------------------------------------------- */
	jQuery.fn.setAvSliderNavigationItem = function(direction)
		{
		var slideDirection = $.inArray(direction, ["back", "forward"]) == -1 ? "forward" : direction;

		return this.each(function()
			{
			var $slider = $(this).closest(".av-slider");
			if(!$slider.length) return;

			$(this)
				.addClass("av-slider-navigation-item")
				.attr("data-navigation-direction", slideDirection)
				.on("vclick", function()
					{
					$slider.slideAvSlider(slideDirection);
					});
			});
		};
	/* -------------------------------------------------------------------- */
	/* ------------------------- set slides block ------------------------- */
	/* -------------------------------------------------------------------- */
	jQuery.fn.setAvSliderSlidesBlock = function()
		{
		return this.each(function()
			{
			var $slider = $(this).closest(".av-slider");
			if($slider.length) $(this).addClass("av-slider-slides-block");
			});
		};
	/* -------------------------------------------------------------------- */
	/* ---------------------------- set params ---------------------------- */
	/* -------------------------------------------------------------------- */
	jQuery.fn.setAvSliderParams = function(params)
		{
		var
			sliderParams           = typeof params === "object"                                                 ? params                         : {},
		    slidesCount            = Number.isInteger(sliderParams.slidesCount) && sliderParams.slidesCount > 0 ? sliderParams.slidesCount       : 1,
			slidesBreakpoints      = typeof sliderParams.slidesBreakpoints === "object"                         ? sliderParams.slidesBreakpoints : {},
			direction              = sliderParams.direction == "vertical"                                       ? "vertical"                     : "horizontal",
			cyclicity              = sliderParams.cyclicity == "Y"                                              ? "Y"                            : "N",
			slidesBreakpointsArray = [];

		$.each(slidesBreakpoints, function(index, value)
			{
			slidesBreakpointsArray.push(index+":"+value);
			});

		return this.each(function()
			{
			$(this).filter(".av-slider")
				.attr("data-slides-count",       slidesCount)
				.attr("data-slides-breakpoints", slidesBreakpointsArray.join(";"))
				.attr("data-direction",          direction)
				.attr("data-cyclicity",          cyclicity);
			});
		};
	/* -------------------------------------------------------------------- */
	/* ---------------------------- get params ---------------------------- */
	/* -------------------------------------------------------------------- */
	jQuery.fn.getAvSliderParams = function()
		{
		var
			$slider                = this.filter(".av-slider"),
		    result                 =
			    {
			    slidesCount      : parseInt($slider.attr("data-slides-count")),
			    slidesBreakpoints: {},
			    direction        : $slider.attr("data-direction"),
			    cyclicity        : $slider.attr("data-cyclicity")
			    },
			windowWidth            = $(window).width(),
			slidesBreakpointsArray = [];

		if(!result.slidesCount || result.slidesCount <= 0)                result.slidesCount = 1;
		if($.inArray(result.direction, ["horizontal", "vertical"]) == -1) result.direction   = "horizontal";
		if($.inArray(result.cyclicity, ["Y", "N"])                 == -1) result.cyclicity   = "N";

		$slider.attr("data-slides-breakpoints").split(";").forEach(function(value)
			{
			var
				valueExplode           = value.split(":"),
				breakpouintValue       = parseInt(valueExplode[0]),
				breakpouintSlidesCount = parseInt(valueExplode[1]);
			if(!breakpouintValue || !breakpouintSlidesCount) return;

			result.slidesBreakpoints[breakpouintValue] = breakpouintSlidesCount;
			});
		$.each(result.slidesBreakpoints, function(index)
			{
			slidesBreakpointsArray.push(index);
			});
		slidesBreakpointsArray
			.sort(function(a, b) {return b - a})
			.forEach(function(value)
				{
				if(windowWidth <= value)
					result.slidesCount = result.slidesBreakpoints[value];
				});

		return result;
		};
	/* -------------------------------------------------------------------- */
	/* -------------------------- prepare slider -------------------------- */
	/* -------------------------------------------------------------------- */
	jQuery.fn.prepareAvSlider = function()
		{
		return this.each(function()
			{
			var
				$slider      = $(this).filter(".av-slider"),
				$slidesBlock = $slider.find(".av-slider-slides-block");

			if($slider.getAvSliderParams().direction == "horizontal")
				$slidesBlock.css
					({
					"align-items": "center",
					"display"    : "flex",
					"overflow"   : "hidden"
					});
			else
				$slidesBlock.css
					({
					"display"        : "flex",
					"flex-direction" : "column",
					"justify-content": "column",
					"overflow"       : "hidden"
					});

			$slidesBlock.children().each(function()
				{
				$(this).attr("data-slide-id", $(this).index() + 1);
				});
			$slider.setAvSliderSlidesCount();
			});
		};
	/* -------------------------------------------------------------------- */
	/* ------------------------- set slides count ------------------------- */
	/* -------------------------------------------------------------------- */
	jQuery.fn.setAvSliderSlidesCount = function(value)
		{
		var valueSeted = parseInt(value);

		return this.each(function()
			{
			var
				$slider           = $(this).filter(".av-slider"),
				$slidesBlock      = $slider.find(".av-slider-slides-block"),
				$slides           = $slidesBlock.children(),
				$slideFirstActive = $slides.filter(":visible").first(),
				sliderParams      = $slider.getAvSliderParams(),
				slidesCount       = valueSeted ? valueSeted : sliderParams.slidesCount,
				slideSize         = sliderParams.direction == "horizontal"
					? ($slidesBlock.width()  - (parseFloat($slideFirstActive.css("margin-left")) + parseFloat($slideFirstActive.css("margin-right")))  * slidesCount) / slidesCount
					: ($slidesBlock.height() - (parseFloat($slideFirstActive.css("margin-top"))  + parseFloat($slideFirstActive.css("margin-bottom"))) * slidesCount) / slidesCount;
			if($slider.attr("data-in-process") == "Y") return;

			$slides
				.show()
				.each(function()
					{
					if(sliderParams.direction == "horizontal") $(this).width(slideSize);
					else                                       $(this).height(slideSize);

					if($(this).index() < $slideFirstActive.index() || $(this).index() >= $slideFirstActive.index() + slidesCount)
						$(this).hide();
					});
			$slider
				.controlAvSliderNavigationItemActivity();
			});
		};
	/* -------------------------------------------------------------------- */
	/* ----------------- control navigation item activity ----------------- */
	/* -------------------------------------------------------------------- */
	jQuery.fn.controlAvSliderNavigationItemActivity = function()
		{
		return this.each(function()
			{
			var
				$slider         = $(this).filter(".av-slider"),
				$slides         = $slider.find(".av-slider-slides-block").children(),
				$navItemForward = $slider.find(".av-slider-navigation-item[data-navigation-direction=\"forward\"]"),
				$navItemBack    = $slider.find(".av-slider-navigation-item[data-navigation-direction=\"back\"]");
			if(!$slider.length || $slider.getAvSliderParams().cyclicity == "Y") return;

			if($slides.filter(":visible").last().next().length <= 0)
				{
				$navItemForward.css("visibility", "hidden");
				$slider
					.trigger("last-slide-reached")
					.attr("data-last-slide-reached", "Y");
				}
			else
				{
				$navItemForward.css("visibility", "visible");
				$slider.removeAttr("data-last-slide-reached");
				}
			if($slides.filter(":visible").first().prev().length <= 0)
				{
				$navItemBack.css("visibility", "hidden");
				$slider
					.trigger("first-slide-reached")
					.attr("data-first-slide-reached", "Y");
				}
			else
				{
				$navItemBack.css("visibility", "hidden");
				$slider.removeAttr("data-first-slide-reached");
				}
			});
		};
	/* -------------------------------------------------------------------- */
	/* ------------------------------ slide ------------------------------- */
	/* -------------------------------------------------------------------- */
	jQuery.fn.slideAvSlider = function(direction)
		{
		var slideDirection = $.inArray(direction, ["back", "forward"]) == -1 ? "forward" : direction;

		return this.each(function()
			{
			var
				$slider         = $(this).filter(".av-slider"),
				$slidesBlock    = $slider.find(".av-slider-slides-block"),
				$slidesActive   = $slidesBlock.children().filter(":visible"),
				sliderParams    = $slider.getAvSliderParams(),
				slideSize       = sliderParams.direction == "horizontal"
					? parseFloat($slidesBlock.width())  / sliderParams.slidesCount
					: parseFloat($slidesBlock.height()) / sliderParams.slidesCount,
				slideOffsetType = sliderParams.direction == "horizontal" ? "left" : "top",
				slidesActiveNew = [];
			/* ------------------------------------------- */
			/* ------------- breaking action ------------- */
			/* ------------------------------------------- */
			if(!$slider.length || $slider.attr("data-in-process") == "Y")
				return;
			if(slideDirection == "forward" && $slider.attr("data-last-slide-reached") == "Y")
				{
				$slider.trigger("last-slide-reached");
				return;
				}
			if(slideDirection == "back" && $slider.attr("data-first-slide-reached") == "Y")
				{
				$slider.trigger("first-slide-reached");
				return;
				}
			/* ------------------------------------------- */
			/* --------------- slides calc --------------- */
			/* ------------------------------------------- */
			$slidesActive.each(function()
				{
				slidesActiveNew.push($(this).attr("data-slide-id"));
				});
			if(slideDirection == "forward")
				{
				slidesActiveNew.shift();
				slidesActiveNew.push($slidesActive.last().next().attr("data-slide-id"));
				}
			else
				{
				slidesActiveNew.pop();
				slidesActiveNew.unshift($slidesActive.first().prev().attr("data-slide-id"));
				}
			/* ------------------------------------------- */
			/* ---------------- changings ---------------- */
			/* ------------------------------------------- */
			if(sliderParams.cyclicity == "Y")
				{
				if(slideDirection == "forward") $slidesBlock.children().first().clone() .appendTo($slidesBlock);
				else                            $slidesBlock.children().last() .clone().prependTo($slidesBlock);
				}

			$slider
				.attr("data-in-process", "Y")
				.trigger("sliding-start")
				.trigger("sliding-"+slideDirection);
			$slidesBlock
				.css("position", "relative");
			$slidesBlock.children()
				.each(function()
					{
					var index = $(this).index() - $slidesActive.first().index();

					$(this)
						.show()
						.css("position", "absolute")
						.css(slideOffsetType, (slideSize * index)+"px");
					});
			/* ------------------------------------------- */
			/* ------------ sliding animation ------------ */
			/* ------------------------------------------- */
			$slidesBlock.children().each(function()
				{
				var
					animateCss  = {},
					offsetValue = parseFloat($(this).css(slideOffsetType));

				if(slideDirection == "forward") offsetValue -= slideSize;
				else                            offsetValue += slideSize;

				animateCss[slideOffsetType] = offsetValue;
				$(this).animate(animateCss, 600);
				});
			/* ------------------------------------------- */
			/* ------------------- end ------------------- */
			/* ------------------------------------------- */
			setTimeout(function()
				{
				if(sliderParams.cyclicity == "Y")
					{
					if(slideDirection == "forward") $slidesBlock.children().first().remove();
					else                            $slidesBlock.children().last() .remove();
					}
				$slidesBlock.children()
					.each(function()
						{
						if($.inArray($(this).attr("data-slide-id"), slidesActiveNew) == -1)
							$(this).hide();
						$(this)
							.css("position",      "")
							.css(slideOffsetType, "");
						});
				$slider
					.controlAvSliderNavigationItemActivity()
					.removeAttr("data-in-process");
				$slidesBlock
					.css("position", "");
				}, 700);
			});
		};
	/* -------------------------------------------------------------------- */
	/* ---------------------------- autoslide ----------------------------- */
	/* -------------------------------------------------------------------- */
	jQuery.fn.autoSlideAvSlider = function(direction, delay)
		{
		var
			slideDirection = $.inArray(direction, ["back", "forward"]) == -1 ? "forward" : direction,
		    autoSlideDelay = parseInt(delay);

		if(!autoSlideDelay || autoSlideDelay < 100) autoSlideDelay = 100;
		if(!window.avSlideresInterval) avSlideresInterval = {};

		return this.each(function()
			{
			var
				$slider  = $(this).filter(".av-slider"),
			    sliderId = $slider.attr("data-slider-id");
			if(!$slider.length || !sliderId) return;

			avSlideresInterval[sliderId] = setInterval(function()
				{
				$slider.slideAvSlider(slideDirection);
				}, autoSlideDelay);
			});
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(window).resize(function()
		{
		$(".av-slider").setAvSliderSlidesCount();
		});
	});