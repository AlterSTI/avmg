<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

switch ($arParams['MESSAGE_TYPE']){
    case 'oldBrowser':
        $this->IncludeComponentTemplate();
    break;
    default:
        return false;
    break;
}

