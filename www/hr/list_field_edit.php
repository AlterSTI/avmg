<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("АВ Грузоперевозки");

$APPLICATION->IncludeComponent
	(
	"bitrix:lists.field.edit", "",
		array(
		"IBLOCK_TYPE_ID"      => 'hr',
		"IBLOCK_ID"           => 357,
		"FIELD_ID"            => $_REQUEST["field_id"],
		"LIST_URL"            => '/hr/',
		"LIST_EDIT_URL"       => '/hr/list_edit.php',
		"LIST_FIELDS_URL"     => '/hr/list_fields.php',
		"LIST_FIELD_EDIT_URL" => '/hr/list_field_edit.php?field_id=#field_id#',
		"CACHE_TYPE"          => 'A',
		"CACHE_TIME"          => 360000
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';