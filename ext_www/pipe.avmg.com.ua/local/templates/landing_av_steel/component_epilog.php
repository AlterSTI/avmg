<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$templateFolder     = getFolder(__DIR__);
$templateFolderHttp = CURRENT_PROTOCOL."://".SITE_NAME.str_replace(DIRECTORY_SEPARATOR, "/", $templateFolder);
//pre($templateFolder);
CJSCore::Init(["av"]);
Asset::getInstance()->addString("<script>AvReqest = \"".$templateFolderHttp."ajax/refresh_table.php\";</script>");