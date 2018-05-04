<?
use
    Bitrix\Main\Application,
    Bitrix\Main\Web\Uri;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** ***********************************************************************************************
 ******************************************* VARIABLES ********************************************
 *************************************************************************************************/
$context        = Application::getInstance()->getContext();
$server         = $context->getServer();
$request        = $context->getRequest();
$uri            = new Uri($request->getRequestUri());

foreach($arResult["SITES"] as $index => $siteInfo) {
    if ($siteInfo["CURRENT"] != 'Y') {
        //формируем строку адреса сайта
        $arResult["SITES"][$index]["LINK"] = $uri->getScheme() . '://' . $server->getServerName() .$siteInfo['DIR'].'/';
    }
}