<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("АВ Грузоперевозки");

$APPLICATION->IncludeComponent
	(
	"bitrix:lists.element.edit", "",
		array(
		"IBLOCK_TYPE_ID"   => 'hr',
		"IBLOCK_ID"        => 357,
		"ELEMENT_ID"       => $_REQUEST["element_id"],
		"LIST_URL"         => '/hr/',
		"LIST_ELEMENT_URL" => '/hr/element_edit.php?element_id=#element_id#',
		"CACHE_TYPE"       => 'A',
		"CACHE_TIME"       => 360000
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';