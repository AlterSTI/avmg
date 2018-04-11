/* -------------------------------------------------------------------- */
/* ---------------------------- funcstions ---------------------------- */
/* -------------------------------------------------------------------- */
function AvBasketChangeItem(itemId, quantity, operationType)
	{
	AvWaitingScreen("on");
	$.ajax
		({
		type    : "POST",
		url     : AvBasketChangeItemUrl,
		data    :
			{
			"itemId"       : itemId,
			"quantity"     : quantity,
			"operationType": operationType,
			"siteId"       : $(".av-basket").attr("data-site-id")
			},
		success : function(result)
			{
			var
				answerObj             = $.parseJSON(result),
				answerResult          = answerObj ? answerObj.result          : "error",
				answerProductId       = answerObj ? answerObj.productId       : 0,
				answerProductQuantity = answerObj ? answerObj.productQuantity : 0;
			if(answerResult == "error") return;

			$(document)
				.data("catalog_element",       answerProductId)
				.data("catalog_element_count", answerProductQuantity);
			},
		complete: function()
			{
			$(document).trigger("avCatalogRefresh");
			}
		});
	}
function AvBasketResponseHat()
	{
	$(".av-basket").each(function()
		{
		var
			$basketHat    = $(this).find(".items-block-hat"),
		    $firstItemRow = $(this).find(".items-block:visible .item").first();
		if(!$basketHat.length || !$firstItemRow.length || !$basketHat.is(":visible")) return;

		$basketHat.find(":nth-child(1)").css("width", parseInt($firstItemRow.find(".counter").offset().left                           - $firstItemRow                 .offset().left)+"px");
		$basketHat.find(":nth-child(2)").css("width", parseInt($firstItemRow.find(".price").children(":visible").last().offset().left - $firstItemRow.find(".counter").offset().left)+"px");
		});
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	AvBasketResponseHat();
	$(window).resize(function() {AvBasketResponseHat()});

	$(document)
		/* ------------------------------------------- */
		/* ---------------- change tab --------------- */
		/* ------------------------------------------- */
		.on("vclick", ".av-basket .tabs-block .tab:not(.selected)", function()
			{
			$(this).closest(".tabs-block").find(".tab").removeClass("selected");
			$(this).addClass("selected");

			$(this).closest(".av-basket").find(".items-block")
				.hide()
				.filter("[data-block=\""+$(this).attr("data-tab")+"\"]")
				.show();
			AvBasketResponseHat();
			})
		/* ------------------------------------------- */
		/* ------------ counter behavior ------------- */
		/* ------------------------------------------- */
		.on("change keyup input click paste", ".av-basket .items-block .item .counter input", function(event)
			{
			var
				$checkerBack = $(this).parent().find(".checker.back"),
				value        = this.value.replace(/\D/g, "").slice(0, 10);

			this.value = value;
			if(value > 1) $checkerBack.removeClass("disabled");
			else          $checkerBack.addClass("disabled");

			if(event.keyCode == 13) $(this).blur();
			})
		.on("vclick", ".av-basket .items-block .item .counter .checker", function()
			{
			var
				$input = $(this).parent().find("input"),
				value  = parseInt($input.val());

			     if($(this).hasClass("back"))    value--;
			else if($(this).hasClass("forward")) value++;
			if(!value || value < 1)              value = 1;

			$input
				.attr("value", value)
				.val(value)
				.trigger("change")
				.trigger("changeQuantity");
			})
		.on("focus", ".av-basket .items-block .item .counter input", function()
			{
			$(this).attr("data-start-value", this.value);
			})
		.on("focusout", ".av-basket .items-block .item .counter input", function()
			{
			var value = parseInt(this.value) ? parseInt(this.value) : 1;

			this.value = value;
			if($(this).attr("data-start-value") != value) $(this).trigger("changeQuantity");
			})
		.on("changeQuantity", ".av-basket .items-block .item .counter input", function()
			{
			AvBasketChangeItem
				(
				$(this).closest(".item").attr("data-item-id"),
				parseInt(this.value) ? parseInt(this.value) : 1,
				"changeQuantity"
				);
			})
		/* ------------------------------------------- */
		/* ------------------ delete ----------------- */
		/* ------------------------------------------- */
		.on("vclick", ".av-basket .items-block .item .delete-button", function()
			{
			AvBasketChangeItem
				(
				$(this).closest(".item").attr("data-item-id"),
				0,
				"delete"
				);
			})
		/* ------------------------------------------- */
		/* ------------------ delay ------------------ */
		/* ------------------------------------------- */
		.on("vclick", ".av-basket .items-block .item .delay-button", function()
			{
			AvBasketChangeItem
				(
				$(this).closest(".item").attr("data-item-id"),
				0,
				"delay"
				);
			})
		/* ------------------------------------------- */
		/* ------------------ return ----------------- */
		/* ------------------------------------------- */
		.on("vclick", ".av-basket .items-block .item .return-button", function()
			{
			AvBasketChangeItem
				(
				$(this).closest(".item").attr("data-item-id"),
				0,
				"return"
				);
			})
		/* ------------------------------------------- */
		/* ------------- refresh catalog ------------- */
		/* ------------------------------------------- */
		.on("avCatalogRefresh", function()
			{
			var
				$basket     = $(".av-basket"),
				scrollTop   = $(window).scrollTop(),
				$currentTab = $basket.find(".tabs-block .tab.selected");

			$.ajax
				({
				type    : "POST",
				url     : AvBasketUpdateUrl,
				data    :
					{
					"params": $basket.attr("data-params")
					},
				success : function(result)
					{
					if(!result) return;

					$(result)
						.insertAfter($basket)
						.find(".tabs-block .tab[data-tab=\""+$currentTab.attr("data-tab")+"\"]")
						.click();
					$basket.remove();
					$("html").scrollTop(scrollTop);
					AvBasketResponseHat();
					},
				complete: function()
					{
					AvWaitingScreen("off");
					}
				});
			});
	});