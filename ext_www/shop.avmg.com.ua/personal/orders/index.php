<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Текущие заказы");

$APPLICATION->IncludeComponent
	(
	"bitrix:sale.personal.order", "av",
		array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",

		"SEF_MODE"          => "Y",
		"SEF_FOLDER"        => "/personal/orders/",
		"SEF_URL_TEMPLATES" =>
			array(
			"list"   => '',
			"detail" => "detail/#ID#/",
			"cancel" => "cancel/#ID#/"
			),

		"CACHE_TYPE"   => "A",
		"CACHE_TIME"   => 36000,
		"CACHE_GROUPS" => "Y",

		"ORDERS_PER_PAGE"           => 10,
		"PATH_TO_PAYMENT"           => "/personal/orders/payment/",
		"PATH_TO_BASKET"            => "/personal/cart/",
		"PATH_TO_CATALOG"           => "/catalog/",
		"SET_TITLE"                 => "N",
		"SAVE_IN_SESSION"           => "N",
		"NAV_TEMPLATE"              => "av",
		"CUSTOM_SELECT_PROPS"       => array(),
		"HISTORIC_STATUSES"         => array("F"),
		"RESTRICT_CHANGE_PAYSYSTEM" => array(),
		"ORDER_DEFAULT_SORT"        => "STATUS",
		"ALLOW_INNER"               => "Y",
		"ONLY_INNER_FULL"           => "Y",

		"STATUS_COLOR_A"                => "gray",
		"STATUS_COLOR_D"                => "gray",
		"STATUS_COLOR_F"                => "gray",
		"STATUS_COLOR_N"                => "green",
		"STATUS_COLOR_P"                => "yellow",
		"STATUS_COLOR_S"                => "gray",
		"STATUS_COLOR_PSEUDO_CANCELLED" => "red"
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";