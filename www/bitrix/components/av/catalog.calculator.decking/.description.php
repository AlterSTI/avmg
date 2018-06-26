<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription =
	[
	"NAME"        => Loc::getMessage("AV_CATALOG_CALCULATOR_DECKING_TITLE"),
	"DESCRIPTION" => Loc::getMessage("AV_CATALOG_CALCULATOR_DECKING_DESCRIPTION"),
	"PATH"        =>
		[
		"ID"    => 'av',
		"NAME"    => Loc::getMessage("AV_CATALOG_CALCULATOR_DECKING_TITLE"),
		"CHILD" => ["ID" => 'calculators']
		]
	];