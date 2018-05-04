<?

use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["DISPLAY_TOP_PAGER"] && $arResult["NAV_STRING"]){?>
<div class="av-bases-list-pager top"><?=$arResult["NAV_STRING"]?></div>
<?}

/* -------------------------------------------------------------------- */
/* ---------------------------- empty list ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(!count($arResult["ITEMS"])){?>
<?=Loc::getMessage("AV_BASES_LIST_NO_ITEMS")?>
<?}?>
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
        <?foreach($arResult["ITEMS"]['RIGHT_COAST'] as $arItem){?>
                <div class="banks-address-box google-maps-coordinate-bases" data-cordinate-x = "<?=$arItem['cordinateX']?>"
                                                                            data-cordinate-y = "<?=$arItem['cordinateY']?>"
                                                                            data-title ="<?=$arItem['NAME']?>"
                                                                            data-marker="<?=$arItem['GOOGLE_MARKER']?>"
                                                                            data-base="<?=$arItem['BASE_ID']?>"
                >
                    <div class="banks-address-inner" data-item-id="<?=$arItem['BASE_ID']?>">
                        <address class="address-box">
                            <div>
                                <span><?=$arItem['NAME']?>: <?=$arItem['MANAGER_FIO']?> </span>
                                <span><?=$arItem['ADDRESS']?></span>
                                <span></span>
                                <span>тел.: <a href="tel:<?=$arItem['WORK_PHONE']?>"></a><?=$arItem['PHONE']?></span>
                            </div>
                        </address>
                        <span class="address-more"><i class="fa fa-angle-down"></i></span>
                    </div>
                    <!-- POPUP(LOOK AT THIS, IVAN!!!) -->
                    <div class="banks-address-popup" data-item-id="<?=$arItem['BASE_ID']?>">
                        <address class="address-box">
                            <div>
                                <span><?=$arItem['NAME']?>: <?=$arItem['MANAGER_FIO']?></span>
                                <span><?=$arItem['ADDRESS']?></span>
                                <span></span>
                                <span>тел.: <a href="tel:<?=$arItem['WORK_PHONE']?>"></a><?=$arItem['PHONE']?></span>
                            </div>
                            <div class="banks-main-address-box">
                                <span>График работы</span>
                                <?foreach ($arItem['OPEN_HOURSES'] as $open_hours){?>
                                    <span><?=$open_hours?></span>
                                <?}?>
                                <?if ($arItem['PRICE'] != ''){?>
                                    <div class="btn-save-price">
                                        <button>Скачать прайс</button>
                                    </div>
                                <?}?>
                            </div>
                        </address>
                    </div>
                    <!-- / POPUP -->
                </div>
        <?}?>
    </div>
    <div class="base-top-data-inner col-md-12 col-lg-6">
        <div class="main-title-side-dash">
            <h1>Металлобазы в г. Днепр</h1>
            <span>Продажа металлопроката и профнастила от 1м.</span>
        </div>
        <div id = "dnepr_bases_map"></div>
    </div>
    <div class="base-top-data-inner col-md-12 col-lg-3">
        <div class="title-banks">
            <h2>Левый берег</h2>
        </div>
        <?foreach($arResult["ITEMS"]['LEFT_COAST'] as $arItem){?>
                <div class="banks-address-box google-maps-coordinate-bases" data-cordinate-x = "<?=$arItem['cordinateX']?>"
                                                                            data-cordinate-y = "<?=$arItem['cordinateY']?>"
                                                                            data-title ="<?=$arItem['NAME']?>"
                                                                            data-marker="<?=$arItem['GOOGLE_MARKER']?>"
                                                                            data-base="<?=$arItem['BASE_ID']?>"
                >
                    <div class="banks-address-inner" data-item-id="<?=$arItem['BASE_ID']?>">
                        <address class="address-box">
                            <div>
                                <span><?=$arItem['NAME']?>: <?=$arItem['MANAGER_FIO']?> </span>
                                <span><?=$arItem['ADDRESS']?></span>
                                <span></span>
                                <span>тел.: <a href="tel:<?=$arItem['WORK_PHONE']?>"></a><?=$arItem['PHONE']?></span>
                            </div>
                        </address>
                        <span class="address-more"><i class="fa fa-angle-down"></i></span>
                    </div>
                    <!-- POPUP(LOOK AT THIS, IVAN!!!) -->
                    <div class="banks-address-popup" data-item-id="<?=$arItem['BASE_ID']?>">
                        <address class="address-box">
                            <div>
                                <span><?=$arItem['NAME']?>: <?=$arItem['MANAGER_FIO']?></span>
                                <span><?=$arItem['ADDRESS']?></span>
                                <span></span>
                                <span>тел.: <a href="tel:<?=$arItem['WORK_PHONE']?>"></a><?=$arItem['PHONE']?></span>
                            </div>
                                <div class="banks-main-address-box">
                                    <span>График работы</span>
                                    <?foreach ($arItem['OPEN_HOURSES'] as $open_hours){?>
                                        <span><?=$open_hours?></span>
                                    <?}?>
                                    <?if ($arItem['PRICE'] != ''){?>
                                        <div class="btn-save-price">
                                            <button>Скачать прайс</button>
                                        </div>
                                    <?}?>
                                </div>
                        </address>
                    </div>
                    <!-- / POPUP -->
                </div>
        <?}?>
    </div>
</section>

</div>



