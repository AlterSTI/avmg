<?
use \Bitrix\Main\Localization\Loc;
//pre($arResult['ITEMS'] );
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["DISPLAY_TOP_PAGER"] && $arResult["NAV_STRING"]){?>
<div class="av-bases-list-pager top"><?=$arResult["NAV_STRING"]?></div>
<?}?>
<?
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
<?foreach ($arResult["ITEMS"] as $index => $coast){?>
    <div class="title-top mobile-title-side-dash">
        <?if ($index === 'RIGHT_COAST'):?>
            <h2>Правый берег</h2>
        <?elseif ($index === 'LEFT_COAST'):?>
            <h2>Левый берег</h2>
        <?endif;?>
    </div>
    <div class="container">
        <div class="row">
            <?foreach($coast as $arItem){?>
                <div class="banks-main-wrapper-box">
                    <div class="banks-main-inner">
                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 banks-first-contacts">
                            <h2><?=$arItem['NAME']?></h2>
                            <address class="address-box address-banks-side">
                                <div class="banks-main-contact-title">
                                    <h2>Контакты</h2>
                                </div>
                                <div class="banks-main-address-box">
                                    <span><?=$arItem['ADDRESS']?></span>
                                    <span>тел.:<a href="tel:<?=$arItem['WORK_PHONE']?>"></a><?=$arItem['WORK_PHONE']?></span>
                                </div>
                                <div class="banks-main-address-box">
                                    <span>График работы</span>
                                    <?foreach ($arItem['OPEN_HOURSES'] as $open_hours){?>
                                        <span><?=$open_hours?></span>
                                    <?}?>
                                </div>
                                <span class="banks-cord" data-cordinate-x = "<?=$arItem['cordinateX']?>"
                                                         data-cordinate-y = "<?=$arItem['cordinateY']?>"
                                                         data-title ="<?=$arItem['NAME']?>"
                                                         data-base-id="<?=$arItem['BASE_ID']?>"
                                >
                                    Координаты карты: <?=$arItem['cordinateX']?>, <?=$arItem['cordinateY']?>
                                </span>
                                <span class="address-more"><i class="fa fa-angle-down"></i></span>
                            </address>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 bank-map-data">
                            <h2>Карта проезда</h2>
                            <div id = "base_<?=$arItem['BASE_ID']?>" class="google-map-detail"></div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 bank-map-data">
                            <h2>Фото металлобазы</h2>
                            <img src="<?=$arItem['PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>" title="<?=$arItem['NAME']?>">
                        </div>
                    </div>

                    <div class="type-metall-block col-md-12">
                        <h2>Типы продукции металлобазы</h2>
                        <div class="type-metall-wrap">
                        <?foreach ($arItem['STREAMS'] as $baseStream){?>
                            <div class="type-metall-inner col-md-6 col-lg-3">
                                <div class="type-metall-info">
                                    <img src="<?=$baseStream['ICON']?>" width="51" height="53" alt="<?=$baseStream['NAME']?>">
                                    <div class="type-metall-data">
                                        <span><?=$baseStream['NAME']?></span>
                                        <?foreach ($baseStream['PHONES'] as $key => $phoneNumber){?>
                                            <a href="tel:<?=$baseStream['PHONES_NUMBER'][$key]?>"><?=$phoneNumber?></a>
                                        <?}?>
                                    </div>
                                </div>
                                <div class="btn-save-price">
                                    <?if($baseStream['PRICE'] != ''){?>
                                        <button data-price-stream="<?=$baseStream['PRICE']?>">Скачать прайс</button>
                                    <?}?>
                                </div>
                            </div>
                        <?}?>
                        </div>
                    </div>
                </div>
            <?}?>
        </div>
    </div>
<?}?>




