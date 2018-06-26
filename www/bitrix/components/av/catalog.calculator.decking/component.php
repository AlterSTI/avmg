<?php
/** **********************************************************************
 * @var array $arParams
 * @var array $arResult
 ************************************************************************/
use Bitrix\Main\Loader;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if(
    !Loader::includeModule("iblock")     ||
    !Loader::includeModule("catalog")    ||
    !$arParams['IBLOCK_DECKING_ID']                 ||
    !$arParams['SECTION_DECKING_ID']
)
    return;
/** **********************************************************************
 ******************************* variables *******************************
 ************************************************************************/
$iBlockDeckingId        = (int) $arParams['IBLOCK_DECKING_ID'];
$sectionDeckingId       = (int) $arParams['SECTION_DECKING_ID'];
$coating                = (int) $arParams['PROPERTY_COATING'];
$thickness              = (int) $arParams['PROPERTY_THICKNESS'];
$workingWidth           = (int) $arParams['PROPERTY_WORKING_WIDTH'];
$totalWidth             = (int) $arParams['PROPERTY_TOTAL_WIDTH'];
$coatingId              = 0;
$workingWidthId         = 0;
$totalWidthId           = 0;
$thicknessId            = 0;
$items                  = [];
$arFilter               = [];
$arSelect               = [];
$productsId             = [];
$offersIblock           = [];
$arr                    = [];
$arResult               = [];
$offersSettings         = [];
$propertyId             = [];
$offersSettingsValue    = [];
$totalWidthResult       = [];
$workingWidthResult     = [];
$coatingResult          = [];
$thicknessResult        = [];
/** **********************************************************************
 ******************************* validation *******************************
 ************************************************************************/
if (!$offersIblock = CCatalogSku::GetInfoByProductIBlock($iBlockDeckingId)) return;

/** **********************************************************************
 ************************** item products query **************************
 ************************************************************************/
$arFilter = [
                "IBLOCK_ID" => $iBlockDeckingId,
                "SECTION_ID" => $sectionDeckingId,
                "INCLUDE_SUBSECTIONS" => "Y",
                "ACTIVE" => "Y"
            ];

$arSelect = ["ID", "IBLOCK_ID", "NAME"];

$query = CIBlockElement::GetList(["SORT"=>"ASC"], $arFilter,false, false, $arSelect);
while($ar = $query->fetch()) {
    $productsId[] = $ar['ID'];

    $items[$ar['ID']] = [
                   'ID' => $ar['ID'],
                   'VALUE' => $ar['NAME']
               ] ;
}

/** **********************************************************************
 ************************** item OfferIBlock  ****************************
 ************************************************************************/
if (is_array($offersIblock)){
    $propertyFilter = [
        'ID' => [
            $coating,
            $thickness,
            $workingWidth,
            $totalWidth
        ]];
    $query = CCatalogSKU::getOffersList(
        $productsId, 0, [], [], $propertyFilter
    );

    foreach ($query as $products){
        foreach ($products as $offers){
            $coatingId = 0;
            $thicknessId = 0;
            $totalWidthId = 0;
            $workingWidthId = 0;

            foreach ($offers['PROPERTIES'] as $properties){
                if ($properties['VALUE'] != '') {
                    $propertyId[] = $properties['VALUE'];
                }
                switch ($properties['ID']) {
                    case $coating:
                        $coatingId = $properties['VALUE'];
                        $coatingResult[$properties['VALUE']]['ID']=$properties['VALUE'];
                        $coatingResult[$properties['VALUE']]['ORDERS'][$offers['PARENT_ID']]=$offers['PARENT_ID'];
                    break;
                    case $thickness:
                        $thicknessId = $properties['VALUE'];
                        $thicknessResult[$properties['VALUE']]['ID']=$properties['VALUE'];
                        $thicknessResult[$properties['VALUE']]['ORDERS'][$offers['PARENT_ID']]=$offers['PARENT_ID'];
                    break;
                    case $workingWidth:
                        $workingWidthId = $properties['VALUE'];
                        $workingWidthResult[$properties['VALUE']]['ID']=$properties['VALUE'];
                        $workingWidthResult[$properties['VALUE']]['ORDERS'][$offers['PARENT_ID']]=$offers['PARENT_ID'];
                    break;
                    case $totalWidth:
                        $totalWidthId = $properties['VALUE'];
                        $totalWidthResult[$properties['VALUE']]['ID']=$properties['VALUE'];
                        $totalWidthResult[$properties['VALUE']]['ORDERS'][$offers['PARENT_ID']]=$offers['PARENT_ID'];
                    break;
                }
                if($coatingId != 0 && $thicknessId !=0 && $totalWidthId != 0 && $workingWidthId != 0){
                    $thicknessResult[$thicknessId]['COATING'][$coatingId]=$coatingId;

                    $totalWidthResult[$totalWidthId]['COATING'][$coatingId]=$coatingId;
                    $totalWidthResult[$totalWidthId]['THICKNESS'][$thicknessId]=$thicknessId;

                    $workingWidthResult[$workingWidthId]['COATING'][$coatingId]=$coatingId;
                    $workingWidthResult[$workingWidthId]['THICKNESS'][$thicknessId]=$thicknessId;
                }
            }
        }
    }
}
/** **********************************************************************
 ************************** get values to settings************************
 ************************************************************************/
if (count($propertyId) > 0) {
    $propertyId = array_values(array_unique($propertyId));

    $res = CIBlockElement::GetList([], ['ID' => $propertyId], false, false, ['ID', 'NAME']);
    while ($ob = $res->Fetch()) {
        $offersSettingsValue[$ob['ID']] = $ob;
    }
}
/** **********************************************************************
 ************************** change id to value in Arrays******************
 ************************************************************************/

foreach ($coatingResult as $key => $item){
    $coatingResult[$key]['VALUE'] = $offersSettingsValue[$key]['NAME'];
}
foreach ($thicknessResult as $key => $item){
    $thicknessResult[$key]['VALUE'] = $offersSettingsValue[$key]['NAME'];
}
foreach ($workingWidthResult as $key => $item){
        $workingWidthResult[$key]['VALUE'] = $offersSettingsValue[$key]['NAME'];
}
foreach ($totalWidthResult as $key => $item){
    $totalWidthResult[$key]['VALUE'] = $offersSettingsValue[$key]['NAME'];
}
/** **********************************************************************
 ************************** form $arResult  ****************************
 ************************************************************************/

$arResult['ITEMS']          = $items;
$arResult['COATING']        = $coatingResult;
$arResult['THICKNESS']      = $thicknessResult;
$arResult['WORKING_WIDTH']  = $workingWidthResult;
$arResult['TOTAL_WIDTH']    = $totalWidthResult;
//pre($arResult);
$this->IncludeComponentTemplate();