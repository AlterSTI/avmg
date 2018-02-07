/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameSelectAvStyled     = function()      {return this.find("select").attr("name")};
	jQuery.fn.setFormElememtNameSelectAvStyled     = function(value) {this.find("select").attr("name", value)};
	jQuery.fn.getFormElememtValueSelectAvStyled    = function()      {return this.find("select option:selected").attr("value")};
	jQuery.fn.setFormElememtValueSelectAvStyled    = function(value)
		{
		var
			$select            = this.find("select"),
			$selectedItem      = $select.find("option[value=\""+value+"\"]"),
			$selectedItemLabel = this.find(".list .list-item[data-list-value=\""+value+"\"]");

		$select.find("option")
		    .removeAttr("selected")
		    .prop("selected", false);
		$selectedItem
		    .attr("selected", true)
		    .prop("selected", true);

		this.find(".list .list-item")
		    .removeClass("selected");
		$selectedItemLabel
			.addClass("selected", true);

		this.find(".title-block .value").text($selectedItemLabel.text());
		if($selectedItem.length) this.addClass("value-seted");
		else                     this.removeClass("value-seted");

		$select.trigger("change");
		};
	jQuery.fn.getFormElememtRequiredSelectAvStyled = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredSelectAvStyled = function(value)
		{
		     if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertSelectAvStyled    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertSelectAvStyled    = function(value)
		{
		     if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-styled", "select", "getFormElememtName",     "getFormElememtNameSelectAvStyled");
SetFormElementsFunction("av-styled", "select", "setFormElememtName",     "setFormElememtNameSelectAvStyled");
SetFormElementsFunction("av-styled", "select", "getFormElememtValue",    "getFormElememtValueSelectAvStyled");
SetFormElementsFunction("av-styled", "select", "setFormElememtValue",    "setFormElememtValueSelectAvStyled");
SetFormElementsFunction("av-styled", "select", "getFormElememtRequired", "getFormElememtRequiredSelectAvStyled");
SetFormElementsFunction("av-styled", "select", "setFormElememtRequired", "setFormElememtRequiredSelectAvStyled");
SetFormElementsFunction("av-styled", "select", "getFormElememtAlert",    "getFormElememtAlertSelectAvStyled");
SetFormElementsFunction("av-styled", "select", "setFormElememtAlert",    "setFormElememtAlertSelectAvStyled");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(".av-form-styled-select .list").mCustomScrollbar({"theme": "dark"});

	$(document)
		.on("vclick", ".av-form-styled-select .title-block", function()
			{
			var
				$selectBlock = $(this).closest(".av-form-styled-select"),
				$optionsList = $selectBlock.find(".list");

			if($optionsList.is(":visible"))
				{
				$selectBlock.removeClass("active");
				$optionsList.slideUp();
				}
			else
				{
				$selectBlock.addClass("active");
				$optionsList
					.css("width", $selectBlock[0].getBoundingClientRect().width)
					.slideDown();
				}
			})
		.on("vclick", ".av-form-styled-select .list .list-item", function()
			{
			var $selectBlock = $(this).closest(".av-form-styled-select");

			$selectBlock
				.setFormElememtValueSelectAvStyled($(this).attr("data-list-value"));
			$selectBlock
				.removeClass("active")
				.children(".list").slideUp();
			})
		.on("vclick", function()
			{
			$(".av-form-styled-select").each(function()
				{
				if(!$(this).isClicked())
					$(this)
						.removeClass("active")
						.children(".list").slideUp();
				});
			});

	$(window).resize(function()
		{
		$(".av-form-styled-select")
			.removeClass("active")
			.children(".list").slideUp();
		});
	});