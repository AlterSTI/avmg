<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/intranet/public/telephony/.left.menu.php");
if(CModule::IncludeModule('voximplant'))
{
	$aMenuLinks = Array(
		Array(
			GetMessage("SERVICES_MENU_TELEPHONY_CONNECT"),
			"#SITE_DIR#telephony/lines.php",
			Array("/telephony/edit.php"),
			Array("menu_item_id"=>"menu_telephony_lines"),
			'Bitrix\Voximplant\Security\Helper::isLinesMenuEnabled()'
		),
		Array(
			GetMessage("SERVICES_MENU_TELEPHONY_BALANCE"),
			"#SITE_DIR#telephony/index.php",
			Array("/telephony/detail.php"),
			Array("menu_item_id"=>"menu_telephony_balance"),
			'Bitrix\Voximplant\Security\Helper::isBalanceMenuEnabled()'
		),
		Array(
			GetMessage("SERVICES_MENU_TELEPHONY_USERS"),
			"#SITE_DIR#telephony/users.php",
			Array(),
			Array("menu_item_id"=>"menu_telephony_users"),
			'Bitrix\Voximplant\Security\Helper::isUsersMenuEnabled()'
		),
		Array(
			GetMessage("SERVICES_MENU_TELEPHONY_GROUPS"),
			"#SITE_DIR#telephony/groups.php",
			Array('/telephony/editgroup.php'),
			Array("menu_item_id"=>"menu_telephony_groups"),
			'Bitrix\Voximplant\Security\Helper::isUsersMenuEnabled()'
		),
		Array(
			GetMessage("SERVICES_MENU_TELEPHONY_PHONES"),
			"#SITE_DIR#telephony/phones.php",
			Array(),
			Array("menu_item_id"=>"menu_telephony_phones"),
			""
		),
		Array(
			GetMessage("SERVICES_MENU_TELEPHONY_PERMISSIONS"),
			"#SITE_DIR#telephony/permissions.php",
			Array("/telephony/editrole.php"),
			Array("menu_item_id"=>"menu_telephony_permissions"),
			'Bitrix\Voximplant\Security\Helper::isSettingsMenuEnabled()'
		),
		Array(
			GetMessage("SERVICES_MENU_TELEPHONY_IVR"),
			"#SITE_DIR#telephony/ivr.php",
			Array("/telephony/editivr.php"),
			Array("menu_item_id"=>"menu_telephony_ivr"),
			'Bitrix\Voximplant\Security\Helper::isSettingsMenuEnabled()'
		),
		Array(
			GetMessage("SERVICES_MENU_TELEPHONY"),
			"#SITE_DIR#telephony/configs.php",
			Array(),
			Array("menu_item_id"=>"menu_telephony_configs"),
			'Bitrix\Voximplant\Security\Helper::isSettingsMenuEnabled()'
		),
		
	);
}
?>