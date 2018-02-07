<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle       ("Услуги компании");
$APPLICATION->SetPageProperty("title",       "Продажа, резка и доставка металла АВ металл групп | 🏠 Украина, г. Днепр, ул. Шолом-Алейхема, 5, ☎ (056) 790-01-22 | ™ shop.avmg.com.ua");
$APPLICATION->SetPageProperty("description", "Резка и доставка металла ► АВ металл груп ™ ✓Современное оборудование ✓Оптимальные цены ✓Квалифицированные специалисты ☎ (056)790-01-22 Звоните!");

$APPLICATION->IncludeComponent
	(
	"bitrix:menu", "av-tablet",
		array(
		"ROOT_MENU_TYPE"     => "left",
		"MAX_LEVEL"          => 1,
		"CHILD_MENU_TYPE"    => "",
		"USE_EXT"            => "Y",
		"DELAY"              => "N",
		"ALLOW_MULTI_SELECT" => "Y",

		"MENU_CACHE_TYPE"       => "A",
		"MENU_CACHE_TIME"       => 360000,
		"MENU_CACHE_USE_GROUPS" => "Y"
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>