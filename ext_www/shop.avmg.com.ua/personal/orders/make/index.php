<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Оформление заказа");

$APPLICATION->IncludeComponent
	(
	"bitrix:sale.order.ajax", "av",
		array(
		"PAY_FROM_ACCOUNT"           => "Y",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "Y",
		"ALLOW_AUTO_REGISTER"        => "Y",
		"ALLOW_APPEND_ORDER"         => "N",
		"SEND_NEW_USER_NOTIFY"       => "Y",

		"DELIVERY_NO_AJAX"               => "Y",
		"SHOW_NOT_CALCULATED_DELIVERIES" => "L",
		"DELIVERY_NO_SESSION"            => "Y",
		"TEMPLATE_LOCATION"              => "popup",
		"SPOT_LOCATION_BY_GEOIP"         => "Y",
		"DELIVERY_TO_PAYSYSTEM"          => "d2p",
		"SHOW_VAT_PRICE"                 => "Y",
		"USE_PREPAYMENT"                 => "Y",
		"COMPATIBLE_MODE"                => "N",
		"USE_PRELOAD"                    => "Y",
		"ALLOW_USER_PROFILES"            => "N",
		"ALLOW_NEW_PROFILE"              => "N",

		"TEMPLATE_THEME"               => '',
		"SHOW_ORDER_BUTTON"            => "final_step",
		"SHOW_TOTAL_ORDER_BUTTON"      => "N",
		"SHOW_PAY_SYSTEM_LIST_NAMES"   => "Y",
		"SHOW_PAY_SYSTEM_INFO_NAME"    => "Y",
		"SHOW_DELIVERY_LIST_NAMES"     => "Y",
		"SHOW_DELIVERY_INFO_NAME"      => "Y",
		"SHOW_DELIVERY_PARENT_NAMES"   => "N",
		"SHOW_STORES_IMAGES"           => "Y",
		"SKIP_USELESS_BLOCK"           => "N",
		"BASKET_POSITION"              => "before",
		"SHOW_BASKET_HEADERS"          => "Y",
		"DELIVERY_FADE_EXTRA_SERVICES" => "Y",
		"SHOW_COUPONS_BASKET"          => "N",
		"SHOW_COUPONS_DELIVERY"        => "N",
		"SHOW_COUPONS_PAY_SYSTEM"      => "N",
		"SHOW_NEAREST_PICKUP"          => "Y",
		"DELIVERIES_PER_PAGE"          => '',
		"PAY_SYSTEMS_PER_PAGE"         => '',
		"PICKUPS_PER_PAGE"             => '',
		"SHOW_PICKUP_MAP"              => "Y",
		"SHOW_MAP_IN_PROPS"            => "N",
		"PICKUP_MAP_TYPE"              => "google",
		"SHOW_MAP_FOR_DELIVERIES"      => array(1, 2, 3),

		"USER_CONSENT"            => "Y",
		"USER_CONSENT_ID"         => 2,
		"USER_CONSENT_IS_CHECKED" => '',
		"USER_CONSENT_IS_LOADED"  => "Y",

		"ACTION_VARIABLE"          => '',
		"PATH_TO_BASKET"           => "/personal/cart/",
		"PATH_TO_PERSONAL"         => "/personal/orders/",
		"PATH_TO_PAYMENT"          => "/personal/orders/payment/",
		"PATH_TO_AUTH"             => '',
		"SET_TITLE"                => "N",
		"DISABLE_BASKET_REDIRECT"  => "Y",
		"PRODUCT_COLUMNS_VISIBLE"  => array("PREVIEW_PICTURE"),
		"ADDITIONAL_PICT_PROP_139" => "more_photo",
		"BASKET_IMAGES_SCALING"    => "adaptive",
		"SERVICES_IMAGES_SCALING"  => "adaptive",
		"PRODUCT_COLUMNS_HIDDEN"   => array(),

		"USE_YM_GOALS"                   => "N",
		"USE_CUSTOM_MAIN_MESSAGES"       => "N",
		"USE_CUSTOM_ADDITIONAL_MESSAGES" => "N",
		"USE_CUSTOM_ERROR_MESSAGES"      => "N",

		"EMPTY_PAY_SYSTEM" => 1
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";