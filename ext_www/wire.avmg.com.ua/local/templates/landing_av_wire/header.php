<?
use Bitrix\Main\Localization\Loc;
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
$APPLICATION->AddHeadScript('/bitrix/js/main/jquery/jquery-2.1.3.js');


CJSCore::RegisterExt("bootstrap", ["css" => "/bitrix/css/av/bootstrap.supermin.css"]);
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
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <? $APPLICATION->ShowHead() ?>
    <? CJSCore::Init(["av", "bootstrap", "fontawesome", "js_main"]) ?>
    <? CJSCore::Init(array("jquery")) ?>

    <?
    $APPLICATION->AddHeadScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyA46WZQVEJSS2zf5hZPQW3-oV6P5RSCUDQ&callback=initMap');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/script.js');
    $APPLICATION->AddHeadScript('/bitrix/js/av_site/main.js');
    ?>
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
    <? /*$APPLICATION->AddHeadScript('/bitrix/js/av_site/main.js'); */?>
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
<!--    <script async="async" src="https://w.uptolike.com/widgets/v1/zp.js?pid=1618008" type="text/javascript"></script>

<!--    <div id="mobile-menu-wrap" class="hidden-lg hidden-md hidden-sm">-->
<!--        <div id="hamburger">-->
<!--            <span></span><span></span><span></span>-->
<!--        </div>-->
<!---->
<!--        <div class="bg-mobile-menu hidden ">-->
<!--            <div class="flex-menu">-->
<!--                <ul id="mobile-menu" class=" text-center text-uppercase">-->
<!--                    <li><a href="tel:+38 (067) 238 11 83">+38 (067) 238 11 83</a></li>-->
<!--                    <li class="call-btn">-->
<!--                        --><?///*$APPLICATION->IncludeFile(
//                            "/".LANGUAGE_ID."/include/requestFixedCall.php",
//                            Array(),
//                            Array(
//                                "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_FIXED_REQUEST_CALL'),
//                                "MODE"  => "text"
//                            )
//                        );*/?>
<!--                    </li>-->
<!--                    <li><a href="#">ua</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <div class="main-wrap">
        <div class="popUp callback-popup" data-call-back-form="" hidden>
            <div class="title-form-callback">
                <span>
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/requestFixedCall.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_FIXED_REQUEST_CALL'),
                            "MODE"  => "text"
                        )
                    );?>
                </span>
                <span class="callback-form-txt">
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/requestFixedCallHeader.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_FIXED_REQUEST_CALL_HEADER'),
                            "MODE"  => "text"
                        )
                    );?>
                </span>
            </div>
            <div>
                <?$APPLICATION->IncludeFile(
                    "/".LANGUAGE_ID."/include/formTelephone.php",
                    Array(),
                    Array(
                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_FORM_TELEPHONE'),
                        "MODE"  => "php"
                    )
                );?>
            </div>
            <div data-close-form2=""></div>
        </div>

        <div class="popUp wire-popup" data-partners-form="">
            <div class="title-form-callback">
                <span>
                        <?$APPLICATION->IncludeFile(
                            "/".LANGUAGE_ID."/include/writeTorUs.php",
                            Array(),
                            Array(
                                "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_WRITE_TO_US'),
                                "MODE"  => "text"
                            )
                        );?>
                </span>
            </div>
            <div>
                <?$APPLICATION->IncludeFile(
                    "/".LANGUAGE_ID."/include/formFeedback.php",
                    Array(),
                    Array(
                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_FORM_FEEDBACK'),
                        "MODE"  => "php"
                    )
                );?>
            </div>
            <div data-close-form2=""></div>
        </div>

        <div class="header-slider">
            <ul class="col-md-12 main-menu main-menu-fixed hidden-xs hidden-sm text-center text-uppercase">

                <header class="header header-sticky">
                    <div class="header-inner">
                        <div class="col-xs-5 col-sm-5 col-md-5 header-logo-wrapper-from">
                            <a href="/">
                                <div class="header-logo">
                                    <?$APPLICATION->IncludeFile(
                                        "/".LANGUAGE_ID."/include/logoFixedTop.php",
                                        Array(),
                                        Array(
                                            "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_LOGO_FIXED_TOP'),
                                            "MODE"  => "html"
                                        )
                                    );?>
                                </div>
