<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent
	(
	"bitrix:catalog.element", "av",
		[
		"IBLOCK_TYPE"  => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"    => $arParams["IBLOCK_ID"],
		"ELEMENT_ID"   => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"SECTION_ID"   => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],

		"HIDE_NOT_AVAILABLE_OFFERS" => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

		"PROPERTY_CODE"        => $arParams["DETAIL_PROPERTY_CODE"],
		"OFFERS_FIELD_CODE"    => $arParams["DETAIL_OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => $arParams["DETAIL_OFFERS_PROPERTY_CODE"],
		"OFFERS_SORT_FIELD"    => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER"    => $arParams["OFFERS_SORT_ORDER"],
		"OFFERS_SORT_FIELD2"   => $arParams["OFFERS_SORT_FIELD2"],
		"OFFERS_SORT_ORDER2"   => $arParams["OFFERS_SORT_ORDER2"],

		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL"  => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],

		"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
		"CACHE_TIME"   => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

		"SET_TITLE"                    => $arParams["SET_TITLE"],
		"SET_CANONICAL_URL"            => $arParams["DETAIL_SET_CANONICAL_URL"],
		"USE_MAIN_ELEMENT_SECTION"     => $arParams["USE_MAIN_ELEMENT_SECTION"],
		"STRICT_SECTION_CHECK"         => $arParams["DETAIL_STRICT_SECTION_CHECK"],
		"ADD_SECTIONS_CHAIN"           => $arParams["ADD_SECTIONS_CHAIN"],
		"ADD_ELEMENT_CHAIN"            => $arParams["ADD_ELEMENT_CHAIN"],
		"USE_ELEMENT_COUNTER"          => $arParams["USE_ELEMENT_COUNTER"],
		"PICTURES_ALT"                 => $arParams["DETAIL_PICTURES_ALT"],
		"ASK_FORM_ID"                  => $arParams["ASK_FORM_ID"],
		"ASK_FORM_LINK_FIELD_ID"       => $arParams["ASK_FORM_LINK_FIELD_ID"],
		"ASK_FORM_COUNT_FIELD_ID"      => $arParams["ASK_FORM_COUNT_FIELD_ID"],
		"ASK_FORM_NAME_FIELD_ID"       => $arParams["ASK_FORM_NAME_FIELD_ID"],
		"ASK_FORM_USER_NAME_FIELD_ID"  => $arParams["ASK_FORM_USER_NAME_FIELD_ID"],
		"ASK_FORM_USER_PHONE_FIELD_ID" => $arParams["ASK_FORM_USER_PHONE_FIELD_ID"],
		"ASK_FORM_USER_EMAIL_FIELD_ID" => $arParams["ASK_FORM_USER_EMAIL_FIELD_ID"],

		"PRICE_CODE"        => $arParams["PRICE_CODE"],
		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
		"CONVERT_CURRENCY"  => $arParams["CONVERT_CURRENCY"],
		"CURRENCY_ID"       => $arParams["CURRENCY_ID"],

		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404"       => $arParams["SHOW_404"],
		"FILE_404"       => $arParams["FILE_404"]
		],
	false, ["HIDE_ICONS" => "Y"]
	);