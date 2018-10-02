<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("АВ Грузоперевозки");

$APPLICATION->IncludeComponent
	(
	"bitrix:lists.list.edit", "",
		array(
		"IBLOCK_TYPE_ID"  => 'hr',
		"IBLOCK_ID"       => 357,
		"LIST_URL"        => '/hr/',
		"LIST_EDIT_URL"   => '/hr/list_edit.php',
		"LIST_FIELDS_URL" => '/hr/list_fields.php',
		"CACHE_TYPE"      => 'A',
		"CACHE_TIME"      => 360000
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';