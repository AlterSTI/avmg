<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/intranet/public/company/telephones.php");

$APPLICATION->SetTitle(GetMessage("COMPANY_TITLE"));
?><?$APPLICATION->IncludeComponent(
	"telephone_list:intranet.search", 
	".default", 
	array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "Y",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"ALPHABET_LANG" => array(
			0 => "ru",
			1 => (LANGUAGE_ID=="en")?"en":((LANGUAGE_ID=="de")?"en":"ru"),
			2 => "",
		),
		"CACHE_TIME" => "43200",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"DATE_FORMAT" => "d.m.Y",
		"DATE_FORMAT_NO_YEAR" => "d.m",
		"DATE_TIME_FORMAT" => "d.m.Y H:i:s",
		"DEFAULT_VIEW" => "table",
		"DISPLAY_USER_PHOTO" => "N",
		"EXTRANET_TYPE" => "",
		"FILTER_1C_USERS" => "N",
		"FILTER_DEPARTMENT_SINGLE" => "Y",
		"FILTER_NAME" => "users",
		"FILTER_SECTION_CURONLY" => "Y",
		"FILTER_SESSION" => "N",
		"LIST_VIEW" => "list",
		"NAME_TEMPLATE" => "#LAST_NAME# #NAME# #SECOND_NAME#",
		"NAV_TITLE" => GetMessage("COMPANY_NAV_TITLE"),
		"PATH_TO_CONPANY_DEPARTMENT" => "/company/structure.php?set_filter_structure=Y&structure_UF_DEPARTMENT=#ID#",
		"PATH_TO_USER_EDIT" => "/company/personal/user/#user_id#/edit/",
		"PATH_TO_VIDEO_CALL" => "/company/personal/video/#USER_ID#/",
		"PM_URL" => "/company/personal/messages/chat/#USER_ID#/",
		"SHOW_DEP_HEAD_ADDITIONAL" => "Y",
		"SHOW_ERROR_ON_NULL" => "Y",
		"SHOW_LOGIN" => "Y",
		"SHOW_NAV_BOTTOM" => "Y",
		"SHOW_NAV_TOP" => "Y",
		"SHOW_UNFILTERED_LIST" => "Y",
		"SHOW_YEAR" => "M",
		"STRUCTURE_FILTER" => "structure",
		"STRUCTURE_PAGE" => "structure.php",
		"TABLE_VIEW" => ".default",
		"USERS_PER_PAGE" => "50",
		"USER_PROPERTY_EXCEL" => array(
			0 => "FULL_NAME,EMAIL,WORK_POSITION,WORK_PHONE,UF_PHONE_INNER",
		),
		"USER_PROPERTY_GROUP" => array(
			0 => "EMAIL",
			1 => "PERSONAL_PHONE",
			2 => "PERSONAL_MOBILE",
			3 => "WORK_PHONE",
		),
		"USER_PROPERTY_LIST" => array(
			0 => "FULL_NAME,EMAIL,PERSONAL_MOBILE,PERSONAL_CITY,WORK_PHONE,UF_STAFF_RESPONS",
		),
		"USER_PROPERTY_TABLE" => array(
			0 => "FULL_NAME",
			1 => "EMAIL",
			2 => "PERSONAL_CITY",
			3 => "WORK_POSITION",
			4 => "WORK_PHONE",
			5 => "UF_DEPARTMENT",
			6 => "UF_PHONE_INNER",
			7 => "UF_STAFF_RESPONS",
		),
		"USE_VIEW_SELECTOR" => "Y"
	),
	false
);?><br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>