<?

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Філії та металобази");
$APPLICATION->SetPageProperty("title",       "Філії та металобази АВ метал груп в Україні | Металопрокат придбати. Адреси філій де можна купити металопрокат | Телефон: ☎ (056) 790-01-22");
$APPLICATION->SetPageProperty("description", "Металобази металопрокату АВ метал груп в Україні ✓ Широкий вибір ✓ Оптимальні ціни ➣ ☎ (056) 790-01-22 Телефонуйте!");
//echo 123321123321;
$GLOBALS['AV_BASES_FILTER_DNEPR'] = array('IBLOCK_SECTION_ID' => intval(2458));
$APPLICATION->IncludeComponent
(
    "bitrix:news.list", "av_bases_dnepr",
    array(
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "AJAX_OPTION_HISTORY" => "N",
        "IBLOCK_TYPE" => "",
        "IBLOCK_ID" => "134",
        "NEWS_COUNT" => "5",
        "SORT_BY1" => "PROPERTY_NAME",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "PROPERTY_type_bases",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "AV_BASES_FILTER_DNEPR",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "PAGER_TEMPLATE" => "av",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "AV_BASES_STREAMS_INFO_IBLOCK" => "136",
        "PARENT_SECTION" => "2458",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "PROPERTY_CODE" => array(
            0 => "closed",
            1 => "address",
            2 => "phone",
            3 => "cordinate_x",
            4 => "cordinate_y",
            5 => "streams",
            6 => "",
        ),
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "360000",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",
        "DETAIL_URL" => "",
        "AJAX_OPTION_ADDITIONAL" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "STRICT_SECTION_CHECK" => "N",
        "PAGER_TITLE" => "111",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "MESSAGE_404" => "",
        "COMPONENT_TEMPLATE" => "av_bases_dnepr",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "CHECK_DATES" => "N",
        "PREVIEW_TRUNCATE_LEN" => "",
        "ACTIVE_DATE_FORMAT" => "d.m.Y"
    ),
    false, ["HIDE_ICONS" => 'N']
);

//header('Location:dnepr-obl/dnepr/');
  /*  $APPLICATION->IncludeComponent
    (
        "bitrix:news", "av_dnipro",
        array(
            "IBLOCK_TYPE" => "av_storages_ua",
            "IBLOCK_ID"   => 134,
            "NEWS_COUNT"  => 10,

            "USE_RATING" => "N",
            "MAX_VOTE"   => "",
            "VOTE_NAMES" => array(),

            "USE_CATEGORIES"                  => "Y",
            "CATEGORY_IBLOCK"                 => array(134),
            "CATEGORY_CODE"                   => "",
            "CATEGORY_ITEMS_COUNT"            => "",
            "SAME_ARTICLES_SEARCH_IN_SECTION" => "Y",

            "USE_FILTER"                => "Y",
            "FILTER_NAME"               => "AV_BASES_FILTER",
            "FILTER_FIELD_CODE"         => array("SECTION_ID", "SUBSECTION"),
            "FILTER_PROPERTY_CODE"      => array("type_bases", "streams"),
            "FILTER_TEMPLATE"           => "av",
            "FILTER_FIELDS_SORT"        => array("SECTION_ID", "SUBSECTION", "type_bases", "streams"),
            "FILTER_FIELDS_CHANGE_TYPE" => array("streams" => "SELECT_MULTIPLE"),
            "FILTER_SUBSECTION_TITLE"   => "Місто",

            "SORT_BY1"    => "PROPERTY_NAME",
            "SORT_ORDER1" => "ASC",
            "SORT_BY2"    => "PROPERTY_type_bases",
            "SORT_ORDER2" => "ASC",
            "CHECK_DATES" => "Y",

            "SEF_MODE"          => "Y",
            "SEF_FOLDER"        => "/company/baza/",
            "SEF_URL_TEMPLATES" =>
                array(
                    "section"           => "#SECTION_CODE#/",
                    "subsection"        => "#PARENT_SECTION_CODE#/#SECTION_CODE#/",
                    "detail"            => "#PARENT_SECTION_CODE#/#SECTION_CODE#/#ELEMENT_CODE#/",
                    "filter"            => "list/filter/#FILTER_PARAMS#/apply/",
                    "section_filter"    => "#SECTION_CODE#/list/filter/#FILTER_PARAMS#/apply/",
                    "subsection_filter" => "#PARENT_SECTION_CODE#/#SECTION_CODE#/list/filter/#FILTER_PARAMS#/apply/"
                ),

            "CACHE_TYPE"   => "A",
            "CACHE_TIME"   => 108000,
            "CACHE_FILTER" => "Y",
            "CACHE_GROUPS" => "Y",

            "SET_TITLE"                    => "N",
            "INCLUDE_IBLOCK_INTO_CHAIN"    => "N",
            "ADD_SECTIONS_CHAIN"           => "N",
            "ADD_ELEMENT_CHAIN"            => "Y",
            "DETAIL_STRICT_SECTION_CHECK"  => "N",
            "ADD_SUBSECTIONS_CHAIN"        => "Y",
            "AV_BASES_STREAMS_INFO_IBLOCK" => 136,

            "LIST_FIELD_CODE"           => array(),
            "LIST_PROPERTY_CODE"        => array("address", "phone", "closed", "cordinate_x", "cordinate_y", "streams"),
            "LIST_TEMPLATE"             => "av_bases",
            "MARKUP_TYPE"               => "STANDART",
            "SHOW_INCLUDE_AREA_PAGE"    => "N",
            "SHOW_INCLUDE_AREA_SECTION" => "N",
            "SHOW_LEFT_MENU"            => "N",
            "SHOW_LIST_DESCRIPTION"     => "Y",

            "DETAIL_SET_CANONICAL_URL" => "N",
            "DETAIL_FIELD_CODE"        => array(),
            "DETAIL_PROPERTY_CODE"     => array("address", "phone", "open_houres", "current_action", "price_file", "additional_title", "closed", "cordinate_x", "cordinate_y", "streams"),
            "DETAIL_TEMPLATE"          => "av_bases",

            "PAGER_TEMPLATE"       => "av",
            "DISPLAY_TOP_PAGER"    => "N",
            "DISPLAY_BOTTOM_PAGER" => "Y",
                    "SET_STATUS_404" => "Y",
                    "SHOW_404"       => "Y",
                    "MESSAGE_404"    => "",
                    "FILE_404"       => ""
        )
    );*/
//pre(get_included_files());

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";