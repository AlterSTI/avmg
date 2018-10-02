<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("АВ Грузоперевозки");

$APPLICATION->IncludeComponent
	(
	"bitrix:lists.export.excel", "",
		array(
		"IBLOCK_TYPE_ID" => 'hr',
		"IBLOCK_ID"      => 357,
		"LIST_URL"       => '/hr/'
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';