<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("АВ Грузоперевозки");

$APPLICATION->IncludeComponent
	(
	"bitrix:lists.list", "",
		array(
		"IBLOCK_TYPE_ID"   => 'hr',
		"IBLOCK_ID"        => 357,
		"LIST_URL"         => '/hr/',
		"LIST_EDIT_URL"    => '/hr/list_edit.php',
		"LIST_ELEMENT_URL" => '/hr/element_edit.php?element_id=#element_id#&list_id=#list_id#',
		"EXPORT_EXCEL_URL" => '/hr/excel.php',
        "LIST_FIELDS_URL"  => '/hr/list_fields.php',
		"CACHE_TYPE"       => 'A',
		"CACHE_TIME"       => 360000
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';