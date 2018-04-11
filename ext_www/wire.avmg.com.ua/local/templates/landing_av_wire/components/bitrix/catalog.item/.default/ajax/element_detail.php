<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arParams = unserialize(base64_decode($_POST["component_params"]));
$arParams['ELEMENT_ID'] = $_POST["element_id"];

$APPLICATION->IncludeComponent
(
    "bitrix:catalog.element", "",
    [
        "IBLOCK_TYPE"  => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID"    => $arParams["IBLOCK_ID"],
        "ELEMENT_ID"   => $arParams['ELEMENT_ID'],

        "HIDE_NOT_AVAILABLE_OFFERS" => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

        "PROPERTY_CODE"        => $arParams["PROPERTY_CODE"],
        "OFFERS_FIELD_CODE"    => $arParams["OFFERS_FIELD_CODE"],
        "OFFERS_PROPERTY_CODE" => $arParams["OFFERS_PROPERTY_CODE"],
        "OFFERS_SORT_FIELD"    => $arParams["OFFERS_SORT_FIELD"],
        "OFFERS_SORT_ORDER"    => $arParams["OFFERS_SORT_ORDER"],
        "OFFERS_SORT_FIELD2"   => $arParams["OFFERS_SORT_FIELD2"],
        "OFFERS_SORT_ORDER2"   => $arParams["OFFERS_SORT_ORDER2"],

        "PICTURES_ALT" => "",
        "ASK_FORM_ID"  => $arParams["ASK_FORM_ID"],

        "PRICE_CODE"        => $arParams["PRICE_CODE"],
        "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
        "CONVERT_CURRENCY"  => $arParams["CONVERT_CURRENCY"],
        "CURRENCY_ID"       => $arParams["CURRENCY_ID"]
    ]
);