<?
use \Bitrix\Main\Page\Asset;

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("About us");
$APPLICATION->SetPageProperty("title",       "About AV Metal Group: Mission, Values, Business Principles");
$APPLICATION->SetPageProperty("description", "AV metal groups ™ ✓ Low prices ✓Lessons of delivery ✓Spring production ✓Quality service ☎ (097) 208-29-98 Call!");

CJSCore::Init(["av", "bootstrap"]);
Asset::getInstance()->addCss("/bitrix/css/av-site/pages/about.css");
Asset::getInstance()->addJs ("/bitrix/js/av-site/pages/about.js");
?>
<div class="av-vs-page-block">
	<div class="container">
		<div class="col-lg-7 col-md-7">
			<br><br>LLC “AV metal group” is a large and independent ukrainian trading company. We have started our activity in the rolled metal market in June, 2009. In a few years we became a large Ukrainian supplier.
			Present day, “AV metal group” is one of the leaders among the companies of this business segment. We provide our consumers with a wide choice of bar sections, profiled bar, tubular and flat products.
			Cooperation with world famous manufacturers allows us to provide our customers with reliable and high-quality products. Our company continues to develop, opening new branch offices and metal warehouses all over Ukraine.
		</div>
		<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1">
			<img class="av-vs-page-logo" alt="AV metal group" title="AV metal group" src="/include/logo.svg">
		</div>
	</div>
</div>

<div class="av-vs-page-block-fon-caunt">
	<div class="container ">
		<div>
			<div class="col-lg-3 content col-md-3 col-sm-6">
				<div class="av-vs-page-circle counter">2000</div>
				<div>rolled metal<br>products</div>
			</div>
			<div class="col-lg-3 content col-md-3 col-sm-6">
				<div class="av-vs-page-circle counter">278</div>
				<div>retail<br>warehouses</div>
			</div>
			<div class="col-lg-3 content col-md-3 col-sm-6">
				<div class="av-vs-page-circle counter">48</div>
				<div>wholesales<br>branches</div>
			</div>
			<div class="col-lg-3 content col-md-3 col-sm-6">
				<div class="av-vs-page-circle counter">8</div>
				<div>years<br>in the market</div>
			</div>
		</div>
	</div>
</div>

<div class="av-vs-page-block">
	<div class="container">
		<div class="av-vs-page-block-title">
			Advantages of collaborative relationship with our company
		</div>
		<div class="col-lg-10 col-lg-offset-1">
			<p class="av-vs-page-block-subtitle">
				“AV metal group” customers receive wide range of products, quality services, precision, strategic and sustainable solution of any question.
				We are interested in reliable and long-term partnership and provide favorable conditions for cooperation.
			</p>
		</div>
		<div class="row" >
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img1></div>
				<div class="av-vs-page-title-sm-block">RELIABILITY AND<br>DEVELOPMENT</div>
				<div class="av-vs-page-text-sm-block">More than 20 000 ukrainian customers have selected “AV metal group”, including the largest industrial and development and construction companies.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img2></div>
				<div class="av-vs-page-title-sm-block">WIDE NETWORK OF<br>WAREHOUSES</div>
				<div class="av-vs-page-text-sm-block">About 278 warehouses are located in all regions of the country, which provides convenience to each customer.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img3></div>
				<div class="av-vs-page-title-sm-block">WIDE<br>SELECTION</div>
				<div class="av-vs-page-text-sm-block">Over 650 top requested  goods items are presented in 8 categories. Always we can offer you more.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img4></div>
				<div class="av-vs-page-title-sm-block">COMPETITIVE<br>PRICE</div>
				<div class="av-vs-page-text-sm-block">Affordable prices for products and services of our company are formed with high-quality service and active production.</div>
			</div>
		</div>
		<div class="row" >
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img5></div>
				<div class="av-vs-page-title-sm-block">DELIVERY THROUGHOUT<br>UKRAINE</div>
				<div class="av-vs-page-text-sm-block">Our logistics center and private truck fleet make possible to deliver goods to our customers in the shortest possible time.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img6></div>
				<div class="av-vs-page-title-sm-block">MUTUALLY BENEFICIAL<br>COOPERATION</div>
				<div class="av-vs-page-text-sm-block">Our company is interested in reliable partnership. We supply products from well-known manufacturers of international fame.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img7></div>
				<div class="av-vs-page-title-sm-block">CERTIFICATES OF<br>CONFORMITY</div>
				<div class="av-vs-page-text-sm-block">The products meet the world's requirements for stainless steel EN, DIN, AISI. We confidently declare about quality.</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="av-vs-page-background-image av-vs-page-circle" img8></div>
				<div class="av-vs-page-title-sm-block">STABLE<br>EMPLOYMENT</div>
				<div class="av-vs-page-text-sm-block">The company is interested in trainings and personnel development, ensuring stable work and career development.</div>
			</div>
		</div>
	</div>
</div>

<div class="av-vs-page-block-employees">
	<div class="container">
		<div class="av-vs-page-block-title">Domestic manufacturer</div>
		<div class="av-vs-page-block-subtitle"> The company is engaged in manufacturing of 8 categories of rolled metal products, which are high-demand in the modern construction. All products are made with high-technology equipment. We produce reinforcing, wire, round stock,shaped tubes, profiled sheeting, metal mesh, expanded metal sheet. In shaped tubes manufacturing we use modern technologies for metal processing. This significantly improve the quality of final product. In 2013 we have founded a new sector in the rolled metal market, setting up the metal tile roofing and  profiled sheets production.</div>
	</div>
</div>

<div class="av-vs-page-block">
	<div class="container">
		<div class="av-vs-page-block-title">Social accountability</div>
		<div class="av-vs-page-block-subtitle">“AV metal group” actively participates in the social and public life of the country. Primarily we provide material and technical support to socially disadvantaged categories of population: we insulate orphanages, support families of Anti-Terrorist Operations participants.</div>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>