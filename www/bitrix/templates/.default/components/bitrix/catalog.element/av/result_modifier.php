<?
use
	\Bitrix\Main\Localization\Loc,
	\av\image_processing\watermarks\WatermarkAdding;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* --------------------- params/result processing --------------------- */
/* -------------------------------------------------------------------- */
$arParams["PRICE_TYPE"]           = $arParams["PRICE_CODE"][0] ? $arParams["PRICE_CODE"][0] : CCatalogGroup::GetBaseGroup()["NAME"];
$arParams["ASK_FORM_ID"]          = (int) $arParams["ASK_FORM_ID"];
$arParams["PROPERTY_CODE"]        = array_diff($arParams["PROPERTY_CODE"],        [""]);
$arParams["OFFERS_FIELD_CODE"]    = array_diff($arParams["OFFERS_FIELD_CODE"],    [""]);
$arParams["OFFERS_PROPERTY_CODE"] = array_diff($arParams["OFFERS_PROPERTY_CODE"], [""]);
/* -------------------------------------------------------------------- */
/* ----------------------- fields/props to show ----------------------- */
/* -------------------------------------------------------------------- */
$arResult["SHOW_ELEMENT_FIELDS"] = [];
$arResult["SHOW_OFFERS_FIELDS"]  = [];
$arResult["SHOW_OFFERS_PROPS"]   = [];
$sectionProps                    = CIBlockSectionPropertyLink::GetArray($arResult["IBLOCK_ID"],                                                   $arResult["IBLOCK_SECTION_ID"]);
$sectionSkuProps                 = CIBlockSectionPropertyLink::GetArray(CCatalogSKU::GetInfoByProductIBlock($arResult["IBLOCK_ID"])["IBLOCK_ID"], $arResult["IBLOCK_SECTION_ID"]);

foreach($arParams["PROPERTY_CODE"] as $elementProp)
	if(count($arResult["DISPLAY_PROPERTIES"][$elementProp]) && count($sectionProps[$arResult["DISPLAY_PROPERTIES"][$elementProp]["ID"]]))
		$arResult["SHOW_ELEMENT_FIELDS"][$elementProp] = $arResult["DISPLAY_PROPERTIES"][$elementProp]["NAME"];

foreach($arResult["OFFERS"] as $valueInfo)
	{
	foreach($arParams["OFFERS_FIELD_CODE"] as $offerField)
		if($valueInfo[$offerField])
			$arResult["SHOW_OFFERS_FIELDS"][$offerField] = Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_FIELD_".$offerField);
	foreach($arParams["OFFERS_PROPERTY_CODE"] as $offerProp)
		if(count($valueInfo["DISPLAY_PROPERTIES"][$offerProp]) && count($sectionSkuProps[$valueInfo["DISPLAY_PROPERTIES"][$offerProp]["ID"]]))
			$arResult["SHOW_OFFERS_PROPS"][$offerProp] = $valueInfo["DISPLAY_PROPERTIES"][$offerProp]["NAME"];
	}
/* -------------------------------------------------------------------- */
/* ------------------------- element pictures ------------------------- */
/* -------------------------------------------------------------------- */
$propertyPictureAltId = 0;
$arResult["IMAGES"]   = [];

if($arResult["DETAIL_PICTURE"]["SRC"])
	$arResult["IMAGES"][] = $arResult["DETAIL_PICTURE"];

if($arParams["PICTURES_ALT"])
	{
	$queryList = CIBlockProperty::GetList([], ["IBLOCK_ID" => $arParams["IBLOCK_ID"], "CODE" => $arParams["PICTURES_ALT"], "ACTIVE" => "Y", "PROPERTY_TYPE" => "F"]);
	while($queryInfo = $queryList->GetNext()) $propertyPictureAltId = $queryInfo["ID"];
	}

if($propertyPictureAltId)
	{
	$queryList = CIBlockElement::GetProperty($arParams["IBLOCK_ID"], $arResult["ID"], [], ["ID" => $propertyPictureAltId]);
	while($queryInfo = $queryList->GetNext())
		{
		$fileInfo = CFile::GetFileArray($queryInfo["VALUE"]);
		if(!$fileInfo["SRC"]) continue;

		$fileInfo["UNSAFE_SRC"] = $fileInfo["SRC"];
		$arResult["IMAGES"][] = $fileInfo;
		}
	}
/* -------------------------------------------------------------------- */
/* ------------------------ pictures watermark ------------------------ */
/* -------------------------------------------------------------------- */
if(count($arResult["IMAGES"]))
	foreach($arResult["IMAGES"] as $index => $fileInfo)
		{
		$imageProcessedUrl = "";

		try                         {$imageProcessedUrl = (new WatermarkAdding($fileInfo["UNSAFE_SRC"]))->getImageProcessedUrl();}
		catch(Exception $exception) {}

		if(strlen($imageProcessedUrl) > 0) $arResult["IMAGES"][$index]["SRC"] = $imageProcessedUrl;
		}
/* -------------------------------------------------------------------- */
/* --------------------------- user basket ---------------------------- */
/* -------------------------------------------------------------------- */
$arResult["USER_BASKET"] = [];
$queryList = CSaleBasket::GetList
	(
	["ID" => "DESC"],
		[
		"FUSER_ID" => CSaleBasket::GetBasketUserID(),
		"DELAY"    => "N",
		"LID"      => SITE_ID,
		"ORDER_ID" => NULL
		],
	false, false,
	["ID", "PRODUCT_ID", "QUANTITY"]
	);
while($queryElement = $queryList->GetNext()) $arResult["USER_BASKET"][$queryElement["PRODUCT_ID"]] = $queryElement;
/* -------------------------------------------------------------------- */
/* ----------------------------- ask form ----------------------------- */
/* -------------------------------------------------------------------- */
$arResult["NEED_ASK_FORM"] = false;
if($arParams["ASK_FORM_ID"])
	{
	if(count($arResult["OFFERS"]))
		foreach($arResult["OFFERS"] as $valueInfo)
			if(!$valueInfo["PRICES"][$arParams["PRICE_TYPE"]]["PRINT_DISCOUNT_VALUE_NOVAT"])
				$arResult["NEED_ASK_FORM"] = true;
	if(!count($arResult["OFFERS"]) && !$arResult["PRICES"][$arParams["PRICE_TYPE"]]["PRINT_DISCOUNT_VALUE_NOVAT"])
		$arResult["NEED_ASK_FORM"] = true;
	}