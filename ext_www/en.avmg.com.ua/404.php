<?
use \Bitrix\Main\Page\Asset;

include_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/urlrewrite.php";
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Page not found");

Asset::getInstance()->addCss("/bitrix/css/av-site/pages/404.css");
?>
<div class="av-404-page">
	<b>404</b>
	<i>Page not found</i>
	<div>
		We can not find the page you were looking for.<br>
		Try to return to the previous page or go to the main page.
	</div>

	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-alt",
				[
				"BUTTON_TYPE" => "label",
				"TITLE"       => "Previous page",
				"ATTR"        => ["onclick" => "parent.history.back()"]
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av",
				[
				"BUTTON_TYPE" => "link",
				"TITLE"       => "To main",
				"LINK"        => "/"
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>