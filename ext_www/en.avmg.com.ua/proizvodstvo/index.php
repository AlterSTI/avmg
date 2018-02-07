<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Manufacture");
$APPLICATION->SetPageProperty("title",       "Production of the company AB metal groups | 🏠 Ukraine, Dnepr, ul. Sholom-Aleikhema, 5, ☎ (056) 790-01-22 | ™ en.avmg.com.ua");
$APPLICATION->SetPageProperty("description", "AV metal group ™ ✓National producer ✓Modern equipment ✓Low prices ☎ (056) 790-01-22 Call!");

$APPLICATION->IncludeComponent("av:visit_site.menu.tablet", "", array("MENU_TYPE" => "left"));

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";