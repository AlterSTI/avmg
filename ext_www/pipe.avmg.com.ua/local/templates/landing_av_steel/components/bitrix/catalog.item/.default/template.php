<?
use \Bitrix\Main\Localization\Loc;

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------- item ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="pipe-ctatalog-item-tablet" data-element-id="<?=$arResult["ID"]?>">
	<div class="content">
		<?
		/* ------------------------------------------- */
		/* ------------------ image ------------------ */
		/* ------------------------------------------- */
		?>
		<div class="image-link" href="<?=$arResult["DETAIL_PAGE_URL"]?>" rel="nofollow">
			<img
				src="<?=($arResult["PREVIEW_PICTURE"]["SRC"] ? $arResult["PREVIEW_PICTURE"]["SRC"] : $this->GetFolder().'/images/default_image.jpg')?>"
				title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
				alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
			>
		</div>
		<?
		/* ------------------------------------------- */
		/* ------------------ title ------------------ */
		/* ------------------------------------------- */
		?>
		<div class="element-title" href="<?=$arResult["DETAIL_PAGE_URL"]?>" title="<?=$arResult["NAME"]?>">
			<?=$arResult["NAME"]?>
		</div>
		<?
		/* ------------------------------------------- */
		/* ------------------ price ------------------ */
		/* ------------------------------------------- */
		?>
        <div class="price">
            <?if(count($arResult["PRICES_VALUES_ARRAY"])):?>
                <?
                $price = $arResult["PRICES_TITLES_ARRAY"][array_search(min($arResult["PRICES_VALUES_ARRAY"]), $arResult["PRICES_VALUES_ARRAY"])];
                ?>
                <?if(count($arResult["PRICES_VALUES_ARRAY"]) > 1):?><?=Loc::getMessage("AV_CATALOG_ITEM_TABLET_PRICE_FROM", ["#PRICE#" => $price])?>
                <?else:?><?=$price?>
                <?endif?>
            <?else:?>
                <div class="no-price"><?=Loc::getMessage("AV_CATALOG_ITEM_TABLET_PRICE_EMPTY")?></div>
            <?endif?>
        </div>
		<?
		/* ------------------------------------------- */
		/* ---------------- sku props ---------------- */
		/* ------------------------------------------- */
		?>
		<?if(count($arResult["OFFERS_VALUES"])):?>
		<div class="sku-info">
			<?foreach($arResult["OFFERS_VALUES"] as $index => $offerInfo):?>
                <?if( $offerInfo['CODE'] != 'GOST_TRUB' ):?>
                <div class="prop-row">
                    <span class="count-tube-num"><?=$offerInfo["NAME"]?>:</span>
                    <?
                    /* ---------------------------- */
                    /* --------- numbers ---------- */
                    /* ---------------------------- */
                    ?>
                    <?if($offerInfo["VALUE_TYPE"] == 'NUMBER'):?>
                        <?
                        $minValue = min($offerInfo["VALUES"]);
                        $maxValue = max($offerInfo["VALUES"]);
                        ?>
                        <?if($minValue == $maxValue):?><span class="count-tube-num"><?=$minValue?></span>
                        <?else:?>                      <span class="count-tube-num"><?=Loc::getMessage("AV_CATALOG_ITEM_TABLET_SKU_INFO_RANGE",  ["#MIN_VALUE#" => $minValue, "#MAX_VALUE#" => $maxValue])?></span>
                        <?endif?>

                        <?if($offerInfo["MEASURE"]):?>
                        <?=$offerInfo["MEASURE"]?>
                        <?endif?>
                    <?
                    /* ---------------------------- */
                    /* ---------- labels ---------- */
                    /* ---------------------------- */
                    ?>
                    <?elseif($offerInfo["VALUE_TYPE"] == 'TEXT'):?>
                        <?
                        $moreInfo = false;
                        $offerInfo["VALUES"] = array_unique($offerInfo["VALUES"]);
                        if(count($offerInfo["VALUES"]) > 3)
                            {
                            $offerInfo["VALUES"] = array_slice($offerInfo["VALUES"], 0, 3);
                            $moreInfo = true;
                            }
                        ?>
                        <span class="count-tube-num"><?=implode(', ', $offerInfo["VALUES"])?></span>
                        <?if($moreInfo):?>...<?endif?>
                    <?endif?>
                </div>
                <?endif?>
			<?endforeach?>
		</div>
        <?
        /* ------------------------------------------- */
        /* ------------- gost standarts -------------- */
        /* ------------------------------------------- */
        ?>
        <?foreach($arResult["OFFERS_VALUES"] as $index => $offerInfo):?>
            <?if( $offerInfo['CODE'] == 'GOST_TRUB' ):?>
            <div class="count-tube-bottom">
                <span class="count-tube-standart"><?=$offerInfo['NAME']?></span>
                <ul class="tube-standart-list">
                    <?foreach($offerInfo["VALUES"] as $valueInfo):?>
                    <li><?=$valueInfo?></li>
                    <?endforeach?>
                </ul>
            </div>
<!--            <pre>-->
<!--                --><?//print_r($offerInfo)?>
<!--            </pre>-->
            <?endif?>
        <?endforeach?>
		<?endif?>
	</div>
	<?
	/* ------------------------------------------- */
	/* ---------------- read more ---------------- */
	/* ------------------------------------------- */
	?>
	<div
		class="read-more more-btn"
		title="<?=Loc::getMessage("AV_CATALOG_ITEM_TABLET_READ_MORE_TITLE")?>"
	>
		<?=Loc::getMessage("AV_CATALOG_ITEM_TABLET_READ_MORE")?>
	</div>
</div>