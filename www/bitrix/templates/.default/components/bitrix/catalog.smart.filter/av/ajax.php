<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->RestartBuffer();

echo CUtil::PHPToJSObject
	(
		[
		"FILTER_URL"    => $arResult["FILTER_URL"],
		"ELEMENT_COUNT" => $arResult["ELEMENT_COUNT"]
		],
	true
	);