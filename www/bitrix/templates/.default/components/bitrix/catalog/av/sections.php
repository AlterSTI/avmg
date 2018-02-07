<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent
	(
	"bitrix:catalog.section.list", "av-tablet",
		[
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"   => $arParams["IBLOCK_ID"],

		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],

		"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
		"CACHE_TIME"   => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"]
		],
	false, ["HIDE_ICONS" => "Y"]
	);