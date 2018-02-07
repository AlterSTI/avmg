<?
use \Bitrix\Main\Page\Asset;

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Partners AVMG");
$APPLICATION->SetPageProperty("title",       "Cooperation with AB Metal Group | Affiliate program Ukraine: Dnipro, Kiev, Kharkov, Lviv, Odessa, ☎ (056) 790-01-22 | ™ en.avmg.com.ua");
$APPLICATION->SetPageProperty("description", "Cooperation with AV Metal Group ™ ✓Competitive Affiliate Program ✓Wide Regional Network ☎ (056) 790-01-22 Call!");

CJSCore::Init(["bootstrap"]);
Asset::getInstance()->addCss("/bitrix/css/av-site/pages/partners.css");
?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 av-parthners-page-block first-column">
		<h3>Affiliate program</h3>
		<p>
			One of the main aim of AV metal group is the constant development of the dealer network and new partners capture.
		</p>
		<p>
			This is possible due to the constant extension of the branch network, metal products range in warehouses and additional services development.
			We deliver rolled-metal products with our own vehicles in the shortest possible time throughout Ukraine.
		</p>
		<p>
			<a target="_blank" href="/">AV metal group</a> maximally meets the requirements of the customers.
			We offer competitive prices, prompt delivery, informational and technical support, flexible discount system, payment deferment and various preferable terms for regular customers.
		</p>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 av-parthners-page-block second-column">
		<h3>Benefits</h3>
		<p>
			Our team is group of professional and responsible managers, who constantly monitor all trends in the rolled metal market  and offer broad range of pre-sale services, taking into account all customer needs.
		</p>
		<p>
			Branch offices of our company operate in the largest cities of Ukraine: Kyiv, Dnipro, Lviv, Kharkiv, Zaporizhia, Odessa, Nikolaev, Mariupol, Vinnitsa, Zhitomir, Poltava, Kropivnits’kiy, Rivne, Sumy, Khmelnitskiy, Cherkassy, Kamenskoe, Melitopol, Kryvyi Rih.
			Retail warehouses are located in more than 100 cities in Ukraine.
		</p>
		<p>
			Dispatch and service quality are our priorities.
			Friendly team of our collective is the key success factor and business rising of AV metal group, on which we stake.
		</p>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 av-parthners-page-block">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:form.result.new", "av-parthners",
				array(
				"AJAX_MODE"           => "Y",
				"AJAX_OPTION_JUMP"    => "N",
				"AJAX_OPTION_STYLE"   => "N",
				"AJAX_OPTION_HISTORY" => "N",

				"SEF_MODE"    => "N",
				"WEB_FORM_ID" => 51,

				"START_PAGE"     =>"new",
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
			);
		?>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 av-page-title av-parthners-page-separator">
		Our partners
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:image_carousel", "av-parthners",
				array(
				"IMAGE_NAME" => array("DMKD","Alchevsk Iron and Steel Works","ArcelorMittal","Azov Stal","Celsa","Pao DTZ","EVRAZ","Interpipe","Cominette","TruboStal","Zaporozhstal","Slavsant","PlasmaTec"),
				"IMAGE_ALT"  => array("DMKD","Alchevsk Iron and Steel Works","ArcelorMittal","Azov Stal","Celsa","Pao DTZ","EVRAZ","Interpipe","Cominette","TruboStal","Zaporozhstal","Slavsant","PlasmaTec"),
				"IMAGE_URL"  =>
					array(
					"/upload/av_site/partners/logo_DMKD.png",          "/upload/av_site/partners/logo_alchevsk.png",
					"/upload/av_site/partners/logo_arcelormittal.png", "/upload/av_site/partners/logo_azovstal.png",
					"/upload/av_site/partners/logo_celsa.png",         "/upload/av_site/partners/logo_dtz.png",
					"/upload/av_site/partners/logo_evraz.png",         "/upload/av_site/partners/logo_interpipe.png",
					"/upload/av_site/partners/logo_kominmet.png",      "/upload/av_site/partners/logo_trubostal.png",
					"/upload/av_site/partners/logo_zaporizhstal.png",  "/upload/av_site/partners/logo_slavsant.jpg",
					"/upload/av_site/partners/logo_plasmatec.jpeg"
					)
				)
			);
		?>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>