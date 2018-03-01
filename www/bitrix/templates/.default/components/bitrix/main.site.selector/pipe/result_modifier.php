<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
foreach($arResult["SITES"] as $index1 => $siteInfo1){
    $arLang[] = $siteInfo1['DIR'];
}
$arLang = array_diff(array_unique($arLang), array('/'));

foreach($arResult["SITES"] as $index => $siteInfo) {
    if ($siteInfo["CURRENT"] != 'Y') {
        //формируем строку адреса сайта
        $arResult["SITES"][$index]["LINK"] = CURRENT_PROTOCOL . '://' . $siteInfo["DOMAINS"][0] .
            str_replace($arLang, $siteInfo['DIR'] == '/' ? '' : $siteInfo['DIR'], $_SERVER["SCRIPT_URL"], $count = 1);
        //убираем index.php
        $arResult["SITES"][$index]["LINK"] = str_replace('index.php', '',$arResult["SITES"][$index]["LINK"], $count = -1);
    }
    if (stristr($siteInfo["NAME"], trim(htmlspecialchars($arParams['PIPE_SYTE_SELECTOR_DOMAIN']))) && $arParams['PIPE_SYTE_SELECTOR_DOMAIN'] != '') {
        $arParams["SITE_LIST"][] = $siteInfo["LID"];
    }
}
$newSiteList = [];
$oldSiteList = $arResult["SITES"];

foreach($arParams["SITE_LIST"] as $site) {
    foreach ($arResult["SITES"] as $siteInfo) {
        if ($siteInfo["LID"] == $site) {
            $newSiteList[] = $siteInfo;
            break;
        }
    }
}
if ($arParams['PIPE_SYTE_SELECTOR_DOMAIN'] == '' && $arParams['~SITE_LIST'][0] == '*all*'){
    $arResult["SITES"] = $oldSiteList;
} else {
    $arResult["SITES"] = $newSiteList;
}
