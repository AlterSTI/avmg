<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Password Recovery");

$APPLICATION->IncludeComponent("bitrix:system.auth.forgotpasswd", "av");

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";