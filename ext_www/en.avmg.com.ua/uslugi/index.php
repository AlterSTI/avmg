<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Services");
$APPLICATION->SetPageProperty("title",       "Sale, cutting and delivery of metal AB metal groups | 🏠 Ukraine, Dnepr, ul. Sholom-Aleikhema, 5, ☎ (056) 790-01-22 | ™ en.avmg.com.ua");
$APPLICATION->SetPageProperty("description", "Cutting and delivery of metal ► AV metal group ™ ✓Modern equipment ✓Optimal prices ✓Specialists ☎ (056) 790-01-22 Call!");

$APPLICATION->IncludeComponent("av:visit_site.menu.tablet", "", array("MENU_TYPE" => "left"));

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";