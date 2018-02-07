/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNameRadioAvStyled     = function()      {return this.find(":radio").attr("name")};
	jQuery.fn.setFormElememtNameRadioAvStyled     = function(value) {this.find(":radio").attr("name", value)};
	jQuery.fn.getFormElememtValueRadioAvStyled    = function()
		{
		return this
			.closest("form")
			.find(":radio[name=\""+this.find(":radio").attr("name")+"\"]:checked")
			.length;
		};
	jQuery.fn.setFormElememtValueRadioAvStyled    = function(value)
		{
		var $radio = this.find(":radio");

		this
			.closest("form")
			.find(":radio[name=\""+$radio.attr("name")+"\"]")
				.removeAttr("checked")
				.prop("checked", false);

		if(value)
			$radio
				.attr("checked", true)
				.prop("checked", true);

		$radio.trigger("change");
		};
	jQuery.fn.getFormElememtRequiredRadioAvStyled = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredRadioAvStyled = function(value)
		{
		     if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertRadioAvStyled    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertRadioAvStyled    = function(value)
		{
		     if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-styled", "radio", "getFormElememtName",     "getFormElememtNameRadioAvStyled");
SetFormElementsFunction("av-styled", "radio", "setFormElememtName",     "setFormElememtNameRadioAvStyled");
SetFormElementsFunction("av-styled", "radio", "getFormElememtValue",    "getFormElememtValueRadioAvStyled");
SetFormElementsFunction("av-styled", "radio", "setFormElememtValue",    "setFormElememtValueRadioAvStyled");
SetFormElementsFunction("av-styled", "radio", "getFormElememtRequired", "getFormElememtRequiredRadioAvStyled");
SetFormElementsFunction("av-styled", "radio", "setFormElememtRequired", "setFormElememtRequiredRadioAvStyled");
SetFormElementsFunction("av-styled", "radio", "getFormElememtAlert",    "getFormElememtAlertRadioAvStyled");
SetFormElementsFunction("av-styled", "radio", "setFormElememtAlert",    "setFormElememtAlertRadioAvStyled");
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-radio label", function()
			{
			$(this).closest(".av-form-radio").setFormElememtValueRadioAvStyled(true);
			});
	});