<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?if($arResult["isFormNote"] == "Y"):?>
	<div id="form-anwer123" hidden>
		<span id="popUp-text-fromForm" back-url >
			<br><span><?=Loc::getMessage('AV_FORM_THANKS')?></span><br>
		</span>
	</div>
	<script>
		$('[partners-form]').fadeOut();ShowPopUp();changeUrl();
	</script>
<?endif?> 

<div class="text-uppercase text-center title-form-1"><span><?=Loc::getMessage('AV_FORM_MAKE_DILER')?></span><p><?=Loc::getMessage('AV_FORM_FILL')?></p></div>
<?=$arResult["FORM_HEADER"]?><div class="av-form-wrap-2 clearfix">

	<?
	/* --------------------------------------------------------------------- */
	/* ------------------------------ ошибки ------------------------------- */
	/* --------------------------------------------------------------------- */
	?>
	<?if($arResult["isFormErrors"] == "Y"):?>
		<?=$arResult["FORM_ERRORS_TEXT"]?>
<script>



$('[partners-form] .inputtext').each(function() {
	if($(this).val()) {$(this).prev(".av-form-wrap-2 span[title]").attr("up", true)}
});
	//,CreateAvAlertPopup2($("[call-back-form]").html(),"").positionCenter(99999).on("remove",function(){AvBlurScreen("off"),$("body").removeClass("stop-scrolling"))}
</script>
	<?endif?>
	<span data-form-input-error-123 ><?=Loc::getMessage('AV_FORM_ENTER_CORRECT_DATA')?></span>
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
			class="col-md-6 fom-row <?if($arQuestion["REQUIRED"] == "Y"):?>required<?endif?>"
			<?if($arResult['FORM_ERRORS'][$FIELD_SID]):?>form-error<?endif?>
		>
			<span title><?=$arQuestion["CAPTION"]?></span>
			<?=$arQuestion["HTML_CODE"]?>
		</div>
	<?endforeach?>
	<div class="text-center" style="display: none;" data-security-text-form><?=Loc::getMessage('AV_FORM_PERSONAL_SECURE_DATA')?></div>
	<?
	/* --------------------------------------------------------------------- */
	/* ------------------------------ Submit ------------------------------- */
	/* --------------------------------------------------------------------- */
	?>
<div class="col-md-12 diler-form-submit">
				<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
</div></div><?=$arResult["FORM_FOOTER"]?>