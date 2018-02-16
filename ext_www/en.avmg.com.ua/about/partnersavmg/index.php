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
			One of the main objectives of AV metal group is to build a reliable service for our customers.
			To meet customers` expectations, AV metal group is constantly upgrading our dealership network and acquiring new partnerships.
		</p>
		<p>
			With the help of the constant extension of our branch network, we have a huge variety of metal products in our warehouses and additional services development: <a href="https://en.avmg.com.ua/uslugi/oxy-fuel-cutting/">Oxy Fuel Cutting</a>, <a href="https://en.avmg.com.ua/uslugi/plasma-cutting/">Plasma Cutting</a>, <a href="https://en.avmg.com.ua/uslugi/metal-cutting-belt-saw-machine/">Metal cutting on the belt-saw machine</a>, <a href="https://en.avmg.com.ua/uslugi/longitudinal-cutting/">Longitudinal cutting</a>, <a href="https://en.avmg.com.ua/uslugi/cargo-transportation/">Cargo Transportation</a>.
			AV metal group provides a reliable supply by using our own vehicles and delivers rolled-metal products in the a timely manner throughout Ukraine.
		</p>
		<p>
			<a href="http://en.avmg.com.ua">AV metal group</a> meets customers` expectations by offering competitive prices, prompt delivery, informational and technical support, flexible discount system, payment deferment and various preferable terms for regular customers.
		</p>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 av-parthners-page-block second-column">
		<h3>Benefits</h3>
		<p>
			Our team consists of professional workers, market experts and responsible managers.
			AV metal group does daily market analysis and adjusts the inventory based on the current and forecasted trends in the rolled metal market.
		</p>
		<p>
			Our branch offices are located in the largest Ukrainian cities: Kyiv, Dnipro, Lviv, Kharkiv, Zaporizhia, Odessa, Nikolaev, Mariupol, Vinnitsa, Zhitomir, Poltava, Kropivnits’kiy, Rivne, Sumy, Khmelnitskiy, Cherkassy, Kamenskoe, Melitopol, Kryvyi Rih.
			In addition, AV metal group`s retail warehouses can be found in over a hundred cities in Ukraine.
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

				"START_PAGE"     => "new",
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
				"IMAGE_ALT"     => array("DMKD","Alchevsk Iron and Steel Works","ArcelorMittal","Azov Stal","Celsa","Pao DTZ","EVRAZ","Interpipe","Cominette","TruboStal","Zaporozhstal","Slavsant","PlasmaTec"),
				"IMAGE_NAME"    => array("DMKD","Alchevsk Iron and Steel Works","ArcelorMittal","Azov Stal","Celsa","Pao DTZ","EVRAZ","Interpipe","Cominette","TruboStal","Zaporozhstal","Slavsant","PlasmaTec"),
				"IMAGE_URL"     => array("/upload/av_site/partners/logo_DMKD.png","/upload/av_site/partners/logo_alchevsk.png","/upload/av_site/partners/logo_arcelormittal.png","/upload/av_site/partners/logo_azovstal.png","/upload/av_site/partners/logo_celsa.png","/upload/av_site/partners/logo_dtz.png","/upload/av_site/partners/logo_evraz.png","/upload/av_site/partners/logo_interpipe.png","/upload/av_site/partners/logo_kominmet.png","/upload/av_site/partners/logo_trubostal.png","/upload/av_site/partners/logo_zaporizhstal.png","/upload/av_site/partners/logo_slavsant.jpg","/upload/av_site/partners/logo_plasmatec.jpeg")
				)
			);
		 ?>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>