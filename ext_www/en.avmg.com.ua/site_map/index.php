<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Sitemap");

$APPLICATION->IncludeComponent
	(
	"bitrix:main.map", "av",
		array(
		"LEVEL" => 2
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";