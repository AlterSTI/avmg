<?php
/** **********************************************************************
 * @var array $arParams
 * @var array $arResult
 * @var array $arCurrentValues
 * @var array $arComponentParameters
 ************************************************************************/

use Bitrix\Main\Loader,
    Bitrix\Main\Localization\Loc;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
Loader::IncludeModule("iblock");
Loader::includeModule("catalog");
//pre($arCurrentValues);
/*** *******************************************************************/
/*****************************variables ********************************/
/** ******************************************************************/
$iBlock = false;
$iblockArray = [];
$ar_sections = [];
$arOffers = [];
$properties = [];
$resultArray    =[];
$propertyCoatingList = [];
$propertyThicknessList = [];
$propertyWorkWidthList = [];
$propertyTotalWidthList = [];

/*** *******************************************************************/
/*****************************calculations*****************************/
/** ******************************************************************/

// iblockes array

$queryList = CIBlock::GetList(["sort" => 'asc'], ["ACTIVE" => 'Y']);
while($queryInfo = $queryList->GetNext()){
    if (CCatalogSku::GetInfoByProductIBlock($queryInfo["ID"])) {
        $iblockArray[$queryInfo["ID"]] = $queryInfo["NAME"] . ' (' . $queryInfo["ID"] . ')';
    }
}
$iblockArray[0] = Loc::getMessage("PROPERTY_NO_SELECT");
//settings iblock
if ($arCurrentValues['IBLOCK_DECKING_ID'] > 0) {
    $iBlock = true;
    if ($arCurrentValues['IBLOCK_DECKING_ID'] != $arCurrentValues['IBLOCK_DECKING_ID_OLD']){
        $arCurrentValues['PROPERTY_COATING'] = 0;
        $arCurrentValues['PROPERTY_THICKNESS'] = 0;
        $arCurrentValues['PROPERTY_WORKING_WIDTH'] = 0;
        $arCurrentValues['PROPERTY_TOTAL_WIDTH'] = 0;
    }
    $rs_Section = CIBlockSection::GetList(array('left_margin' => 'asc'), array('IBLOCK_ID' => $arCurrentValues['IBLOCK_DECKING_ID']));
    while ( $ar_Section = $rs_Section->Fetch()){
        $ar_sections[$ar_Section['ID']] = $ar_Section['NAME'];
    }
    if ($arOffers = CCatalogSku::GetInfoByProductIBlock($arCurrentValues['IBLOCK_DECKING_ID'])) {
        $res = CIBlockProperty::GetList(Array(), Array("ACTIVE" => "Y", "IBLOCK_ID" => $arOffers['IBLOCK_ID']));
        while ($prop = $res->Fetch()){
            $properties[$prop['ID']] = $prop['NAME'] . ' (' . $prop['ID'] . ')';
        }
        $properties[0] = Loc::getMessage("PROPERTY_NO_SELECT");

        $valuesSettings = array_filter(
            $properties,
            function ($key) use ($arCurrentValues){
                return !in_array($key, $arCurrentValues);
            },
            ARRAY_FILTER_USE_KEY
        );
        $propertyCoatingList    = $valuesSettings;
        $propertyThicknessList  = $valuesSettings;
        $propertyWorkWidthList  = $valuesSettings;
        $propertyTotalWidthList = $valuesSettings;

        if ($arCurrentValues['PROPERTY_COATING'] != '')
            $propertyCoatingList[$arCurrentValues['PROPERTY_COATING']] = $properties[$arCurrentValues['PROPERTY_COATING']];
        else
            $propertyCoatingList[0] = Loc::getMessage("PROPERTY_NO_SELECT");

        if ($arCurrentValues['PROPERTY_THICKNESS'] != '')
            $propertyThicknessList[$arCurrentValues['PROPERTY_THICKNESS']]     = $properties[$arCurrentValues['PROPERTY_THICKNESS']];
        else
            $propertyThicknessList[0] = Loc::getMessage("PROPERTY_NO_SELECT");

        if ($arCurrentValues['PROPERTY_WORKING_WIDTH'] != '')
            $propertyWorkWidthList[$arCurrentValues['PROPERTY_WORKING_WIDTH']] = $properties[$arCurrentValues['PROPERTY_WORKING_WIDTH']];
        else
            $propertyWorkWidthList[0] = Loc::getMessage("PROPERTY_NO_SELECT");

        if ($arCurrentValues['PROPERTY_TOTAL_WIDTH'] != '')
            $propertyTotalWidthList[$arCurrentValues['PROPERTY_TOTAL_WIDTH']]  = $properties[$arCurrentValues['PROPERTY_TOTAL_WIDTH']];
        else
            $propertyTotalWidthList[0] = Loc::getMessage("PROPERTY_NO_SELECT");
    }
}
$arComponentParameters = array(
    "GROUPS" => array(
        "SETTINGS" => array(
            "NAME" => Loc::getMessage("SETTINGS_PHR")
        ),
        "FIELDS_PARAMS" => array(
            "NAME" => Loc::getMessage("FIELDS_PARAMS")
        ),
        "FIELDS_PARAMS_SETTINGS" => array(
            "NAME" => Loc::getMessage("FIELDS_PARAMS_SETTINGS")
        ),
    ),
    "PARAMETERS" => array(

        "IBLOCK_DECKING_ID" => array(
            "PARENT" => "SETTINGS",
            "NAME" => Loc::getMessage("IBLOCK_DECKING_ID_NAME"),
            "REFRESH" => "Y",
            "TYPE"     => "LIST",
            "VALUES"   => $iblockArray
        ),
        "IBLOCK_DECKING_ID_OLD" => array(
            "PARENT" => "SETTINGS",
            "NAME" => Loc::getMessage("IBLOCK_DECKING_ID_NAME"),
            "REFRESH" => "N",
            "TYPE"     => "STRING",
            "DEFAULT"   => $arCurrentValues['IBLOCK_DECKING_ID']
        ),
        "CACHE_TIME" => array(
            "DEFAULT" => "3600"
        )

    )
);
if ($iBlock){
    $arComponentParameters['PARAMETERS']['SECTION_DECKING_ID'] = array(
        "PARENT" => "SETTINGS",
        "NAME" => Loc::getMessage("SECTION_DECKING_ID_NAME"),
        "TYPE"     => "LIST",
        "VALUES"   => $ar_sections,
    );
    if (count($properties) > 0 ) {

        $arComponentParameters['PARAMETERS']['PROPERTY_COATING'] = array(
            "PARENT" => "FIELDS_PARAMS_SETTINGS",
            "NAME" => Loc::getMessage("PROPERTY_COATING_NAME"),
            "TYPE" => "LIST",
            "VALUES" => $propertyCoatingList,
            "DEFAULT" => $properties[0],
            "REFRESH" => "Y"
        );

        if ($arCurrentValues['PROPERTY_COATING'] > 0 && count($valuesSettings) > 0) {

            $arComponentParameters['PARAMETERS']['PROPERTY_THICKNESS'] = array(
                "PARENT" => "FIELDS_PARAMS_SETTINGS",
                "NAME" => Loc::getMessage("PROPERTY_THICKNESS_NAME"),
                "TYPE" => "LIST",
                "VALUES" => $propertyThicknessList,
                "REFRESH" => "Y"
            );
        }
        if ($arCurrentValues['PROPERTY_THICKNESS'] > 0) {

            $arComponentParameters['PARAMETERS']['PROPERTY_WORKING_WIDTH'] = array(
                "PARENT" => "FIELDS_PARAMS_SETTINGS",
                "NAME" => Loc::getMessage("PROPERTY_WORKING_WIDTH_NAME"),
                "TYPE" => "LIST",
                "VALUES" => $propertyWorkWidthList,
                "REFRESH" => "Y"
            );
        }
        if ($arCurrentValues['PROPERTY_WORKING_WIDTH'] > 0 && count($valuesSettings) > 0) {

            $arComponentParameters['PARAMETERS']['PROPERTY_TOTAL_WIDTH'] = array(
                "PARENT" => "FIELDS_PARAMS_SETTINGS",
                "NAME" => Loc::getMessage("PROPERTY_TOTAL_WIDTH_NAME"),
                "TYPE" => "LIST",
                "VALUES" => $propertyTotalWidthList,
                "REFRESH" => "Y"
            );
        }
    }
}
