<?php

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//разбираем строку параметров
$arParams = unserialize(base64_decode($_POST['ARPARAMS']));
$view = $_POST['VIEW'];
$component = $_POST['COMPONENT'];
$arParams['DATA_FILTER_OPTION'] = $_POST['DATA_FILTER_OPTION'];
//пагинация
if (!$_POST['I_NUM_PAGE']){
    $arParams['I_NUM_PAGE'] = 1;
} else {
    $arParams['I_NUM_PAGE'] = $_POST['I_NUM_PAGE'];
}
/*if ($_POST[])*/
/*
if ($_POST['DATA_FILTER_OPTION']!=''){
    $arParams['NEED_SEARCH_STRING'] = trim($_POST['SEARCH']);
} else {
    $arParams['NEED_SEARCH_STRING'] = "%".trim($_POST['SEARCH'])."%";
}/**/
$arParams['ACTIVE_USER'] = $_POST['ACTIVE_USER'];
$replaceArray = array('*');
//$arParams['NEED_SEARCH_STRING'] = "%".str_ireplace($replaceArray, '%', trim($_POST['SEARCH']))."%";

$arParams['NEED_SEARCH_STRING'] = "%".str_ireplace($replaceArray, '%', trim($_POST['SEARCH']))."%";




//$arParams['NEED_SEARCH_STRING'] = "%".trim($_POST['SEARCH'])."%";
$APPLICATION->IncludeComponent("telephone_list:intranet.structure.list", $view, $arParams, $component, array('HIDE_ICONS' => 'Y'));
