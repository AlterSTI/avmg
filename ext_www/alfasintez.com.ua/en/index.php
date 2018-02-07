<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "We produce and sell such products: packing for eggs, packing for fruits, packing for vegetables, packing for meat.");
$APPLICATION->SetPageProperty("keywords", "Packing for eggs, packing for fruits, packing for vegetables, packing for meat.");
$APPLICATION->SetPageProperty("title", "Alfasintez. Manufacturer of packaging. European quality.");
$APPLICATION->AddHeadScript('/en/script.js');
$APPLICATION->SetAdditionalCSS('/en/style.css');
$APPLICATION->SetTitle("Title");
?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA46WZQVEJSS2zf5hZPQW3-oV6P5RSCUDQ&language=en&region=US&callback=initMap"></script>
<style>
        @media screen and (min-width: 1200px) {
            .BG-1st-page {
                background: url(/upload/av-alfasintez/fon1_1920x1000.jpg) no-repeat center
            }
        }

        @media screen and (max-width: 1199px) and (min-width: 992px) {
            .BG-1st-page {
                background: url(/upload/av-alfasintez/fon1_1024x770.jpg) no-repeat center
            }
        }

        @media screen and (max-width: 991px) and (min-width: 500px) {
            .BG-1st-page {
                background: url(/upload/av-alfasintez/fon1_770x1024.jpg) no-repeat center
            }
        }

        @media screen and (max-width: 499px) {
            .BG-1st-page {
                background: url(/upload/av-alfasintez/fon1_375x667.jpg) no-repeat center
            }
        }


        .green-border-btn:hover {
            background-color: #8DC04B !important;
        }

        .green-border-btn a:hover,
        nav li a:hover {
            text-decoration: none
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
            color: #868686
        }

        a {
            color: #fff!important
        }

        p {
            color: #adadad
        }

        .nopadding {
            padding: 0!important;
            margin: 0!important
        }

        .BG-1st-page {
            background-size: cover!important;
            position: fixed;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: -3
        }
        #lang-toggle li.active a{
            background-color: #8DC04B !important;
        }
        #lang-toggle {
            display: flex;
            z-index: 9!important;
            position: relative
        }

        #lang-toggle li a {
            display: block;
            padding: 5px
        }
		#lang-toggle li a:hover {
			background-color: #749d3f;
        }
        .green-border-btn {
			margin:0 5px;
			border: 2px solid #8DC04B;
			border-radius: 4px;
			color: #fff;
			transition: .7s;
			position: relative;
			top: -3px
        }

        .green-border-btn:hover {
            cursor: pointer;
            transition: .4s
        }

        section {
            width: 100%
        }

        nav ul {
            display: flex;
            justify-content: space-between;
            margin-top: 13px
        }

        .nav-fixed {
            display: flex;
            background-color: rgba(141, 192, 75, 1);
            left: 0;
            position: fixed;
            justify-content: center;
            top: -100px;
            width: 100%;
            z-index: 11;
            transition: 1s;
            -webkit-box-shadow: 0 6px 20px -8px rgba(0, 0, 0, .75);
            -moz-box-shadow: 0 6px 20px -8px rgba(0, 0, 0, .75);
            box-shadow: 0 6px 20px -8px rgba(0, 0, 0, .75)
        }

        nav img {
            display: none
        }

        .nav-fixed.fixed {
            top: 0;
            transition: 1s
        }

        .nav-fixed img {
            display: block;
            margin-right: 100px;
            width: 120px;
        }

        .nav-fixed ul {
            margin-top: 5px;
            padding: 8px;
            display: flex;
            justify-content: center
        }

        .nav-fixed li.green-border-btn {
            border: 2px solid #fff;
            margin-left: 100px
        }

        nav li {
            padding: 5px 15px;
            font-size: 19px;
            cursor: pointer;
            display: inline-block;
            position: relative
        }

        .nav-fixed .green-border-btn:hover {
            background-color: #fff !important;
            color: rgba(141, 192, 75, 1);
            transition: .6s;
        }

        nav li:after {
            content: '';
            display: block;
            margin-top: 5px;
            height: 2px;
            width: 0;
            background: 0 0;
            transition: width .5s ease, background-color .5s ease
        }

        nav li:hover:after {
            width: 100%;
            background: #fff
        }

        nav .green-border-btn:after {
            display: none
        }

        .download-file,
        .h1-decaration-lines,
        .phone-image:before,
        h1 {
            display: inline-block
        }

        .container-1st-page {
            color: #FFF
        }

        h1 {
            color: #8DC04B!important;
            font-weight: 700!important;
            font-size: 40px
        }

        .h1-decaration-lines {
            background-color: rgba(255, 255, 255, .5);
            height: 5px;
            margin: 0 16px;
            vertical-align: text-top;
            width: 75px
        }

        .main-text-1st-page h3 {
            line-height: 40px;
            max-width: 80%;
            margin: 0 auto;
            color: #fff;
            font-weight: bold;
        }

        .phone-image {
            font-size: 27px;
            font-weight: 700;
            color: #fff
        }

        .phone-image:before {
            background-image: url(/upload/av-alfasintez/phone-call.svg);
            background-size: 27px;
            content: " ";
            height: 27px;
            width: 27px;
            vertical-align: text-top
        }

        .download-file {
            margin-top: 60px;
            padding: 10px;
            font-size: 20px
        }
	
		.logo-desctope img {
			max-width: 150px;
			height: 50px;
		}
    </style>
    <div class="av-alert-popup">
        <? $APPLICATION->IncludeComponent(
            "alfasintez:form",
            "",
            Array(
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "CHAIN_ITEM_LINK" => "",
                "CHAIN_ITEM_TEXT" => "",
                "EDIT_ADDITIONAL" => "N",
                "EDIT_STATUS" => "Y",
                "IGNORE_CUSTOM_TEMPLATE" => "N",
                "NOT_SHOW_FILTER" => array("",""),
                "NOT_SHOW_TABLE" => array("",""),
                "RESULT_ID" => $_REQUEST[RESULT_ID],
                "SEF_MODE" => "N",
                "SHOW_ADDITIONAL" => "N",
                "SHOW_ANSWER_VALUE" => "N",
                "SHOW_EDIT_PAGE" => "N",
                "SHOW_LIST_PAGE" => "N",
                "SHOW_STATUS" => "Y",
                "SHOW_VIEW_PAGE" => "N",
                "START_PAGE" => "new",
                "SUCCESS_URL" => "",
                "USE_EXTENDED_ERRORS" => "N",
                "VARIABLE_ALIASES" => Array("action"=>"action"),
                "WEB_FORM_ID" => "2"
            )
        ); ?>
        <div data-close-form> <span></span><span></span></div>
    </div>
    <a id="top"></a>
