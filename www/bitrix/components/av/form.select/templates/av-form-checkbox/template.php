<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-form-styled-select-checkbox<?if($arResult["REQUIRED"]):?> required<?endif?>">
	<div class="drop-type-products">
        <label><?=$arResult["TITLE"]?></label>
        <div class="list-product-rezult"></div>
        <i class="arrow fa fa-angle-down"></i>
    </div>
    <div class="drop-down-products-type">
        <?foreach($arResult["LIST"] as $value => $title):?>
        <div>
            <?
            $APPLICATION->IncludeComponent
                (
                "av:form.checkbox", "av-form",
                    [
                    "NAME"     => $arResult["NAME"]."[]",
                    "VALUE"    => $value,
                    "CHECKED"  => is_array($arResult["VALUE"]) && in_array($value, $arResult["VALUE"]) ? "Y" : "N",
                    "TITLE"    => $title,
                    "REQUIRED" => $arResult["REQUIRED"]
                    ],
                false, ["HIDE_ICONS" => "Y"]
                );
            ?>
        </div>
        <?endforeach?>
    </div>
</div>