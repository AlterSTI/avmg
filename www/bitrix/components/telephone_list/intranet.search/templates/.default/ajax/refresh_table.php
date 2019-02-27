<?php

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//разбираем строку параметров
$arParams = unserialize(base64_decode($_POST['ARPARAMS']));
$view = $_POST['VIEW'];
$arParams['DATA_FILTER_OPTION'] = $_POST['DATA_FILTER_OPTION'];
//пагинация
$arParams['I_NUM_PAGE'] = $_POST['I_NUM_PAGE'] ?? 1;
$arParams['ACTIVE_USER'] = $_POST['ACTIVE_USER'];
$replaceArray = ['*'];

$arParams['NEED_SEARCH_STRING'] = "%".str_ireplace($replaceArray, '%', trim($_POST['SEARCH']))."%";

$APPLICATION->IncludeComponent("telephone_list:intranet.structure.list", $view, $arParams, false, ['HIDE_ICONS' => 'Y']);