<div class="text-center">
	<noscript>
		<h2 style="color: red;">Please enable JavaScript in your browser for better use of the website.</h2>
	</noscript>
</div>
    <div class="BG-1st-page"></div>
    <div class="en_main_wrap " style="overflow: hidden;">
        <div id="mobile-menu-wrap" class="hidden-lg hidden-md">
            <div id="hamburger">
                <span></span><span></span><span></span>
            </div>
            <div class="bg-mobile-menu hidden">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/include/av-alfasintez-en/mobile-menu.php"
                    )
                );?>
            </div>
        </div>
        <div class="section-page-1">
            <div class="container container-1st-page">
                <div class="pull-right ">
                    <br>
                    <ul id="lang-toggle" class="hidden-sm hidden-xs">
                        <li class="green-border-btn "><a href="/ru/">RU</a></li>
                        <li class=" green-border-btn active"><a href="/en/">EN</a></li>
                    </ul>
                </div>
                <div class="col-md-12 text-center nopadding">
                    <div class="logo-desctope col-lg-2 col-md-2 col-xs-12">
                        <br class="hidden-lg hidden-md">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/av-alfasintez-en/main-Logo.php"
                            )
                        );?>
                    </div>
                    <div class="hidden-xs hidden-sm col-lg-9  col-md-9 pull-right nopadding">
                        <section>
                            <nav>
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => "/include/av-alfasintez-en/main-menu.php"
                                    )
                                );?>
                            </nav>
                        </section>
                    </div>
                    <div class="nav-fixed hidden-sm hidden-xs">
                        <section>
                            <nav>
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => "/include/av-alfasintez-en/main-menu.php"
                                    )
                                );?>
                            </nav>
                        </section>
                    </div>
                    <div class="col-md-12 nopadding  main-text-1st-page">
                        <div class="hidden-xs">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/include/av-alfasintez-en/main-text-1st-page.php"
                                )
                            );?>
                        </div>
                        <div class="hidden-lg hidden-md hidden-sm nopadding">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/include/av-alfasintez-en/main-text-1st-page-mobile.php"
                                )
                            );?>
                        </div>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/av-alfasintez-en/main-phone-1st-page.php"
                            )
                        );?>

                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/av-alfasintez-en/download-catalog.php"
                            )
                        );?>
                    </div>
                </div>
            </div>
        </div>
        <div id="hole-for-mouse" style="position: absolute; width: 100%; bottom: 0;">
            <div class="text-center hidden-sm hidden-xs">
                <svg version="1.1" x="0px" y="0px" viewBox="-30 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" style="width: 70px; position: relative; top: 37px; ">
                    <path fill="#FFFFFF" d="M256,0C168,0,96.4,71.6,96.4,159.6v192.8C96.4,440.4,168,512,256,512s159.6-71.6,159.6-159.6V159.6
                    C415.6,71.6,344,0,256,0z M396.5,159.6v2.5c-41.2,21.7-87.3,33.5-134.1,34.5v-53.4c13.5-2.9,23.6-15,23.6-29.3v-40
                    c0-14.4-10.1-26.4-23.6-29.3V19.3C336.9,22.6,396.5,84.3,396.5,159.6z M256,56.7c9.5,0,17.3,7.7,17.3,17.3v40
                    c0,9.5-7.7,17.3-17.3,17.3c-9.5,0-17.3-7.7-17.3-17.3v-40C238.7,64.4,246.5,56.7,256,56.7z M249.6,19.3v25.3
                    c-13.5,2.9-23.6,15-23.6,29.3v40c0,14.4,10.1,26.4,23.6,29.3v53.4c-46.8-1-92.9-12.9-134.1-34.5v-2.5
                    C115.5,84.3,175.1,22.6,249.6,19.3z M256,492.9c-77.5,0-140.5-63-140.5-140.5V176.5c43.4,21.6,91.6,33,140.5,33
                    c48.8,0,97.1-11.4,140.5-33v175.9C396.5,429.8,333.5,492.9,256,492.9z">
                    </path>
                </svg>
            </div>
            <div class="text-center hidden-lg hidden-md arrow-down">
                <img src="/upload/av-alfasintez/arrow.svg" alt="">
            </div>
            <div class="smothe_block"></div>
        </div>
        <div class="section-page-2" style="background-color: #fff;">
            <div class="container">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/av-alfasintez-en/section-2-title.php"
                        )
                    );?>
                </div>
                <div class="col-md-6 col-sm-12 pull-left section-2-left-text">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/av-alfasintez-en/section-2-left-text.php"
                        )
                    );?>
                </div>
                <div class="col-md-5 hidden-sm hidden-xs pull-right section-2-right-img text-center ">
                    <div class="eggs-slide-lines hight-line">
                        <div class="line-style"><span class="text-uppercase">ENVIRONMENTALLY<br>FRIENDLY PRODUCT</span></div>
                    </div>
                    <div class="eggs-slide-lines low-line">
                        <div class="line-style"><span class="text-uppercase">EUROPEAN<br>EQUIPMENT</span></div>
                    </div>
                    <div class="eggs-slide-lines low-line bottom-rotate">
                        <div class="line-style"><span class="text-uppercase">CONVENIENT USAGE</span></div>
                    </div>
                    <div class="eggs-slide-lines hight-line bottom-rotate">
                        <div class="line-style"><span class="text-uppercase">MATERIAL RELIABILITY</span></div>
                    </div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/av-alfasintez-en/section-2-right-img.php"
                        )
                    );?>
                </div>
            </div>
        </div>
        <div class="section-page-3 col-md-12 col-sm-12 nopadding text-center" style="background-color: #fff;">

            <div class="col-md-6 col-sm-12 left-img">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/include/av-alfasintez-en/section-3-left-text.php"
                    )
                );?>
            </div>
            <div class="col-md-6 col-sm-12 right-img">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/include/av-alfasintez-en/section-3-right-text.php"
                    )
                );?>
            </div>
        </div>
        <div class="section-page-4 col-md-12 col-sm-12 nopadding " style="background-color: #fff;">
            <div class="container">
                <br>
                <br>
	            <a id="production"></a>
	            <div class="col-md-6 col-md-offset-3 text-center">
		            <?$APPLICATION->IncludeFile("/include/av-alfasintez-en/catalog-title-1.php")?>
	            </div>
	            <?
	            $APPLICATION->IncludeComponent
	                (
		            "bitrix:catalog.section", "alfasintez-board-EN",
		                array(
			            "IBLOCK_ID"    => 4,
			            "IBLOCK_TYPE"  => "catalog",
			            "SECTION_ID"   => 17,
			            "SECTION_CODE" => "",

			            "SECTION_USER_FIELDS"       => array(),
			            "INCLUDE_SUBSECTIONS"       => "Y",
			            "SHOW_ALL_WO_SECTION"       => "N",
			            "HIDE_NOT_AVAILABLE"        => "Y",
			            "HIDE_NOT_AVAILABLE_OFFERS" => "Y",

			            "ELEMENT_SORT_FIELD"  => "sort",
			            "ELEMENT_SORT_FIELD2" => "id",
			            "ELEMENT_SORT_ORDER"  => "asc",
			            "ELEMENT_SORT_ORDER2" => "desc",
			            "OFFERS_SORT_FIELD"   => "sort",
			            "OFFERS_SORT_ORDER"   => "asc",
			            "OFFERS_SORT_FIELD2"  => "id",
			            "OFFERS_SORT_ORDER2"  => "desc",

			            "PROPERTY_CODE"        => array
			                (
				            "type_profnastila",
				            "tolshina_metalla",
				            "visota_volni",
				            "dlina"
			                ),
			            "OFFERS_FIELD_CODE"    => array(),
			            "OFFERS_PROPERTY_CODE" => array(),
			            "PAGE_ELEMENT_COUNT"   => "",

			            "SECTION_URL" => "",
			            "DETAIL_URL"  => "",

			            "SEF_MODE" => "N",

			            "CACHE_FILTER" => "Y",
			            "CACHE_GROUPS" => "Y",
			            "CACHE_TIME"   => 36000000,
			            "CACHE_TYPE"   => "A",

			            "SET_TITLE"                => "N",
			            "USE_MAIN_ELEMENT_SECTION" => "N",

			            "PAGER_TEMPLATE"       => "",
			            "DISPLAY_BOTTOM_PAGER" => "N",
			            "DISPLAY_TOP_PAGER"    => "N",

			            "SET_STATUS_404" => "N",
			            "SHOW_404"       => "N"
			            )
		            );
	            ?>
	            <div class="col-md-6 col-md-offset-3 text-center">
		            <?$APPLICATION->IncludeFile("/include/av-alfasintez-en/catalog-title-2.php")?>
	            </div>
	            <?
	            $APPLICATION->IncludeComponent
	                (
		            "bitrix:catalog.section", "alfasintez-board-EN",
		                array(
			            "IBLOCK_ID"    => 4,
			            "IBLOCK_TYPE"  => "catalog",
			            "SECTION_ID"   => 16,
			            "SECTION_CODE" => "",

			            "SECTION_USER_FIELDS"       => array(),
			            "INCLUDE_SUBSECTIONS"       => "Y",
			            "SHOW_ALL_WO_SECTION"       => "N",
			            "HIDE_NOT_AVAILABLE"        => "Y",
			            "HIDE_NOT_AVAILABLE_OFFERS" => "Y",

			            "ELEMENT_SORT_FIELD"  => "sort",
			            "ELEMENT_SORT_FIELD2" => "id",
			            "ELEMENT_SORT_ORDER"  => "asc",
			            "ELEMENT_SORT_ORDER2" => "desc",
			            "OFFERS_SORT_FIELD"   => "sort",
			            "OFFERS_SORT_ORDER"   => "asc",
			            "OFFERS_SORT_FIELD2"  => "id",
			            "OFFERS_SORT_ORDER2"  => "desc",

			            "PROPERTY_CODE"        => array
			                (
				            "type_profnastila",
				            "tolshina_metalla",
				            "visota_volni",
				            "dlina"
			                ),
			            "OFFERS_FIELD_CODE"    => array(),
			            "OFFERS_PROPERTY_CODE" => array(),
			            "PAGE_ELEMENT_COUNT"   => "",

			            "SECTION_URL" => "",
			            "DETAIL_URL"  => "",

			            "SEF_MODE" => "N",

			            "CACHE_FILTER" => "Y",
			            "CACHE_GROUPS" => "Y",
			            "CACHE_TIME"   => 36000000,
			            "CACHE_TYPE"   => "A",

			            "SET_TITLE"                => "N",
			            "USE_MAIN_ELEMENT_SECTION" => "N",

			            "PAGER_TEMPLATE"       => "",
			            "DISPLAY_BOTTOM_PAGER" => "N",
			            "DISPLAY_TOP_PAGER"    => "N",

			            "SET_STATUS_404" => "N",
			            "SHOW_404"       => "N"
			            )
		            );
	            ?>
            </div>
        </div>
        <div class="section-page-5 col-md-12 col-sm-12 nopadding " style="background-color: #fff;">
            <a id="ourPartners"></a>
            <br>
            <br>
            <div class="wave">
                <div class="container">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/av-alfasintez-en/section-5-title.php"
                            )
                        );?>
                    </div>
                    <div class="section-5-image col-md-12 text-center text-uppercase">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <span>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/av-alfasintez-en/section-5-imageText-1.php"
                            )
                        );?>
                        </span></div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <span>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/include/av-alfasintez-en/section-5-imageText-2.php"
                                )
                            );?>
                        </span>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <span>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/include/av-alfasintez-en/section-5-imageText-3.php"
                                )
                            );?>
                        </span>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <span>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/include/av-alfasintez-en/section-5-imageText-4.php"
                                )
                            );?>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-page-6 col-md-12 col-sm-12 nopadding " style="background-color: #fff;">
            <div class="container">
                <br>
                <div class="col-md-6 col-md-offset-3 text-center">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/av-alfasintez-en/section-6-title.php"
                        )
                    );?>
                </div>
                <div class="col-md-12 text-center">
                    <div class="col-md-3 col-sm-6">
                        <div class="section-6-production-img">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/include/av-alfasintez-en/section-6-production-img-1.php"
                                )
                            );?>
                        </div>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/av-alfasintez-en/section-6-production-1.php"
                            )
                        );?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="section-6-production-img">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/include/av-alfasintez-en/section-6-production-img-2.php"
                                )
                            );?>
                        </div>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/av-alfasintez-en/section-6-production-2.php"
                            )
                        );?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="section-6-production-img">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/include/av-alfasintez-en/section-6-production-img-3.php"
                                )
                            );?>
                        </div>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/av-alfasintez-en/section-6-production-3.php"
                            )
                        );?>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="section-6-production-img">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/include/av-alfasintez-en/section-6-production-img-4.php"
                                )
                            );?>
                        </div>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/av-alfasintez-en/section-6-production-4.php"
                            )
                        );?>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-page-7 col-md-12 col-sm-12 nopadding">
            <div class="BG-7n-page"></div>
            <a id="ourCertificates"></a>
            <div class="container">
                <br>
                <br>
                <div class="col-md-6 col-md-offset-3 text-center">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/av-alfasintez-en/section-7-title.php"
                        )
                    );?>
                </div>
                <div class="col-md-12 text-center">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 420 298" enable-background="new 0 0 420 298" xml:space="preserve">
                            <g>
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M167.2,245.3V286c-4.5,0.4-9,0.7-13.6,0.7
                                C77.8,286.7,16,224.9,16,149.2C16,73.5,77.8,11.7,153.6,11.7c4.6,0,9.1,0.2,13.6,0.7l0,0v40.7c-4.5-0.6-9-1-13.6-1
                                c-53.5,0-97.1,43.6-97.1,97.1c0,53.5,43.6,97.1,97.1,97.1C158.2,246.2,162.7,245.9,167.2,245.3L167.2,245.3z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M295.1,128.2h79.4v42h-79.4c9.6,43.4,48.5,76,94.8,76
                                c4.6,0,9.2-0.3,13.6-1h0V286c-4.5,0.4-9.1,0.7-13.6,0.7c-75.8,0-137.5-61.8-137.5-137.5c0-75.7,61.7-137.5,137.5-137.5
                                c4.6,0,9.1,0.2,13.6,0.7h0v40.7c-4.5-0.6-9.1-1-13.6-1C343.6,52.1,304.8,84.8,295.1,128.2L295.1,128.2z" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 10 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
                            <path fill="#FFFFFF" d="M288.6,124.2c-2.6-6.9-8-13.1-14.6-17.5c-19-12.1-47.9-12.9-67.4-2c-10.7,5.4-17.7,16.2-19.9,27.3
                        c-4,18.2-2.9,39.9,11.1,53.5c16.4,14.3,40.2,17.5,61.3,11.6c1-0.2,4.2-1,6.4-2.2l0.6-0.3c6.6-2.7,12.8-7.2,17.5-13.2
                        C294.4,165.6,295.1,142,288.6,124.2L288.6,124.2z M254.1,165.1c-0.7,3.5-3.1,7-6.7,8.3c-5.8,2.6-13.7,1.9-19.1-1.1
                        c-4.5-3.2-5.1-8.5-5.7-13.5c-0.4-9.9-1.2-20.4,1.6-29.4c2.2-5.6,8.2-7,13.6-7.5c5.7,0,11.2,0.9,14.7,5.5c2.2,3.3,2.1,7.6,2.5,11.5
                        C254.8,147,255.6,156.7,254.1,165.1L254.1,165.1z M81.1,174c-4.8-0.3-10.2,0.1-14.9-0.4l0.1-50.4l0.3-0.4l14.5-0.1
                        c0.2-8.2,0.3-16.9-0.1-24.4l-55-0.1l-9.1,0.1c-0.1,8.1-0.1,16.2,0,24.2c5,0.2,9.6,0,14.4,0.5v48.8l-0.1,2L16.7,174
                        c-0.3,7.9-0.3,15.8,0,23.7h64.4L81.1,174L81.1,174z M243.1,208.4c-6.1,8.8-13.9,17.2-22.3,23.8c-0.3,0.4-1.2,0.3-1.5-0.1
                        c-3.7-2.3-7.6-4.2-11.1-6.4c4.7-5.6,9.2-11.2,12.7-17.4h-4.5c-3.6,5.3-7.4,10.9-12.3,15.6c-6.4-2.6-12.3-4.9-18.8-6.6l-0.7-0.6
                        c1-2.9,2.9-5.6,3.5-8.5h-3.9l-3.9,7.7c-8.6-1.9-18.1-2.9-26.9-3.4c-0.4-1.3,0.1-3.2-0.4-4.3h-3.8c-0.3,1.7,0.4,3-0.4,4.5
                        c-9.1,0.4-17.8,1.4-26.3,3.2l-3.9-7.6c-1.5,0-3.1-0.3-4.1,0.1l3.6,8.5l-0.4,0.4c-6.5,1.9-13,4.1-19.3,6.7l-0.6-0.3
                        c-4.1-4.5-8-9.3-11.3-14.2c-0.7-2.4-3.7-1-5.3-1.3c3.5,6.3,8.2,11.9,12.8,17.7c-3.9,2.3-7.9,4.9-12,6.7c-8.9-6.8-16.7-15-23.1-24.3
                        c-1.8-0.3-2.9-0.2-4.7,0c10.5,16.4,26.9,30.7,44,39.2c0,0,0-0.1,0.1-0.1s0.4,0.3,0.1,0.4c11.5,5.6,23.8,9.6,36.8,11.3
                        c44.8,5.9,87.6-13.2,112.4-50.8C246.5,208.2,244.6,208.2,243.1,208.4L243.1,208.4z M182.3,221.3l0.4-0.3c6.3,1.4,12.3,3.4,17.8,6.2
                        c-4.7,5.3-10.7,9.9-16.2,13.8c-3.4,2-6.7,4.2-10.2,5.9l-6.3-2.7l0.4-1C173.5,236.2,178.2,228.9,182.3,221.3L182.3,221.3z M153.5,217
                        c8.3,0.1,16.7,1,24.4,2.9l0.1,0.4c-4.1,7.7-9.2,15.2-14.7,22.2c-2.5,0.3-4.8-0.7-7.3-0.9l-2.5-0.3
                        C153.2,232.9,153.1,225.5,153.5,217L153.5,217z M125.3,219.6c7.6-1.4,15.5-2.6,23.6-2.6l0.1,24.3c-3.1,0.7-6.4,0.7-9.4,1.4
                        c-6-7.1-10.9-14.7-15.2-22.6L125.3,219.6L125.3,219.6z M101.8,227.3c5.7-2.7,11.7-4.8,17.8-6.3l0.6,0.1c4.2,7.9,9.5,15.3,14.7,22.8
                        c-2,1.2-4.5,1.9-6.6,3c-9.9-4.9-18.9-11.4-26.6-19.2L101.8,227.3L101.8,227.3z M120.7,251.9c-12.3-3.2-23.7-8.6-34.2-16.1v-0.4
                        c3.5-2.1,7-4.4,10.8-6c8.3,8.2,16.9,14.4,26.3,20.2C122.7,250.5,121.7,251.3,120.7,251.9L120.7,251.9z M174.8,253.7
                        c-15.5,3.3-32.7,3.4-48.2-0.3c-0.3-0.7,0.7-0.9,1.2-1.3c13.6-8.8,34.7-8.8,48,0.7C176.3,253.7,175.1,253.5,174.8,253.7L174.8,253.7z
                         M188.8,249.7l-6.9,2.1c-1.2-0.6-2.2-1.4-3.2-2.3l0.3-0.4c9.3-5.4,17.8-12,25.8-19.9c3.9,1.6,7.7,3.7,11.3,6.2
                        C208,241.8,198.5,246.1,188.8,249.7L188.8,249.7z M58.7,87.2c3.6-5,7.6-9.7,11.8-14.2c3.8-3.6,7.3-7,11.4-9.6
                        c3.8,2.4,8,4.5,11.7,6.8c-4.5,5.6-9.2,11.2-12.6,17.2c1,0.4,2.9,0.3,4.4,0c3.7-5.3,7.6-10.6,12.3-15.3c6.3,2.3,12.4,4.7,18.8,6.5
                        l0.6,0.6l-3.7,8.3c1.6,0.3,2.6,0.1,4.2,0c1.3-2.4,2.3-5.2,3.8-7.6c8.5,1.9,17.4,2.9,26.4,3.2c1.2,1,0.3,3.2,0.7,4.4h3.9
                        c0.4-1.4-0.1-3,0.4-4.3c8.5-0.4,17.4-1.3,25.6-3.3l0.7,0.1l3.9,7.5c1.3,0,3.1,0.3,4.1-0.3l-3.7-8.3l0.3-0.3c6.7-1.7,13-4.3,19.4-6.9
                        c4.5,4.7,8.8,10.3,12.6,15.8c1.6,0,3.2,0.1,4.4-0.3c-1.8-3.2-3.9-6.2-6.3-9c-1.9-2.7-3.9-5.1-6.4-7.7v-0.7l10.2-5.9l1.5-0.6
                        c8.9,6.7,16.7,14.8,23.1,23.9c1.8,0,3.2,0.6,4.7-0.1c-19.6-29.3-51.8-48.1-86.7-50.8l-0.2,0.3l-0.3-0.3c-3.9-0.4-8.8-0.6-13-0.2
                        c-1.6-0.1-3.5,0-5.4,0.2C106.3,39,74,57,53.8,87.5C55.5,87.2,57.3,87.7,58.7,87.2L58.7,87.2z M119.3,74.5l-0.6,0.1
                        c-6-1.6-11.8-3.4-17.4-5.9l0.3-0.9c8-7.6,16.5-13.9,25.8-18.8c2.2,0.9,4.4,1.6,6.6,2.6l-0.4,1.1C128.1,59.8,123.7,67.2,119.3,74.5
                        L119.3,74.5z M148.4,78.4c-4.1,0.6-7.7-0.1-11.8-0.4c-3.9-0.6-8.9-1-12.8-2.3c4.2-7.9,9.2-15.5,15.2-22.5l9.3,1.3
                        C148.7,61.9,148.4,70.5,148.4,78.4L148.4,78.4z M152.9,78.6c-0.3-7.6-0.1-16.1,0-24c2.9-0.4,6.1-0.9,9.1-1.3
                        c5.7,7.2,11.3,14.5,15.1,22.4C169.1,77.5,161.1,78.6,152.9,78.6L152.9,78.6z M199.5,68.5c-5.7,2.4-11.6,4.7-17.8,6
                        c-4.5-7.6-9.5-15.2-15.1-22.5c2.1-1.1,4.5-2,6.7-3.1c9.5,4.7,18.7,11.5,26.4,19.2L199.5,68.5L199.5,68.5z M180.8,44
                        c12.3,3.2,23.8,8.6,34.3,16.1l-0.3,0.6l-10.1,5.6H204c-7.7-7.7-16.8-14.5-26-19.8C178.3,45.4,179.8,44.7,180.8,44L180.8,44z
                         M175,42.5v0.3c-12.7,9.2-33.3,10-46.7,1.6c-0.8-0.6-2.2-0.9-2.3-1.9C141.4,38.9,159.6,38.7,175,42.5L175,42.5z M85.9,60.3
                        c9.2-6.7,19.4-11.8,30.2-15.2c0.4-0.4,0.7-0.9,1.3-0.9v0.3c1.2,0.3,2.1-1,3.1-0.2c0.9,0.7,1.9,1.3,2.6,2c-9.1,5.6-18,12.2-26.1,20.2
                        c-3.9-1.4-7.6-3.6-11.1-6L85.9,60.3L85.9,60.3z M148.5,175.1c-13.7,3.7-28.6,0.9-38.6-9.5c-1.2-1.4-1.9-3.1-3.1-4.6l-19.7,0.1
                        c-0.3,11.6-0.4,25,0,36.4l21.9-0.1l0.3-6.9c2.5,1.1,5,2.6,7.4,3.9c15.2,6.3,34.7,7.8,49.8,0c11-6,16.8-17.6,15.2-30.1
                        c-1.6-12.2-13.3-23.2-25.1-26.2l-35.3-10.2l-2.6-1.3c-1.2-1-1.9-2.3-1.6-3.9c2.8-4.7,9.2-3.3,14-3.2c10.2,1.4,20.7,4.9,26.7,14.2
                        c6.4,0,13.9,0.1,20.9-0.1c0.3-11.8-0.1-22.1-0.3-34c-6.6-0.1-14.6-0.1-21.2,0.1c-0.3,1.7,0.3,4.1-0.4,5.9l-6.7-3.6
                        c-16.1-6.7-38.6-7.4-53.1,3c-9.5,6.9-12.4,19.2-9.9,30.1c1.9,10.3,11.8,17.9,21.3,21.5c13,4.6,26.6,7.9,39.7,12.3
                        c1.3,0.6,3,1.9,2.8,3.5C150.9,173.8,149.6,174.6,148.5,175.1L148.5,175.1z" />
                            <text transform="matrix(1 0 0 1 19.3333 295.6664)" fill="#FFFFFF" font-family="'MyriadPro-Regular'" font-size="36">ISO 9001 certified</text>
                        </svg>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 -5 313.3 196" enable-background="new 0 0 313.3 186" xml:space="preserve">
                            <g>
                                <path fill="#FFFFFF" d="M175.3,2.3c22.5-0.5,41.8,7.7,59,21.8c2.8,2.3,4,4,0.1,6.6c-3.4,2.3-6,6.9-9.6,7.7c-3.7,0.9-6.6-4-10-6.2
                                c-30.9-20.3-73.1-13.8-96.2,15.1C95.1,76.6,98,119.4,125.2,145c24.1,22.7,58.4,26.6,87,9.8c3.1-1.8,4.4-1.6,6,1.4
                                c1.3,2.5,2.8,5,4.7,7c3.1,3.2,1.7,4.7-1.5,6.6c-45.3,27-107.6,10.6-130.1-42.5C68.5,73.4,102.5,12.5,160.3,3
                                C165.3,2.1,170.3,2.4,175.3,2.3z" />
                                <path fill="#FFFFFF" d="M128.9,9c-6.1,3.7-11.5,7.2-16.3,11.6c-2,1.8-4.1,0.8-6.2,0.6c-31-3.9-55.8,6.7-73,32.8
                                c-27.4,41.5-3.1,99.3,45.6,109.5c9.9,2.1,19.8,2.4,29.7,0.3c1.7-0.4,3.2-0.4,4.6,0.9c4.6,4.1,9.7,7.5,15.1,10.7
                                c-23.7,12.2-68.9,11.3-99.1-19.8C-0.9,124.3-4.9,75.9,20.8,39.6C46.4,3.5,92.1-6.3,128.9,9z" />
                                <path fill="#FFFFFF" d="M257,82.5c15.5,0,31,0,46.5,0c6.1,0,7.5,1.5,7.5,7.7c0,6-1.3,7.3-7.4,7.3c-7.6,0-15.3,0-22.9,0
                                c-6.5,0-6.5,0-6.5,6.3c0,24,0,47.9,0,71.9c0,6-0.8,6.7-7.1,6.7c-6.9,0-7.5-0.4-7.5-6.6c-0.1-13.3,0-26.6-0.1-39.9
                                c0-1.6,1-4.3-1.9-4.2c-2.3,0.1-1.6,2.6-1.6,4.1c0,13.2,0,26.3,0,39.5c0,6.9-0.4,7.2-8.1,7.1c-6.1,0-6.8-0.7-6.8-7
                                c0-24.4-0.1-48.8,0.1-73.3c0-3.6-0.7-4.9-4.6-4.7c-9,0.3-17.9,0.1-26.9,0.1c-5.4,0-7.3-2.1-7.3-7.7c0-5,2.2-7.2,7.3-7.2
                                C225.4,82.5,241.2,82.5,257,82.5z" />
                                <path fill="#FFFFFF" d="M103.5,29.4c-4.7,6-8.8,11.4-12.1,17.4c-1.1,2.1-3.2,1.6-4.8,2c-16.8,4.1-28.2,14.1-34,30.5
                                c-1.3,3.6-0.7,5.1,3.5,4.9c7-0.3,14,0,21-0.1c2.2,0,3.7,0,3.3,3.1c-0.5,3.5,1.3,8.6-0.5,10.5c-2.2,2.4-7.2,0.6-11,0.7
                                c-4.8,0.1-9.6,0.2-14.4,0c-3.2-0.2-3.7,1-3,3.8c4.7,18.2,16,29.9,34.4,34.2c4,0.9,6.4,2.5,8.3,6c1.5,2.8,3.4,5.3,5.4,7.8
                                c2.1,2.6,1.3,3.2-1.7,3.3c-23.2,1-42-7.7-55.2-26.8c-13.9-20.1-15.4-41.9-4.4-63.6c11.3-22.4,30.5-33.4,55.4-34.5
                                C96.6,28.4,99.5,29,103.5,29.4z" />
                                <path fill="#FFFFFF" d="M131.2,98.4c-6.8,0-13.6-0.1-20.3,0.1c-2.9,0.1-4.1-0.6-4.2-3.8c-0.3-10.6-0.4-10.6,10.1-10.6
                                c6.3,0,12.7-0.1,19,0c3.1,0.1,3.6-0.9,2.7-3.8c-2.9-9.8-8.4-17.7-16.6-23.6c-2.5-1.8-2.8-3-0.8-5.4c11.3-13.1,9-12.8,20.1-0.7
                                c11.1,12.1,15.7,27.1,15.1,43.6c-0.1,3.6-1.5,4.4-4.8,4.3c-6.8-0.2-13.6-0.1-20.3-0.1C131.2,98.4,131.2,98.4,131.2,98.4z" />
                                <path fill="#FFFFFF" d="M271.2,61.8c0,8-6.3,14.2-14.3,14.1c-7.3-0.1-13.6-6.5-13.7-13.8c-0.1-7.7,6-14.1,13.7-14.3
                                C264.8,47.6,271.2,53.8,271.2,61.8z" />
                                <path fill="#FFFFFF" d="M149.8,119.1c-0.9,1.4-2.2,3.7-3.6,6c-3.6,6.1-8.6,10.9-13.9,15.4c-2.4,2-4.2,2.3-6.1-0.3
                                c-2.1-2.8-5.5-5.2-6.1-8.3c-0.7-3.4,4.1-4.3,6.3-6.5c3.6-3.8,6.7-7.8,9.1-12.4c1.2-2.2,2.2-2.3,4.2-1.3c2.8,1.5,5.7,2.7,8.5,4.1
                                C149.1,116.2,150.6,116.4,149.8,119.1z" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
        <div class="section-page-8 col-md-12 col-sm-12 nopadding " style="background-color: #fff;">
            <div class="container">
                <div class="col-md-6 col-sm-12 pull-right section-8-left-text">
                    <div class="col-md-12  text-center">
                        <br>
                        <br>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/av-alfasintez-en/section-8-title.php"
                            )
                        );?>
                    </div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/av-alfasintez-en/section-8-right-text.php"
                        )
                    );?>
                </div>
                <div class="col-md-5 hidden-sm hidden-xs pull-left section-8-right-img text-center ">
                    <div class="tomatoes-slide-lines first  hight-line">
                        <div class="line-style"><span class="text-uppercase">ENVIRONMENTALLY<br>FRIENDLY PRODUCT</span></div>
                    </div>
                    <div class="tomatoes-slide-lines second low-line">
                        <div class="line-style"><span class="text-uppercase">EUROPEAN<br>EQUIPMENT</span></div>
                    </div>
                    <div class="tomatoes-slide-lines third  low-line bottom-rotate">
                        <div class="line-style"><span class="text-uppercase">CONVENIENT USAGE</span></div>
                    </div>
                    <div class="tomatoes-slide-lines fourth hight-line bottom-rotate">
                        <div class="line-style"><span class="text-uppercase">MATERIAL<br>RELIABILITY</span></div>
                    </div>
                </div>
                <div class="sect_8_BG hidden-lg hidden-md">
                </div>
            </div>
            <div class="border-style"></div>
        </div>
        <div class="section-page-9">
            <a id="contacts"></a>
            <div class=" col-md-6 col-sm-6 hidden-xs nopadding map-left-text pull-left">
                <div class="col-md-6 pull-right col-sm-7  map-left-text-include text-center">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/av-alfasintez-en/section-9-map-text.php"
                        )
                    );?>
                </div>
                <div id="van_map_img"></div>
            </div>
            <div class="hidden-lg hidden-md hidden-sm col-xs-12 nopadding map-left-text-mobile ">
                <div class=" col-sm-6 col-sm-offset-3 map-left-text-include text-center">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/av-alfasintez-en/section-9-map-text.php"
                        )
                    );?>
                </div>
            </div>
            <div class=" col-md-12 col-sm-12 " id="map_canvas"></div>
            <div class="col-md-12 text-center logoFooter hidden-sm hidden-xs"><img src="/upload/av-alfasintez/logo_footer.svg" alt=""></div>
        </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>