<!--                                <span class="header-logo-txt"><span class="header-logo-first">АВ</span> метал груп</span>-->
                            </a>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 centred-to header-inner-data">
                            <span class="phone">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/telephonesFixedTop.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_LOGO_FIXED_TELEPHONE'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </span>
                            <div class="phone-inner">
                                <!--  Сюда вписываем номера телефонов!!!  -->
<!--                                <span class="phone">+38 (067) 238 11 83</span><br>-->
<!--                                <span class="phone">+38 (067) 238 11 83</span><br>-->
<!--                                <span class="phone">+38 (067) 238 11 83</span><br>-->
<!--                                <span class="phone">+38 (067) 238 11 83</span><br>-->
                            </div>
                            <div class="caret">
                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 centred-to call-to header-inner-data">
                            <span class="call-btn">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/requestFixedCall.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_FIXED_REQUEST_CALL'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </span>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 centred-to header-inner-data">
                          <span class="top-lang-fixed" id = "top-lang-fixed">
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.site.selector",
                                    "wire-fixed",
                                    array(
                                        "SITE_LIST" => array(
                                            0 => "*all*",
                                        ),
                                        "PIPE_SYTE_SELECTOR_DOMAIN" => "wire.avmg.com.ua",
                                        "COMPONENT_TEMPLATE" => "wire-fixed",
                                        "CACHE_TYPE" => "A",
                                        "CACHE_TIME" => "3600"
                                    ),
                                    false
                                );?>
                           </span>
<!--                            <i class="fa fa-angle-down" aria-hidden="true"></i>-->
                        </div>
                    </div>
                </header>
            </ul>

            <header id="header" class="header">
                <div class="header-inner">
                    <div class="col-xs-6 col-sm-5 col-md-5 header-logo-wrapper-to">
                        <a href="/">
                            <div class="header-logo">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/logoTop.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_LOGO_TOP'),
                                        "MODE"  => "html"
                                    )
                                );?>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 centred-to header-inner-data phone-wrap">
                        <span class="phone">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/telephonesTop.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_LOGO_TELEPHONE'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </span>
                        <div class="phone-inner">
