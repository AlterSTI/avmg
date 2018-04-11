<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$userName  = "";
$userPhone = "";
$userEmail = "";
if($USER->IsAuthorized())
	{
	$userName = htmlspecialcharsEx($USER->GetFormattedName());
	$queryList = CUser::GetList($by = "id", $order = "asc", ["ID" => $USER->GetId()], ["FIELDS" => ["EMAIL", "PERSONAL_MOBILE", "PERSONAL_PHONE", "WORK_PHONE"]]);
	while($queryElement = $queryList->GetNext())
		{
		$userEmail = $queryElement["EMAIL"];
		$userPhone = $queryElement["PERSONAL_MOBILE"];
		if(!$userPhone) $userPhone = $queryElement["PERSONAL_PHONE"];
		if(!$userPhone) $userPhone = $queryElement["WORK_PHONE"];
		}
	}
?>
<div
	class="av-catalog-element-ask-form-origin"
	      data-link-field-id="<?=$arParams["ASK_FORM_LINK_FIELD_ID"]?>"
		  data-name-field-id="<?=$arParams["ASK_FORM_NAME_FIELD_ID"]?>"
	     data-count-field-id="<?=$arParams["ASK_FORM_COUNT_FIELD_ID"]?>"
	 data-user-name-field-id="<?=$arParams["ASK_FORM_USER_NAME_FIELD_ID"]?>"
	data-user-phone-field-id="<?=$arParams["ASK_FORM_USER_PHONE_FIELD_ID"]?>"
	data-user-email-field-id="<?=$arParams["ASK_FORM_USER_EMAIL_FIELD_ID"]?>"

	            data-user-name="<?=$userName?>"
	           data-user-phone="<?=$userPhone?>"
	           data-user-email="<?=$userEmail?>"
	data-element-link-template="<?=CURRENT_PROTOCOL?>://<?=$_SERVER["SERVER_NAME"]?>/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=#IBLOCK_ID#&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=#ELEMENT_ID#"
>
	<i class="close fa fa-times"></i>
	<div class="title"></div>
	<div class="separator"></div>
	<div class="body">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:form.result.new", "av-ajax",
				[
				"AJAX_MODE"           => 'N',
				"AJAX_OPTION_JUMP"    => 'N',
				"AJAX_OPTION_STYLE"   => 'N',
				"AJAX_OPTION_HISTORY" => 'N',

				"SEF_MODE"    => 'N',
				"WEB_FORM_ID" => $arParams["ASK_FORM_ID"],

				"START_PAGE"     => 'new',
				"SHOW_LIST_PAGE" => 'N',
				"SHOW_EDIT_PAGE" => 'N',
				"SHOW_VIEW_PAGE" => 'N',
				"SUCCESS_URL"    => '',

				"SHOW_ANSWER_VALUE"      => 'N',
				"SHOW_ADDITIONAL"        => 'N',
				"SHOW_STATUS"            => 'N',
				"EDIT_ADDITIONAL"        => 'N',
				"EDIT_STATUS"            => 'N',
				"IGNORE_CUSTOM_TEMPLATE" => 'N',
				"USE_EXTENDED_ERRORS"    => 'N',

				"CACHE_TYPE" => 'N',
				"CACHE_TIME" => ''
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</div>
</div>