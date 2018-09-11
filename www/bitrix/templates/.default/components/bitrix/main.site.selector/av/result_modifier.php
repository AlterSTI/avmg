<?
use Bitrix\Main\Application,
    Bitrix\Main\Web\Uri;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$context       = Application::getInstance()->getContext();
$server        = $context->getServer();
$request       = $context->getRequest();
$uri           = new Uri($request->getRequestUri());
$protocol      = $request->isHttps() ? 'https' : $uri->getScheme();

foreach($arResult["SITES"] as $index => $siteInfo)
	if($siteInfo["CURRENT"] != 'Y')
		$arResult["SITES"][$index]["LINK"] = $protocol.'://'.$siteInfo["DOMAINS"][0].$_SERVER["SCRIPT_URL"];

$newSiteList = [];
foreach($arParams["SITE_LIST"] as $site)
	foreach($arResult["SITES"] as $siteInfo)
		if($siteInfo["LID"] == $site)
			{
			$newSiteList[] = $siteInfo;
			break;
			}
$arResult["SITES"] = $newSiteList;