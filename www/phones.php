<?php
declare(strict_types=1);

use
    Bitrix\Main\Loader,
    Bitrix\Main\UserTable,
    Bitrix\Crm\CompanyTable,
    Bitrix\Crm\ContactTable,
    Bitrix\Crm\FieldMultiTable,
    Bitrix\Main\Mail\Event,
    Bitrix\Main\LoaderException;

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
try {
    Loader::includeModule('crm');
}
catch (LoaderException $exception) {
    throw $exception;
}
/** *********************************************
 * Variables*************************************
 ***********************************************/
$companiesIds   = [];
$companies      = [];
$arRes          = [];
$arError        = [];
$arError[]      = ['ENTITY_ID', 'ELEMENT_ID', 'VALUE', 'TITLE', 'ASSIGNED_BY_ID'];
$errorsCopy     = [];
$companiesId    = [];
$contactsId     = [];
$companies      = [];
$contacts       = [];
$userIds        = [];
$users          = [];

/** *********************************************
 * phones_validate*************************************
 ***********************************************/
$arFilter       = ['TYPE_ID' => 'PHONE', 'ENTITY_ID' => ['COMPANY', 'CONTACT']];
$arSelect       = ['*'];
$result = FieldMultiTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
while ($item = $result->Fetch()) {
    $valueRes       = '';
    $value = (string) preg_replace('~\D+~', '', $item['VALUE']);
    if ($value != trim($item['VALUE'])) {
        if (strlen($value) > 0) {
            if (strlen($value) == 12 && substr($value, 0, 3) == '380') {
                $valueRes = $value;
            }
            else if (strlen($value) == 11 && substr($value, 0, 1) == '8') {
                $valueRes = '3'.$value;
            }
            else if (strlen($value) == 10 && substr($value, 0, 1) == '0') {
                $valueRes = '38'.$value;
            }
            else if (strlen($value) == 9 && substr($value, 0, 1) != '0') {
                $valueRes = '380'.$value;
            }
            if (strlen($valueRes) > 0) {
                $arRes[] = [
                    'ID'         => $item['ID'],
                    'ENTITY_ID'  => $item['ENTITY_ID'],
                    'ELEMENT_ID' => $item['ELEMENT_ID'],
                    'VALUE'      => $valueRes,
                    'OLD_VALUE'  => $item['VALUE']
                ];
            }
            else {
                if ($item['ENTITY_ID'] == 'COMPANY') {
                    $companiesIds[] = $item['ELEMENT_ID'];
                }
                else {
                    $contactsId[] = $item['ELEMENT_ID'];
                }
                $arError[] = [
                    'ENTITY_ID'  => $item['ENTITY_ID'],
                    'ELEMENT_ID' => $item['ELEMENT_ID'],
                    'VALUE'      => $item['VALUE']
                ];
            }
        }
        else {
            if ($item['ENTITY_ID'] == 'COMPANY') {
                $companiesIds[] = $item['ELEMENT_ID'];
            }
            else {
                $contactsId[] = $item['ELEMENT_ID'];
            }
            $arError[] = [
                'ENTITY_ID'  => $item['ENTITY_ID'],
                'ELEMENT_ID' => $item['ELEMENT_ID'],
                'VALUE'      => $item['VALUE']
            ];
        }
    }
}
$companiesIds   = array_unique($companiesIds);
$contactsId     = array_unique($contactsId);
/** *********************************************
 * companies names*********************************
 ***********************************************/
if (count($companiesIds) > 0) {
    $arFilter = ['ID' => $companiesIds];
    $arSelect = ['ID', 'TITLE', 'ASSIGNED_BY_ID'];
    $result = CompanyTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
    while ($item = $result->Fetch()) {
        $companies[$item['ID']] = $item;
        $userIds[] = $item['ASSIGNED_BY_ID'];
    }
}
/** *********************************************
 * contacts names******************************
 ***********************************************/
if (count($contactsId) > 0) {
    $arFilter = ['ID' => $contactsId];
    $arSelect = ['ID', 'FULL_NAME', 'ASSIGNED_BY_ID'];
    $result = ContactTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
    while ($item = $result->Fetch()) {
        $contacts[$item['ID']] = $item;
        $userIds[] = $item['ASSIGNED_BY_ID'];
    }
}
$userIds = array_unique($userIds);
/** *********************************************
 * users select******************************
 ***********************************************/
if (count($userIds) > 0) {
    $arFilter = ['ID' => $userIds];
    $arSelect = ['*'];
    $result = UserTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
    while ($item = $result->Fetch()) {
        $users[$item['ID']] = "$item[LAST_NAME] $item[NAME] $item[SECOND_NAME] ";
    }
}
pre($users);
/** *********************************************
 * update errors******************************
 ***********************************************/
$errorsCopy = $arError;
foreach ($errorsCopy as $key => $errorItem) {
    if ($errorItem['ENTITY_ID'] == 'COMPANY' && array_key_exists($errorItem['ELEMENT_ID'], $companies)) {
        $arError[$key]['TITLE'] = $companies[$errorItem['ELEMENT_ID']]['TITLE'];
        $arError[$key]['ASSIGNED_BY_ID'] = $users[$companies[$errorItem['ELEMENT_ID']]['ASSIGNED_BY_ID']];
    } else if ($errorItem['ENTITY_ID'] == 'CONTACT' && array_key_exists($errorItem['ELEMENT_ID'], $contacts)){
        $arError[$key]['TITLE'] = $contacts[$errorItem['ELEMENT_ID']]['FULL_NAME'];
        $arError[$key]['ASSIGNED_BY_ID'] = $users[$contacts[$errorItem['ELEMENT_ID']]['ASSIGNED_BY_ID']];
    }

}
/** *********************************************
 * update good results***************************
 ***********************************************/
/*if (count($arRes) > 0) {
    foreach ($arRes as $key => $arResItem) {
        $res = FieldMultiTable::Update($arResItem['ID'], ['fields' => ['VALUE' => $arResItem['VALUE']]]);
        if ($res->isSuccess() !== true) {
            error_log($res->getErrorMessages());
        }
    }
}*/
/** *********************************************
 * save bad report***************************
 ***********************************************/
/*$file           = fopen('result_phones.csv', 'w+');
foreach ($arError as $item) {
    fputcsv ($file, $item);
}
fclose($file);*/
pre($arRes);
pre($arError);
