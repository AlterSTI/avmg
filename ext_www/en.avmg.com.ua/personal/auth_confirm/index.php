<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";
$APPLICATION->SetTitle("Confirmation of registration");

$APPLICATION->IncludeComponent
	(
	"bitrix:system.auth.confirmation", "av",
		array(
		"USER_ID"      => "confirm_user_id",
		"CONFIRM_CODE" => "confirm_code",
		"LOGIN"        => "login",
		"PROFILE_URL"  => "/personal/info/"
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";