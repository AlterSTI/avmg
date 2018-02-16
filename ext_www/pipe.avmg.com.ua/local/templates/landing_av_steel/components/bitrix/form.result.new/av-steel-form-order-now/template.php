<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>

<?if($arResult["isFormNote"] == "Y"):?>
	<div id="form-anwer123" hidden>
		<span id="popUp-text-fromForm" back-url=>
			<br><span><?=Loc::getMessage("FORM_PARTNERS_APPLICATION")?></span><br>
		</span>
	</div>
	<script>
		ShowPopUp();changeUrl();
	</script>
<?endif?> 
 
<div class="av-form-wrap-4">
<div class="title-form-1 text-uppercase text-center">
    <h3 class="form-title-main"><?=Loc::getMessage("FORM_PARTNERS_TITLE")?></h3>
    <h4 class="form-title-txt"><?=Loc::getMessage("FORM_PARTNERS_TXT")?></h4>
</div>
<?=$arResult["FORM_HEADER"]?>

	<?
	/* --------------------------------------------------------------------- */
	/* ------------------------------ ошибки ------------------------------- */
	/* --------------------------------------------------------------------- */
	?>
	<?if($arResult["isFormErrors"] == "Y"):?>
		<?=$arResult["FORM_ERRORS_TEXT"]?>
<script> 

$('.av-form-wrap-4 .inputtext').each(function() {
	if($(this).val()) {$(this).prev("span[title]").attr("up", true);}
});
	//,CreateAvAlertPopup2($("[call-back-form]").html(),"").positionCenter(99999).on("remove",function(){AvBlurScreen("off"),$("body").removeClass("stop-scrolling"))}
</script>
	<?endif?>
	<span data-form-input-error-123 ><?=Loc::getMessage("FORM_PARTNERS_ERROR")?></span>

	<?
	/* --------------------------------------------------------------------- */
	/* ------------------------------- поля -------------------------------- */
	/* --------------------------------------------------------------------- */
	?>
	<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion):?>
		<?
		$fieldTypes = [];
		foreach($arQuestion["STRUCTURE"] as $fieldInfo) $fieldTypes[] = $fieldInfo["FIELD_TYPE"];
		?>
		<div
			class="fom-row <?if($arQuestion["REQUIRED"] == "Y"):?>required<?endif?>"
			<?if($arResult['FORM_ERRORS'][$FIELD_SID]):?>form-error<?endif?>
		>
			<span title><?=$arQuestion["CAPTION"]?></span>
			<?=$arQuestion["HTML_CODE"]?>
		</div>
	<?endforeach?>


	<?
	/* --------------------------------------------------------------------- */
	/* ------------------------------ Submit ------------------------------- */
	/* --------------------------------------------------------------------- */
	?>
<div class="option-btn-submit">
				<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
</div>
</form>
</div>