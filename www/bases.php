<?php

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();


$APPLICATION->IncludeComponent('av:bases.catalog.detail', '.default',
    [
        'LANGUAGES'             => ['UA', 'RU', 'EN', '05224'],
        'DEFAULT_LANGUAGE'      => 'RU',
        'BASE_IBLOCK_RU'        => 58,
        'ADDITIONAL_IBLOCK_RU'  => 114,
        'BASE_IBLOCK_UA'        => 134,
        'ADDITIONAL_IBLOCK_UA'  => 136,
        'BASE_IBLOCK_EN'        => 0,
        'ADDITIONAL_IBLOCK_EN'  => 0,
        'BASE_CODE'             => 'mariupol-filial-1'
    ]
);