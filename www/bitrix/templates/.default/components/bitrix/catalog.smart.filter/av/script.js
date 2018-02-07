$(function()
	{
	$(document)
		/* ------------------------------------------- */
		/* ------------- filter dropdown ------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-smart-filter .head', function()
			{
			var
				$filter      = $(this).closest('.av-smart-filter'),
				$filterBody  = $filter.find('.body-wraper'),
			    filterCookie = '';

			if($filterBody.is(':visible'))
				{
				filterCookie = "closed";
				$filter.removeClass("active");
				$filterBody.show().slideUp(500);
				}
			else
				{
				filterCookie = "open";
				$filter.addClass("active");
				$filterBody.hide().slideDown(500, function()
					{
					$filterBody.css("overflow", "");
					});
				}

			document.cookie = 'avCatalogSmartFilterCondition='+filterCookie+';domain='+document.domain+';path=/';
			})
		/* ------------------------------------------- */
		/* -------------- list dropdown -------------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-smart-filter .field .title-block', function()
			{
			var $field = $(this).closest('.field');

			if($field.hasClass("active"))
				$field
					.removeClass("active")
					.find('ul')
						.show()
						.slideUp(350);
			else
				{
				$(this).closest('.av-smart-filter').find('.field.active.closed')
					.removeClass("active")
					.find('ul')
						.css("z-index", 10)
						.show()
						.slideUp(350);
				$field
					.addClass("active")
					.find('ul')
						.css("z-index", 20)
						.hide()
						.slideDown(350);
				}
			})
		/* ------------------------------------------- */
		/* ----------- list multiple check ----------- */
		/* ------------------------------------------- */
		.on("vclick", '.av-smart-filter .field.multiple li', function()
			{
			var
				$row        = $(this),
				$inputBlock = $row.closest('.field.multiple'),
			    $input      = $row.find(':checkbox');

			if($input.prop("checked"))
				{
				$row.removeClass("checked");
				$input.prop("checked", false);
				}
			else
				{
				$row.addClass("checked");
				$input.prop("checked", true);
				}

			if($inputBlock.find(':checkbox:checked').length) $inputBlock   .addClass("applied");
			else                                             $inputBlock.removeClass("applied");

			$input.trigger("change");
			})
		/* ------------------------------------------- */
		/* ------------ list single check ------------ */
		/* ------------------------------------------- */
		.on("vclick", '.av-smart-filter .field.single li:not(.checked)', function()
			{
			var
				$row        = $(this),
				$inputBlock = $row.closest('.field.single'),
				$input      = $inputBlock.find(':radio'),
				value       = $row.attr("data-value");

			$inputBlock.find('li').removeClass("checked");
			$row                     .addClass("checked");

			if(value) $inputBlock   .addClass("applied");
			else      $inputBlock.removeClass("applied");

			$input
				.attr("value", value)
				.trigger("change");
			})
		/* ------------------------------------------- */
		/* --------------- smart filter -------------- */
		/* ------------------------------------------- */
		.on("change", '.av-smart-filter input', function()
			{
			var
				$filter          = $(this).closest('.av-smart-filter'),
				$applyButton     = $filter.find('[apply-button]'),
				$itemsCountLabel = $filter.find('.items-count'),
			    data             = {"ajax": "y"};

			$filter.find(':checkbox:checked, :radio:checked').each(function()
				{
				data[$(this).attr("name")] = $(this).attr("value");
				});

			AvWaitingScreen("on");
			BX.ajax.loadJSON
				(
				$applyButton.attr("href"),
				data,
				function(result)
					{
					var
						filterUrl  = result ? result.FILTER_URL    : '',
						itemsCount = result ? result.ELEMENT_COUNT : 0;

					if(filterUrl) $applyButton.attr("href", filterUrl);
					$itemsCountLabel
						.show()
						.find('.count').text(itemsCount);

					AvWaitingScreen("off");
					}
				);
			})
		/* ------------------------------------------- */
		/* ---------------- click out ---------------- */
		/* ------------------------------------------- */
		.on("vclick", function(event)
			{
			var $object = $(event.target);
			if(!$object.closest('.av-smart-filter .field').length)
				{
				$('.av-smart-filter .field.active.closed')
					.removeClass("active")
					.find('ul')
						.show()
						.slideUp(350);
				}
			});
	});