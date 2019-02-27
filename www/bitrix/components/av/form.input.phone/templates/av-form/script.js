/* -------------------------------------------------------------------- */
/* -------------------- "av_form_elements" methods -------------------- */
/* -------------------------------------------------------------------- */
(function($)
	{
	jQuery.fn.getFormElememtNamePhoneAvStyled     = function()      {return this.find(":text").attr("name")};
	jQuery.fn.setFormElememtNamePhoneAvStyled     = function(value) {this.find(":text").attr("name", value)};
	jQuery.fn.getFormElememtValuePhoneAvStyled    = function()      {return this.find(":text").val()};
	jQuery.fn.setFormElememtValuePhoneAvStyled    = function(value)
		{
		this.find(":text").attr("value", value).val(value);

		if(value)
			this
				.removeClass("placeholder-on")
				.addClass("placeholder-off");
		else
			this
				.removeClass("placeholder-off")
				.addClass("placeholder-on");
		};
	jQuery.fn.getFormElememtRequiredPhoneAvStyled = function()      {return this.hasClass("required")};
	jQuery.fn.setFormElememtRequiredPhoneAvStyled = function(value)
		{
		     if(value == "on")  this.addClass("required");
		else if(value == "off") this.removeClass("required");
		};
	jQuery.fn.getFormElememtAlertPhoneAvStyled    = function()      {return this.hasClass("alert-input")};
	jQuery.fn.setFormElememtAlertPhoneAvStyled    = function(value)
		{
		     if(value == "on")  this.addClass("alert-input");
		else if(value == "off") this.removeClass("alert-input");
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------------------ phone mask methods ------------------------ */
/* -------------------------------------------------------------------- */
phoneMaskParams =
	{
	'prefixChar'                : '+',
	'countryOperatorSeparator'  : '(',
	'operatorPhoneSeparator'    : ') ',
	'phoneFirstSeparator'       : '-',
	'phoneSecondSeparator'      : '-',
	'countryBlockSizes'         : [2, 4],
	'operatorBlockSizes'        : [2, 4],
	'phoneFirstBlockSizes'      : [2, 3],
	'phoneSecondBlockSizes'     : [2, 2],
	'phoneThirdBlockSizes'      : [2, 2],
	'emptyCharMask'             : '_',
	'countryDefaultValue'       : '380'
	};

(function($)
	{
	/* ------------------------------------------- */
	/* ---------- check value is invalid --------- */
	/* ------------------------------------------- */
	jQuery.fn.phoneMaskValueIsInvalid = function()
		{
		var
			value               = this.val(),
			valueBlocks         = [],
			separatorLost       = false,
			valueBlocksError    = false;
		/* ---------------------------- */
		/* ------- split value -------- */
		/* ---------------------------- */
		[
			phoneMaskParams.countryOperatorSeparator,
			phoneMaskParams.operatorPhoneSeparator,
			phoneMaskParams.phoneFirstSeparator,
			phoneMaskParams.phoneSecondSeparator
		].forEach(function(separatorChar)
			{
			var separatorsPosition = value.indexOf(separatorChar);

			if(separatorsPosition == -1)
				{
				separatorLost = true;
				return;
				}

			valueBlocks.push
				(
				value
					.substring(0, value.indexOf(separatorChar))
					.replace(/\D/g, "")
					.split('')
				);

			value = value.substring(separatorsPosition + separatorChar.length, value.length);
			});

		valueBlocks.push(value.replace(/\D/g, "").split(''));

		if(valueBlocks.length < 5)
			valueBlocks.push([]);
		/* ---------------------------- */
		/* ------- check errors ------- */
		/* ---------------------------- */
		if(!separatorLost)
			[
				phoneMaskParams.countryBlockSizes[0],
				phoneMaskParams.operatorBlockSizes[0],
				phoneMaskParams.phoneFirstBlockSizes[0],
				phoneMaskParams.phoneSecondBlockSizes[0],
				phoneMaskParams.phoneThirdBlockSizes[0]
			].forEach(function(availableMinLength, index)
				{
				if(valueBlocks[index].length < availableMinLength)
					{
					valueBlocksError = true;
					return false;
					}
				});

		return separatorLost || valueBlocksError;
		};
	/* ------------------------------------------- */
	/* ------------ set default value ------------ */
	/* ------------------------------------------- */
	jQuery.fn.phoneMaskSetDefaultValue = function()
		{
		return this.each(function()
			{
			var
				value           =
					phoneMaskParams.prefixChar+
					phoneMaskParams.countryDefaultValue +
					phoneMaskParams.countryOperatorSeparator +
					phoneMaskParams.emptyCharMask.repeat(phoneMaskParams.operatorBlockSizes[0]) +
					phoneMaskParams.operatorPhoneSeparator +
					phoneMaskParams.emptyCharMask.repeat(phoneMaskParams.phoneFirstBlockSizes[0]) +
					phoneMaskParams.phoneFirstSeparator +
					phoneMaskParams.emptyCharMask.repeat(phoneMaskParams.phoneSecondBlockSizes[0]) +
					phoneMaskParams.phoneSecondSeparator +
					phoneMaskParams.emptyCharMask.repeat(phoneMaskParams.phoneThirdBlockSizes[0]),
				caretPosition   =
					phoneMaskParams.prefixChar.length +
					phoneMaskParams.countryDefaultValue.length +
					phoneMaskParams.countryOperatorSeparator.length;

			$(this)
				.attr("value", value)
				.val(value)
				.get(0)
					.setSelectionRange(caretPosition, caretPosition);
			});
		};
	/* ------------------------------------------- */
	/* --------------- clear value --------------- */
	/* ------------------------------------------- */
	jQuery.fn.phoneMaskClearValue = function()
		{
		return this.each(function()
			{
			$(this)
				.attr("value", '')
				.val('');
			});
		};
	/* ------------------------------------------- */
	/* -------------- input control -------------- */
	/* ------------------------------------------- */
	jQuery.fn.phoneMaskInputControl = function()
		{
		var
			newValue            = '',
			currentValueArray   = [],
			caretPosition       = '';
		/* ---------------------------- */
		/* ------- split value -------- */
		/* ---------------------------- */
		var value = this.val();
		[
			phoneMaskParams.countryOperatorSeparator,
			phoneMaskParams.operatorPhoneSeparator,
			phoneMaskParams.phoneFirstSeparator,
			phoneMaskParams.phoneSecondSeparator
		].forEach(function(separatorChar)
			{
			var separatorsPosition = value.indexOf(separatorChar);
			if(separatorsPosition == -1) return;

			currentValueArray.push
				(
				value
					.substring(0, value.indexOf(separatorChar))
					.replace(/\D/g, "")
					.split('')
				);
			value = value.substring(separatorsPosition + separatorChar.length, value.length);
			});

		currentValueArray.push(value.replace(/\D/g, "").split(''));

		if(currentValueArray.length < 5)
			currentValueArray.push([]);
		/* ---------------------------- */
		/* ---- regroup split value --- */
		/* ---------------------------- */
		[
			phoneMaskParams.countryBlockSizes[1],
			phoneMaskParams.operatorBlockSizes[1],
			phoneMaskParams.phoneFirstBlockSizes[1],
			phoneMaskParams.phoneSecondBlockSizes[1],
			phoneMaskParams.phoneThirdBlockSizes[1]
		].forEach(function(availableMaxLength, index)
			{
			if(currentValueArray[index].length <= availableMaxLength) return;

			currentValueArray[index + 1] =
				currentValueArray[index].slice(availableMaxLength, currentValueArray[index].length)
					.concat(currentValueArray[index + 1])
					.filter(function(value)
						{
						return typeof value != "undefined"
						});
			currentValueArray[index] = currentValueArray[index].slice(0, availableMaxLength);
			});
		/* ---------------------------- */
		/* ---- construct new value --- */
		/* ---------------------------- */
		newValue += phoneMaskParams.prefixChar;

		[
			[phoneMaskParams.countryBlockSizes[0],      phoneMaskParams.countryOperatorSeparator],
			[phoneMaskParams.operatorBlockSizes[0],     phoneMaskParams.operatorPhoneSeparator],
			[phoneMaskParams.phoneFirstBlockSizes[0],   phoneMaskParams.phoneFirstSeparator],
			[phoneMaskParams.phoneSecondBlockSizes[0],  phoneMaskParams.phoneSecondSeparator],
			[phoneMaskParams.phoneThirdBlockSizes[0],   '']
		].forEach(function(blockInfo, index)
			{
			currentValueArray[index].forEach(function(value)
				{
				newValue += value;
				});
			if(currentValueArray[index].length < blockInfo[0])
				newValue += phoneMaskParams.emptyCharMask.repeat(blockInfo[0] - currentValueArray[index].length);

			newValue += blockInfo[1];
			});

		var
			firstCharMaskPosition   = newValue.indexOf(phoneMaskParams.emptyCharMask),
			lastInteger             = newValue.replace(/\D/g, "").split('').pop(),
			lastIntegerPosition     = newValue.lastIndexOf(lastInteger);
		/* ---------------------------- */
		/* ----- clear new value ------ */
		/* ---------------------------- */
		if(firstCharMaskPosition != -1 && lastIntegerPosition > firstCharMaskPosition)
			{
			newValue =
				newValue.substr(0, firstCharMaskPosition) +
				lastInteger +
				newValue.substr(firstCharMaskPosition + 1);
			newValue =
				newValue.substr(0, lastIntegerPosition) +
				phoneMaskParams.emptyCharMask +
				newValue.substr(lastIntegerPosition + 1);
			}
		/* ---------------------------- */
		/* ---- calc caret position --- */
		/* ---------------------------- */
		caretPosition = newValue.lastIndexOf(newValue.replace(/\D/g, "").split('').pop()) + 1;
		/* ---------------------------- */
		/* ----- set value + caret ---- */
		/* ---------------------------- */
		$(this)
			.attr("value", newValue)
			.val(newValue)
			.get(0)
				.setSelectionRange(caretPosition, caretPosition);
		};
	})(jQuery);
/* -------------------------------------------------------------------- */
/* ------------- "av_form_elements" methods registration -------------- */
/* -------------------------------------------------------------------- */
SetFormElementsFunction("av-styled", "phone", "getFormElememtName",     "getFormElememtNamePhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "setFormElememtName",     "setFormElememtNamePhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "getFormElememtValue",    "getFormElememtValuePhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "setFormElememtValue",    "setFormElememtValuePhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "getFormElememtRequired", "getFormElememtRequiredPhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "setFormElememtRequired", "setFormElememtRequiredPhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "getFormElememtAlert",    "getFormElememtAlertPhoneAvStyled");
SetFormElementsFunction("av-styled", "phone", "setFormElememtAlert",    "setFormElememtAlertPhoneAvStyled");
/* -------------------------------------------------------------------- */
/* -------------------------- input behavior -------------------------- */
/* -------------------------------------------------------------------- */
$(function()
	{
	$(document)
		.on("vclick", ".av-form-styled-phone label", function()
			{
			var $inputBlock = $(this).parent();
			setTimeout(function()
				{
				$inputBlock.find(":text").focus();
				}, 50);
			})
		.on("focus", ".av-form-styled-phone :text", function()
			{
			$(this).parent()
				.removeClass("placeholder-on")
				.addClass("placeholder-off");

			// if($(this).phoneMaskValueIsInvalid())
			// 	// $(this).phoneMaskSetDefaultValue();
			})
		.on("focusout", ".av-form-styled-phone :text", function()
			{
			// if($(this).phoneMaskValueIsInvalid())
			// 	$(this)
			// 		.phoneMaskClearValue()
			// 		.parent()
			// 	       .removeClass("placeholder-off")
			// 	       .addClass("placeholder-on");
			})
		.on("input propertychange", ".av-form-styled-phone :text", function()
			{
			// $(this).phoneMaskInputControl();
			})
		.on("keyup keypress", ".av-form-styled-phone :text", function(event)
			{
			if(event.keyCode == 13 && $(this).phoneMaskValueIsInvalid())
				{
				// $(this).phoneMaskSetDefaultValue();
				return false;
				}

			return true;
			})
		.on("cut copy paste", ".av-form-styled-phone :text", function()
			{
			return false;
			});
	});