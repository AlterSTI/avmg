<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("");

$APPLICATION->IncludeComponent
	(
	"bitrix:catalog.section.list", "av",
		array(
		"IBLOCK_TYPE" => 'catalog_products',
		"IBLOCK_ID"   => 139,

		"SECTION_URL" => '/catalog/#SECTION_CODE#/',

		"COUNT_ELEMENTS" => 'N',
		"TOP_DEPTH"      => '',

		"CACHE_TYPE"   => 'A',
		"CACHE_TIME"   => 36000000,
		"CACHE_GROUPS" => 'Y',

		"ADD_SECTIONS_CHAIN" => 'Y'
		)
	);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");