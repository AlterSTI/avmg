<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Корзина");

$APPLICATION->IncludeComponent
	(
	"bitrix:sale.basket.basket", "av",
		array(
		"COLUMNS_LIST"                  => array("PROPS", "DELAY"),
		"PATH_TO_ORDER"                 => "/personal/orders/make/",
		"HIDE_COUPON"                   => "Y",
		"PRICE_VAT_SHOW_VALUE"          => "N",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"USE_PREPAYMENT"                => "N",
		"QUANTITY_FLOAT"                => "Y",
		"AUTO_CALCULATION"              => "N",
		"CORRECT_RATIO"                 => "Y",
		"SET_TITLE"                     => "N",
		"ACTION_VARIABLE"               => "action",
		"USE_GIFTS"                     => "N"
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";