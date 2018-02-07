<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Персональный раздел");

$APPLICATION->IncludeComponent
	(
	"bitrix:menu", "av-tablet",
		array(
		"ROOT_MENU_TYPE"     => "left",
		"MAX_LEVEL"          => 1,
		"CHILD_MENU_TYPE"    => '',
		"USE_EXT"            => "Y",
		"DELAY"              => "N",
		"ALLOW_MULTI_SELECT" => "Y",

		"MENU_CACHE_TYPE"       => "A",
		"MENU_CACHE_TIME"       => 360000,
		"MENU_CACHE_USE_GROUPS" => "Y"
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";