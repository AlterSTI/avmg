<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("АВ Грузоперевозки");

/*$APPLICATION->IncludeComponent
	(
	"bitrix:lists.list", "",
		array(
		"IBLOCK_TYPE_ID"   => 'hr',
		"IBLOCK_ID"        => 357,
		"LIST_URL"         => '/hr/',
		"LIST_EDIT_URL"    => '/hr/list_edit.php',
		"LIST_ELEMENT_URL" => '/hr/element_edit.php?element_id=#element_id#&list_id=#list_id#',
		"EXPORT_EXCEL_URL" => '/hr/excel.php',
        "LIST_FIELDS_URL"  => '/hr/list_fields.php',
		"CACHE_TYPE"       => 'A',
		"CACHE_TIME"       => 360000,
        "BIZPROC_WORKFLOW_START_URL" => "bizproc.workflow.start.php?element_id=#element_id#&list_id=#list_id#&workflow_template_id=#workflow_template_id#"
		)
	);*/

$APPLICATION->IncludeComponent("bitrix:lists","",Array(
    "SEF_MODE" => "Y",
    "IBLOCK_TYPE_ID" => "hr",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600",
    "SEF_FOLDER" => "/hr/",
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