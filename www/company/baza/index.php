<?

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Філії та металобази");
$APPLICATION->SetPageProperty("title",       "Філії та металобази АВ метал груп в Україні | Металопрокат придбати. Адреси філій де можна купити металопрокат | Телефон: ☎ (056) 790-01-22");
$APPLICATION->SetPageProperty("description", "Металобази металопрокату АВ метал груп в Україні ✓ Широкий вибір ✓ Оптимальні ціни ➣ ☎ (056) 790-01-22 Телефонуйте!");
//echo 123321123321;
$APPLICATION->IncludeComponent
(
    "bitrix:news.list", "av_bases_dnepr",
    [
        "AJAX_MODE"           => $arParams["AJAX_MODE"],
        "AJAX_OPTION_JUMP"    => $arParams["AJAX_OPTION_JUMP"],
        "AJAX_OPTION_STYLE"   => $arParams["AJAX_OPTION_STYLE"],
        "AJAX_OPTION_HISTORY" => $arParams["AJAX_OPTION_HISTORY"],

        "IBLOCK_TYPE" => "av_storages_ua",
        "IBLOCK_ID"   => 134,
        "NEWS_COUNT"  => 1000,

        "SORT_BY1"    => "PROPERTY_NAME",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2"    => "PROPERTY_type_bases",
        "SORT_ORDER2" => "ASC",

        "FILTER_NAME"   => "AV_BASES_FILTER",
        "CHECK_DATES"   => "Y",

        "PREVIEW_TRUNCATE_LEN"      => $arParams["PREVIEW_TRUNCATE_LEN"],
        "ACTIVE_DATE_FORMAT"        => $arParams["LIST_ACTIVE_DATE_FORMAT"],
        "SET_TITLE"                 => "N",
        "SET_BROWSER_TITLE"         => 'Y',
        "SET_META_KEYWORDS"         => 'Y',
        "SET_META_DESCRIPTION"      => 'Y',
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN"        => "N",


        "PAGER_TEMPLATE"                  => "av",
        "DISPLAY_TOP_PAGER"               => "N",
        "DISPLAY_BOTTOM_PAGER"            => 'Y',


        "SET_STATUS_404" => 'Y',
        "SHOW_404"       => 'Y',
        "MESSAGE_404"    => '',
        "FILE_404"       => '',

        "CACHE_TYPE"   => "A",
        "CACHE_TIME"   => 108000,
        "CACHE_FILTER" => 'Y',
        "CACHE_GROUPS" => 'Y',

        "USE_RATING" => "N",
        "MAX_VOTE"   => '',
        "VOTE_NAMES" => [],

        "MARKUP_TYPE"       => 'STANDART',
//        "DATA_MARKUP_TYPE"  => $arParams["DATA_MARKUP_TYPE"],
//        "FILTER_URL_PARAMS" => $urlVariables["FILTER_PARAMS"],
//        "FULL_PARAMS"       => $arParams
    ],
    false, ["HIDE_ICONS" => 'N']
);


/*    $APPLICATION->IncludeComponent
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