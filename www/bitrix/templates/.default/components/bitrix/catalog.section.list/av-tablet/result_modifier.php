<?
use \av\image_processing\watermarks\WatermarkAdding;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------ result processing ------------------------- */
/* -------------------------------------------------------------------- */
if($arParams["SECTION_CODE"] && !$arParams["SECTION_ID"])
	{
	$queryList = CIBlockSection::GetList([], ["IBLOCK_ID" => $arParams["IBLOCK_ID"], "CODE" => $arParams["SECTION_CODE"]], false, ["ID"]);
	while($queryElement = $queryList->GetNext()) $arParams["SECTION_ID"] = $queryElement["ID"];
	}

foreach($arResult["SECTIONS"] as $index => $sectionInfo)
	if($arParams["SECTION_ID"] != $sectionInfo["IBLOCK_SECTION_ID"])
		unset($arResult["SECTIONS"][$index]);

$arResult["SECTIONS"] = array_values($arResult["SECTIONS"]);
/* -------------------------------------------------------------------- */
/* ------------------------ pictures watermark ------------------------ */
/* -------------------------------------------------------------------- */
if(count($arResult["SECTIONS"]))
	foreach($arResult["SECTIONS"] as $index => $sectionInfo)
		{
		$imageProcessedUrl = "";

		try                         {$imageProcessedUrl = (new WatermarkAdding($sectionInfo["PICTURE"]["UNSAFE_SRC"]))->getImageProcessedUrl();}
		catch(Exception $exception) {}

		if(strlen($imageProcessedUrl) > 0) $arResult["SECTIONS"][$index]["PICTURE"]["SRC"] = $imageProcessedUrl;
		}