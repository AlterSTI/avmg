<?
use \Bitrix\Main\Page\Asset, \Bitrix\Main\Localization\Loc;
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
Loc::loadMessages(__FILE__);
Asset::getInstance()->addJs('/bitrix/js/main/jquery/jquery-2.1.3.js');

CJSCore::RegisterExt("bootstrap", ["css" => "/bitrix/css/av/bootstrap.supermin.css"]);
CJSCore::RegisterExt("fontawesome", ["css" => "/bitrix/css/av/font-awesome/css/style.css"]);

$templateFolder     = getFolder(__DIR__);
$templateFolderHttp = CURRENT_PROTOCOL."://".SITE_NAME.str_replace(DIRECTORY_SEPARATOR, "/", $templateFolder);
Asset::getInstance()->addString("<script>AvRequest = \"".$templateFolderHttp."ajax/loadForma.php\";</script>");

?>
<?if (!defined('ERROR_404') || ERROR_404 != 'Y'): ?>
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
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <? $APPLICATION->ShowHead() ?>
    <? CJSCore::Init(["av", "bootstrap", "fontawesome", "js_main", "ajax_request_ms"]) ?>
    <? CJSCore::Init(array("jquery")) ?>

    <?
    Asset::getInstance()->addJs('https://maps.googleapis.com/maps/api/js?key=AIzaSyA46WZQVEJSS2zf5hZPQW3-oV6P5RSCUDQ&callback=initMap');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/script.js');
    Asset::getInstance()->addJs('/bitrix/js/av_site/main.js');
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
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter17188231 = new Ya.Metrika({
                        id:17188231,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true,
                        trackHash:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <!-- /Yandex.Metrika counter -->


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
    <? Asset::getInstance()->addJs('/bitrix/js/av_site/main.js'); ?>
</head>
<div id="panel">
    <? $APPLICATION->ShowPanel() ?>
</div>
<div class="text-center">
    <noscript>
        <h3>Please enable JavaScript in your browser for better use of the website.</h3></noscript>
</div>
<div id="av-steel">
    <a id="upLinks"></a>
    <div hidden>
        <div xmlns:v="http://rdf.data-vocabulary.org/#">
            <span typeof="v:Breadcrumb"><a href="/" rel="v:url" property="v:title">avsteel.com.ua</a> › </span>
            <span typeof="v:Breadcrumb"><a href="#profnastil" rel="v:url" property="v:title">Производитель профнастила №1 в Украине</a> › </span>
        </div>
    </div>
    <script async="async" src="https://w.uptolike.com/widgets/v1/zp.js?pid=1618008" type="text/javascript"></script>

    <div id="mobile-menu-wrap" class="hidden-lg hidden-md">
        <div id="hamburger">
            <span></span><span></span><span></span>
        </div>

        <div class="bg-mobile-menu hidden ">
            <div class="flex-menu text-center text-uppercase">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "av-pipe-horizontal-mobile",
                    array(
                        "ROOT_MENU_TYPE" => "left",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                );?>
            </div>
        </div>
    </div>

    <div class="main-wrap">

<!--        <div class="popUp" data-call-back-form="" hidden>-->
<!--            --><?// /*$APPLICATION->IncludeComponent(
//                "bitrix:form",
//                "av-steel-call-back",
//                Array(
//                    "AJAX_MODE" => "Y",
//                    "AJAX_OPTION_ADDITIONAL" => "",
//                    "AJAX_OPTION_HISTORY" => "N",
//                    "AJAX_OPTION_JUMP" => "N",
//                    "AJAX_OPTION_SHADOW" => "N",
//                    "AJAX_OPTION_STYLE" => "N",
//                    "CACHE_TIME" => "3600",
//                    "CACHE_TYPE" => "N",
//                    "CHAIN_ITEM_LINK" => "",
//                    "CHAIN_ITEM_TEXT" => "",
//                    "COMPONENT_TEMPLATE" => "av-steel",
//                    "COMPOSITE_FRAME_MODE" => "A",
//                    "COMPOSITE_FRAME_TYPE" => "AUTO",
//                    "EDIT_ADDITIONAL" => "N",
//                    "EDIT_STATUS" => "Y",
//                    "IGNORE_CUSTOM_TEMPLATE" => "N",
//                    "NOT_SHOW_FILTER" => array(0 => "", 1 => "",),
//                    "NOT_SHOW_TABLE" => array(0 => "", 1 => "",),
//                    "RESULT_ID" => $_REQUEST[RESULT_ID],
//                    "SEF_MODE" => "N",
//                    "SHOW_ADDITIONAL" => "N",
//                    "SHOW_ANSWER_VALUE" => "N",
//                    "SHOW_EDIT_PAGE" => "N",
//                    "SHOW_LIST_PAGE" => "N",
//                    "SHOW_STATUS" => "N",
//                    "SHOW_VIEW_PAGE" => "N",
//                    "START_PAGE" => "new",
//                    "SUCCESS_URL" => "index.php",
//                    "USE_EXTENDED_ERRORS" => "N",
//                    "VARIABLE_ALIASES" => array("action" => "action",),
//                    "WEB_FORM_ID" => "15"
//                )
//            ); */?>
<!--            <div data-close-form2=""></div>-->
<!--        </div>-->

        <div class="popUp make-diler-form" data-partners-form="">
            <div class="formsInclude clearfix">
                <div class="text-uppercase text-center title-form-1">
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/formPartnerHeader.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_FORM_PARTNER_HEADER'),
                            "MODE"  => "text"
                        )
                    );?>
                </div>
                <?$APPLICATION->IncludeFile(
                    "/".LANGUAGE_ID."/include/formPartner.php",
                    Array(),
                    Array(
                        "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_FORM_PARTNER'),
                        "MODE"  => "php"
                    )
                );?>
            <div data-close-form2=""></div>
            </div>
        </div>
    <!------------------------------->
    <div id="make-done-form" class = "hide-content">
        <!--ТРУБЫ КВАДРАТНЫЕ -->
        <div id = "tube-squere">
            <div class="make-done-top tube-popup-squere">
                <?$APPLICATION->IncludeFile(
                    "/".LANGUAGE_ID."/include/tubeSquere.php",
                    Array(),
                    Array(
                        "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TUBE_SQUERE'),
                        "MODE"  => "text"
                    )
                );?>
            </div>
            <div class="product-table-data popup-squere">
                <?$APPLICATION->IncludeFile(
                    "/".LANGUAGE_ID."/include/ourProductPopup.php",
                    Array(),
                    Array(
                        "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TUBE_SQUERE_TABLE'),
                        "MODE"  => "text"
                    )
                );?>
            </div>
        </div>
        <!-- ТРУБЫ ПРЯМОУГЛЬНЫЕ -->
        <div id = "tube-rectangular">
            <div class="make-done-top tube-popup-squere">
                <?$APPLICATION->IncludeFile(
                    "/".LANGUAGE_ID."/include/tubePr.php",
                    Array(),
                    Array(
                        "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TUBE_SQUERE'),
                        "MODE"  => "text"
                    )
                );?>
            </div>
            <div class="product-table-data popup-squere">
                <?$APPLICATION->IncludeFile(
                    "/".LANGUAGE_ID."/include/ourProdPopupPr.php",
                    Array(),
                    Array(
                        "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TUBE_SQUERE_TABLE'),
                        "MODE"  => "text"
                    )
                );?>
            </div>
        </div>
        <!-- ТРУБЫ КРУГЛЫЕ -->
        <div id = "tube-circle">
            <div class="make-done-top tube-popup-squere">
                <?$APPLICATION->IncludeFile(
                    "/".LANGUAGE_ID."/include/tubeCircle.php",
                    Array(),
                    Array(
                        "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TUBE_SQUERE'),
                        "MODE"  => "text"
                    )
                );?>
            </div>
            <div class="product-table-data popup-squere">
                <?$APPLICATION->IncludeFile(
                    "/".LANGUAGE_ID."/include/ourProdPopupCircle.php",
                    Array(),
                    Array(
                        "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TUBE_SQUERE_TABLE'),
                        "MODE"  => "text"
                    )
                );?>
            </div>
        </div>
    </div>
    <!------------------------------->
        <!-- ТРУБЫ КВАДРАТНЫЕ -->

        <div class="popUp make-done-form" data-catalog-order="">
            <div class="make-done-top tube-popup-squere" id="av-pipe-tube-popup-header"></div>
            <div class="make-done-md">
                <div class="col-md-7">
                    <div class="our-product">
                        <div class="">
                            <div class="product-table-data popup-squere" id="av-pipe-tube-popup-table"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 right-form-to">
                    <h3 class="right-form-title"><?=Loc::getMessage('PIPE_INCLUDE_AREA_TUBE_SQUERE_FORM_TITLE')?></h3>
                    <div class="formsInclude" id = "av-pipe-tube-popup-formsInclude">
                        <?$APPLICATION->IncludeFile(
                            "/".LANGUAGE_ID."/include/formProfnastil.php",
                            Array(),
                            Array(
                                "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_FORM_PROFNASTIL'),
                                "MODE"  => "php"
                            )
                        );?>
                    </div>
                </div>
            </div>

            <div data-close-form2=""></div>
        </div>
