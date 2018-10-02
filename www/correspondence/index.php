<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("Корреспонденция");

$APPLICATION->IncludeComponent("bitrix:lists","av",Array(
    "SEF_MODE" => "Y",
    "IBLOCK_TYPE_ID" => "chancery",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600",
    "SEF_FOLDER" => "/correspondence/",
    "SEF_URL_TEMPLATES" => Array(
        "lists" => "",
        "list" => "#list_id#/view/#section_id#/",
        "list_sections" => "#list_id#/edit/#section_id#/",
        "list_edit" => "#list_id#/edit/",
        "list_fields" => "#list_id#/fields/",
        "list_field_edit" => "#list_id#/field/#field_id#/",
        "list_element_edit" => "#list_id#/element/#section_id#/#element_id#/",
        "bizproc_log" => "#list_id#/bp_log/#document_state_id#/",
        "bizproc_workflow_start" => "#list_id#/bp_start/#element_id#/",
        "bizproc_task" => "#list_id#/bp_task/#section_id#/#element_id#/#task_id#/"
    ),
));
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';