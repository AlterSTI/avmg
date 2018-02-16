<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult["IBLOCK_ID"]         = $arParams["ROWS"][0]["data"]["IBLOCK_ID"];
$arResult["OPERATION_TYPE_ID"] =  0 ;
$operationTypeList             = [];

if($arResult["IBLOCK_ID"])
	{
	$arResult["OPERATION_TYPE_ID"] = CIBlockProperty::GetList([], ["IBLOCK_ID" => $arResult["IBLOCK_ID"], "CODE" => 'operation_type'])->GetNext()["ID"];
	$queryList = CIBlockProperty::GetPropertyEnum("operation_type", ["SORT" => 'ASC'], ["IBLOCK_ID" => $arResult["IBLOCK_ID"]]);
	while($queryElement = $queryList->GetNext()) $operationTypeList[$queryElement["VALUE"]] = $queryElement["EXTERNAL_ID"];
	}
if(count($operationTypeList) && $arResult["OPERATION_TYPE_ID"])
	foreach($arParams["ROWS"] as $index => $elementInfo)
			$arParams["ROWS"][$index]["data"]['PROPERTY_'.$arResult["OPERATION_TYPE_ID"]] =
				[
				"value" => $operationTypeList[$elementInfo["data"]['PROPERTY_'.$arResult["OPERATION_TYPE_ID"]]],
				"title" => $elementInfo["data"]['PROPERTY_'.$arResult["OPERATION_TYPE_ID"]]
				];