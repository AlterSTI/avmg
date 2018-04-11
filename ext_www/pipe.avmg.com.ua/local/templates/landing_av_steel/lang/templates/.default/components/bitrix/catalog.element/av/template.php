<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$panelButtonsInfo = CIBlock::GetPanelButtons($arResult["IBLOCK_ID"], $arResult["ID"]);
$this->AddEditAction  ($arResult["ID"], $panelButtonsInfo["edit"]["edit_element"]  ["ACTION_URL"], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arResult["ID"], $panelButtonsInfo["edit"]["delete_element"]["ACTION_URL"], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE"));
?>
<div class="av-catalog-element" id="<?=$this->GetEditAreaId($arResult["ID"])?>">
	<div class="images-block">     <?include "images_block/template.php"?></div>
	<div class="preview-text">     <?=$arResult["PREVIEW_TEXT"]?></div>
	<div class="info-table-wraper"><?include "info_table/template.php"?>  </div>
	<div class="detail-text">      <?=$arResult["DETAIL_TEXT"]?> </div>
</div>

<?if($arResult["NEED_ASK_FORM"]):?>
<?include "ask_form/template.php"?>
<?endif?>