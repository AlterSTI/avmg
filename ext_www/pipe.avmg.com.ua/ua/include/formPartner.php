<?// $APPLICATION->IncludeComponent(
//    "bitrix:form",
//    "av-steel-partners-form",
//    Array(
//        "AJAX_MODE" => "Y",
//        "AJAX_OPTION_ADDITIONAL" => "",
//        "AJAX_OPTION_HISTORY" => "N",
//        "AJAX_OPTION_JUMP" => "N",
//        "AJAX_OPTION_SHADOW" => "N",
//        "AJAX_OPTION_STYLE" => "N",
//        "CACHE_TIME" => "3600",
//        "CACHE_TYPE" => "N",
//        "CHAIN_ITEM_LINK" => "",
//        "CHAIN_ITEM_TEXT" => "",
//        "EDIT_ADDITIONAL" => "N",
//        "EDIT_STATUS" => "Y",
//        "IGNORE_CUSTOM_TEMPLATE" => "N",
//        "NOT_SHOW_FILTER" => array(0 => "", 1 => "",),
//        "NOT_SHOW_TABLE" => array(0 => "", 1 => "",),
//        "RESULT_ID" => $_REQUEST[RESULT_ID],
//        "SEF_MODE" => "N",
//        "SHOW_ADDITIONAL" => "N",
//        "SHOW_ANSWER_VALUE" => "N",
//        "SHOW_EDIT_PAGE" => "N",
//        "SHOW_LIST_PAGE" => "N",
//        "SHOW_STATUS" => "N",
//        "SHOW_VIEW_PAGE" => "N",
//        "START_PAGE" => "new",
//        "SUCCESS_URL" => "index.php",
//        "USE_EXTENDED_ERRORS" => "N",
//        "VARIABLE_ALIASES" => array("action" => "action",),
//        "WEB_FORM_ID" => "60"
//    )
//);

$APPLICATION->IncludeComponent
(
    "bitrix:form.result.new", /*"av-pipe"*/'av-pipe-partners-form',
    array(
        "AJAX_MODE"           => "Y",
        "AJAX_OPTION_JUMP"    => "N",
        "AJAX_OPTION_STYLE"   => "N",
        "AJAX_OPTION_HISTORY" => "N",

        "SEF_MODE"    => "N",
        "WEB_FORM_ID" => 60,

        "START_PAGE"     => "new",
        "SHOW_LIST_PAGE" => "N",
        "SHOW_EDIT_PAGE" => "N",
        "SHOW_VIEW_PAGE" => "N",
        "SUCCESS_URL"    => "",

        "SHOW_ANSWER_VALUE"      => "N",
        "SHOW_ADDITIONAL"        => "N",
        "SHOW_STATUS"            => "N",
        "EDIT_ADDITIONAL"        => "N",
        "EDIT_STATUS"            => "N",
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "USE_EXTENDED_ERRORS"    => "N",

        "CACHE_TYPE" => "A",
        "CACHE_TIME" => 360000
    )
)
?>