<!--                              Сюда вписываем номера телефонов!!!  -->
<!--                            <span class="phone">+38 (067) 238 11 83</span><br>-->
<!--                            <span class="phone">+38 (067) 238 11 83</span><br>-->
<!--                            <span class="phone">+38 (067) 238 11 83</span><br>-->
<!--                            <span class="phone">+38 (067) 238 11 83</span><br>-->
                        </div>
                        <div class="caret">
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-3 col-md-3 centred-to call-to header-inner-data">
                        <span class="call-btn">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/requestCall.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_REQUEST_CALL'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </span>
                    </div>
                    <div class="col-xs-2 col-sm-1 col-md-1 centred-to header-inner-data">
                        <span class="top-lang" id = "top-lang">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.site.selector",
                                "wire",
                                array(
                                    "SITE_LIST" => array(
                                        0 => "*all*",
                                    ),
                                    "PIPE_SYTE_SELECTOR_DOMAIN" => "wire.avmg.com.ua",
                                    "COMPONENT_TEMPLATE" => "wire",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "3600"
                                ),
                                false
                            );?>
                        </span>
                    </div>
                </div>
            </header>
            <?
            $APPLICATION->IncludeComponent
            (
                "bitrix:advertising.banner", "av-wire-top",
                array(
                    "TYPE"     => "banner_top_wire",
                    "NOINDEX"  => "Y",
                    "QUANTITY" => 12,

                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => 360000
                )
            );
            ?>
        </div>
        <main class="main clearfix">
            <div class="container">
                <div class="wire-product clearfix">
                    <div class="col-md-12 product-banner">
                        <?
                        $APPLICATION->IncludeComponent
                        (
                            "bitrix:advertising.banner", "av-wire-product",
                            array(
                                "TYPE"     => "wire_product",
                                "NOINDEX"  => "Y",
                                "QUANTITY" => 12,

                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => 360000
                            )
                        );
                        ?>
                    </div>
                </div>
                <!--MOBILE-->
                <div class="product-banner-mobile col-md-12 clearfix">
                    <div class="sort-product-wrap">
                        <span class="sort-product-top main-sort">
                                <span>
                                    <?$APPLICATION->IncludeFile(
                                        "/".LANGUAGE_ID."/include/mobileSliderHeader1.php",
                                        Array(),
                                        Array(
                                            "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_HEADER1'),
                                            "MODE"  => "text"
                                        )
                                    );?>
                                </span>
                            </span>
                        <div class="banner-mobile-pict-wrap">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderImg1.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_IMG1'),
                                    "MODE"  => "html"
                                )
                            );?>
                        </div>
                        <span class="sort-product-txt">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderTxt1.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_TXT1'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </span>
                        <ul class="sort-product-list">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderTxt2.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_TXT2'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </ul>
                        <span class="sort-product-txt">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderTxt3.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_TXT3'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </span>
                        <span class="sort-product-txt">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderTxt4.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_TXT4'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </span>
                        <strong class="sort-prod-bottom-title">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderTxt5.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_TXT5'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </strong>
                        <ul class="sort-product-list">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderTxt6.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_TXT6'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </ul>
                    </div>

                    <div class="sort-product-wrap">
                        <span class="sort-product-top">
                                <span>
                                    <?$APPLICATION->IncludeFile(
                                        "/".LANGUAGE_ID."/include/mobileSliderHeader2.php",
                                        Array(),
                                        Array(
                                            "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_HEADER2'),
                                            "MODE"  => "text"
                                        )
                                    );?>
                                </span>
                            </span>
                        <div class="banner-mobile-pict-wrap">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderImg2.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_IMG2'),
                                    "MODE"  => "html"
                                )
                            );?>
                        </div>
                        <ul class="sort-product-list">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderTxt7.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_TXT7'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </ul>
                        <span class="sort-product-txt">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderTxt8.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_TXT8'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </span>
                        <ul class="sort-product-list">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderTxt9.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_TXT9'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </ul>
                        <span class="sort-product-txt">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderTxt10.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_TXT10'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </span>
                        <ul class="sort-product-list">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/mobileSliderTxt11.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_MOBILE_SLIDER_TXT11'),
                                    "MODE"  => "text"
                                )
                            );?>
                        </ul>
                    </div>
                </div>
