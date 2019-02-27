<?php
//require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent('av:bases.catalog.detail.light', '.default',
    [
        'UA_IBLOCK'             => 134,
        'RU_IBLOCK'             => 58,
        'UA_STREAMS_IBLOCK'     => 135,
        'RU_STREAMS_IBLOCK'     => 53,
        'UA_ACTIONS_IBLOCK'     => 61,
        'RU_ACTIONS_IBLOCK'     => 50,
    ]
);