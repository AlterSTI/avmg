<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetTitle("Каталог товаров");

$APPLICATION->IncludeComponent
	(
	"bitrix:catalog", "av",
		array(
		"IBLOCK_TYPE" => 'catalog_products',
		"IBLOCK_ID"   => 139,

		"HIDE_NOT_AVAILABLE"        => 'Y',
		"HIDE_NOT_AVAILABLE_OFFERS" => 'Y',

		"SEF_MODE"            => 'Y',
		"SEF_FOLDER"          => '/catalog/',
		"SEF_URL_TEMPLATES"   =>
			array(
			"compare"      => '',
			"element"      => '#SECTION_CODE#/#ELEMENT_CODE#/',
			"section"      => '#SECTION_CODE#/',
			"sections"     => '',
			"smart_filter" => '#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/'
			),

		"AJAX_MODE"           => 'N',
		"AJAX_OPTION_JUMP"    => '',
		"AJAX_OPTION_STYLE"   => '',
		"AJAX_OPTION_HISTORY" => '',

		"CACHE_TYPE"   => 'A',
		"CACHE_TIME"   => 36000000,
		"CACHE_FILTER" => 'Y',
		"CACHE_GROUPS" => 'Y',

		"SET_LAST_MODIFIED"           => 'N',
		"USE_MAIN_ELEMENT_SECTION"    => 'Y',
		"DETAIL_STRICT_SECTION_CHECK" => 'Y',
		"SET_TITLE"                   => 'Y',
		"ADD_SECTIONS_CHAIN"          => 'Y',
		"ADD_ELEMENT_CHAIN"           => 'Y',

		"USE_FILTER"                  => 'Y',
		"FILTER_NAME"                 => '',
		"FILTER_FIELD_CODE"           => array(),
		"FILTER_PROPERTY_CODE"        => array(),
		"FILTER_PRICE_CODE"           => array("BASE"),
		"FILTER_OFFERS_FIELD_CODE"    => array(),
		"FILTER_OFFERS_PROPERTY_CODE" =>
			array(
			'DIAMETR_ARMATURI',              'MARKA_STALI_ARMATURI',           'TERVES_ARMATURI',                 'GOST_ARMATURI',
			'DIAMETR_KATANKI',               'MARKA_STALI_KATANKI',            'GOST_KATANKI',                    'TEORVES_KATANKI',         'DIAMETR_KRUG',
			'MARKA_STALI_KRUG',              'GOST_KRUG',                      'TEORVES_KRUG_KONSTUKTSIONNIY',    'TEORVES_KRUG_GK',         'RAZMER_KVADRAT',
			'MARKA_STALI_KVADRAT',           'GOST_KVADRAT',                   'TERVES_KVADRAT',                  'RAZMER_LIST',             'TOLSHINA_LIST',
			'MARKA_STALI_LIST',              'RAZMER_LIST_PVL',                'GOST_LIST',                       'RAZMER_LIST_RIFLEN',      'RAZMER_SHESTIGRANNIK',
			'MARKA_STALI_SHESTIGRANNIK',     'GOST_SHESTIGRANNIK',             'TEORVES_SHESTIGRANNIK',           'MARKA_STALI_POLOSA',      'TOLSHINA_STENKI_POLOSA',
			'SHIRINA_POLOSA',                'TEORVES_POLOSA',                 'GOST_POLOSA',                     'RAZMER_UGOLOK',           'TOLSHINA_STENKI_UGOLOK',
			'MARKA_STALI_UGOLOK',            'TEORVES_UGOLOK',                 'GOST_UGOLOK',                     'RAZMER_SHVELLER_U_P',     'MARKA_STALI_SHVELLER',
			'VISOTA_STENKI_SHVELLER_GNUTIY', 'SHIRINA_STENKI_SHVELLER_GNUTIY', 'TOLSHINA_STENKI_SHVELLER_GNUTIY', 'GOST_SHVELLER',           'TEORVES_SHVELLER_GNUTIY',
			'TEORVES_SHVELLER_U_P',          'RAZMER_BALKI',                   'TEORVES_BALKI_SH',                'TEORVES_BALKI_K',         'TEORVES_BALKI_B',
			'GOST_BALKI',                    'DIAMETR_PROVOLOKI',              'MARKA_STALI_PROVOLOKI',           'TEORVES_1000M_PROVOLOKI', 'TEORVES_PROVOLOKI',
			'KACHESTVO_PROVOLOKI',           'MARKA_STALI_RULONA',             'RAZMER_RULONA',                   'TOLSHINA_RULONA',
			'MARKA_STALI_BALKI'
			),

		"USE_REVIEW"         => 'N',
		"MESSAGES_PER_PAGE"  => '',
		"USE_CAPTCHA"        => '',
		"REVIEW_AJAX_POST"   => '',
		"PATH_TO_SMILE"      => '',
		"FORUM_ID"           => '',
		"URL_TEMPLATES_READ" => '',
		"SHOW_LINK_TO_FORUM" => '',

		"ACTION_VARIABLE"     => '',
		"PRODUCT_ID_VARIABLE" => '',

		"USE_COMPARE"                  => 'N',
		"COMPARE_NAME"                 => '',
		"COMPARE_FIELD_CODE"           => '',
		"COMPARE_PROPERTY_CODE"        => '',
		"COMPARE_OFFERS_FIELD_CODE"    => '',
		"COMPARE_OFFERS_PROPERTY_CODE" => '',
		"COMPARE_ELEMENT_SORT_FIELD"   => '',
		"COMPARE_ELEMENT_SORT_ORDER"   => '',
		"DISPLAY_ELEMENT_SELECT_BOX"   => '',
		"ELEMENT_SORT_FIELD_BOX"       => '',
		"ELEMENT_SORT_ORDER_BOX"       => '',
		"ELEMENT_SORT_FIELD_BOX2"      => '',
		"ELEMENT_SORT_ORDER_BOX2"      => '',

		"PRICE_CODE"           => array("BASE"),
		"USE_PRICE_COUNT"      => 'N',
		"SHOW_PRICE_COUNT"     => 1,
		"PRICE_VAT_INCLUDE"    => 'Y',
		"PRICE_VAT_SHOW_VALUE" => 'N',
		"CONVERT_CURRENCY"     => 'Y',
		"CURRENCY_ID"          => 'UAH',

		"BASKET_URL"                 => '/user/cart/',
		"USE_PRODUCT_QUANTITY"       => 'N',
		"PRODUCT_QUANTITY_VARIABLE"  => '',
		"ADD_PROPERTIES_TO_BASKET"   => 'N',
		"PRODUCT_PROPS_VARIABLE"     => '',
		"PARTIAL_PRODUCT_PROPERTIES" => 'Y',
		"PRODUCT_PROPERTIES"         => array(),
		"OFFERS_CART_PROPERTIES"     => array(),

		"SHOW_TOP_ELEMENTS"        => 'N',
		"TOP_ELEMENT_COUNT"        => '',
		"TOP_LINE_ELEMENT_COUNT"   => '',
		"TOP_ELEMENT_SORT_FIELD"   => '',
		"TOP_ELEMENT_SORT_ORDER"   => '',
		"TOP_ELEMENT_SORT_FIELD2"  => '',
		"TOP_ELEMENT_SORT_ORDER2"  => '',
		"TOP_PROPERTY_CODE"        => '',
		"TOP_OFFERS_FIELD_CODE"    => '',
		"TOP_OFFERS_PROPERTY_CODE" => '',
		"TOP_OFFERS_LIMIT"         => '',

		"SECTION_COUNT_ELEMENTS"    => 'N',
		"SECTION_TOP_DEPTH"         => '',

		"PAGE_ELEMENT_COUNT"        => 25,
		"LINE_ELEMENT_COUNT"        => '',
		"ELEMENT_SORT_FIELD"        => 'NAME',
		"ELEMENT_SORT_ORDER"        => 'ASC',
		"ELEMENT_SORT_FIELD2"       => 'ID',
		"ELEMENT_SORT_ORDER2"       => 'DESC',
		"LIST_PROPERTY_CODE"        => array(),
		"INCLUDE_SUBSECTIONS"       => 'N',
		"LIST_META_KEYWORDS"        => '',
		"LIST_META_DESCRIPTION"     => '',
		"LIST_BROWSER_TITLE"        => '',
		"LIST_OFFERS_FIELD_CODE"    => array("NAME", "PREVIEW_PICTURE"),
		"LIST_OFFERS_PROPERTY_CODE" => array(),
		"LIST_OFFERS_LIMIT"         => '',
		"SECTION_BACKGROUND_IMAGE"  => '',

		"DETAIL_PROPERTY_CODE"             => array(),
		"DETAIL_META_KEYWORDS"             => '',
		"DETAIL_META_DESCRIPTION"          => '',
		"DETAIL_BROWSER_TITLE"             => '',
		"DETAIL_SET_CANONICAL_URL"         => 'N',
		"SECTION_ID_VARIABLE"              => '',
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => 'N',
		"DETAIL_OFFERS_FIELD_CODE"         => array("ID", "NAME"),
		"DETAIL_OFFERS_PROPERTY_CODE"      =>
			array(
			'DIAMETR_ARMATURI',              'MARKA_STALI_ARMATURI',           'TERVES_ARMATURI',                 'GOST_ARMATURI',
			'DIAMETR_KATANKI',               'MARKA_STALI_KATANKI',            'GOST_KATANKI',                    'TEORVES_KATANKI',         'DIAMETR_KRUG',
			'MARKA_STALI_KRUG',              'GOST_KRUG',                      'TEORVES_KRUG_KONSTUKTSIONNIY',    'TEORVES_KRUG_GK',         'RAZMER_KVADRAT',
			'MARKA_STALI_KVADRAT',           'GOST_KVADRAT',                   'TERVES_KVADRAT',                  'RAZMER_LIST',             'TOLSHINA_LIST',
			'MARKA_STALI_LIST',              'RAZMER_LIST_PVL',                'GOST_LIST',                       'RAZMER_LIST_RIFLEN',      'RAZMER_SHESTIGRANNIK',
			'MARKA_STALI_SHESTIGRANNIK',     'GOST_SHESTIGRANNIK',             'TEORVES_SHESTIGRANNIK',           'MARKA_STALI_POLOSA',      'TOLSHINA_STENKI_POLOSA',
			'SHIRINA_POLOSA',                'TEORVES_POLOSA',                 'GOST_POLOSA',                     'RAZMER_UGOLOK',           'TOLSHINA_STENKI_UGOLOK',
			'MARKA_STALI_UGOLOK',            'TEORVES_UGOLOK',                 'GOST_UGOLOK',                     'RAZMER_SHVELLER_U_P',     'MARKA_STALI_SHVELLER',
			'VISOTA_STENKI_SHVELLER_GNUTIY', 'SHIRINA_STENKI_SHVELLER_GNUTIY', 'TOLSHINA_STENKI_SHVELLER_GNUTIY', 'GOST_SHVELLER',           'TEORVES_SHVELLER_GNUTIY',
			'TEORVES_SHVELLER_U_P',          'RAZMER_BALKI',                   'TEORVES_BALKI_SH',                'TEORVES_BALKI_K',         'TEORVES_BALKI_B',
			'GOST_BALKI',                    'DIAMETR_PROVOLOKI',              'MARKA_STALI_PROVOLOKI',           'TEORVES_1000M_PROVOLOKI', 'TEORVES_PROVOLOKI',
			'KACHESTVO_PROVOLOKI',           'MARKA_STALI_RULONA',             'RAZMER_RULONA',                   'TOLSHINA_RULONA',
			'MARKA_STALI_BALKI'
			),
		"DETAIL_BACKGROUND_IMAGE"          => '',
		"SHOW_DEACTIVATED"                 => 'N',

		"LINK_IBLOCK_TYPE"  => '',
		"LINK_IBLOCK_ID"    => '',
		"LINK_PROPERTY_SID" => '',
		"LINK_ELEMENTS_URL" => '',

		"USE_ALSO_BUY"           => 'N',
		"ALSO_BUY_ELEMENT_COUNT" => '',
		"ALSO_BUY_MIN_BUYES"     => '',

		"USE_GIFTS_DETAIL"                             => 'N',
		"USE_GIFTS_SECTION"                            => '',
		"USE_GIFTS_MAIN_PR_SECTION_LIST"               => '',
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT"              => '',
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE"                => '',
		"GIFTS_DETAIL_BLOCK_TITLE"                     => '',
		"GIFTS_DETAIL_TEXT_LABEL_GIFT"                 => '',
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT"        => '',
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE"          => '',
		"GIFTS_SECTION_LIST_BLOCK_TITLE"               => '',
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT"           => '',
		"GIFTS_SHOW_OLD_PRICE"                         => '',
		"GIFTS_SHOW_NAME"                              => '',
		"GIFTS_SHOW_IMAGE"                             => '',
		"GIFTS_MESS_BTN_BUY"                           => '',
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => '',
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE"   => '',
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE"        => '',

		"USE_STORE"                      => 'N',
		"STORES"                         => array(),
		"USE_MIN_AMOUNT"                 => '',
		"USER_FIELDS"                    => array(),
		"FIELDS"                         => array(),
		"MIN_AMOUNT"                     => '',
		"SHOW_EMPTY_STORE"               => '',
		"SHOW_GENERAL_STORE_INFORMATION" => '',
		"STORE_PATH"                     => '',
		"MAIN_TITLE"                     => '',

		"OFFERS_SORT_FIELD"  => 'SORT',
		"OFFERS_SORT_ORDER"  => 'ASC',
		"OFFERS_SORT_FIELD2" => 'NAME',
		"OFFERS_SORT_ORDER2" => 'ASC',

		"PAGER_TEMPLATE"       => 'av',
		"DISPLAY_TOP_PAGER"    => 'N',
		"DISPLAY_BOTTOM_PAGER" => 'Y',

		"SET_STATUS_404" => 'Y',
		"SHOW_404"       => 'Y',
		"MESSAGE_404"    => '',
		"FILE_404"       => '',

		"USE_ELEMENT_COUNTER"            => 'Y',
		"DISABLE_INIT_JS_IN_COMPONENT"   => 'N',
		"DETAIL_SET_VIEWED_IN_COMPONENT" => 'N',

		"DETAIL_PICTURES_ALT"     => array(1243),
		"ASK_FORM_ID"             => 52,
		"ASK_FORM_LINK_FIELD_ID"  => 'form_text_334',
		"ASK_FORM_COUNT_FIELD_ID" => 'form_text_335'
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';