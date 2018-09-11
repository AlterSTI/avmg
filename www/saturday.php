<?php
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
$arFilter=['IBLOCK_ID' => 134];
$arSelect=['ID', 'NAME', 'CODE', 'PROPERTY_*'];
$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
while ($ar = $res->Fetch()){
    /*foreach ($ar['PROPERTY_OPEN_HOURES_VALUE'] as $hour) {
        if (stristr($hour, 'Суббота')){
            $arr[$ar['CODE']] = $hour;
        }
    }*/
    $arr[] = $ar;
}
pre($arr);