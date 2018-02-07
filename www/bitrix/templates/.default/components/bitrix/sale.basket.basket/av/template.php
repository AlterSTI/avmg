<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ errors ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["ERROR_MESSAGE"]):?>
	<div class="av-basket-errors"><?=$arResult["ERROR_MESSAGE"]?></div>
	<?return?>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ basket ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div
	class="av-basket"
	data-params="<?=base64_encode(serialize($arParams))?>"
	data-site-id="<?=SITE_ID?>"
>
	<?
	/* ------------------------------------------- */
	/* -------------- warnings block ------------- */
	/* ------------------------------------------- */
	?>
	<?if(count($arResult["WARNING_MESSAGE"])):?>
	<div class="warnings-block">
		<?ShowError(implode("<br>", $arResult["WARNING_MESSAGE"]))?>
	</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ---------------- tabs block --------------- */
	/* ------------------------------------------- */
	?>
	<div class="tabs-block">
		<?$firstTabGeted = false?>
		<?foreach($arResult["ITEMS"] as $blockType => $itemsArray):?>
			<?if($firstTabGeted):?>
			<div class="separator">|</div>
			<?endif?>

			<div class="tab<?if(!$firstTabGeted):?> selected<?endif?>" data-tab="<?=$blockType?>">
				<?
				$messageIndex  = "";
				$firstTabGeted = true;
				switch($blockType)
					{
					case "AnDelCanBuy":   $messageIndex = "AV_BASKET_READY_ITEMS";     break;
					case "DelDelCanBuy":  $messageIndex = "AV_BASKET_DELAYED_ITEMS";   break;
					case "ProdSubscribe": $messageIndex = "AV_BASKET_SUBSCRIBED_ITEMS";break;
					case "nAnCanBuy":     $messageIndex = "AV_BASKET_ABSENT_ITEMS";    break;
					}
				?>
				<?=Loc::getMessage($messageIndex, ["#COUNT#" => count($itemsArray)])?>
			</div>
		<?endforeach?>
	</div>
	<?
	/* ------------------------------------------- */
	/* ------------- items block hat ------------- */
	/* ------------------------------------------- */
	?>
	<div class="items-block-hat">
		<div><?=Loc::getMessage("AV_BASKET_HAT_NAME")?></div>
		<div><?=Loc::getMessage("AV_BASKET_HAT_QUANTITY")?></div>
		<div><?=Loc::getMessage("AV_BASKET_HAT_PRICE")?></div>
	</div>
	<?
	/* ------------------------------------------- */
	/* --------------- items block --------------- */
	/* ------------------------------------------- */
	?>
	<?$firstBlockGeted = false?>
	<?foreach($arResult["ITEMS"] as $blockType => $itemsArray):?>
		<div class="items-block<?if(!$firstBlockGeted):?> selected<?endif?>" data-block="<?=$blockType?>">
			<?foreach($itemsArray as $itemInfo):?>
			<div
				class="item"
				data-item-id="<?=$itemInfo["ID"]?>"
				data-product-id="<?=$itemInfo["PRODUCT_ID"]?>"
			>
				<i class="delete-button fa fa-times" title="<?=Loc::getMessage("AV_BASKET_DELETE_TITLE")?>"></i>

				<div class="image-block">
					<img
						src="<?=($itemInfo["IMAGE"] ? $itemInfo["IMAGE"] : $this->GetFolder()."/images/default_image.jpg")?>"
						alt="<?=$itemInfo["NAME"]?>"
						title="<?=$itemInfo["NAME"]?>"
					>
				</div>

				<div class="info-block">
					<div class="title"><?=$itemInfo["NAME"]?></div>

					<?if(in_array("PROPS", $arParams["COLUMNS_LIST"])):?>
						<?foreach($itemInfo["PROPS"] as $propertyInfo):?>
						<div class="prop-value"><?=$propertyInfo["NAME"]?>: <?=$propertyInfo["VALUE"]?></div>
						<?endforeach?>
					<?endif?>
				</div>

				<div class="counter">
					<i class="checker back fa fa-angle-left<?if($itemInfo["QUANTITY"] <= 1):?> disabled<?endif?>"></i>
					<input value="<?=$itemInfo["QUANTITY"]?>"title="<?=Loc::getMessage("AV_BASKET_QUANTITY_TITLE")?>">
					<i class="checker forward fa fa-angle-right"></i>
					<div class="measure"><?=$itemInfo["MEASURE_TEXT"]?></div>
				</div>

				<div class="price<?if($itemInfo["QUANTITY"] <= 1):?> minimized<?endif?>" data-base-price="<?=$itemInfo["PRICE"]?>">
					<div><?=$itemInfo["FULL_PRICE_FORMATED"]?></div>
					<div><?=str_replace($itemInfo["PRICE"], $itemInfo["PRICE"] * $itemInfo["QUANTITY"], $itemInfo["FULL_PRICE_FORMATED"])?></div>
				</div>

				<?if($blockType == "AnDelCanBuy"):?>
				<div class="special-button delay-button" title="<?=Loc::getMessage("AV_BASKET_DELAY_TITLE")?>">
					<?=Loc::getMessage("AV_BASKET_DELAY")?>
				</div>
				<?endif?>

				<?if(in_array("DELAY", $arParams["COLUMNS_LIST"]) && $blockType == "DelDelCanBuy"):?>
				<div class="special-button return-button" title="<?=Loc::getMessage("AV_BASKET_RETURN_TITLE")?>">
					<?=Loc::getMessage("AV_BASKET_RETURN")?>
				</div>
				<?endif?>
			</div>
			<?endforeach?>
		</div>
		<?$firstBlockGeted = true?>
	<?endforeach?>
	<?
	/* ------------------------------------------- */
	/* --------------- prices block -------------- */
	/* ------------------------------------------- */
	?>
	<div class="prices-block">
		<div class="title"><?=Loc::getMessage("AV_BASKET_TOTAL_BLOCK_TITLE")?></div>
		<div class="info">
			<span><?=Loc::getMessage("AV_BASKET_TOTAL_BLOCK_INFO")?>:</span>
			<span><?=$arResult["allSum_FORMATED"]?></span>
		</div>

		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-shop",
				[
				"BUTTON_TYPE" => "link",
				"LINK"        => $arParams["PATH_TO_ORDER"],
				"TITLE"       => Loc::getMessage("AV_BASKET_CHECKOUT_LINK"),
				"ATTR"        => "offer-link"
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
	</div>
</div>