<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach($arResult["ITEMS"] as $itemInfo)
	{
	$this->AddEditAction  ($itemInfo["ID"], $itemInfo["EDIT_LINK"],   CIBlock::GetArrayByID($itemInfo["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($itemInfo["ID"], $itemInfo["DELETE_LINK"], CIBlock::GetArrayByID($itemInfo["IBLOCK_ID"], "ELEMENT_DELETE"));
	}
/* -------------------------------------------------------------------- */
/* ---------------------------- items list ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-catalog-section" data-section-params="<?=base64_encode(serialize($arParams))?>">
	<?if($arParams["DISPLAY_TOP_PAGER"] == 'Y' && $arResult["NAV_STRING"]):?>
	<div class="pager top"><?=$arResult["NAV_STRING"]?></div>
	<?endif?>

	<?if(count($arResult["NAV_STRING"])):?>
	<div class="section <?=$arParams["PAGE_TYPE"]?>">
		<?foreach($arResult["ITEMS"] as $itemInfo):?>
		<div id="<?=$this->GetEditAreaId($itemInfo["ID"])?>" data-element-id="<?=$itemInfo["ID"]?>">
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:catalog.item", $arParams["PAGE_TYPE"] == 'tablet' ? "av-tablet" : "av-list",
					[
					"RESULT" => ["ITEM" => $itemInfo]
					],
				false, ["HIDE_ICONS" => 'Y']
				);
			?>
		</div>
		<?endforeach?>
	</div>
	<?endif?>

	<?if($arParams["DISPLAY_BOTTOM_PAGER"] == 'Y' && $arResult["NAV_STRING"]):?>
	<div class="pager bottom"><?=$arResult["NAV_STRING"]?></div>
	<?endif?>

	<?if($arResult["DESCRIPTION"]):?>
	<div class="detail-text"><?=$arResult["DESCRIPTION"]?></div>
	<?endif?>
</div>