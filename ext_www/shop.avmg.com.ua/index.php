<?
use \Bitrix\Main\Page\Asset;

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle       ("");
$APPLICATION->SetPageProperty("title",       "");
$APPLICATION->SetPageProperty("description", "");

CJSCore::Init(["av"]);
Asset::getInstance()->addCss("/bitrix/css/av-shop/pages/index.css");
Asset::getInstance()->addJs ("/bitrix/js/av-shop/pages/index.js");
/* -------------------------------------------------------------------- */
/* ---------------------------- constants ----------------------------- */
/* -------------------------------------------------------------------- */
$iblockType       = "catalog_products";
$viewMainPropName = "VIEWMAIN";
/* -------------------------------------------------------------------- */
/* ---------------------- catalog iblocks array ----------------------- */
/* -------------------------------------------------------------------- */
$catalogIblockArray = [];
$queryList = CCatalog::GetList([], ["IBLOCK_TYPE_ID" => $iblockType, "PRODUCT_IBLOCK_ID" => false, "ACTIVE" => "Y", "CHECK_PERMISSIONS" => "Y"]);
while($queryElement = $queryList->GetNext()) $catalogIblockArray[$queryElement["ID"]] = [];

if(count($catalogIblockArray))
	{
	$queryList = CIBlock::GetList([], ["TYPE" => $iblockType, "ID" => array_keys($catalogIblockArray), "ACTIVE" => "Y", "CHECK_PERMISSIONS" => "Y"]);
	while($queryElement = $queryList->GetNext()) $catalogIblockArray[$queryElement["ID"]] = $queryElement;
	}
/* -------------------------------------------------------------------- */
/* ----------------------- iblock url templates ----------------------- */
/* -------------------------------------------------------------------- */
foreach($catalogIblockArray as $index => $iblockInfo)
	foreach(["LIST_PAGE_URL", "SECTION_PAGE_URL", "DETAIL_PAGE_URL"] as $keyType)
		{
		$catalogIblockArray[$index][$keyType] = str_replace
			(
			["#IBLOCK_ID#",     "#IBLOCK_CODE#",     "#SITE_DIR#"],
			[$iblockInfo["ID"], $iblockInfo["CODE"], ""],
			$iblockInfo[$keyType]
			);
		$catalogIblockArray[$index]["SECTION_PAGE_URL"] = str_replace($catalogIblockArray[$index]["LIST_PAGE_URL"], "", $catalogIblockArray[$index]["SECTION_PAGE_URL"]);
		$catalogIblockArray[$index]["DETAIL_PAGE_URL"]  = str_replace($catalogIblockArray[$index]["LIST_PAGE_URL"], "", $catalogIblockArray[$index]["DETAIL_PAGE_URL"]);
		}