<!--Mobile-->
                <div class="other-product">
                    <h3>
                        <?$APPLICATION->IncludeFile(
                            "/".LANGUAGE_ID."/include/otherProductHeader.php",
                            Array(),
                            Array(
                                "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_OTHER_PRODUCT_HEADER'),
                                "MODE"  => "text"
                            )
                        );?>
                    </h3>
                    <div class="col-md-12 other-product-inner">
                        <div class="col-sm-4 col-md-4 other-product-box">
                            <span class="other-prod-pict other-pict-2">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/otherProductImg1.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_OTHER_PRODUCT_IMG_1'),
                                        "MODE"  => "html"
                                    )
                                );?>
                            </span>
                            <div class="other-product-title">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/otherProductProd1.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_OTHER_PRODUCT_PROD_1'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 other-product-box">
                            <span class="other-prod-pict other-pict-1">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/otherProductImg2.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_OTHER_PRODUCT_IMG_2'),
                                        "MODE"  => "html"
                                    )
                                );?>
                            </span>
                            <div class="other-product-title">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/otherProductProd2.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_OTHER_PRODUCT_PROD_2'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 other-product-box">
                            <span class="other-prod-pict other-pict-3">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/otherProductImg3.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_OTHER_PRODUCT_IMG_3'),
                                        "MODE"  => "html"
                                    )
                                );?>
                            </span>
                            <div class="other-product-title">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/otherProductProd3.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_OTHER_PRODUCT_PROD_3'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-box">
                <div class="container">
                    <span class="info-txt">
                        <?$APPLICATION->IncludeFile(
                            "/".LANGUAGE_ID."/include/info.php",
                            Array(),
                            Array(
                                "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_INFO'),
                                "MODE"  => "text"
                            )
                        );?>
                    </span>
                </div>
            </div>

            <div class="container about-box">
                <h2 class="about-company-title">
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/title.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_TITLE'),
                            "MODE"  => "text"
                        )
                    );?>
                </h2>
                <span class="about-company-txt">
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/titleDescription.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_TITLE_DESCRIPTION'),
                            "MODE"  => "text"
                        )
                    );?>
                </span>
                <div class="col-md-12 about-company-inner-wrap clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12 about-inner">
                        <div class="about-company-left col-sm-6 col-md-6">
                            <strong class="about-company-top-title">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/aboutWireHeader1.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_ABOUT_WIRE_HEADER1'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </strong>
                            <span class="about-company-info-txt">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/aboutWire1.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_ABOUT_WIRE_1'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </span>
                        </div>
                        <div class="about-company-left col-sm-6 col-md-6">
                            <strong class="about-company-top-title">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/aboutWireHeader2.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_ABOUT_WIRE_HEADER2'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </strong>
                            <span class="about-company-info-txt">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/aboutWire2.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_ABOUT_WIRE_2'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 about-inner-next">
                        <div class="about-company-right col-sm-6 col-md-6">
                            <strong class="about-company-top-title">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/aboutWireHeader3.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_ABOUT_WIRE_HEADER3'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </strong>
                            <span class="about-company-info-txt">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/aboutWire3.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_ABOUT_WIRE_3'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </span>
                        </div>
                        <div class="about-company-right col-sm-6 col-md-6">
                            <strong class="about-company-top-title">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/aboutWireHeader4.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_ABOUT_WIRE_HEADER4'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </strong>
                            <span class="about-company-info-txt">
                                <?$APPLICATION->IncludeFile(
                                    "/".LANGUAGE_ID."/include/aboutWire4.php",
                                    Array(),
                                    Array(
                                        "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_ABOUT_WIRE_4'),
                                        "MODE"  => "text"
                                    )
                                );?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div id="map-wrap" class="map-wrap clearfix">
            <div class="col-md-6 map-txt">
                <div class="map-txt-inner">
                    <?$APPLICATION->IncludeFile(
                        "/".LANGUAGE_ID."/include/contacts.php",
                        Array(),
                        Array(
                            "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_CONTACTS'),
                            "MODE"  => "text"
                        )
                    );?>
                    <button class="contact-btn av-form-button">
                        <?$APPLICATION->IncludeFile(
                            "/".LANGUAGE_ID."/include/writeTorUs.php",
                            Array(),
                            Array(
                                "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_WRITE_TO_US'),
                                "MODE"  => "text"
                            )
                        );?>
                    </button>
                </div>
            </div>
            <div class="map-data-inner wire-map col-md-12" data-circle-map>
                <div id="map_canvas" class="map-bot"data-circle-m></div>
            </div>
        </div>

        <div class="col-md-12 footer-wrap" id="footer-wrap">
            <div class="container">
                <div class="col-sm-12 col-md-6 footer-logo">
                    <a href="/">
                        <span class="header-logo">
                            <?$APPLICATION->IncludeFile(
                                "/".LANGUAGE_ID."/include/logoFooter.php",
                                Array(),
                                Array(
                                    "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_LOGO_FOOTER'),
                                    "MODE"  => "html"
                                )
                            );?>
                        </span>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <span class="copy">
                        <?$APPLICATION->IncludeFile(
                            "/".LANGUAGE_ID."/include/copyright.php",
                            Array(),
                            Array(
                                "NAME" => Loc::getMessage('WIRE_INCLUDE_AREA_TOOLTIP_COPYRIGHT'),
                                "MODE"  => "text"
                            )
                        );?>
                    </span>
                </div>
            </div>
        </div>
        <div id="page-up-button"></div>
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