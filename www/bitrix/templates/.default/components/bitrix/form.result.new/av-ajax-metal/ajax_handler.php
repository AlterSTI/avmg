<?

/**
 * @var array $MESS
 **/
use Bitrix\Main\Loader,
    Bitrix\Main\Localization\Loc;

require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

Loc::loadMessages(__FILE__);


if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/***var*******************/

$formId                     = 0;
$formTrue                   = false;
$minPermissions             = 10;
$checkForm                  = [];
$RESULT_ID                  = false;
$by                         = 's_id';
$order                      = 'asc';
$arFilter                   = [];
$isFiltred                  = false;
$result                     = [
    'success' => false,
    'errors'  => [],
    'messages' => []
];
/** chek Error Messages***************/

if (!Loader::includeModule('form')){

    $result['errors'][] = Loc::getMessage('AV_FORM_AJAX_ERRORS_MODULE_FORM');
    exit(json_encode($result));
}
/** chekFormId*********************/

if (isset($_POST['WEB_FORM_ID']) && is_numeric($_POST['WEB_FORM_ID'])){
    $formId = intval($_POST['WEB_FORM_ID']);
    $arFilter = ['ID' => $formId];
} else {
    $result['errors'][] = Loc::getMessage('AV_FORM_AJAX_ERRORS_FORM_NOT_FOUND');
    exit(json_encode($result));
}
/** checkIsSetForm*********************/
if ($formId !== 0){
    $formTrue = CForm::GetList($by, $order, $arFilter, $isFiltred, $minPermissions)->SelectedRowsCount();
} else {
    $result['errors'][] = Loc::getMessage('AV_FORM_AJAX_ERRORS_FORM_NOT_FOUND');
    exit(json_encode($result));
}

/** checkForm******************************/

if ($formTrue > 0){
    $checkForm = CForm::Check($formId, $_REQUEST, false, 'Y', 'N');
} else {
    $result['errors'][] = Loc::getMessage('AV_FORM_AJAX_ERRORS_FORM_NOT_FOUND');
    exit(json_encode($result));
}
/** addResultToBitrix**********************/
if (strlen($checkForm) == 0) {
    $RESULT_ID = CFormResult::Add($formId, $_REQUEST);
} else {
    $result['errors'][] = $checkForm;
    exit(json_encode($result));
}
if ($RESULT_ID !== false){
    CFormCRM::onResultAdded($formId, $RESULT_ID);
    CFormResult::SetEvent($RESULT_ID);
    CFormResult::Mail($RESULT_ID);

    $result['success'] = true;
    $result['messages'][] = Loc::getMessage('AV_FORM_AJAX_SUCCESS');

    exit(json_encode($result));
} else {
    $result['errors'][] = Loc::getMessage('AV_FORM_AJAX_ERRORS_FORM_NOT_ADD');
    exit(json_encode($result));
}


/** sentResultTo_CRM_Event_Mail******************/