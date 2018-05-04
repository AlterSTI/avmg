<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
CJSCore::RegisterExt("fontawesome", ["css" => "/bitrix/css/av/font-awesome/css/style.css"]);
?>
<!DOCTYPE html>
<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- HEAD ------------------------------- */
/* -------------------------------------------------------------------- */
?>

<head>
    <title>
        <? $APPLICATION->ShowTitle() ?>
    </title>
    <link rel="icon" type="image/x-icon" href="/bitrix/templates/av_dnepr/img/favicon.ico"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <? $APPLICATION->ShowHead() ?>
    <? CJSCore::Init(["av", "fontawesome"]) ?>
    <?
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/bootstrap-grid.css');
    $APPLICATION->AddHeadScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyA46WZQVEJSS2zf5hZPQW3-oV6P5RSCUDQ&callback=initMap');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/main.js');
    ?>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-88853738-1', 'auto');
        ga('send', 'pageview');
    </script>

    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter41532584 = new Ya.Metrika({
                        id: 41532584,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true,
                        webvisor: true
                    });
                } catch (e) {
                }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })
        (document, window, "yandex_metrika_callbacks");
    </script>

    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-88853738-1']);
        _gaq.push(['_trackPageview']);
        setTimeout(_gaq.push(['_trackEvent', '15_seconds', 'read']), 15000);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-88853738-1', 'auto');
        ga('send', 'pageview');
    </script>

    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter41532584 = new Ya.Metrika({
                        id: 41532584,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true,
                        webvisor: true
                    });
                } catch (e) {
                }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })
        (document, window, "yandex_metrika_callbacks");
    </script>

    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-88853738-1']);
        _gaq.push(['_trackPageview']);
        setTimeout(_gaq.push(['_trackEvent', '15_seconds', 'read']), 15000);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <? $APPLICATION->AddHeadScript('/bitrix/js/av_site/main.js'); ?>
    <? $APPLICATION->ShowPanel() ?>
</head>
<body>
<div>
<header class="header">
    <div class="container">
        <div class="row">
            <div class="logo col-md-12 col-lg-8">
                <a href="/" class="header-logo"><img src="/bitrix/images/av/logo_line_min_ru.svg" alt="Логотип в шапке"></a>
                <a href="/" class="header-logo-mobile"><img src="<?=SITE_TEMPLATE_PATH?>/img/header-logo-mobile.png" alt="Логотип в шапке(мобильная версия)"></a>
            </div>
<!--            <div class="header-lang col-6 col-sm-6 col-md-6 col-lg-3">-->
<!--                <div class="lang-inner">-->
<!--                    <span class="active">ua</span>-->
<!--                    <span>ru</span>-->
<!--                    <span>en</span>-->
<!--                </div>-->
<!--            </div>-->
            <div class="phone col-12 col-sm-12 col-md-12 col-lg-3"><!-- Появятся языки - нужно менять 12 на 6 !!! -->
                <span class="icon-phone"><i class="fa fa-phone" aria-hidden="true"></i></span>
                <span>+38 (056) 790 01 22</span>
            </div>
        </div>
    </div>
</header>
<main role="main" class="main">
    <div class="container">
        <div class="row">
            <section class="breadcrumbs col-md-12">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "av_bases_dnepr",
                    array(
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "N",
                            "AJAX_OPTION_HISTORY" => "N",
                            "IBLOCK_TYPE" => "",
                            "IBLOCK_ID" => "134",
                            "NEWS_COUNT" => "99",
                            "SORT_BY1" => "PROPERTY_NAME",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "PROPERTY_type_bases",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
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

                            "AV_BASES_STREAMS_INFO_IBLOCK" => "136", //ID ИБ для элементов
                            "AV_BASES_STREAMS_MANAGER_STREAM" => "88074",//ID направления для выборки менеджера из ИБ направлений
                            "AV_BASES_STREAMS_NO_DISPLAY" => array (
                                    0 => 88071,
                                    1 => 88009,
                                    2 => 87779,
                                    3 => 87772,
                                    4 => 87771
                            ),
                            "AV_BASES_STREAMS_NAME_ALIAS" => array (
                                    87774 => 'Днепр 1',
                                    87773 => 'Днепр 2',
                                    87778 => 'Днепр 8',
                                    87781 => 'Днепр 11',
                                    87775 => 'Днепр 4',
                                    87776 => 'Днепр 5',
                                    87777 => 'Днепр 6',
                                    87780 => 'Днепр 10',
                                    87783 => 'Дон. шоссе'
                            ),

                            "AV_BASES_STREAMS_LEFT_COAST" => array(
                                0 => 87775,
                                1 => 87776,
                                2 => 87777,
                                3 => 87780,
                                4 => 87783
                            ),

                            "AV_BASES_STREAMS_RIGHT_COAST" => array(
                                0 => 87774,
                                1 => 87773,
                                2 => 87778,
                                3 => 87781,
                            ),

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
                                6 => "icon_google_maps_dnepr",
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
                        false
                    );
                ?>
                </section>
            </div>
        </div>
        <section class="banks-main-block">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "av_bases_dnepr_detail",
                    array(
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "AJAX_OPTION_HISTORY" => "N",
                        "IBLOCK_TYPE" => "",
                        "IBLOCK_ID" => "134",
                        "NEWS_COUNT" => "99",
                        "SORT_BY1" => "PROPERTY_NAME",
                        "SORT_ORDER1" => "ASC",
                        "SORT_BY2" => "PROPERTY_type_bases",
                        "SORT_ORDER2" => "ASC",
                        "FILTER_NAME" => "",
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
                        "AV_BASES_STREAMS_INFO_IBLOCK_ID" => "135", //ID ИБ со свойствами направлений
                        "AV_BASES_STREAMS_INFO_IBLOCK" => "136", //ID ИБ для элементов
                        "AV_BASES_STREAMS_MANAGER_STREAM" => "88074",//ID направления для выборки менеджера из ИБ направлений
                        "AV_BASES_STREAMS_NO_DISPLAY" => array (
                            0 => 88071,
                            1 => 88009,
                            2 => 87779,
                            3 => 87772,
                            4 => 87771
                        ),
                        "AV_BASES_STREAMS_NAME_ALIAS" => array (
                            87774 => 'Днепр 1',
                            87773 => 'Днепр 2',
                            87778 => 'Днепр 8',
                            87781 => 'Днепр 11',
                            87775 => 'Днепр 4',
                            87776 => 'Днепр 5',
                            87777 => 'Днепр 6',
                            87780 => 'Днепр 10',
                            87783 => 'Дон. шоссе'
                        ),

                        "AV_BASES_STREAMS_LEFT_COAST" => array(
                            0 => 87775,
                            1 => 87776,
                            2 => 87777,
                            3 => 87780,
                            4 => 87783
                        ),

                        "AV_BASES_STREAMS_RIGHT_COAST" => array(
                            0 => 87774,
                            1 => 87773,
                            2 => 87778,
                            3 => 87781,
                        ),

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
                    false
                );
                ?>
        </section>
</main>