<!--        <!--  ТРУБЫ ПРЯМОУГЛЬНЫЕ  -->
<!--        <div class="popUp make-done-form-sq" data-catalog-order="">-->
<!--            <div class="make-done-top tube-popup-squere"></div>-->
<!--            <div class="make-done-md">-->
<!--                <div class="col-md-7">-->
<!--                    <div class="our-product">-->
<!--                        <div class="">-->
<!--                            <div class="product-table-data popup-squere">-->
<!--                                --><?//$APPLICATION->IncludeFile(
//                                    "/".LANGUAGE_ID."/include/ourProdPopupPr.php",
//                                    Array(),
//                                    Array(
//                                        "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TUBE_SQUERE_TABLE'),
//                                        "MODE"  => "text"
//                                    )
//                                );?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-5 right-form-to">-->
<!--                    <h3 class="right-form-title">--><?//=Loc::getMessage('PIPE_INCLUDE_AREA_TUBE_SQUERE_FORM_TITLE')?><!--</h3>-->
<!--                    <div class="formsInclude" id="formProfnastilTube2" data-form-id="--><?//=Loc::getMessage('PIPE_INCLUDE_AREA_FORM_PROFNASTIL')?><!--">-->
<!--                        --><?///*$APPLICATION->IncludeFile(
//                            "/".LANGUAGE_ID."/include/formProfnastil.php",
//                            Array(),
//                            Array(
//                                "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_FORM_PROFNASTIL'),
//                                "MODE"  => "php"
//                            )
//                        );*/?>
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div data-close-form2=""></div>-->
<!--        </div>-->
<!---->
<!--        <!--  ТРУБЫ КРУГЛЫЕ  -->
<!--        <div class="popUp make-done-form-circle" data-catalog-order="">-->
<!--            <div class="make-done-top tube-popup-squere"></div>-->
<!--            <div class="make-done-md">-->
<!--                <div class="col-md-7">-->
<!--                    <div class="our-product">-->
<!--                        <div class="">-->
<!--                            <div class="product-table-data popup-squere">-->
<!--                                --><?//$APPLICATION->IncludeFile(
//                                    "/".LANGUAGE_ID."/include/ourProdPopupCircle.php",
//                                    Array(),
//                                    Array(
//                                        "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TUBE_SQUERE_TABLE'),
//                                        "MODE"  => "text"
//                                    )
//                                );?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-5 right-form-to">-->
<!--                    <h3 class="right-form-title">--><?//=Loc::getMessage('PIPE_INCLUDE_AREA_TUBE_SQUERE_FORM_TITLE')?><!--</h3>-->
<!--                    <div class="formsInclude" id="formProfnastilTube3" data-form-id="--><?//=Loc::getMessage('PIPE_INCLUDE_AREA_FORM_PROFNASTIL')?><!--">-->
<!--                        --><?///*$APPLICATION->IncludeFile(
//                            "/".LANGUAGE_ID."/include/formProfnastil.php",
//                            Array(),
//                            Array(
//                                "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_FORM_PROFNASTIL'),
//                                "MODE"  => "php"
//                            )
//                        );*/?>
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div data-close-form2=""></div>-->
<!--        </div>-->

        <div id="bg-img-1">
            <div class="main-menu-fixed">
                <div class="av-pipe-horizontal-main-menu-logo">
                <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/logo.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_LOGO'),
                            "MODE"  => "html"
                        )
                );?>
                </div>
                <div>
                <?$APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "av-pipe-horizontal-fixed",
                                    array(
                                        "ROOT_MENU_TYPE" => "left",
                                        "MENU_CACHE_TYPE" => "N",
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "MENU_CACHE_GET_VARS" => array(
                                        ),
                                        "MAX_LEVEL" => "1",
                                        "CHILD_MENU_TYPE" => "left",
                                        "USE_EXT" => "N",
                                        "DELAY" => "N",
                                        "ALLOW_MULTI_SELECT" => "N"
                                    ),
                                    false
                );
                ?>
                </div>
            </div>
            <div class="container">
                <div class="col-md-12 hidden-xs hidden-sm text-center text-uppercase av-pipe-navigation-menu-container">
                    <div class="av-pipe-navigation-menu col-md-9">
                        <div class="av-pipe-navigation-menu-container-inner">
                            <?$APPLICATION->IncludeComponent(
                                                "bitrix:menu",
                                                "av-pipe-horizontal",
                                                array(
                                                    "ROOT_MENU_TYPE" => "left",
                                                    "MENU_CACHE_TYPE" => "N",
                                                    "MENU_CACHE_TIME" => "3600",
                                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                                    "MENU_CACHE_GET_VARS" => array(
                                                    ),
                                                    "MAX_LEVEL" => "1",
                                                    "CHILD_MENU_TYPE" => "left",
                                                    "USE_EXT" => "N",
                                                    "DELAY" => "N",
                                                    "ALLOW_MULTI_SELECT" => "N"
                                                ),
                                                    false
                            );?>
                        </div>
                    </div>
                </div>
                <div class="av-pipe-navigation-menu-lang-inner">
                    <div class="av-pipe-navigation-menu-lang">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.site.selector",
                            "pipe",
                                array(
                                    "SITE_LIST" => array(
                                        0 => "PU",
                                        1 => "PR",
                                        2 => "PE",
                                        3 => "PP",
                                        4 => "PD"
                                    ),
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "3600"
                            ),
                            false
                        );?>
                    </div>
                </div>
            </div>

            <div class="container top-main-logo">
                <div class="col-md-12" data-main-logo="">
                    <div data-logo="" class="hidden-sm hidden-xs text-center">
                        <span class="logo-inner">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/logoTop.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_LOGO_TOP'),
                                    "MODE"  => "html"
                                )
                            );?>
                        </span>
                    </div>
                    <div class="hidden-lg hidden-md col-sm-12 col-xs-12 ">
                        <div data-logo="" class="text-center">
                            <span class="logo-inner">
                             <?$APPLICATION->IncludeFile(
                                 "/".LANGUAGE_ID."/include/logoTop.php",
                                 Array(),
                                 Array(
                                     "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_LOGO_TOP'),
                                     "MODE"  => "html"
                                 )
                             );?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h1 class="text-center header-top-txt">
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/logoTegline.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_TAGLINE'),
                            "MODE"  => "text"
                        )
                    );?>
                </h1>
                <br class="hidden-sm hidden-xs">
                <div class="col-lg-7 col-md-7 col-md-offset-2  col-sm-6 hidden-xs header-sort-wrap"
                     data-av-page1-text="">
                    <div class="header-txt-sort">
                        <?$APPLICATION->IncludeFile(
                            "/".LANGUAGE_ID."/include/objectives.php",
                            Array(),
                            Array(
                                "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OBJECTIVES'),
                                "MODE"  => "text"
                            )
                        );?>
                    </div>
                </div>
            </div>
            <div class="text-uppercase col-md-12 header-top-btn">
                <span id="partners-form-btn" class="catalog-btn main-btn" data-red-btn="">
                    <?=Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_SUBMIT_APPLICATION')?>
                </span>
            </div>
        </div>
        <a id="weUse"></a>
        <div id="bg-img-2" class="bg-second-box">
            <div class="container">
                <div class="col-md-12 made-box clearfix">
                    <div class="col-md-6 col-sm-12 col-xs-12 tube-made-pict-wrap make-to" data-circle-1="" data-circle-2>
                        <span class="tube-made-pict">
                             <?$APPLICATION->IncludeFile(
                                 "/".LANGUAGE_ID."/include/logoInfo.php",
                                 Array(),
                                 Array(
                                     "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_LOGO_INFO'),
                                     "MODE"  => "html"
                                 )
                             );?>
                        </span>
                        <span class="border-before" data-circle-up></span>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 make-to title-main-next indent-left main-txt tube-plus-list benefit-list-txt">
                        <?$APPLICATION->IncludeFile(
                            "/".LANGUAGE_ID."/include/info1.php",
                            Array(),
                            Array(
                                "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_INFO_1'),
                                "MODE"  => "text"
                            )
                        );?>
                    </div>
                </div>
                <div class="col-md-12 made-prof-tube main-title-other indent-left main-txt tube-made-bot-txt">
                    <div class="info2">
                        <?$APPLICATION->IncludeFile(
                            "/".LANGUAGE_ID."/include/info2.php",
                            Array(),
                            Array(
                                "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_INFO_2'),
                                "MODE"  => "text"
                            )
                        );?>
                    </div>
                </div>
            </div>
        </div>
        <a id="weUse"></a>
        <div id="placeholder-hover-wrap" hidden="">
        </div>
        <a id="product"></a>
        <div class="bg-second-box">
            <div class="container">
                <div class="text-center av-steel-catalog-text-wrap main-txt our-product-title">
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/info3.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_INFO_3'),
                            "MODE"  => "text"
                        )
                    );?>
                </div>
                <div class="av-center-cetalog av-product-box">
                    <div class="our-product">
                        <div class="col-md-12">
                            <div class="col-sm-12 col-md-4">
                                <div class="pipe-goods-img">
                                    <?$APPLICATION->IncludeFile(
                                        "/".LANGUAGE_ID."/include/ourProductsImg1.php",
                                        Array(),
                                        Array(
                                            "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_IMG'),
                                            "MODE"  => "html"
                                        )
                                    );?>
                                </div>
                                    <span class="our-prod-title">
                                        <?$APPLICATION->IncludeFile(
                                            "/".LANGUAGE_ID."/include/ourProductsTitle1.php",
                                            Array(),
                                            Array(
                                                "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_TITLE'),
                                                "MODE"  => "text"
                                            )
                                        );?>
                                    </span>
                                    <div class="product-table-data">
                                        <div class="table-top">
                                            <?$APPLICATION->IncludeFile(
                                                "/".LANGUAGE_ID."/include/ourProductsTitleTable1.php",
                                                Array(),
                                                Array(
                                                    "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_TITLE_TABLE'),
                                                    "MODE"  => "text"
                                                )
                                            );?>
                                        </div>
                                        <div class="table-middle">
                                            <?$APPLICATION->IncludeFile(
                                                "/".LANGUAGE_ID."/include/ourProductsValueTable1.php",
                                                Array(),
                                                Array(
                                                    "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_VALUE_TABLE'),
                                                    "MODE"  => "text"
                                                )
                                            );?>
                                        </div>
                                        <div class="table-bottom">
                                            <?$APPLICATION->IncludeFile(
                                                "/".LANGUAGE_ID."/include/ourProductsBottomTable1.php",
                                                Array(),
                                                Array(
                                                    "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_BOTTOM_TABLE'),
                                                    "MODE"  => "text"
                                                )
                                            );?>
                                        </div>
                                    </div>
                                    <button id="more-btn1" class="more-btn1"><?=Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_TABLE_BUTTON')?></button>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="pipe-goods-img">
                                    <?$APPLICATION->IncludeFile(
                                        "/".LANGUAGE_ID."/include/ourProductsImg2.php",
                                        Array(),
                                        Array(
                                            "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_IMG'),
                                            "MODE"  => "html"
                                        )
                                    );?>
                                </div>
                                    <span class="our-prod-title">
                                        <?$APPLICATION->IncludeFile(
                                            "/".LANGUAGE_ID."/include/ourProductsTitle2.php",
                                            Array(),
                                            Array(
                                                "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_TITLE'),
                                                "MODE"  => "text"
                                            )
                                        );?>
                                    </span>
                                    <div class="product-table-data">
                                        <div class="table-top">
                                            <?$APPLICATION->IncludeFile(
                                                "/".LANGUAGE_ID."/include/ourProductsTitleTable2.php",
                                                Array(),
                                                Array(
                                                    "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_TITLE_TABLE'),
                                                    "MODE"  => "text"
                                                )
                                            );?>
                                        </div>
                                        <div class="table-middle">
                                            <?$APPLICATION->IncludeFile(
                                                "/".LANGUAGE_ID."/include/ourProductsValueTable2.php",
                                                Array(),
                                                Array(
                                                    "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_VALUE_TABLE'),
                                                    "MODE"  => "text"
                                                )
                                            );?>
                                        </div>
                                        <div class="table-bottom">
                                            <?$APPLICATION->IncludeFile(
                                                "/".LANGUAGE_ID."/include/ourProductsBottomTable2.php",
                                                Array(),
                                                Array(
                                                    "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_BOTTOM_TABLE'),
                                                    "MODE"  => "text"
                                                )
                                            );?>
                                        </div>
                                    </div>
                                    <button id="more-btn2" class="more-btn2"><?=Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_TABLE_BUTTON')?></button>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="pipe-goods-img">
                                    <?$APPLICATION->IncludeFile(
                                        "/".LANGUAGE_ID."/include/ourProductsImg3.php",
                                        Array(),
                                        Array(
                                            "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_IMG'),
                                            "MODE"  => "html"
                                        )
                                    );?>
                                </div>
                                        <span class="our-prod-title">
                                        <?$APPLICATION->IncludeFile(
                                            "/".LANGUAGE_ID."/include/ourProductsTitle3.php",
                                            Array(),
                                            Array(
                                                "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_TITLE'),
                                                "MODE"  => "text"
                                            )
                                        );?>
                                        </span>
                                        <div class="product-table-data">
                                            <div class="table-top">
                                                <?$APPLICATION->IncludeFile(
                                                    "/".LANGUAGE_ID."/include/ourProductsTitleTable3.php",
                                                    Array(),
                                                    Array(
                                                        "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_TITLE_TABLE'),
                                                        "MODE"  => "text"
                                                    )
                                                );?>
                                            </div>
                                            <div class="table-middle">
                                            <?$APPLICATION->IncludeFile(
                                                "/".LANGUAGE_ID."/include/ourProductsValueTable3.php",
                                                Array(),
                                                Array(
                                                    "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_VALUE_TABLE'),
                                                    "MODE"  => "text"
                                                )
                                            );?>
                                            </div>
                                            <div class="table-bottom">
                                                <?$APPLICATION->IncludeFile(
                                                    "/".LANGUAGE_ID."/include/ourProductsBottomTable3.php",
                                                    Array(),
                                                    Array(
                                                        "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_BOTTOM_TABLE'),
                                                        "MODE"  => "text"
                                                    )
                                                );?>
                                            </div>
                                        </div>
                                        <button id="more-btn3" class="more-btn3"><?=Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_OUR_PRODUCTS_TABLE_BUTTON')?></button>
                                    </div>
                                </div>
                            </div>
                    <?/*
                    $APPLICATION->IncludeComponent
                    (
                        "bitrix:catalog.section", "",
                        array
                        (
                            "IBLOCK_TYPE" => "catalog_products",
                            "IBLOCK_ID" => "265",
                            "SECTION_ID" => 4172,
                            "SECTION_CODE" => "",
                            "COUNT_ELEMENTS" => "N",
                            "TOP_DEPTH" => "2",
                            "SECTION_URL" => "",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "36000000",
                            "CACHE_GROUPS" => "Y",
                            "ADD_SECTIONS_CHAIN" => "Y",
                            "OFFERS_PROPERTY_CODE" => array
                            (
                                "MARKA_STALI_TRUB",
                                "RAZMERY_TRUB",
                                "GOST_TRUB",
                                "TOLSHINA_STENKI_TRUB"
                            ),
                            "ASK_FORM_ID" => 64
                        )
                    );
                    */?>
            </div>
        </div>
        <a id="gallery"></a>
        <? $APPLICATION->IncludeComponent(
            "av:image_carousel",
            "av-steel-desktop-banner",
            array(
                "COMPONENT_TEMPLATE" => "av-steel-desktop-banner",
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO",
                "IMAGE_ALT" => array(
                    0 => "",
                    1 => "",
                    2 => "",
                    3 => "",
                    4 => "",
                    5 => "",
                ),
                "IMAGE_LINK" => array(
                    0 => "",
                    1 => "",
                    2 => "",
                    3 => "",
                    4 => "",
                    5 => "",
                ),
                "IMAGE_NAME" => array(
                    0 => "",
                    1 => "",
                    2 => "",
                    3 => "",
                    4 => "",
                    5 => "",
                ),
                "IMAGE_URL" => array(
                    0 => "/upload/pipe_image_carousel/1.jpg",
                    1 => "/upload/pipe_image_carousel/2.jpg",
                    2 => "/upload/pipe_image_carousel/3.jpg",
                    3 => "/upload/pipe_image_carousel/4.jpg",
                    4 => "/upload/pipe_image_carousel/5.jpg",
                    5 => "/upload/pipe_image_carousel/6.jpg",
                )
            ),
            false
        ); ?>


        <div id="placeholder-hover-wrap-1" hidden="">
        </div>
        <div class="col-md-12" id="partners-text-wrap">
            <div class="container">
                <div class="text-center">
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/partnersSectionHead.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_SECTION_HEAD'),
                            "MODE"  => "text"
                        )
                    );?>
                    <div class="col-md-12 partners-inner-txt partnersSectionColls benefits-list-wrap tube-plus-list-partner-body">
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/partnersSectionBody.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_SECTION_BODY'),
                            "MODE"  => "text"
                        )
                    );?>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <br>
                <a id="howWeWork"></a>
                <div class="text-center av-steel-catalog-text-wrap main-txt our-product-title hidden-xs">
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/howWeWorks.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_HOW_WE_WORKS'),
                            "MODE"  => "text"
                        )
                    );?>
                </div>
                <div class="col-md-12 text-center work-blocks-box clearfix" data-circle-1="" data-circle-3="">
                    <a id="how_we_work"></a>
                    <br class="hidden-md hidden-sm ">
                    <div class="col-sm-6 col-xs-12 work-inner-to make-to">
                        <div data-circle-1-img-1=""></div>
                        <span class="text-uppercase"><?=Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_HOW_WE_WORKS_1')?></span>
                        <br>
                    </div>
                    <div class="col-sm-6 col-xs-12 work-inner-to make-to">
                        <div data-circle-1-img-2=""></div>
                        <span class="text-uppercase"><?=Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_HOW_WE_WORKS_2')?></span>
                        <br>
                    </div>
                    <div class="col-sm-6 col-xs-12 work-inner-to make-to">
                        <div data-circle-1-img-3=""></div>
                        <span class="text-uppercase"><?=Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_HOW_WE_WORKS_3')?></span>
                        <br>
                    </div>
                    <div class="col-sm-6 col-xs-12 work-inner-to make-to">
                        <div data-circle-1-img-4=""></div>
                        <span class="text-uppercase"><?=Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_HOW_WE_WORKS_4')?></span>
                        <br>
                    </div>
                    <div class="col-sm-6 col-xs-12 work-inner-to make-to">
                        <div data-circle-1-img-5=""></div>
                        <span class="text-uppercase"><?=Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_HOW_WE_WORKS_5')?></span>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 partners-wrap" id="order-now-wrap">
            <div class="container">
                <div class="title-form-1 text-uppercase text-center">
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/formQuickHeader.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_FORM_QUICK_HEADER'),
                            "MODE"  => "text"
                        )
                    );?>
                </div>
                <div class="col-md-12 col-sm-12 ">
                    <div class="formsInclude">
                        <?$APPLICATION->IncludeFile(
                            "/".LANGUAGE_ID."/include/formQuick.php",
                            Array(),
                            Array(
                                "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_FORM_QUICK'),
                                "MODE"  => "php"
                            )
                        );?>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-12  hidden-sm hidden-xs" id="pay-method-section" style="display: none">
            <div class="container text-center">
                <div class="col-md-5 col-md-offset-1 col-sm-12 hidden-xs pull-left text-uppercase">
                    <span><strong>способы оплаты</strong></span>
                    <br>
                    <br>
                    <div class="col-md-4">
                        <svg version="1.1" x="0px" y="0px" viewBox="0 0 82 61" enable-background="new 0 0 82 61"
                             xml:space="preserve">
                                            <g>
                                                <path fill="#838383" d="M76.3,0H5.8C2.6,0,0,2.6,0,5.8v49.3C0,58.3,2.6,61,5.8,61h70.5c3.2,0,5.8-2.6,5.8-5.8V5.8
				C82.1,2.6,79.5,0,76.3,0z M79.3,55.1c0,1.7-1.4,3.1-3,3.1H5.8c-1.7,0-3-1.4-3-3.1V5.8c0-1.7,1.4-3.1,3-3.1h70.5c1.7,0,3,1.4,3,3.1
				V55.1z"/>
                                                <path fill="#838485"
                                                      d="M21.9,40.2H9.6c-0.8,0-1.4,0.6-1.4,1.4S8.8,43,9.6,43h12.3c0.8,0,1.4-0.6,1.4-1.4S22.6,40.2,21.9,40.2z"/>
                                                <path fill="#838485"
                                                      d="M39.7,40.2H27.4c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h12.3c0.8,0,1.4-0.6,1.4-1.4S40.4,40.2,39.7,40.2z"/>
                                                <path fill="#838485"
                                                      d="M10.9,47.1H9.6c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h1.4c0.8,0,1.4-0.6,1.4-1.4S11.7,47.1,10.9,47.1z"/>
                                                <path fill="#838485"
                                                      d="M19.1,47.1h-2.7c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h2.7c0.8,0,1.4-0.6,1.4-1.4S19.9,47.1,19.1,47.1z"/>
                                                <path fill="#838485"
                                                      d="M26,47.1h-1.4c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4H26c0.8,0,1.4-0.6,1.4-1.4S26.7,47.1,26,47.1z"/>
                                                <path fill="#838485"
                                                      d="M34.2,47.1h-2.7c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h2.7c0.8,0,1.4-0.6,1.4-1.4S35,47.1,34.2,47.1z"/>
                                                <path fill="#838485" d="M38.7,47.5c-0.2,0.3-0.4,0.6-0.4,1s0.1,0.7,0.4,1c0.3,0.2,0.6,0.4,1,0.4c0.4,0,0.7-0.2,1-0.4
				c0.2-0.3,0.4-0.6,0.4-1s-0.2-0.7-0.4-1C40.1,47,39.2,47,38.7,47.5z"/>
                                                <path fill="#838485" d="M65.7,34.6c-1.7,0-3.4,0.5-4.8,1.3c-1.4-0.8-3-1.3-4.8-1.3c-5.3,0-9.6,4.4-9.6,9.7s4.3,9.7,9.6,9.7
				c1.7,0,3.4-0.5,4.8-1.3c1.4,0.8,3,1.3,4.8,1.3c5.3,0,9.6-4.4,9.6-9.7S70.9,34.6,65.7,34.6z M62.9,44.3c0,1.9-0.8,3.7-2.1,4.9
				c-1.3-1.3-2.1-3-2.1-4.9s0.8-3.7,2.1-4.9C62.1,40.7,62.9,42.4,62.9,44.3z M49.2,44.3c0-3.8,3.1-6.9,6.8-6.9c0.9,0,1.7,0.2,2.4,0.5
				c-1.5,1.7-2.4,4-2.4,6.5c0,2.5,0.9,4.7,2.4,6.5c-0.8,0.3-1.6,0.5-2.4,0.5C52.3,51.3,49.2,48.2,49.2,44.3z M65.7,51.3
				c-0.9,0-1.7-0.2-2.4-0.5c1.5-1.7,2.4-4,2.4-6.5c0-2.5-0.9-4.7-2.4-6.5c0.8-0.3,1.6-0.5,2.4-0.5c3.8,0,6.8,3.1,6.8,6.9
				S69.4,51.3,65.7,51.3z"/>
                                                <path fill="#838485" d="M11.3,30.5h8.2h2h8.2c1.7,0,3.1-1.4,3.1-3.1V16.3v-2.1c0-1.7-1.4-3.1-3.1-3.1H19.5h-8.2
				c-1.7,0-3.1,1.4-3.1,3.1v13.2C8.2,29.1,9.6,30.5,11.3,30.5z M16.4,22.2h-5.5v-2.8h5.5V22.2z M10.9,27.4v-2.4h5.5v2.4
				c0,0.1,0,0.2,0,0.4h-5.2C11.1,27.7,10.9,27.6,10.9,27.4z M30.1,22.2h-5.5v-2.4c0-0.2,0.2-0.4,0.3-0.4h4.8c0.1,0,0.2,0,0.3,0
				C30.1,19.4,30.1,22.2,30.1,22.2z M29.7,27.7h-5.2c0-0.1,0-0.2,0-0.4v-2.4h5.5v2.4C30.1,27.6,29.9,27.7,29.7,27.7z M29.7,13.9
				c0.2,0,0.3,0.2,0.3,0.4v2.1c0,0.2-0.2,0.4-0.3,0.4H25c-1.7,0-3.1,1.4-3.1,3.1v7.6c0,0.2-0.2,0.4-0.3,0.4h-2c-0.2,0-0.3-0.2-0.3-0.4
				V14.2c0-0.2,0.2-0.4,0.3-0.4H29.7z M11.3,13.9h5.2c0,0.1,0,0.2,0,0.4v2.4h-5.5v-2.4C10.9,14,11.1,13.9,11.3,13.9z"/>
                                            </g>
                                        </svg>
                    </div>
                    <div class="col-md-4">
                        <svg version="1.1" x="0px" y="0px" viewBox="0 0 82 61" enable-background="new 0 0 82 61"
                             xml:space="preserve">
                                            <g display="none">
                                                <path display="inline" fill="#838383" d="M76.3,0H5.8C2.6,0,0,2.6,0,5.8v49.3C0,58.3,2.6,61,5.8,61h70.5c3.2,0,5.8-2.6,5.8-5.8V5.8
				C82.1,2.6,79.5,0,76.3,0z M79.3,55.1c0,1.7-1.4,3.1-3,3.1H5.8c-1.7,0-3-1.4-3-3.1V5.8c0-1.7,1.4-3.1,3-3.1h70.5c1.7,0,3,1.4,3,3.1
				V55.1z"/>
                                                <path display="inline" fill="#838485" d="M21.9,40.2H9.6c-0.8,0-1.4,0.6-1.4,1.4S8.8,43,9.6,43h12.3c0.8,0,1.4-0.6,1.4-1.4
				S22.6,40.2,21.9,40.2z"/>
                                                <path display="inline" fill="#838485" d="M39.7,40.2H27.4c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h12.3c0.8,0,1.4-0.6,1.4-1.4
				S40.4,40.2,39.7,40.2z"/>
                                                <path display="inline" fill="#838485" d="M10.9,47.1H9.6c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h1.4c0.8,0,1.4-0.6,1.4-1.4
				S11.7,47.1,10.9,47.1z"/>
                                                <path display="inline" fill="#838485" d="M19.1,47.1h-2.7c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h2.7c0.8,0,1.4-0.6,1.4-1.4
				S19.9,47.1,19.1,47.1z"/>
                                                <path display="inline" fill="#838485" d="M26,47.1h-1.4c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4H26c0.8,0,1.4-0.6,1.4-1.4
				S26.7,47.1,26,47.1z"/>
                                                <path display="inline" fill="#838485" d="M34.2,47.1h-2.7c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h2.7c0.8,0,1.4-0.6,1.4-1.4
				S35,47.1,34.2,47.1z"/>
                                                <path display="inline" fill="#838485" d="M38.7,47.5c-0.2,0.3-0.4,0.6-0.4,1s0.1,0.7,0.4,1c0.3,0.2,0.6,0.4,1,0.4
				c0.4,0,0.7-0.2,1-0.4c0.2-0.3,0.4-0.6,0.4-1s-0.2-0.7-0.4-1C40.1,47,39.2,47,38.7,47.5z"/>
                                                <path display="inline" fill="#838485" d="M65.7,34.6c-1.7,0-3.4,0.5-4.8,1.3c-1.4-0.8-3-1.3-4.8-1.3c-5.3,0-9.6,4.4-9.6,9.7
				s4.3,9.7,9.6,9.7c1.7,0,3.4-0.5,4.8-1.3c1.4,0.8,3,1.3,4.8,1.3c5.3,0,9.6-4.4,9.6-9.7S70.9,34.6,65.7,34.6z M62.9,44.3
				c0,1.9-0.8,3.7-2.1,4.9c-1.3-1.3-2.1-3-2.1-4.9s0.8-3.7,2.1-4.9C62.1,40.7,62.9,42.4,62.9,44.3z M49.2,44.3c0-3.8,3.1-6.9,6.8-6.9
				c0.9,0,1.7,0.2,2.4,0.5c-1.5,1.7-2.4,4-2.4,6.5c0,2.5,0.9,4.7,2.4,6.5c-0.8,0.3-1.6,0.5-2.4,0.5C52.3,51.3,49.2,48.2,49.2,44.3z
				M65.7,51.3c-0.9,0-1.7-0.2-2.4-0.5c1.5-1.7,2.4-4,2.4-6.5c0-2.5-0.9-4.7-2.4-6.5c0.8-0.3,1.6-0.5,2.4-0.5c3.8,0,6.8,3.1,6.8,6.9
				S69.4,51.3,65.7,51.3z"/>
                                                <path display="inline" fill="#838485" d="M11.3,30.5h8.2h2h8.2c1.7,0,3.1-1.4,3.1-3.1V16.3v-2.1c0-1.7-1.4-3.1-3.1-3.1H19.5h-8.2
				c-1.7,0-3.1,1.4-3.1,3.1v13.2C8.2,29.1,9.6,30.5,11.3,30.5z M16.4,22.2h-5.5v-2.8h5.5V22.2z M10.9,27.4v-2.4h5.5v2.4
				c0,0.1,0,0.2,0,0.4h-5.2C11.1,27.7,10.9,27.6,10.9,27.4z M30.1,22.2h-5.5v-2.4c0-0.2,0.2-0.4,0.3-0.4h4.8c0.1,0,0.2,0,0.3,0
				C30.1,19.4,30.1,22.2,30.1,22.2z M29.7,27.7h-5.2c0-0.1,0-0.2,0-0.4v-2.4h5.5v2.4C30.1,27.6,29.9,27.7,29.7,27.7z M29.7,13.9
				c0.2,0,0.3,0.2,0.3,0.4v2.1c0,0.2-0.2,0.4-0.3,0.4H25c-1.7,0-3.1,1.4-3.1,3.1v7.6c0,0.2-0.2,0.4-0.3,0.4h-2c-0.2,0-0.3-0.2-0.3-0.4
				V14.2c0-0.2,0.2-0.4,0.3-0.4H29.7z M11.3,13.9h5.2c0,0.1,0,0.2,0,0.4v2.4h-5.5v-2.4C10.9,14,11.1,13.9,11.3,13.9z"/>
                                            </g>
                            <g>
                                <g>
                                    <g>
                                        <path fill="#838586" d="M40.3,8.6v5.6c0,0.6,0.5,1.1,1.1,1.1c0.6,0,1.1-0.5,1.1-1.1V8.6c1.8-0.5,3.2-2.2,3.2-4.2
				c0-2.4-1.9-4.3-4.3-4.3c-2.4,0-4.3,1.9-4.3,4.3C37.1,6.5,38.5,8.2,40.3,8.6z M41.4,2.3c1.2,0,2.1,1,2.1,2.2c0,1.2-1,2.2-2.1,2.2
				c-1.2,0-2.1-1-2.1-2.2C39.3,3.3,40.2,2.3,41.4,2.3z"/>
                                        <path fill="#838586" d="M24.2,29.2c0.4,0,0.8-0.3,1-0.7c0.2-0.6-0.1-1.2-0.6-1.4l-6.9-2.7c0-0.1,0-0.3,0-0.4
				c0-2.4-1.9-4.3-4.3-4.3c-2.4,0-4.3,1.9-4.3,4.3s1.9,4.3,4.3,4.3c1.5,0,2.8-0.7,3.5-1.9l6.8,2.7C24,29.2,24.1,29.2,24.2,29.2z
				 M13.5,26.2c-1.2,0-2.1-1-2.1-2.2s1-2.2,2.1-2.2c1.2,0,2.1,1,2.1,2.2S14.7,26.2,13.5,26.2z"/>
                                        <path fill="#838586" d="M69.3,19.6C67,19.6,65,21.6,65,24c0,0.1,0,0.3,0,0.4l-6.9,2.7c-0.6,0.2-0.8,0.8-0.6,1.4
				c0.2,0.4,0.6,0.7,1,0.7c0.1,0,0.3,0,0.4-0.1l6.8-2.7c0.8,1.1,2.1,1.9,3.5,1.9c2.4,0,4.3-1.9,4.3-4.3S71.7,19.6,69.3,19.6z
				 M69.3,26.2c-1.2,0-2.1-1-2.1-2.2s1-2.2,2.1-2.2c1.2,0,2.1,1,2.1,2.2S70.5,26.2,69.3,26.2z"/>
                                        <path fill="#838586" d="M58.6,52.2c-0.6,0-1.2,0.1-1.7,0.4l-4.7-5.7c-0.4-0.5-1.1-0.5-1.5-0.1c-0.5,0.4-0.5,1.1-0.1,1.5l4.7,5.6
				c-0.6,0.7-0.9,1.6-0.9,2.6c0,2.4,1.9,4.3,4.3,4.3c2.4,0,4.3-1.9,4.3-4.3C62.9,54.1,61,52.2,58.6,52.2z M58.6,58.7
				c-1.2,0-2.1-1-2.1-2.2c0-1.2,1-2.2,2.1-2.2c1.2,0,2.1,1,2.1,2.2C60.7,57.7,59.8,58.7,58.6,58.7z"/>
                                        <path fill="#838586" d="M41.4,27.2c1.2,0,2.1,1,2.1,2.2c0,0.6,0.5,1.1,1.1,1.1s1.1-0.5,1.1-1.1c0-2-1.4-3.7-3.2-4.2v-0.2
				c0-0.6-0.5-1.1-1.1-1.1s-1.1,0.5-1.1,1.1v0.2c-1.8,0.5-3.2,2.2-3.2,4.2c0,2.4,1.9,4.3,4.3,4.3c1.2,0,2.1,1,2.1,2.2
				c0,1.2-1,2.2-2.1,2.2c-1.2,0-2.1-1-2.1-2.2c0-0.6-0.5-1.1-1.1-1.1s-1.1,0.5-1.1,1.1c0,2,1.4,3.7,3.2,4.2v0.2
				c0,0.6,0.5,1.1,1.1,1.1s1.1-0.5,1.1-1.1v-0.2c1.8-0.5,3.2-2.2,3.2-4.2c0-2.4-1.9-4.3-4.3-4.3c-1.2,0-2.1-1-2.1-2.2
				C39.3,28.2,40.2,27.2,41.4,27.2z"/>
                                        <path fill="#838586" d="M32.1,46.7c-0.5-0.4-1.1-0.3-1.5,0.1l-4.7,5.7c-0.5-0.2-1.1-0.4-1.7-0.4c-2.4,0-4.3,1.9-4.3,4.3
				c0,2.4,1.9,4.3,4.3,4.3s4.3-1.9,4.3-4.3c0-1-0.4-1.9-0.9-2.6l4.7-5.6C32.7,47.8,32.6,47.1,32.1,46.7z M24.2,58.7
				c-1.2,0-2.1-1-2.1-2.2c0-1.2,1-2.2,2.1-2.2c1.2,0,2.1,1,2.1,2.2C26.4,57.7,25.4,58.7,24.2,58.7z"/>
                                        <path fill="#838586" d="M56.4,32.7c0-8.4-6.7-15.2-15-15.2s-15,6.8-15,15.2s6.7,15.2,15,15.2S56.4,41,56.4,32.7z M41.4,45.7
				c-7.1,0-12.9-5.8-12.9-13s5.8-13,12.9-13s12.9,5.8,12.9,13S48.5,45.7,41.4,45.7z"/>
                                    </g>
                                </g>
                            </g>
                                        </svg>

                    </div>
                    <div class="col-md-4">
                        <svg version="1.1" x="0px" y="0px" viewBox="0 0 82 61" enable-background="new 0 0 82 61"
                             xml:space="preserve">
                                            <g display="none">
                                                <path display="inline" fill="#838383" d="M76.3,0H5.8C2.6,0,0,2.6,0,5.8v49.3C0,58.3,2.6,61,5.8,61h70.5c3.2,0,5.8-2.6,5.8-5.8V5.8
				C82.1,2.6,79.5,0,76.3,0z M79.3,55.1c0,1.7-1.4,3.1-3,3.1H5.8c-1.7,0-3-1.4-3-3.1V5.8c0-1.7,1.4-3.1,3-3.1h70.5c1.7,0,3,1.4,3,3.1
				V55.1z"/>
                                                <path display="inline" fill="#838485" d="M21.9,40.2H9.6c-0.8,0-1.4,0.6-1.4,1.4S8.8,43,9.6,43h12.3c0.8,0,1.4-0.6,1.4-1.4
				S22.6,40.2,21.9,40.2z"/>
                                                <path display="inline" fill="#838485" d="M39.7,40.2H27.4c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h12.3c0.8,0,1.4-0.6,1.4-1.4
				S40.4,40.2,39.7,40.2z"/>
                                                <path display="inline" fill="#838485" d="M10.9,47.1H9.6c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h1.4c0.8,0,1.4-0.6,1.4-1.4
				S11.7,47.1,10.9,47.1z"/>
                                                <path display="inline" fill="#838485" d="M19.1,47.1h-2.7c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h2.7c0.8,0,1.4-0.6,1.4-1.4
				S19.9,47.1,19.1,47.1z"/>
                                                <path display="inline" fill="#838485" d="M26,47.1h-1.4c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4H26c0.8,0,1.4-0.6,1.4-1.4
				S26.7,47.1,26,47.1z"/>
                                                <path display="inline" fill="#838485" d="M34.2,47.1h-2.7c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4h2.7c0.8,0,1.4-0.6,1.4-1.4
				S35,47.1,34.2,47.1z"/>
                                                <path display="inline" fill="#838485" d="M38.7,47.5c-0.2,0.3-0.4,0.6-0.4,1s0.1,0.7,0.4,1c0.3,0.2,0.6,0.4,1,0.4
				c0.4,0,0.7-0.2,1-0.4c0.2-0.3,0.4-0.6,0.4-1s-0.2-0.7-0.4-1C40.1,47,39.2,47,38.7,47.5z"/>
                                                <path display="inline" fill="#838485" d="M65.7,34.6c-1.7,0-3.4,0.5-4.8,1.3c-1.4-0.8-3-1.3-4.8-1.3c-5.3,0-9.6,4.4-9.6,9.7
				s4.3,9.7,9.6,9.7c1.7,0,3.4-0.5,4.8-1.3c1.4,0.8,3,1.3,4.8,1.3c5.3,0,9.6-4.4,9.6-9.7S70.9,34.6,65.7,34.6z M62.9,44.3
				c0,1.9-0.8,3.7-2.1,4.9c-1.3-1.3-2.1-3-2.1-4.9s0.8-3.7,2.1-4.9C62.1,40.7,62.9,42.4,62.9,44.3z M49.2,44.3c0-3.8,3.1-6.9,6.8-6.9
				c0.9,0,1.7,0.2,2.4,0.5c-1.5,1.7-2.4,4-2.4,6.5c0,2.5,0.9,4.7,2.4,6.5c-0.8,0.3-1.6,0.5-2.4,0.5C52.3,51.3,49.2,48.2,49.2,44.3z
				M65.7,51.3c-0.9,0-1.7-0.2-2.4-0.5c1.5-1.7,2.4-4,2.4-6.5c0-2.5-0.9-4.7-2.4-6.5c0.8-0.3,1.6-0.5,2.4-0.5c3.8,0,6.8,3.1,6.8,6.9
				S69.4,51.3,65.7,51.3z"/>
                                                <path display="inline" fill="#838485" d="M11.3,30.5h8.2h2h8.2c1.7,0,3.1-1.4,3.1-3.1V16.3v-2.1c0-1.7-1.4-3.1-3.1-3.1H19.5h-8.2
				c-1.7,0-3.1,1.4-3.1,3.1v13.2C8.2,29.1,9.6,30.5,11.3,30.5z M16.4,22.2h-5.5v-2.8h5.5V22.2z M10.9,27.4v-2.4h5.5v2.4
				c0,0.1,0,0.2,0,0.4h-5.2C11.1,27.7,10.9,27.6,10.9,27.4z M30.1,22.2h-5.5v-2.4c0-0.2,0.2-0.4,0.3-0.4h4.8c0.1,0,0.2,0,0.3,0
				C30.1,19.4,30.1,22.2,30.1,22.2z M29.7,27.7h-5.2c0-0.1,0-0.2,0-0.4v-2.4h5.5v2.4C30.1,27.6,29.9,27.7,29.7,27.7z M29.7,13.9
				c0.2,0,0.3,0.2,0.3,0.4v2.1c0,0.2-0.2,0.4-0.3,0.4H25c-1.7,0-3.1,1.4-3.1,3.1v7.6c0,0.2-0.2,0.4-0.3,0.4h-2c-0.2,0-0.3-0.2-0.3-0.4
				V14.2c0-0.2,0.2-0.4,0.3-0.4H29.7z M11.3,13.9h5.2c0,0.1,0,0.2,0,0.4v2.4h-5.5v-2.4C10.9,14,11.1,13.9,11.3,13.9z"/>
                                            </g>
                            <g>
                                <path fill="#838485" d="M40.5,0C23.7,0,10,13.7,10,30.5S23.7,61,40.5,61S71,47.3,71,30.5S57.3,0,40.5,0z M40.5,57
				C25.9,57,14,45.1,14,30.5S25.9,4,40.5,4S67,15.9,67,30.5S55.1,57,40.5,57z"/>
                                <path fill="#838485" d="M42.5,28.7V17.3c1.1,0.4,2.1,1.2,2.8,2.2c0.6,0.9,1.9,1.2,2.8,0.6c0.9-0.6,1.2-1.9,0.6-2.8
				c-1.4-2.2-3.7-3.7-6.2-4.2V9.9c0-1.1-0.9-2-2-2c-1.1,0-2,0.9-2,2v3.2c-4.4,0.9-7.8,4.9-7.8,9.6s3.3,8.7,7.8,9.6v11.4
				c-1.1-0.4-2.1-1.2-2.8-2.2c-0.6-0.9-1.9-1.2-2.8-0.6c-0.9,0.6-1.2,1.9-0.6,2.8c1.4,2.2,3.7,3.7,6.2,4.2V51c0,1.1,0.9,2,2,2
				c1.1,0,2-0.9,2-2v-3.2c4.4-0.9,7.8-4.9,7.8-9.6S46.9,29.6,42.5,28.7z M34.7,22.7c0-2.5,1.6-4.6,3.8-5.4v10.8
				C36.3,27.3,34.7,25.2,34.7,22.7z M42.5,43.7V32.9c2.2,0.8,3.8,2.9,3.8,5.4S44.7,42.9,42.5,43.7z"/>
                            </g>
                                        </svg>
                    </div>
                    <div class="col-md-4"><strong>банковская карта</strong></div>
                    <div class="col-md-4"><strong>Безналичный расчет</strong></div>
                    <div class="col-md-4"><strong>LIQPAY</strong></div>
                </div>
                <div class="col-md-5 text-uppercase" right>
                                    <span><strong>мы сотрудничаем с перевозчиками</strong></span
                                    >
                    <p>доставка ав металл групп</p>
                    <div class="col-md-5 col-md-offset-1  text-left"><img
                                src="/local/templates/landing_av_steel/images-av-steel/new_post.svg" alt="Новая Почта"/><span><strong>новая почта</strong></span>
                    </div>
                    <div class="col-md-6  text-left"><img
                                src="/local/templates/landing_av_steel/images-av-steel/cat.svg"
                                alt="CAT доставка"/><span><strong>cat</strong></span></div>
                    <div class="col-md-5 col-md-offset-1 col-sm-6 text-left"><img
                                src="/local/templates/landing_av_steel/images-av-steel/in_time.svg"
                                alt="Ин-тайм"/><span><strong>ин-тайм</strong></span></div>
                    <div class="col-md-6 text-left"><img
                                src="/local/templates/landing_av_steel/images-av-steel/delivery-bottom.svg"
                                alt="Деливери"/><span><strong>деливери</strong></span></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="map-wrap" class="map-wrap clearfix">
                <div class="col-md-12 made-prof-tube main-title-other indent-left main-txt tube-made-bot-txt">
                    <a id="contacts"></a>
                    <br>
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/mapText.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_MAP_TEXT'),
                            "MODE"  => "text"
                        )
                    );?>
                </div>
                <div class="contact-data col-md-6">
                    <div class="address-data-footer">
                        <?$APPLICATION->IncludeFile(
                            "/".LANGUAGE_ID."/include/addressFooter.php",
                            Array(),
                            Array(
                                "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_ADDRESS_FOOTER'),
                                "MODE"  => "text"
                            )
                        );?>
                        <? /*$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/addressFooter.php"
                            )
                        ); */?>
                    </div>
                </div>
                <div class="col-md-6 map-data-inner" data-circle-map>
                    <span class="border-before map-border-before" data-circle-m></span>
                    <div id="map_canvas" class="map-bot"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12" id="footer-wrap">
            <div class="container">
                <div class="col-md-10 col-md-offset-1 col-sm-10 text-center text-uppercase" style="padding: 0px;">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "av-pipe-horizontal-footer",
                        array(
                            "ROOT_MENU_TYPE" => "left",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "left",
                            "USE_EXT" => "N",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        ),
                        false
                    );?>
                    <div class="text-center col-sm-12 footer-logo" style="color: #FFF">

                        <div class="col-md-2 col-sm-3 hidden-xs footer-logo-inner" data-logo>
                            <span class="logo-inner">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/logoFooter.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('PIPE_INCLUDE_AREA_TOOLTIP_LOGO_FOOTER'),
                                        "MODE"  => "html"
                                    )
                                );?>
                            </span>
                        </div>

                    </div>
                </div>
                <div class="col-md-1 col-sm-1 footer-right-col text-center" style="padding: 0px;">
                    <div id="arrow-up">
                        <a href="#upLinks"></a>
                    </div>
                    <div>
                        <ul class="social">

                            <li>
                                <a href="https://www.facebook.com/avmg.com.ua/" rel="nofollow" target="_blank">
                                    <svg version="1.1" x="0px" y="0px" viewBox="0 0 200 200"
                                         enable-background="new 0 0 200 200" xml:space="preserve">
										<g display="none">
                                            <g display="inline">
                                                <path fill="#CACACA" d="M195.1,42.4c-6.8,2.9-14.6,4.9-22.4,5.9c8.3-4.9,14.1-12.2,17.1-21c-7.8,4.4-16.1,7.3-24.9,9.3
						c-6.8-7.8-17.1-12.2-28.3-12.2c-21.5,0-39,17.1-39,38c0,2.9,0.5,5.9,1,8.8c-32.7-2-61.5-17.1-80.5-40c-3.4,5.9-5.4,12.2-5.4,19
						c0,13.2,6.8,24.9,17.6,31.7c-6.3,0-12.7-2-17.6-4.9v1c0,18.5,13.7,33.7,31.2,37.1c-3.4,1-6.8,1.5-10.2,1.5c-2.4,0-4.9,0-7.3-0.5
						c4.9,15.1,19.5,26.3,36.6,26.3c-13.2,10.2-30.2,16.1-48.8,16.1c-2.9,0-6.3,0-9.3-0.5c17.1,10.7,38,17.1,60,17.1
						c71.7,0,111.2-58,111.2-108.3V62C183.4,56.6,190.2,49.8,195.1,42.4z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <path fill="#FFFFFF" d="M142.9,23.9h-20c-22.4,0-37.1,14.6-37.1,37.1V78h-20c-2,0-2.9,1.5-2.9,2.9v24.9c0,1.5,1.5,2.9,2.9,2.9h20
						v62.9c0,1.5,1.5,2.9,2.9,2.9h26.3c2,0,2.9-1.5,2.9-2.9v-62.4h23.4c2,0,2.9-1.5,2.9-2.9V81.5c0-1-0.5-1.5-1-2c-0.5-0.5-1.5-1-2.4-1
						h-23.4V63.9c0-6.8,1.5-10.7,10.7-10.7H142c2,0,2.9-1.5,2.9-2.9V27.3C145.9,25.4,144.9,23.9,142.9,23.9z"/>
                                        </g>
									</svg>
                                </a>
                            </li>
                            <!--								<li>-->
                            <!--									<a href="https://www.youtube.com/channel/UCuzA3Al_MKninYtzVrgMyOA" rel="nofollow" target="_blank">-->
                            <!--									<svg version="1.1"  x="0px" y="0px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">-->
                            <!--										<g display="none">-->
                            <!--											<g display="inline">-->
                            <!--												<path fill="#CACACA" d="M195.1,42.4c-6.8,2.9-14.6,4.9-22.4,5.9c8.3-4.9,14.1-12.2,17.1-21c-7.8,4.4-16.1,7.3-24.9,9.3-->
                            <!--						c-6.8-7.8-17.1-12.2-28.3-12.2c-21.5,0-39,17.1-39,38c0,2.9,0.5,5.9,1,8.8c-32.7-2-61.5-17.1-80.5-40c-3.4,5.9-5.4,12.2-5.4,19-->
                            <!--						c0,13.2,6.8,24.9,17.6,31.7c-6.3,0-12.7-2-17.6-4.9v1c0,18.5,13.7,33.7,31.2,37.1c-3.4,1-6.8,1.5-10.2,1.5c-2.4,0-4.9,0-7.3-0.5-->
                            <!--						c4.9,15.1,19.5,26.3,36.6,26.3c-13.2,10.2-30.2,16.1-48.8,16.1c-2.9,0-6.3,0-9.3-0.5c17.1,10.7,38,17.1,60,17.1-->
                            <!--						c71.7,0,111.2-58,111.2-108.3V62C183.4,56.6,190.2,49.8,195.1,42.4z" />-->
                            <!--											</g>-->
                            <!--										</g>-->
                            <!--										<g display="none">-->
                            <!--											<path display="inline" fill="#CACACA" d="M142.9,23.9h-20c-22.4,0-37.1,14.6-37.1,37.1V78h-20c-2,0-2.9,1.5-2.9,2.9v24.9-->
                            <!--						c0,1.5,1.5,2.9,2.9,2.9h20v62.9c0,1.5,1.5,2.9,2.9,2.9h26.3c2,0,2.9-1.5,2.9-2.9v-62.4h23.4c2,0,2.9-1.5,2.9-2.9V81.5-->
                            <!--						c0-1-0.5-1.5-1-2c-0.5-0.5-1.5-1-2.4-1h-23.4V63.9c0-6.8,1.5-10.7,10.7-10.7H142c2,0,2.9-1.5,2.9-2.9V27.3-->
                            <!--						C145.9,25.4,144.9,23.9,142.9,23.9z" />-->
                            <!--										</g>-->
                            <!--										<g  display="none">-->
                            <!--											<path id="XMLID_807_" display="inline" fill="#CACACA" d="M168.8,119.5c6.3,8.3,13.7,16.1,19.5,25.4c2.4,3.9,4.9,8.3,6.8,13.2-->
                            <!--											c2.4,6.8,0.5,14.1-4.4,14.6H162c-7.3,1-13.2-2.9-18-9.8c-3.9-5.4-7.8-10.7-11.7-16.1c-1.5-2.4-3.4-4.4-5.4-5.9-->
                            <!--											c-3.9-3.4-7.3-2.4-9.8,2.9c-2.4,5.4-2.9,11.2-2.9,17.6c-0.5,8.8-2.4,11.2-9.3,11.7c-14.6,1-28.3-2-41-11.7-->
                            <!--											c-11.2-8.3-20-20-27.8-33.7C21.5,101,10.2,72.2,0,42.9c-2.4-6.8-0.5-10.2,4.9-10.2c9.3,0,18.5,0,28.3,0c3.9,0,6.3,2.9,7.8,7.8-->
                            <!--											c4.9,16.1,11.2,31.7,19,45.9c2,3.9,4.4,7.8,7.3,10.2c3.4,2.9,5.9,2,7.3-2.9c1-2.9,1.5-6.3,1.5-9.8c1-11.2,1-22.4-0.5-33.7-->
                            <!--											c-1-6.8-3.9-11.7-9.3-12.7c-2.9-0.5-2.4-2-1-3.9c2.4-3.4,4.4-5.9,8.8-5.9h32.7c4.9,1.5,6.3,4.4,6.8,10.7v46.8-->
                            <!--											c0,2.4,1,10.2,4.4,12.2c2.9,1,4.9-2,6.3-3.9c7.8-10.7,13.2-23.4,18-36.6c2.4-5.9,3.9-11.7,5.9-17.6c1.5-4.4,3.4-6.8,7.3-6.3h31.2-->
                            <!--											c1,0,2,0,2.9,0c5.4,1,6.8,3.9,4.9,10.7c-2.4,10.2-7.3,19-12.2,27.8c-5.4,9.3-10.7,18.5-16.1,27.8-->
                            <!--											C162.4,107.8,162.9,112.2,168.8,119.5L168.8,119.5z" />-->
                            <!--										</g>-->
                            <!--										<g id="XMLID_822_">-->
                            <!--											<path id="XMLID_823_" fill="#FFFFFF" d="M189.3,44.4c-6.8-8.3-20-11.7-44.4-11.7H55.1c-24.9,0-38,3.4-45.4,12.7-->
                            <!--												c-6.8,8.8-6.8,21.5-6.8,39V118c0,34.1,8.3,51.7,52.2,51.7h89.3c21.5,0,33.2-2.9,41-10.2c7.8-7.3,11.2-20,11.2-41V84.9-->
                            <!--												C197.1,65.4,196.1,52.7,189.3,44.4z M127.3,105.9l-40.5,21c-1,0.5-2,0.5-2.9,0.5s-2.4-0.5-3.4-1c-2-1-2.9-2.9-2.9-5.4V78.5-->
                            <!--												c0-2,1-4.4,2.9-5.4s4.4-1,6.3,0l40.5,21c2,1,3.4,3.4,3.4,5.4C130.7,102.4,129.8,104.4,127.3,105.9z" />-->
                            <!--										</g>-->
                            <!--									</svg>-->
                            <!--									</a>-->
                            <!--								</li>-->
                            <!--								<li>-->
                            <!--									<a href="https://twitter.com/avmgua" rel="nofollow" target="_blank">-->
                            <!--									<svg version="1.1"  x="0px" y="0px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">-->
                            <!--										<g>-->
                            <!--											<g>-->
                            <!--												<path fill="#FFFFFF" d="M195.1,42.4c-6.8,2.9-14.6,4.9-22.4,5.9c8.3-4.9,14.1-12.2,17.1-21c-7.8,4.4-16.1,7.3-24.9,9.3-->
                            <!--													c-6.8-7.8-17.1-12.2-28.3-12.2c-21.5,0-39,17.1-39,38c0,2.9,0.5,5.9,1,8.8c-32.7-2-61.5-17.1-80.5-40c-3.4,5.9-5.4,12.2-5.4,19-->
                            <!--													c0,13.2,6.8,24.9,17.6,31.7c-6.3,0-12.7-2-17.6-4.9v1c0,18.5,13.7,33.7,31.2,37.1c-3.4,1-6.8,1.5-10.2,1.5c-2.4,0-4.9,0-7.3-0.5-->
                            <!--													c4.9,15.1,19.5,26.3,36.6,26.3c-13.2,10.2-30.2,16.1-48.8,16.1c-2.9,0-6.3,0-9.3-0.5c17.1,10.7,38,17.1,60,17.1-->
                            <!--													c71.7,0,111.2-58,111.2-108.3V62C183.4,56.6,190.2,49.8,195.1,42.4z" />-->
                            <!--											</g>-->
                            <!--										</g>-->
                            <!--									</svg>-->
                            <!--									</a>-->
                            <!--							</li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

             <script data-skip-moving="true">
//                (function (w, d, u, b) {
//                    s = d.createElement('script');
//                    r = (Date.now() / 1000 | 0);
//                    s.async = 1;
//                    s.src = u + '?' + r;
//                    h = d.getElementsByTagName('script')[0];
//                    h.parentNode.insertBefore(s, h);
//                 })(window, document, 'https://corp.avmg.com.ua/upload/crm/site_button/loader_3_hi9pyn.js');
             </script>
        <?endif;?>