<?
use Bitrix\Main\Application,
    Bitrix\Main\Web\Uri,
    \Bitrix\Main\Localization\Loc;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** **********************************************************************
 ********************************* vars **********************************
 ************************************************************************/
$context       = Application::getInstance()->getContext();
$server        = $context->getServer();
$request       = $context->getRequest();
$uri           = new Uri($request->getRequestUri());
$protocol      = $request->isHttps() ? 'https' : $uri->getScheme();
$url           = base64_encode($protocol.'://'.$server->getServerName().$this->GetFolder().'/ajax_handler.php');
$urlCurrent    = $protocol.'://'.$server->getServerName().$request->getRequestUri();
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] != "Y"):?>
<div id = "av-form-ajax-metal" class="av-form-ajax-metal" data-avat-form-id="<?=$arResult["arForm"]["ID"]?>" data-ajax-handler="<?=$url?>" data-page-url="<?=$protocol.'://'.$server->getServerName().$arParams["PAGE_QUEST"]["URL"]?>" name="
<?=$arParams["PAGE_QUEST"]["NAME"]?>">
    <div class="errors-block">
        <?=$arResult['FORM_ERRORS']?>
    </div>
    <div class="result_form_price">
    </div>
	<?=$arResult["FORM_HEADER"]?>
		<?foreach($arResult["FIELDS"] as $fieldName => $fieldInfo):?>
		<div>
			<?
			/* ------------------------------------------- */
			/* -------------- checkbox list -------------- */
			/* ------------------------------------------- */
			?>
			<?if($fieldInfo["TYPE"] == "checkbox"):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.select", "av-form-checkbox",
						[
						"NAME"     => $fieldInfo["NAME"],
						"VALUE"    => $fieldInfo["VALUE"],
						"LIST"     => $fieldInfo["LIST"],
						"TITLE"    => $fieldInfo["TITLE"],
						"REQUIRED" => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			<?
			/* ------------------------------------------- */
			/* --------------- radio list ---------------- */
			/* ------------------------------------------- */
			?>
			<?elseif($fieldInfo["TYPE"] == "radio"):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.select", "av-form-radio",
						[
						"NAME"     => $fieldInfo["NAME"],
						"VALUE"    => $fieldInfo["VALUE"],
						"LIST"     => $fieldInfo["LIST"],
						"TITLE"    => $fieldInfo["TITLE"],
						"REQUIRED" => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			<?
			/* ------------------------------------------- */
			/* ------------------ list ------------------- */
			/* ------------------------------------------- */
			?>
			<?elseif($fieldInfo["TYPE"] == "dropdown"):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.select", "av-form",
						[
						"NAME"        => $fieldInfo["NAME"],
						"VALUE"       => $fieldInfo["VALUE"],
						"LIST"        => $fieldInfo["LIST"],
						"TITLE"       => $fieldInfo["TITLE"],
						"EMPTY_TITLE" => Loc::getMessage("AV_FORM_AJAX_LIST_EMPTY_TITLE"),
						"REQUIRED"    => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			<?
			/* ------------------------------------------- */
			/* ---------------- textarea ----------------- */
			/* ------------------------------------------- */
			?>
			<?elseif($fieldInfo["TYPE"] == "textarea"):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.textarea", "av-form",
						[
						"NAME"     => $fieldInfo["NAME"],
						"VALUE"    => $fieldInfo["VALUE"],
						"TITLE"    => $fieldInfo["TITLE"],
						"REQUIRED" => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			<?
			/* ------------------------------------------- */
			/* ------------------ phone ------------------ */
			/* ------------------------------------------- */
			?>
			<?/*elseif($fieldInfo["TYPE"] == "phone"):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.input.phone", "av-form",
						[
						"NAME"     => $fieldInfo["NAME"],
						"VALUE"    => $fieldInfo["VALUE"],
						"TITLE"    => $fieldInfo["TITLE"],
						"REQUIRED" => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				*/?>
			<?
			/* ------------------------------------------- */
			/* ---------------- file/image --------------- */
			/* ------------------------------------------- */
			?>
			<?elseif($fieldInfo["TYPE"] == "file" || $fieldInfo["TYPE"] == "image"):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.file", "av-form",
						[
						"NAME"     => $fieldInfo["NAME"],
						"VALUE"    => $fieldInfo["VALUE"],
						"TITLE"    => $fieldInfo["TITLE"],
						"REQUIRED" => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
				);
				?>
			<?
			/* ------------------------------------------- */
			/* ------------------ input ------------------ */
			/* ------------------------------------------- */
			?>
			<?else:?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.input", "av-form",
						[
						"NAME"     => $fieldInfo["NAME"],
						"VALUE"    => $fieldName == $arParams['REQUEST_PRICE_WEBFORM_FIELD_CURRENT_URL_NAME'] ? $urlCurrent : ($fieldName == $arParams['REQUEST_PRICE_WEBFORM_FIELD_BASE_NAME']? $arParams["PAGE_QUEST"]["NAME"] :$fieldInfo["VALUE"]),
						"TITLE"    => $fieldInfo["TITLE"],
						"REQUIRED" => $fieldInfo["REQUIRED"],
                        "HIDDEN" =>   $fieldName == $arParams['REQUEST_PRICE_WEBFORM_FIELD_CURRENT_URL_NAME'] || $fieldName == $arParams['REQUEST_PRICE_WEBFORM_FIELD_BASE_NAME'] ? 'Y' : 'N'
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			<?endif?>
		</div>
		<?endforeach?>

		<div class="buttons-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					[
					"BUTTON_TYPE" => "label",
					"TITLE"       => Loc::getMessage("AV_FORM_AJAX_SUBMIT"),
					"ATTR"        => "data-submit-button"
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
	<?=$arResult["FORM_FOOTER"]?>
</div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* -------------------------------- JS -------------------------------- */
/* -------------------------------------------------------------------- */
?>
<script>
	BX.message({"AV_FORM_AJAX_FORM_VALIDATION_ALERT": "<?=Loc::getMessage("AV_FORM_AJAX_FORM_VALIDATION_ALERT")?>"});
	BX.message({"AV_FORM_AJAX_RESULT_OK_MESSAGE"    : "<?=Loc::getMessage("AV_FORM_AJAX_RESULT_OK_MESSAGE")?>"});
</script>