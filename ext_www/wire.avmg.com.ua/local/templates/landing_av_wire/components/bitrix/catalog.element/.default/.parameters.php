<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ----------------------------- variables ---------------------------- */
/* -------------------------------------------------------------------- */
$iblockPropsFile = [];
if($arCurrentValues["IBLOCK_ID"])
	{
	$queryList = CIBlockProperty::GetList(["SORT" => "ASC"], ["IBLOCK_ID" => $arCurrentValues["IBLOCK_ID"], "ACTIVE" => "Y", "PROPERTY_TYPE" => "F"]);
	while($queryInfo = $queryList->GetNext()) $iblockPropsFile[$queryInfo["CODE"]] = $queryInfo["NAME"];
	}
/* -------------------------------------------------------------------- */
/* ------------------------ old params refactor ----------------------- */
/* -------------------------------------------------------------------- */
$arTemplateParameters["SHOW_DEACTIVATED"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["OFFERS_LIMIT"]                   = ["HIDDEN" => "Y"];
$arTemplateParameters["BACKGROUND_IMAGE"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["SECTION_ID_VARIABLE"]            = ["HIDDEN" => "Y"];
$arTemplateParameters["CHECK_SECTION_ID_VARIABLE"]      = ["HIDDEN" => "Y"];
$arTemplateParameters["SET_BROWSER_TITLE"]              = ["HIDDEN" => "Y"];
$arTemplateParameters["BROWSER_TITLE"]                  = ["HIDDEN" => "Y"];
$arTemplateParameters["SET_META_KEYWORDS"]              = ["HIDDEN" => "Y"];
$arTemplateParameters["META_KEYWORDS"]                  = ["HIDDEN" => "Y"];
$arTemplateParameters["SET_META_DESCRIPTION"]           = ["HIDDEN" => "Y"];
$arTemplateParameters["META_DESCRIPTION"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["SET_LAST_MODIFIED"]              = ["HIDDEN" => "Y"];
$arTemplateParameters["ACTION_VARIABLE"]                = ["HIDDEN" => "Y"];
$arTemplateParameters["PRODUCT_ID_VARIABLE"]            = ["HIDDEN" => "Y"];
$arTemplateParameters["DISPLAY_COMPARE"]                = ["HIDDEN" => "Y"];
$arTemplateParameters["COMPARE_PATH"]                   = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_PRICE_COUNT"]                = ["HIDDEN" => "Y"];
$arTemplateParameters["SHOW_PRICE_COUNT"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["PRICE_VAT_SHOW_VALUE"]           = ["HIDDEN" => "Y"];
$arTemplateParameters["BASKET_URL"]                     = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_PRODUCT_QUANTITY"]           = ["HIDDEN" => "Y"];
$arTemplateParameters["ADD_PROPERTIES_TO_BASKET"]       = ["HIDDEN" => "Y"];
$arTemplateParameters["PRODUCT_PROPS_VARIABLE"]         = ["HIDDEN" => "Y"];
$arTemplateParameters["PARTIAL_PRODUCT_PROPERTIES"]     = ["HIDDEN" => "Y"];
$arTemplateParameters["PRODUCT_PROPERTIES"]             = ["HIDDEN" => "Y"];
$arTemplateParameters["OFFERS_CART_PROPERTIES"]         = ["HIDDEN" => "Y"];
$arTemplateParameters["LINK_IBLOCK_TYPE"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["LINK_IBLOCK_ID"]                 = ["HIDDEN" => "Y"];
$arTemplateParameters["LINK_PROPERTY_SID"]              = ["HIDDEN" => "Y"];
$arTemplateParameters["LINK_ELEMENTS_URL"]              = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_GIFTS_DETAIL"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_GIFTS_MAIN_PR_SECTION_LIST"] = ["HIDDEN" => "Y"];
$arTemplateParameters["COMPATIBLE_MODE"]                = ["HIDDEN" => "Y"];
$arTemplateParameters["DISABLE_INIT_JS_IN_COMPONENT"]   = ["HIDDEN" => "Y"];
$arTemplateParameters["SET_VIEWED_IN_COMPONENT"]        = ["HIDDEN" => "Y"];

$arTemplateParameters["HIDE_NOT_AVAILABLE_OFFERS"] =
	[
	"NAME"   => Loc::getMessage("AV_CATALOG_ELEMENT_PARAMS_HIDE_NOT_AVAILABLE_OFFERS"),
	"TYPE"   => "CHECKBOX",
	"PARENT" => "BASE"
	];
$arTemplateParameters["USE_ELEMENT_COUNTER"] =
	[
	"NAME" => Loc::getMessage("AV_CATALOG_ELEMENT_USE_ELEMENT_COUNTER"),
	"TYPE" => "CHECKBOX"
	];
/* -------------------------------------------------------------------- */
/* ---------------------------- new params ---------------------------- */
/* -------------------------------------------------------------------- */
if(count($iblockPropsFile))
	$arTemplateParameters["PICTURES_ALT"] =
		[
		"NAME"   => Loc::getMessage("AV_CATALOG_ELEMENT_PARAMS_PICTURES_ALT"),
		"TYPE"   => "LIST",
		"VALUES" => array_merge([0 => Loc::getMessage("AV_CATALOG_ELEMENT_PARAMS_LIST_EMPTY_VALUE")], $iblockPropsFile),
		];

$arTemplateParameters["ASK_FORM_ID"] =
	[
	"NAME" => Loc::getMessage("AV_CATALOG_ELEMENT_PARAMS_ASK_FORM_ID"),
	"TYPE" => "STRING"
	];
if($arCurrentValues["ASK_FORM_ID"])
	{
	$arTemplateParameters["ASK_FORM_LINK_FIELD_ID"] =
		[
		"NAME" => Loc::getMessage("AV_CATALOG_ELEMENT_PARAMS_ASK_FORM_LINK_FIELD_ID"),
		"TYPE" => "STRING"
		];
	$arTemplateParameters["ASK_FORM_COUNT_FIELD_ID"] =
		[
		"NAME" => Loc::getMessage("AV_CATALOG_ELEMENT_PARAMS_ASK_FORM_COUNT_FIELD_ID"),
		"TYPE" => "STRING"
		];
	$arTemplateParameters["ASK_FORM_NAME_FIELD_ID"] =
		[
		"NAME" => Loc::getMessage("AV_CATALOG_ELEMENT_PARAMS_ASK_FORM_NAME_FIELD_ID"),
		"TYPE" => "STRING"
		];
	$arTemplateParameters["ASK_FORM_USER_NAME_FIELD_ID"] =
		[
		"NAME" => Loc::getMessage("AV_CATALOG_ELEMENT_PARAMS_ASK_FORM_USER_NAME_FIELD_ID"),
		"TYPE" => "STRING"
		];
	$arTemplateParameters["ASK_FORM_USER_PHONE_FIELD_ID"] =
		[
		"NAME" => Loc::getMessage("AV_CATALOG_ELEMENT_PARAMS_ASK_FORM_USER_PHONE_FIELD_ID"),
		"TYPE" => "STRING"
		];
	}