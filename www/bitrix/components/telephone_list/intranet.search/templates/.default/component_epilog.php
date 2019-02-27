<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$templateFolder     = getFolder(__DIR__);
$templateFolderHttp = CURRENT_PROTOCOL."://".SITE_NAME.str_replace(DIRECTORY_SEPARATOR, "/", $templateFolder);
CJSCore::Init(["av", 'ajax_request_ms']);
Asset::getInstance()->addString("<script>AvPhoneSearchRefresh = \"".$templateFolderHttp."ajax/refresh_table.php\";</script>");