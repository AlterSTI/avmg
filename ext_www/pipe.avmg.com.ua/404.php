<?
use \Bitrix\Main\Page\Asset;
use Bitrix\Main\Localization\Loc;
include_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/urlrewrite.php";
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";
$APPLICATION->SetTitle("Сторінка не знайдена");

Asset::getInstance()->addCss("/bitrix/css/av-site/pages/404.css");
?>
<style>
    .av-404-page                   {margin: 0 26px;text-align: center}
    .av-404-page > b               {color: #CC0000;display: block;font-weight: bold}
    .av-404-page > i               {display: block;font-style: normal;margin-bottom: 52px}
    .av-404-page .buttons-cell > * {width: 200px}
    /* -------------------------------------------------------------------- */
    /* ------------------------------ media ------------------------------- */
    /* -------------------------------------------------------------------- */
    @media (min-width: 768px)
    {
        .av-404-page > b                           {font-size: 86px;line-height: 86px}
        .av-404-page > i                           {font-size: 36px;line-height: 36px}
        .av-404-page .buttons-cell                 {margin-top: 104px}
        .av-404-page .buttons-cell > *:first-child {margin-right: 10px}
    }
    @media (max-width: 767px)
    {
        .av-404-page > b                           {font-size: 79px;line-height: 79px}
        .av-404-page > i                           {font-size: 33px;line-height: 33px}
        .av-404-page .buttons-cell                 {margin-top: 52px}
        .av-404-page .buttons-cell > *:first-child {display: block;margin: 0 auto 10px auto}
    }
    /* -------------------------------------------------------------------- */
    /* ---------------------------- clear style --------------------------- */
    /* -------------------------------------------------------------------- */
    .av-form-button
    {
        background: transparent;
        border: none;
        color: inherit;
        font-weight: normal;
        margin:  0;
        padding: 0;
    }
    .av-form-button,
    .av-form-button:hover,
    .av-form-button:focus,
    .av-form-button:active,
    .av-form-button:visited {text-decoration: none}
    /* -------------------------------------------------------------------- */
    /* ------------------------------ button ------------------------------ */
    /* -------------------------------------------------------------------- */
    .av-form-button
    {
        background: #CC0000;
        border: 1px solid #CC0000;
        border-radius: 2px;
        color: #FFF;
        cursor: pointer;
        display: inline-block;
        font-weight: bold;
        padding: 7px 10px;
        transition: .3s;
        text-align: center;
        min-width: 100px;
    }
    .av-form-button:visited {color: #FFF}
    .av-form-button:hover,
    .av-form-button:focus,
    .av-form-button:active
    {
        background: #FFF;
        box-shadow: 0 2px 4px rgba(76,82,85,0.25);
        color: #CC0000;
    }
</style>
<div class="av-404-page">
	<b>404</b>
	<i><?=Loc::getMessage('AV_PIPE_PAGE_NOT_FOUND_1')?></i>
	<div>
       <?=Loc::getMessage('AV_PIPE_PAGE_NOT_FOUND_2')?>
	</div>

	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av",
				[
				"BUTTON_TYPE" => "link",
				"TITLE"       => Loc::getMessage('AV_PIPE_PAGE_NOT_FOUND_TO_GENERAL'),
				"LINK"        => "/".LANGUAGE_ID
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"]."./bitrix/footer.php"?>