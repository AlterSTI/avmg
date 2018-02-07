<?
use \Bitrix\Main\Page\Asset;

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("AB metal groups - corporate website of the company");
$APPLICATION->SetPageProperty("title",       "AV Metal Group is the leading company of Ukraine in the rolled metal market | Official site en.avmg.com.ua ✔ Address of the city Dnepr, st. Sholom-Aleikhema, 5 ☎ phone +38(056)790-01-22");
$APPLICATION->SetPageProperty("description", "AV metal groups ™ largest metal trader of Ukraine ✔ Dnipro, ul. Sholom-Aleikhema, 5 Call! ☎ +38(056)790-01-22");

CJSCore::Init(["bootstrap"]);
Asset::getInstance()->addCss("/bitrix/css/av-site/pages/index.css");
Asset::getInstance()->addCss("/bitrix/css/av-site/pages/index-en.css");
/* -------------------------------------------------------------------- */
/* ------------------------------ banner ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-banner-wraper">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:advertising.banner", "av",
			array(
			"TYPE"     => "MAIN_CORP_SITE",
			"NOINDEX"  => "Y",
			"QUANTITY" => 12,

			"CACHE_TYPE" => "A",
			"CACHE_TIME" => 360000
			)
		);
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- main streams --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block">
    <div class="container">
        <a class="av-page-title av-index-title-link" href="/proizvodstvo/">Manufacture</a>
        <?
        $APPLICATION->IncludeComponent
            (
            "av:visit_site.menu.tablet", "",
                array(
                "MENU_PATH" => "/proizvodstvo/",
                "MENU_TYPE" => "left"
	            )
	        );
        ?>
        <div class="active-button-cell">
            <?
            $APPLICATION->IncludeComponent
                (
                "av:form.button", "av",
                    array(
                    "BUTTON_TYPE" => "link",
                    "LINK"        => "/proizvodstvo/",
                    "TITLE"       => "View all",
                    "ATTR"        => ["rel" => "nofollow"]
                    ),
	            false, array("HIDE_ICONS" => "Y")
                );
            ?>
        </div>
    </div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ tablets ----------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block">
	<div class="av-index-products-block">
		<div>
			<picture>
				<source srcset="/upload/av_site/index/proizvodstvo.jpg"     media="(min-width: 992px)">
				<source srcset="/upload/av_site/index/proizvodstvo_med.jpg" media="(min-width: 768px) and (max-width: 991px)">
				<source srcset="/upload/av_site/index/proizvodstvo_sm.jpg"  media="(max-width: 767px)">
				<img src="/upload/av_site/index/proizvodstvo.jpg" alt="production" title="production">
			</picture>
			<a href="/proizvodstvo/">Manufacture</a>
		</div>
		<div>
			<picture>
				<source srcset="/upload/av_site/index/uslugi.jpg"     media="(min-width: 992px)">
				<source srcset="/upload/av_site/index/uslugi_med.jpg" media="(min-width: 768px) and (max-width: 991px)">
				<source srcset="/upload/av_site/index/uslugi_sm.jpg"  media="(max-width: 767px)">
				<img src="/upload/av_site/index/uslugi.jpg" alt="services" title="services">
			</picture>
			<a href="/uslugi/">Services</a>
		</div>
		<div>
			<picture>
				<source srcset="/upload/av_site/index/partnerstvo.jpg"     media="(min-width: 992px)">
				<source srcset="/upload/av_site/index/partnerstvo_med.jpg" media="(min-width: 768px) and (max-width: 991px)">
				<source srcset="/upload/av_site/index/partnerstvo_sm.jpg"  media="(max-width: 767px)">
				<img src="/upload/av_site/index/partnerstvo.jpg" alt="partners" title="partners">
			</picture>
			<a href="/about/partnersavmg/">Partners</a>
		</div>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- bases ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block">
    <div class="container av-index-bases-block">
        <a class="av-page-title av-index-title-link" href="/contacts/">Warehouse</a>
        <?
        $APPLICATION->IncludeComponent
			(
            "bitrix:catalog.section.list", "av_bases_map",
                array(
                "VIEW_MODE"        => "",
                "SHOW_PARENT_NAME" => "",

                "IBLOCK_TYPE"  => "av_storages",
                "IBLOCK_ID"    => 238,
                "SECTION_ID"   => "",
                "SECTION_CODE" => "",

                "SECTION_URL" => "/contacts/",

                "COUNT_ELEMENTS"      => "Y",
                "TOP_DEPTH"           => 1,
                "SECTION_FIELDS"      => array(),
                "SECTION_USER_FIELDS" => array(),

                "CACHE_TYPE"   => "A",
                "CACHE_TIME"   => 360000,
                "CACHE_GROUPS" => "Y",

                "ADD_SECTIONS_CHAIN" => "N",

                "SUBSECTION_MAX_COUNT"   => 5,
                "SUBSECTION_SORT_BY"     => "ID",
                "SUBSECTION_SORT_ORDER"  => "DESC",
                "SUBSECTION_SORT_BY2"    => "NAME",
                "SUBSECTION_SORT_ORDER2" => "ASC"
	            )
	        );
        ?>
        <div class="active-button-cell">
            <?
            $APPLICATION->IncludeComponent
                (
                "av:form.button", "av",
                    array(
                    "BUTTON_TYPE" => "link",
                    "LINK"        => "/contacts/",
                    "TITLE"       => "View all",
                    "ATTR"        => ["rel" => "nofollow"]
	                ),
	            false, array("HIDE_ICONS" => "Y")
	            );
            ?>
        </div>
    </div>
</div>

<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>