/* -------------------------------------------------------------------- */
/* ---------------------------- funcstions ---------------------------- */
/* -------------------------------------------------------------------- */
function AvCatalogElementViewTableBehavior()
	{
	var
		$infoTableWraper = $(".av-catalog-element .info-table-wraper"),
		$infoTable       = $infoTableWraper.find(".info-table");

	$infoTableWraper.css("height", $infoTable.height());
	if($infoTableWraper.width() == $infoTable.width()) $infoTable.css({cursor: "default", left: 0});
	else                                               $infoTable.css({cursor: "move"});
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	/* ------------------------------------------- */
	/* --------------- table info ---------------- */
	/* ------------------------------------------- */
	AvCatalogElementViewTableBehavior();
	$(window).resize(function() {AvCatalogElementViewTableBehavior()});

	$(".av-catalog-element .info-table-wraper")
		/* ---------------------------- */
		/* ----- draging behavior ----- */
		/* ---------------------------- */
		.on("vmousedown", function(event)
			{
			$(this).data
				(
				"dragingPositionStart",
					{
					position: event.pageX,
					time    : Date.now()
					}
				);
			})
		.on("vmouseup", function(event)
			{
			var positionStart = $(this).data("dragingPositionStart");
			if(positionStart && positionStart.animate)
				{
				var
					$infoTable            = $(this).find(".info-table"),
					tableMaxRightPosition = ($infoTable.width() - $(this).width()) * -1;

				$infoTable.animate({left: positionStart.animate == "right" ? tableMaxRightPosition : 0}, 400);
				}

			$(this).data
				(
				"dragingPositionStart",
					{
					position: 0,
					time    : 0,
					animate : 0
					}
				);
			})
		.on("vmousemove", function(event)
			{
			var positionStart = $(this).data("dragingPositionStart");
			if(!positionStart || !positionStart.position) return;

			var
				$infoTable            = $(this).find(".info-table"),
				timeDifference        = Date.now()  - positionStart.time,
				positionDifference    = event.pageX - positionStart.position,
				dragingDirection      = event.pageX > positionStart.position ? "left" : "right",
				tableNeedPosition     = positionDifference + parseInt($infoTable.css("left")),
				tableMaxRightPosition = ($infoTable.width() - $(this).width()) * -1;

			     if(tableNeedPosition > 0)                     tableNeedPosition = 0;
			else if(tableNeedPosition < tableMaxRightPosition) tableNeedPosition = tableMaxRightPosition;

			$infoTable.css("left", tableNeedPosition);

			$(this).data
		       (
		       "dragingPositionStart",
			       {
			       position: event.pageX,
			       time    : Date.now(),
			       animate : timeDifference < 30 && Math.abs(positionDifference) > 15 ? dragingDirection : false
			       }
		       );
			})
		/* ---------------------------- */
		/* ----- counter behavior ----- */
		/* ---------------------------- */
		.on("change keyup input click paste", ".item-row .counter input", function()
			{
			var
				$checkerBack = $(this).parent().find(".checker.back"),
				$row         = $(this).closest(".item-row"),
				value        = this.value.replace(/\D/g, "").slice(0, 10);

			this.value = value;
			if(!value || value <= 0) $row        .addClass("blocked");
			else                     $row        .removeClass("blocked");
			if(value > 1)            $checkerBack.removeClass("disabled");
			else                     $checkerBack.addClass("disabled");
			})
		.on("keyup", ".item-row .counter input", function(event)
			{
			var $checkButton = $(this).closest(".item-row").find(".buy-block .check");
			if(event.keyCode == 13 && $checkButton.is(":visible")) $checkButton.click();
			})
		.on("vclick", ".item-row .counter .checker", function()
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
				.trigger("change");
			})
		/* ---------------------------- */
		/* ------ change position ----- */
		/* ---------------------------- */
		.on("vclick", ".item-row .buy-block .change", function()
			{
			$(this).closest(".item-row")
		       .removeClass("checked")
		       .find(".counter")
		           .removeClass("disabled")
		           .find("input").removeAttr("disabled");
			})
		/* ---------------------------- */
		/* ------- add position ------- */
		/* ---------------------------- */
		.on("vclick", ".item-row:not(.blocked) .buy-block .check", function()
			{
			var
				$infoTable = $(this).closest(".info-table"),
				$itemRow   = $(this).closest(".item-row"),
				productId  = $itemRow.attr("data-element-id");
			if(!$itemRow.length) return;

			AvWaitingScreen("on");
			$.ajax
				({
				type    : "POST",
				url     : AvCatalogElementCheckPosition,
				data    :
					{
					"productId": productId,
					"quantity" : $itemRow.find(".counter").find("input").val(),
					"priceType": $infoTable.attr("data-price-type"),
					"siteId"   : $infoTable.attr("data-site-id")
					},
				success : function(result)
					{
					var
						answerObj             = $.parseJSON(result),
						answerResult          = answerObj ? answerObj.result                    : "error",
						answerProductId       = answerObj ? answerObj.productId                 : 0,
						answerProductQuantity = answerObj ? parseInt(answerObj.productQuantity) : 0;
					if(!answerProductId || answerProductId != productId) return;

					$(document)
						.data("catalog_element",       answerProductId)
						.data("catalog_element_count", answerResult != "error" && answerProductQuantity ? answerProductQuantity : 0)
						.trigger("avCatalogRefresh");
					},
				complete: function()
					{
					AvWaitingScreen("off");
					}
				});
			})
		.on("vclick", ".item-row.blocked .buy-block .check", function()
			{
			CreateAvAlertPopup($(this).closest(".buy-block").find(".empty-alert").text(), "alert")
				.positionCenter(1000, "Y")
				.onClickout(function() {$(this).remove()});
			});
	/* ------------------------------------------- */
	/* ------------- refresh catalog ------------- */
	/* ------------------------------------------- */
	$(document)
		.on("avCatalogRefresh", function()
			{
			var
				elementId    = parseInt($(this).data("catalog_element")),
				elementCount = parseInt($(this).data("catalog_element_count")),
			    $itemRow     = $(".av-catalog-element .info-table .item-row[data-element-id=\""+elementId+"\"]"),
			    $counter     = $itemRow.find(".counter");
			if(!$itemRow.length) return;

			if(elementCount && elementCount > 0)
				{
				$itemRow.addClass("checked");
				$counter
					.addClass("disabled")
					.find("input")
						.val(elementCount)
						.attr("value", elementCount)
						.attr("disabled", true);
				}
			else
				{
				$itemRow.removeClass("checked");
				$counter
					.removeClass("disabled")
					.find("input")
						.val(1)
						.attr("value", 1)
						.attr("disabled", false)
						.trigger("change");
				}

			AvCatalogElementViewTableBehavior();
			$(this)
				.removeData("catalog_element")
				.removeData("catalog_element_count");
			});
	});