/* -------------------------------------------------------------------- */
/* -------------------------- iblock filter --------------------------- */
/* -------------------------------------------------------------------- */
foreach($catalogIblockArray as $iblockInfo)
	{
	$queryList = CIBlockProperty::GetPropertyEnum($viewMainPropName, [], ["IBLOCK_ID" => $iblockInfo["ID"], "EXTERNAL_ID" => "Y"]);
	while($queryElement = $queryList->GetNext())
		$GLOBALS["AV_CATALOG_INDEX_FILTER_".$iblockInfo["ID"]] = ["PROPERTY_".$viewMainPropName => $queryElement["ID"]];
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ banner ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="av-shop-index-banner-wraper">
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
/* --------------------------- black metal ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-shop-index-products-block av-responsive-block">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:catalog", "av-index",
			array(
			"IBLOCK_TYPE"               => $iblockType,
			"IBLOCK_ID"                 => 139,
			"HIDE_NOT_AVAILABLE"        => "Y",
			"HIDE_NOT_AVAILABLE_OFFERS" => "Y",

			"SEF_MODE"          => "Y",
			"SEF_FOLDER"        => $catalogIblockArray[139]["LIST_PAGE_URL"],
			"SEF_URL_TEMPLATES" =>
				array(
				"sections"     => "",
				"section"      => $catalogIblockArray[139]["SECTION_PAGE_URL"],
				"element"      => $catalogIblockArray[139]["DETAIL_PAGE_URL"],
				"compare"      => "",
				"smart_filter" => $catalogIblockArray[139]["LIST_PAGE_URL"]."filter/#SMART_FILTER_PATH#/apply/"
				),

			"CACHE_TYPE"   => "A",
			"CACHE_TIME"   => 36000000,
			"CACHE_FILTER" => "Y",
			"CACHE_GROUPS" => "Y",

			"USE_FILTER"  => "Y",
			"FILTER_NAME" => "AV_CATALOG_INDEX_FILTER_139",

			"PRICE_CODE"        => array("BASE"),
			"PRICE_VAT_INCLUDE" => "Y",
			"CONVERT_CURRENCY"  => "Y",
			"CURRENCY_ID"       => "UAH",

			"ELEMENT_SORT_FIELD"     => "name",
			"ELEMENT_SORT_ORDER"     => "asc",
			"ELEMENT_SORT_FIELD2"    => "id",
			"ELEMENT_SORT_ORDER2"    => "desc",
			"LIST_OFFERS_FIELD_CODE" => array("NAME", "PREVIEW_PICTURE")
			)
		);
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- pipes ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="av-shop-index-products-block av-responsive-block">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:catalog", "av-index",
			array(
			"IBLOCK_TYPE"               => $iblockType,
			"IBLOCK_ID"                 => 265,
			"HIDE_NOT_AVAILABLE"        => "Y",
			"HIDE_NOT_AVAILABLE_OFFERS" => "Y",

			"SEF_MODE"          => "Y",
			"SEF_FOLDER"        => $catalogIblockArray[265]["LIST_PAGE_URL"],
			"SEF_URL_TEMPLATES" =>
				array(
				"sections"     => "",
				"section"      => $catalogIblockArray[265]["SECTION_PAGE_URL"],
				"element"      => $catalogIblockArray[265]["DETAIL_PAGE_URL"],
				"compare"      => "",
				"smart_filter" => $catalogIblockArray[265]["LIST_PAGE_URL"]."filter/#SMART_FILTER_PATH#/apply/"
				),

			"CACHE_TYPE"   => "A",
			"CACHE_TIME"   => 36000000,
			"CACHE_FILTER" => "Y",
			"CACHE_GROUPS" => "Y",

			"USE_FILTER"  => "Y",
			"FILTER_NAME" => "AV_CATALOG_INDEX_FILTER_265",

			"PRICE_CODE"        => array("BASE"),
			"PRICE_VAT_INCLUDE" => "Y",
			"CONVERT_CURRENCY"  => "Y",
			"CURRENCY_ID"       => "UAH",

			"ELEMENT_SORT_FIELD"     => "name",
			"ELEMENT_SORT_ORDER"     => "asc",
			"ELEMENT_SORT_FIELD2"    => "id",
			"ELEMENT_SORT_ORDER2"    => "desc",
			"LIST_OFFERS_FIELD_CODE" => array("NAME", "PREVIEW_PICTURE")
			)
		);
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- images block --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-shop-index-images-block four-column">
	<div class="item">
		<img
			src="/bitrix/images/av-shop/pages/index/plazmennaya-rezka-metalla.jpg"
			alt="плазменная резка металла"
			title="плазменная резка металла"
		>
		<a href="/uslugi/plazmennaya-rezka-metalla/">
			Плазменная резка<br>металла
		</a>
	</div>
	<div class="item">
		<img
			src="/bitrix/images/av-shop/pages/index/rezka-na-lentopilnom-stanke.jpg"
			alt="резка на ленточнопильном станке"
			title="резка на ленточнопильном станке"
		>
		<a href="/uslugi/rezka-na-lentopilnom-stanke/">
			Резка на ленточнопильном<br>станке
		</a>
	</div>
	<div class="item">
		<img
			src="/bitrix/images/av-shop/pages/index/gazovaya-rezka-metalla.jpg"
			alt="газовая резка металла"
			title="газовая резка металла"
		>
		<a href="/uslugi/gazovaya-rezka-metalla/">
			Газовая резка<br>металла
		</a>
	</div>
	<div class="item">
		<img
			src="/bitrix/images/av-shop/pages/index/prodolnaya-rezka-metalla.jpg"
			alt="продольная резка металла"
			title="продольная резка металла"
		>
		<a href="/uslugi/prodolnaya-rezka-metalla/">
			Продольная резка<br>рулонного металла
		</a>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- proffnastil ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-shop-index-products-block av-responsive-block">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:catalog", "av-index",
			array(
			"IBLOCK_TYPE"               => $iblockType,
			"IBLOCK_ID"                 => 149,
			"HIDE_NOT_AVAILABLE"        => "Y",
			"HIDE_NOT_AVAILABLE_OFFERS" => "Y",

			"SEF_MODE"          => "Y",
			"SEF_FOLDER"        => $catalogIblockArray[149]["LIST_PAGE_URL"],
			"SEF_URL_TEMPLATES" =>
				array(
				"sections"     => "",
				"section"      => $catalogIblockArray[149]["SECTION_PAGE_URL"],
				"element"      => $catalogIblockArray[149]["DETAIL_PAGE_URL"],
				"compare"      => "",
				"smart_filter" => $catalogIblockArray[149]["LIST_PAGE_URL"]."filter/#SMART_FILTER_PATH#/apply/"
				),

			"CACHE_TYPE"   => "A",
			"CACHE_TIME"   => 36000000,
			"CACHE_FILTER" => "Y",
			"CACHE_GROUPS" => "Y",

			"USE_FILTER"  => "Y",
			"FILTER_NAME" => "AV_CATALOG_INDEX_FILTER_149",

			"PRICE_CODE"        => array("BASE"),
			"PRICE_VAT_INCLUDE" => "Y",
			"CONVERT_CURRENCY"  => "Y",
			"CURRENCY_ID"       => "UAH",

			"ELEMENT_SORT_FIELD"     => "name",
			"ELEMENT_SORT_ORDER"     => "asc",
			"ELEMENT_SORT_FIELD2"    => "id",
			"ELEMENT_SORT_ORDER2"    => "desc",
			"LIST_OFFERS_FIELD_CODE" => array("NAME", "PREVIEW_PICTURE")
			)
		);
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- grid ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-shop-index-products-block av-responsive-block">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:catalog", "av-index",
			array(
			"IBLOCK_TYPE"               => $iblockType,
			"IBLOCK_ID"                 => 262,
			"HIDE_NOT_AVAILABLE"        => "Y",
			"HIDE_NOT_AVAILABLE_OFFERS" => "Y",

			"SEF_MODE"          => "Y",
			"SEF_FOLDER"        => $catalogIblockArray[262]["LIST_PAGE_URL"],
			"SEF_URL_TEMPLATES" =>
				array(
				"sections"     => "",
				"section"      => $catalogIblockArray[262]["SECTION_PAGE_URL"],
				"element"      => $catalogIblockArray[262]["DETAIL_PAGE_URL"],
				"compare"      => "",
				"smart_filter" => $catalogIblockArray[262]["LIST_PAGE_URL"]."filter/#SMART_FILTER_PATH#/apply/"
				),

			"CACHE_TYPE"   => "A",
			"CACHE_TIME"   => 36000000,
			"CACHE_FILTER" => "Y",
			"CACHE_GROUPS" => "Y",

			"USE_FILTER"  => "Y",
			"FILTER_NAME" => "AV_CATALOG_INDEX_FILTER_262",

			"PRICE_CODE"        => array("BASE"),
			"PRICE_VAT_INCLUDE" => "Y",
			"CONVERT_CURRENCY"  => "Y",
			"CURRENCY_ID"       => "UAH",

			"ELEMENT_SORT_FIELD"     => "name",
			"ELEMENT_SORT_ORDER"     => "asc",
			"ELEMENT_SORT_FIELD2"    => "id",
			"ELEMENT_SORT_ORDER2"    => "desc",
			"LIST_OFFERS_FIELD_CODE" => array("NAME", "PREVIEW_PICTURE")
			)
		);
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- images block --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-shop-index-images-block alt">
	<div class="item">
		<img
			src="/bitrix/images/av-shop/pages/index/payment.jpg"
			alt="оплата"
			title="оплата"
		>
		<a href="/info/">
			<div class="title">Оплата</div>
			<div class="text">
				Мы принимаем наличную и безналичную оплату.<br>
				На сайте представлены реквизиты нашей компании.
			</div>
			<div class="detail">Подробнее</div>
		</a>
	</div>
	<div class="item">
		<img
			src="/bitrix/images/av-shop/pages/index/delivery.jpg"
			alt="доставка"
			title="доставка"
		>
		<a href="/uslugi/dostavka/">
			<div class="title">Доставка</div>
			<div class="text">
				Доставка наших транспортов осуществляется по всей Украине.<br>
				Узнать стоимость доставки можно позвонив по телефону:<br>
				+38 (098) 789 78 76
			</div>
			<div class="detail">Подробнее</div>
		</a>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- electrodes ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-shop-index-products-block av-responsive-block">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:catalog", "av-index",
			array(
			"IBLOCK_TYPE"               => $iblockType,
			"IBLOCK_ID"                 => 273,
			"HIDE_NOT_AVAILABLE"        => "Y",
			"HIDE_NOT_AVAILABLE_OFFERS" => "Y",

			"SEF_MODE"          => "Y",
			"SEF_FOLDER"        => $catalogIblockArray[273]["LIST_PAGE_URL"],
			"SEF_URL_TEMPLATES" =>
				array(
				"sections"     => "",
				"section"      => $catalogIblockArray[273]["SECTION_PAGE_URL"],
				"element"      => $catalogIblockArray[273]["DETAIL_PAGE_URL"],
				"compare"      => "",
				"smart_filter" => $catalogIblockArray[273]["LIST_PAGE_URL"]."filter/#SMART_FILTER_PATH#/apply/"
				),

			"CACHE_TYPE"   => "A",
			"CACHE_TIME"   => 36000000,
			"CACHE_FILTER" => "Y",
			"CACHE_GROUPS" => "Y",

			"USE_FILTER"  => "Y",
			"FILTER_NAME" => "AV_CATALOG_INDEX_FILTER_273",

			"PRICE_CODE"        => array("BASE"),
			"PRICE_VAT_INCLUDE" => "Y",
			"CONVERT_CURRENCY"  => "Y",
			"CURRENCY_ID"       => "UAH",

			"ELEMENT_SORT_FIELD"     => "name",
			"ELEMENT_SORT_ORDER"     => "asc",
			"ELEMENT_SORT_FIELD2"    => "id",
			"ELEMENT_SORT_ORDER2"    => "desc",
			"LIST_OFFERS_FIELD_CODE" => array("NAME", "PREVIEW_PICTURE")
			)
		);
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------------- SOE text ----------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-responsive-block">
	<h3 class="av-spoiler-header">
		<div class="title">В каталоге АВ металл групп Вы найдете широкий ассортимент продукции</div>
		<i class="icon fa fa-times"></i>
	</h3>
	<div class="av-spoiler-body">
		<p>
			В каталоге АВ металл групп Вы найдете широкий ассортимент продукции, которая соответствует действующим отечественным и европейским стандартам.
			Так, у нас можно приобрести трубы электросварные и трубы ВГП.
			Выберите в соответствующей категории нужный товар, чтобы купить трубу квадратную, трубу профильную, трубу круглую или трубу водогазопроводную.
		</p>
		<p>
			В нескольких разделах каталога, детально описаны характеристики разных видов металлопроката.
			Арматура, к примеру, представлена в разделе черного металла.
			Чтобы заказать качественную арматуру А240, А400 или А500 обратитесь к нашему менеджеру.
		</p>
		<p>
			Кроме того Вы можете узнать характеристики кругов.
			Металлопрокат — раздел в котором описана продукция 12 категорий.
			В одной из них Вы найдете круги горячекатаные и конструкционные.
			Данная продукция активно используется в строительстве, машиностроении, применяется в изготовлении различных деталей и декоративных элементов.
		</p>
		<p>
			Для подобных целей также используют квадрат.
			Уточните наличие данного товара в ассортименте торгового подразделения у нашего менеджера.
			Купить квадрат по выгодной цене можно прямо на сайте компании.
			Сделайте предварительный заказ, указав нужную Вам продукцию и адрес металлобазы.
		</p>
		<p>
			Также, подробно описан в каталоге металлопроката шестигранник.
			Для производства этой продукции используют конструкционные углеродистые легированные марки стали качественные и обыкновенного качества.
			На сайте Вы можете приобрести шестигранник диаметром от 10 до 65 мм.
		</p>
		<p>
			В машиностроении часто используют уголок катаный.
			Металлопрокат этого вида в нашем ассортименте представлен следующих размеров: ширина полок - от 20 до 200 мм, длина — от 3 до 16 м.
			Кроме того, уголок катаный применяют в строительстве: его часто используют в качестве элемента при монтаже железобетонных конструкций.
		</p>
		<p>
			Еще один незаменимый в строительстве материал - швеллер.
			Его применяют при возведении зданий, сооружения каркасов, колонн, лестниц, заборов и других конструкций.
			Этот вид сортового проката производится из конструкционных низколегированных марок стали Ст 09Г2С и Ст3 пс.
			Купить швеллер Вы можете по выгодным ценам на сайте компании.
		</p>
		<p>
			В строительстве для создания и укрепления различных конструкций используют балку двутавровую.
			На сайте представлены широкополочные, нормальные и колонные двутавры.
			Купить балки двутавровые или узнать характеристики материала можно в каталоге.
		</p>
		<p>
			У нас Вы найдете большое разнообразие листового металлопроката.
			Листы в нашем ассортименте представлены в пяти категориях, среди которых листы горячекатаные, холоднокатаные, конструкционные, рифленые и ПВЛ.
			Их применяют как основу для создания различных деталей, конструкций, используют в качестве покрытий и элементов ограждений.
		</p>
		<p>
			Отдельной категорией в каталоге представлен профнастил.
			Такие профилированные листы изготавливаются на современном оборудовании, из листовых заготовок, а затем дополнительно упрочняются цинком и полимерным покрытием.
			На рынке металлопроката профнастил относительно новый элемент, который активно используют в качестве облицовки стен и фасадов зданий, возведения ограждений и кровли крыш.
		</p>
		<p>
			Особой популярностью как кровельный материал пользуется также металлочерепица.
			Мы предлагаем клиентам материалы общей шириной — 1180, с толщиной листа — 0,4 и 0,45 мм.
			Купить металлочерепицу можно на наших металлобазах.
		</p>
		<p>
			Среди других видов листовой стали, в ассортименте представлены рулоны.
			Металлопрокат данной категории бывает двух видов: горячекатаный и холоднокатаный рулон.
			Холоднокатаный - имеет более прочную кристаллическую решетку, потому он часто применяется в изготовлении различных режущих инструментов и оборудования.
		</p>
		<p>
			Основой для подобных изделий выступает полоса, которая изготавливается из углеродистых конструкционных, пружинно-рессорных и других марок стали.
			Купить полосу Вы можете в одном из разделов интернет-магазина АВ металл-групп.
		</p>
		<p>
			Часто в процессе строительства, в частности, для транспортировки конструкций применяют проволоку.
			Она имеет форму шнура, гнущегося и протяженного.
			Для того, чтобы приобрести в разделе черный металлопрокат проволоку и товары других категорий, необходимо осуществить предварительный заказ.
		</p>
		<p>
			Часто путают с предыдущим видом металлопроката катанку.
			Однако есть ряд существенных отличий.
			Катанку используют как сырье для изготовления проволоки, арматуры и других видов продукции.
		</p>
		<p>
			В нашем ассортименте представлены материалы для сварки.
			Так, Вы можете заказать и купить электроды сварочные.
			Мы предлагаем покупателям продукцию известных украинских производителей и реализуем электроды собственного производства.
		</p>
		<p>
			Для аккуратности и надежности швов и непрерывности процесса используют проволоку сварочную.
			Она изготавливается из низкоуглеродистых и легированных марок стали Св08Г2С, Св-08А, Св-06Х14, Св-10Х16Н25АМ6 и других.
			Купить проволоку сварочную можно в любом регионе Украины в подразделениях компании.
		</p>
		<p>
			Наши металлобазы имеют удобное расположение в Ивано-Франковске, Ровно, Житомире, Черкассах, Кропивницком, Виннице, Тернополе, Ужгороде, Запорожье, Сумах, Хмельницком, Львове, Днепре, Одессе, Луцке, Полтаве, Киеве, Мариуполе, Николаеве, Харькове, Северодонецке, Чернигове и других городах этих областей.
			Купить арматуру, балку двутавровую, катанку, квадрат, круги, листы, полосу, проволоку, рулоны, уголок катаный, швеллер, шестигранник, профнастил, металлочерепицу, электроды сварочные, проволоку сварочную, трубу квадратную, трубу профильную, трубу круглую, трубу водогазопроводную и трубы ВГП также можно на сайте компании, осуществив предварительный заказ продукции.
		</p>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>