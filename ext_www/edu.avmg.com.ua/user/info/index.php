<?
define("NEED_AUTH", true);
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetTitle("Персональные данные");

$APPLICATION->IncludeComponent(
	"bitrix:main.profile", 
	"edu", 
	array(
		"USER_PROPERTY_NAME" => "",
		"SET_TITLE" => "Y",
		"AJAX_MODE" => "N",
		"USER_PROPERTY" => array(
			0 => "UF_RESUME_FILE",
		),
		"SEND_INFO" => "N",
		"CHECK_RIGHTS" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"COMPONENT_TEMPLATE" => "edu",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';