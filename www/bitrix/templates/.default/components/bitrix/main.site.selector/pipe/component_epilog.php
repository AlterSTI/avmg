<?php
use
    Bitrix\Main\Application,
    Bitrix\Main\Page\Asset,
    Bitrix\Main\Web\Uri;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** ***********************************************************************************************
 ******************************************* VARIABLES ********************************************
 *************************************************************************************************/
$context        = Application::getInstance()->getContext();
$server         = $context->getServer();
$request        = $context->getRequest();
$uri            = new Uri($request->getRequestUri());
$protocol       = $request->isHttps() ? 'https' : $uri->getScheme();

foreach($arResult["SITES"] as $index => $siteInfo) {
    if ($siteInfo["CURRENT"] != 'Y') {
        //формируем строку микроразметки
        Asset::getInstance()->addString('<link rel="alternate" hreflang="'.$siteInfo['LANG'].'" href="'.$protocol.'://' .
                                         $server->getServerName() .$siteInfo['DIR'].'/'.'" />');
    }
}