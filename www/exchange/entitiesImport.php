<?php
declare(strict_types=1);

use Bitrix\Crm\RequisiteTable,
    Bitrix\Main\Loader,
    Bitrix\Main\LoaderException;


/** **********************************************************************
 * @var array $data
 * @var array $errors
 ************************************************************************/
try {
    Loader::includeModule('crm');
}
catch (LoaderException $exception) {
    throw $exception;
}
/** **********************************************************************
 * temp
 ************************************************************************/
/*$data = [];
$data['COMPANIES'] = [
    1553 => 352100,
    1554 => 352101,
    215 => 352102,
    216 => 352103,
    164 => 352112,
    217 => 352113,
    218 => 352114,
    219 => 352115,
];
$data['CONTACTS'] = [
    435 => 352116,
    34423432=> 352117
];
$data['REQUISITES'] = [
    445 => 352104,
    32 => 352105,
    33 => 352106,
    34 => 352107,
    35 => 352117,
    36 => 352118,
    37 => 352119,
];/**/
/** **********************************************************************
 * variables
 ************************************************************************/
$crmContact                 = new CCrmContact;
$crmCompany                 = new CCrmCompany;
$companies                  = $data['COMPANIES']    ?? [];
$contacts                   = $data['CONTACTS']     ?? [];
$requisites                 = $data['REQUISITES']   ?? [];

/** **********************************************************************
 *
 ************************************************************************/
if (count($companies) > 0) {
    foreach ($companies as $companyId => $companyExId) {
        $arFields = ['ORIGINATOR_ID' => $companyExId];
        $res = $crmCompany->Update($companyId, $arFields);
    }
}
if (count($contacts) > 0) {
    foreach ($contacts as $contactId => $contactExId) {
        $arFields = ['ORIGINATOR_ID' => $contactExId];
        $crmContact->Update($contactId, $arFields);
    }
}
if (count($requisites) > 0) {
    foreach ($requisites as $requisiteId => $requisiteExId) {
        $arFields = ['ORIGINATOR_ID' => $requisiteExId];
        RequisiteTable::Update($requisiteId, $arFields);
    }
}