<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["DISPLAY_TOP_PAGER"] && $arResult["NAV_STRING"]):?>
<div class="av-bases-list-pager top"><?=$arResult["NAV_STRING"]?></div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- empty list ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(!count($arResult["ITEMS"])):?>
<?=Loc::getMessage("AV_BASES_LIST_NO_ITEMS")?>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- list ------------------------------- */
/* -------------------------------------------------------------------- */

?>
<!--<div class="av-bases-list">-->
<?/*foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction  ($arItem["ID"], $arItem["EDIT_LINK"],   CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));

	$cordinateX = $arItem["PROPERTIES"]["cordinate_x"]["VALUE"];
	$cordinateY = $arItem["PROPERTIES"]["cordinate_y"]["VALUE"];
	$closed     = $arItem["PROPERTIES"]["closed"]     ["VALUE_XML_ID"];
	?>
	<div
		id="<?=$this->GetEditAreaId($arItem["ID"])?>"
		class="
			av-bases-list-element
			<?if(!$cordinateX || !$cordinateY):?>no-map<?endif?>
			<?if($closed):?>closed<?endif?>
			<?if($arParams["DETAIL_URL"]):?>checkable<?endif?>
			"
	>
		<div>
			<h3>
				<a <?if($arParams["DETAIL_URL"]):?>href="<?=$arItem["DETAIL_PAGE_URL"]?>"<?endif?>>
					<?if($closed):?><?=Loc::getMessage("AV_BASES_LIST_CLOSED_PREFIX")?> <?endif?><?=$arItem["NAME"]?>
				</a>
			</h3>
			<div class="value-block">
				<?if($arItem["PROPERTIES"]["address"]["VALUE"]["TEXT"]):?>
				<div><?=$arItem["PROPERTIES"]["address"]["VALUE"]["TEXT"]?></div>
				<?endif?>

				<?if($arItem["PROPERTIES"]["phone"]["VALUE"][0]):?>
				<div><?=implode(', ', $arItem["PROPERTIES"]["phone"]["VALUE"])?></div>
				<?endif?>

				<?if($arItem["PROPERTIES"]["streams"]["VALUE"][0]):?>
				<div class="streams-block">
					<?foreach($arResult["STREAMS_INFO"] as $stream => $streamInfo):?>
						<?if(in_array($stream, $arItem["PROPERTIES"]["streams"]["VALUE"])):?>
						<div
							title="<?=$streamInfo["NAME"]?>"
							style="width: <?=$streamInfo["SVG_WIDTH"]?>px;height: <?=$streamInfo["SVG_HEIGHT"]?>px"
						>
							<?=$arResult["STREAMS_INFO"][$stream]["SVG_CONTENT"]?>
						</div>
						<?endif?>
					<?endforeach?>
				</div>
				<?endif?>
			</div>
		</div>
		<?if($cordinateX && $cordinateY):?>
		<div
			class="google-map"
			data-store-name="<?=$arItem["NAME"]?>"
			data-cordinate-x="<?=$cordinateX?>"
			data-cordinate-y="<?=$cordinateY?>"
		></div>
		<?endif?>
	</div>
<?endforeach*/?>
<!--</div>-->
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ list ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-bases-list">



<!-- НАЗВАНИЕ ПЕРЕД ВЫПАДАЮЩИМ БЛОКОМ/МОБ,ВЕРСИЯ -->
<div class="mob-title">
    <h1>Металлобазы в г. Днепр</h1>
    <span>Продажа металлопроката и профнастила от 1м.</span>
</div>
<!-- ВЫПАДАЮЩИЙ БЛОК /МОБ,ВЕРСИЯ -->
<div class="dropdown-top">
    <span>Выберите Металлобазу в г. Днепр</span>
    <span class="address-more"><i class="fa fa-angle-down"></i></span>
</div>
<!-- ВЫПАДАЮЩИЙ БЛОК /МОБ,ВЕРСИЯ -->

<section class="base-top-data">
    <div class="base-top-data-inner col-md-12 col-lg-3">
        <div class="title-banks">
            <h2>Правый берег</h2>
        </div>
        <?foreach($arResult["ITEMS"]['RIGHT_COAST'] as $arItem):?>

        <div class="banks-address-box google-maps-coordinate-bases" data-cordinate-x = "<?=$arItem['cordinateX']?>"
                                                                    data-cordinate-y = "<?=$arItem['cordinateY']?>"
                                                                    data-title ="<?=$arItem['NAME']?>"
        >
            <div class="banks-address-inner">
                <address class="address-box">
                    <div>
                        <span><?=$arItem['NAME']?>:<?=$arItem['MANAGER_FIO']?> </span>
                        <span><?=$arItem['ADDRESS']?></span>
                        <span></span>
                        <span>тел.:<a href="tel:<?=$arItem['WORK_PHONE']?>"></a><?=$arItem['WORK_PHONE']?></span>
                    </div>
                    <div class="banks-main-address-box">
                        <span>График работы</span>
                        <?foreach ($arItem['OPEN_HOURSES'] as $open_hours):?>
                            <span><?=$open_hours?></span>
                        <?endforeach;?>
                        <?if ($arItem['PRICE'] != ''):?>
                        <div class="btn-save-price">
                            <button>Скачать прайс</button>
                        </div>
                        <?endif;?>
                    </div>
                </address>
                <span class="address-more"><i class="fa fa-angle-down"></i></span>
            </div>
        </div>
        <?endforeach?>
    </div>
    <div class="base-top-data-inner col-md-12 col-lg-6">
        <div class="main-title-side-dash">
            <h1>Металлобазы в г. Днепр</h1>
            <span>Продажа металлопроката и профнастила от 1м.</span>
        </div>
       <!--<img src="<?/*=SITE_TEMPLATE_PATH*/?>/img/top-map.jpg" alt="Карта">-->
        <div id = "dnepr_bases_map"></div>

    </div>
    <div class="base-top-data-inner col-md-12 col-lg-3">
        <div class="title-banks">
            <h2>Левый берег</h2>
        </div>
        <?foreach($arResult["ITEMS"]['LEFT_COAST'] as $arItem):?>
                <div class="banks-address-box google-maps-coordinate-bases" data-cordinate-x = "<?=$arItem['cordinateX']?>"
                                                                            data-cordinate-y = "<?=$arItem['cordinateY']?>"
                                                                            data-title ="<?=$arItem['NAME']?>"
                >
                    <div class="banks-address-inner">
                        <address class="address-box">
                            <div>
                                <span><?=$arItem['NAME']?>:<?=$arItem['MANAGER_FIO']?> </span>
                                <span><?=$arItem['ADDRESS']?></span>
                                <span></span>
                                <span>тел.:<a href="tel:<?=$arItem['WORK_PHONE']?>"></a><?=$arItem['WORK_PHONE']?></span>
                            </div>
                            <div class="banks-main-address-box">
                                <span>График работы</span>
                                <?foreach ($arItem['OPEN_HOURSES'] as $open_hours):?>
                                    <span><?=$open_hours?></span>
                                <?endforeach;?>
                                <?if ($arItem['PRICE'] != ''):?>
                                    <div class="btn-save-price">
                                        <button>Скачать прайс</button>
                                    </div>
                                <?endif;?>
                            </div>
                        </address>
                        <span class="address-more"><i class="fa fa-angle-down"></i></span>
                    </div>
                </div>
        <?endforeach?>
    </div>
</section>

</div>



