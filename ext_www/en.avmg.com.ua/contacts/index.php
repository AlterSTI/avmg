<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Contacts");
$APPLICATION->SetPageProperty("title",       "Branches and metal bases АВ metal groups in Ukraine | Metal rolling adds. Addresses fіlіy de mozhna kupiti metilokrokat | Phone: ☎ (056) 790-01-22");
$APPLICATION->SetPageProperty("description", "Metalobazy metaloprokatu AV metal group in Ukraine ✓ Wide vibe ✓ Optimal prices ➣ ☎ (056) 790-01-22 Telephon!");

$APPLICATION->IncludeComponent
	(
	"bitrix:news.list", "av_bases",
		array(
		"AJAX_MODE"           => "N",
		"AJAX_OPTION_JUMP"    => "",
		"AJAX_OPTION_STYLE"   => "",
		"AJAX_OPTION_HISTORY" => "",

		"IBLOCK_TYPE" => "av_storages_en",
		"IBLOCK_ID"   => 238,
		"NEWS_COUNT"  => 25,

		"SORT_BY1"    => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2"    => "NAME",
		"SORT_ORDER2" => "ASC",

		"FILTER_NAME"   => "",
		"FIELD_CODE"    => array(),
		"PROPERTY_CODE" => array("address", "phone", "open_houres", "current_action", "price_file", "additional_title", "closed", "cordinate_x", "cordinate_y", "streams"),
		"CHECK_DATES"   => "Y",

		"DETAIL_URL"         => "",
		"IBLOCK_URL"         => "",
		"SECTION_URL"        => "",
		"FILTER_SECTION_URL" => "",

		"PREVIEW_TRUNCATE_LEN"      => "",
		"ACTIVE_DATE_FORMAT"        => "",
		"SET_TITLE"                 => "N",
		"SET_BROWSER_TITLE"         => "Y",
		"SET_META_KEYWORDS"         => "Y",
		"SET_META_DESCRIPTION"      => "Y",
		"SET_LAST_MODIFIED"         => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN"        => "N",
		"HIDE_LINK_WHEN_NO_DETAIL"  => "N",
		"PARENT_SECTION"            => "",
		"PARENT_SECTION_CODE"       => "",
		"INCLUDE_SUBSECTIONS"       => "Y",
		"DISPLAY_DATE"              => "Y",
		"DISPLAY_NAME"              => "Y",
		"DISPLAY_PICTURE"           => "Y",
		"DISPLAY_PREVIEW_TEXT"      => "Y",

		"PAGER_TEMPLATE"                  => "av",
		"DISPLAY_TOP_PAGER"               => "N",
		"DISPLAY_BOTTOM_PAGER"            => "Y",
		"PAGER_TITLE"                     => "",
		"PAGER_SHOW_ALWAYS"               => "",
		"PAGER_DESC_NUMBERING"            => "",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "",
		"PAGER_SHOW_ALL"                  => "",
		"PAGER_BASE_LINK_ENABLE"          => "",
		"PAGER_BASE_LINK"                 => "",
		"PAGER_PARAMS_NAME"               => "",

		"SET_STATUS_404" => "Y",
		"SHOW_404"       => "Y",
		"MESSAGE_404"    => "",
		"FILE_404"       => "",

		"CACHE_TYPE"   => "A",
		"CACHE_TIME"   => 360000,
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y"
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";