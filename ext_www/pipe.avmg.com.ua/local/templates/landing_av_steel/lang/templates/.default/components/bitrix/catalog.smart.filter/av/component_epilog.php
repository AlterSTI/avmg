<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$templateFolder     = getFolder(__DIR__);
$templateFolderHttp = CURRENT_PROTOCOL."://".SITE_NAME.str_replace(DIRECTORY_SEPARATOR, "/", $templateFolder);

CJSCore::Init(["av", "font_awesome"]);
Asset::getInstance()->addString("<script>AvCatalogSmartFilterResult = \"".$templateFolderHttp."ajax.php\";</script>");

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form.button", "av-shop")
	->setIncludings("av", "form.button", "av-shop-alt2");