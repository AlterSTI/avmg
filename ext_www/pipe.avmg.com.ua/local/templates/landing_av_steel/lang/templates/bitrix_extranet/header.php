<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (isset($_GET["RELOAD"]) && $_GET["RELOAD"] == "Y")
{
	return; //Live Feed Ajax
}
else if (strpos($_SERVER["REQUEST_URI"], "/historyget/") > 0)
{
	return;
}
else if (
	(isset($_GET["IFRAME"]) && $_GET["IFRAME"] == "Y") && !isset($_GET["SONET"]))
{
	//For the task iframe popup
	$APPLICATION->SetPageProperty("BodyClass", "task-iframe-popup");
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/interface.css", true);
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/bitrix24.js", true);
	return;
}

CModule::IncludeModule("intranet");

$APPLICATION->GroupModuleJS("timeman","im");
$APPLICATION->GroupModuleJS("webrtc","im");
$APPLICATION->GroupModuleJS("pull","im");
$APPLICATION->GroupModuleCSS("timeman","im");
$APPLICATION->MoveJSToBody("im");
$APPLICATION->MoveJSToBody("timeman");
$APPLICATION->SetUniqueJS('bx24', 'template');
$APPLICATION->SetUniqueCSS('bx24', 'template');

$isCompositeMode = defined("USE_HTML_STATIC_CACHE");
$isIndexPage =
	$APPLICATION->GetCurPage(true) === SITE_DIR."stream/index.php" ||
	$APPLICATION->GetCurPage(true) === SITE_DIR."index.php" ||
	(defined("BITRIX24_INDEX_PAGE") && constant("BITRIX_INDEX_PAGE") === true)
;

if ($isIndexPage)
{
	if (!defined("BITRIX24_INDEX_PAGE"))
	{
		define("BITRIX24_INDEX_PAGE", true);
	}

	if ($isCompositeMode)
	{
		define("BITRIX24_INDEX_COMPOSITE", true);
	}
}



if ($isCompositeMode)
{
	$APPLICATION->SetAdditionalCSS("/bitrix/js/intranet/intranet-common.css");
}

$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/slider/slider.css");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/slider/slider.js");

function showJsTitle()
{
	$GLOBALS["APPLICATION"]->AddBufferContent("getJsTitle");
}

function getJsTitle()
{
	$title = $GLOBALS["APPLICATION"]->GetTitle("title", true);
	$title = html_entity_decode($title, ENT_QUOTES, SITE_CHARSET);
	$title = CUtil::JSEscape($title);
	return $title;
}
?>
<!DOCTYPE html>
<?\Bitrix\Main\Localization\Loc::loadMessages($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");?>
<html>
<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?if (IsModuleInstalled("bitrix24")):?>
    <meta name="viewport" content="width=1135">
<link rel="apple-touch-icon-precomposed" href="/images/iphone/57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/iphone/72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/iphone/114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/iphone/144x144.png" />

<?endif;

$APPLICATION->ShowHead(false);
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/interface.css", true);
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/bitrix24.js", true);
CJSCore::Init(array("jquery"));
$APPLICATION->AddHeadScript("/bitrix/js/main/jquery/jquery-2.1.3.min.js");
?>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<title><? if (!$isCompositeMode || $isIndexPage) $APPLICATION->ShowTitle()?></title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body class="template-bitrix24<?=($isIndexPage ? " no-paddings start-page" : "")?>">
<?
if ($isCompositeMode && !$isIndexPage)
{
	$frame = new \Bitrix\Main\Page\FrameStatic("title");
	$frame->startDynamicArea();
	?><script type="text/javascript">document.title = "<?showJsTitle()?>";</script><?
	$frame->finishDynamicArea();
}

$isExtranet = isModuleInstalled("extranet") && COption::GetOptionString("extranet", "extranet_site") === SITE_ID;;
$APPLICATION->ShowViewContent("im-fullscreen");
?>
<table class="bx-layout-table">
	<tr>
		<td class="bx-layout-header">
			<? if ((!IsModuleInstalled("bitrix24") || $USER->IsAdmin()) && !defined("SKIP_SHOW_PANEL")):?>
				<div id="panel">
				<?$APPLICATION->ShowPanel();?>
				</div>
			<? endif ?>
<?
if(\Bitrix\Main\ModuleManager::isModuleInstalled('bitrix24'))
{
	if(\Bitrix\Main\Config\Option::get('bitrix24', 'creator_confirmed', 'N') !== 'Y')
	{
		$APPLICATION->IncludeComponent(
			'bitrix:bitrix24.creatorconfirmed',
			'',
			array(),
			null,
			array('HIDE_ICONS' => 'Y')
		);
	}

	if(
		\Bitrix\Main\Config\Option::get("bitrix24", "domain_changed", 'N') === 'N'
		|| is_array(\CUserOptions::GetOption('bitrix24', 'domain_changed', false))
	)
	{
		CJSCore::Init(array('b24_rename'));
	}
}
?>
			<div id="header">
				<div id="header-inner">


					<div class="header-logo-block "><?
						$APPLICATION->ShowViewContent("sitemap");
						?><span class="header-logo-block-util"></span><?
						if (CModule::IncludeModule("bitrix24")):
							?><a id="logo_24_a" href="<?=SITE_DIR?>" title="<?=GetMessage("BITRIX24_LOGO_TOOLTIP")?>" class="logo"><?
								$clientLogo = COption::GetOptionInt("bitrix24", "client_logo", "");
								$siteTitle = trim(COption::GetOptionString("bitrix24", "site_title", ""));
								if(strlen($siteTitle) <= 0)
								{
									$siteTitle = GetMessage('BITRIX24_SITE_TITLE_DEFAULT');
								}
								?>
								<span id="logo_24_text" <?if ($clientLogo):?>style="display:none"<?endif?>>
									<span class="logo-text">LOGO</span><?
									if(COption::GetOptionString("bitrix24", "logo24show", "Y") !=="N"):?><span class="logo-color">24</span><?endif?>
								</span>

<?
							if(\CBitrix24::IsPortalAdmin($USER->GetID())):
								if(!\CBitrix24::isDomainChanged()):
?>
								<div class="header-logo-block-settings header-logo-block-settings-show">
									<span id="b24_rename_button" class="header-logo-block-settings-item" onclick="BX.Bitrix24.renamePortal(); return false;" title="<?=GetMessage('BITRIX24_SETTINGS_TITLE')?>"></span>
								</div>
<?
								else:
?>
								<div class="header-logo-block-settings">
									<span id="b24_rename_button" class="header-logo-block-settings-item" onclick="location.href='<?=CBitrix24::PATH_CONFIGS?>'; return false;" title="<?=GetMessage('BITRIX24_SETTINGS_TITLE_RENAMED')?>"></span>
								</div>
<?
								endif;
								if(isset($_SESSION['B24_SHOW_RENAME_POPUP_HINT']))
								{
									unset($_SESSION['B24_SHOW_RENAME_POPUP_HINT']);
?>
								<script>BX.ready(function(){if(!!BX.Bitrix24&&!!BX.Bitrix24.renamePortal){BX.Bitrix24.renamePortal.showNotify()}})</script>
<?
								}
							endif;
?>
							</a>
						<?
						else:
							$logoID = COption::GetOptionString("main", "wizard_site_logo", "", SITE_ID);
							?><a id="logo_24_a" href="<?=SITE_DIR?>" title="<?=GetMessage("BITRIX24_LOGO_TOOLTIP")?>" class="logo">
								<?if ($logoID):
									$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_name.php"), false);?>
								<?else:
									?>            <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/logo_extranet.php"
                            )
                        );?>
								<?endif?>
							</a>
						<?endif?>

					</div>
                    <div class="col-md-5 search-title pull-left">

                        <?$APPLICATION->IncludeComponent(
                            "bitrix:search.title",
                            "av-extranet",
                            array(
                                "NUM_CATEGORIES" => "5",
                                "TOP_COUNT" => "5",
                                "CHECK_DATES" => "N",
                                "SHOW_OTHERS" => "Y",
                                "PAGE" => "#SITE_DIR#search/index.php",
                                "CATEGORY_0_TITLE" => GetMessage("BITRIX24_SEARCH_EMPLOYEE"),
                                "CATEGORY_0" => array(
                                ),
                                "CATEGORY_1_TITLE" => GetMessage("BITRIX24_SEARCH_GROUP"),
                                "CATEGORY_1" => array(
                                ),
                                "CATEGORY_2_TITLE" => GetMessage("BITRIX24_SEARCH_MENUITEMS"),
                                "CATEGORY_2" => array(
                                ),
                                "CATEGORY_3_TITLE" => "CRM",
                                "CATEGORY_3" => array(
                                    0 => "crm",
                                ),
                                "CATEGORY_4_TITLE" => GetMessage("BITRIX24_SEARCH_MICROBLOG"),
                                "CATEGORY_4" => array(
                                    0 => "blog",
                                    1 => "microblog",
                                ),
                                "CATEGORY_OTHERS_TITLE" => GetMessage("BITRIX24_SEARCH_OTHER"),
                                "SHOW_INPUT" => "N",
                                "INPUT_ID" => "search-textbox-input",
                                "CONTAINER_ID" => "search",
                                "USE_LANGUAGE_GUESS" => "N",
                                "COMPONENT_TEMPLATE" => "av-extranet",
                                "ORDER" => "date",
                                "CATEGORY_4_blog" => array(
                                    0 => "all",
                                )
                            ),
                            false
                        );

                        $profileLink = $isExtranet ? SITE_DIR."contacts/personal" : SITE_DIR."company/personal";
                        ?>
                    </div>

                    <?
                    //This component was used for menu-create-but.
                    //We have to include the component before bitrix:timeman for composite mode.
                    if (CModule::IncludeModule('tasks') && CBXFeatures::IsFeatureEnabled('Tasks')):
                        $APPLICATION->IncludeComponent(
                            "bitrix:tasks.iframe.popup",
                            ".default",
                            array(
                                "ON_TASK_ADDED" => "#SHOW_ADDED_TASK_DETAIL#",
                                "ON_TASK_CHANGED" => "BX.DoNothing",
                                "ON_TASK_DELETED" => "BX.DoNothing"
                            ),
                            null,
                            array("HIDE_ICONS" => "Y")
                        );
                    endif;


                    CJSCore::Init("timer");?>
                    <div class="col-md-5 pull-right headder-custom" >

                        <div class="timeman-wrap col-md-3">
							<span id="timeman-block" class="timeman-block">
								<span class="bx-time" id="timeman-timer"></span>
							</span>
                        </div>
                        <div class="col-md-4 phone-headder text-center">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/headderPhone.php"
                            )
                        );?>
                        </div>
                        <div class="col-md-4 text-center">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:sale.basket.basket.line",
                                "extranet-headder",
                                array(
                                    "HIDE_ON_BASKET_PAGES" => "N",
                                    "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
                                    "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
                                    "PATH_TO_PERSONAL" => SITE_DIR."personal/",
                                    "PATH_TO_PROFILE" => SITE_DIR."personal/",
                                    "PATH_TO_REGISTER" => SITE_DIR."login/",
                                    "POSITION_FIXED" => "N",
                                    "POSITION_HORIZONTAL" => "right",
                                    "POSITION_VERTICAL" => "top",
                                    "SHOW_AUTHOR" => "N",
                                    "SHOW_DELAY" => "N",
                                    "SHOW_EMPTY_VALUES" => "N",
                                    "SHOW_IMAGE" => "Y",
                                    "SHOW_NOTAVAIL" => "N",
                                    "SHOW_NUM_PRODUCTS" => "Y",
                                    "SHOW_PERSONAL_LINK" => "N",
                                    "SHOW_PRICE" => "Y",
                                    "SHOW_PRODUCTS" => "N",
                                    "SHOW_SUBSCRIBE" => "Y",
                                    "SHOW_SUMMARY" => "Y",
                                    "SHOW_TOTAL_PRICE" => "N",
                                    "COMPONENT_TEMPLATE" => "extranet-headder",
                                    "PATH_TO_AUTHORIZE" => ""
                                ),
                                false
                            );?>
                        </div>
                    </div>

                    <script type="text/javascript">BX.ready(function() {
                            BX.timer.registerFormat("bitrix24_time", B24.Timemanager.formatCurrentTime);
                            BX.timer({
                                container: BX("timeman-timer"),
                                display : "bitrix24_time"
                            });
                        });</script>


                    <!--suppress CheckValidXmlInScriptTagBody -->
                    <script type="text/javascript" data-skip-moving="true">
                        (function() {
                            var isAmPmMode = <?=(IsAmPmMode() ? "true" : "false") ?>;
                            var time = document.getElementById("timeman-timer");
                            var hours = new Date().getHours();
                            var minutes = new Date().getMinutes();
                            if (time)
                            {
                                time.innerHTML = formatTime(hours, minutes, 0, isAmPmMode);
                            }
                            else if (document.addEventListener)
                            {
                                document.addEventListener("DOMContentLoaded", function() {
                                    time.innerHTML = formatTime(hours, minutes, 0, isAmPmMode);
                                });
                            }

                            function formatTime(hours, minutes, seconds, isAmPmMode)
                            {
                                var ampm = "";
                                if (isAmPmMode)
                                {

                                    ampm = hours >= 12 ? "PM" : "AM";
                                    ampm = '<span class="time-am-pm">' + ampm + '</span>';
                                    hours = hours % 12;
                                    hours = hours ? hours : 12;
                                }
                                else
                                {
                                    hours = hours < 10 ? "0" + hours : hours;
                                }

                                return	'<span class="time-hours">' + hours + '</span>' + '<span class="time-semicolon">:</span>' +
                                    '<span class="time-minutes">' + (minutes < 10 ? "0" + minutes : minutes) + '</span>' + ampm;
                            }
                        })();
                    </script>

                    </div>

                    <?
					$APPLICATION->IncludeComponent(
						"bitrix:system.auth.form",
						"",
						array(
							"PATH_TO_SONET_PROFILE" => $profileLink."/user/#user_id#/",
							"PATH_TO_SONET_PROFILE_EDIT" => $profileLink."/user/#user_id#/edit/",
							"PATH_TO_SONET_EXTMAIL_SETUP" => $profileLink."/mail/?config",
							"PATH_TO_SONET_EXTMAIL_MANAGE" => $profileLink."/mail/manage/"
						),
						false
					);?>
				</div>
			</div>

		</td>
	</tr>
	<tr>
		<td class="bx-layout-cont">
		<?
			$leftColumnClass = "";
			if (CUserOptions::GetOption("intranet", "left_menu_collapsed") === "Y")
			{
				$leftColumnClass .= " menu-collapsed-mode";
			}

			$imBarExists =
				CModule::IncludeModule("im") &&
				CBXFeatures::IsFeatureEnabled("WebMessenger") &&
				!defined("BX_IM_FULLSCREEN")
			;

			if ($imBarExists)
			{
				$leftColumnClass .= " im-bar-mode";
			}
		?>
			<table class="bx-layout-inner-table<?=$leftColumnClass?>">
				<tr class="bx-layout-inner-top-row">
					<td class="bx-layout-inner-left" id="layout-left-column">
						<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"left_vertical", 
	array(
		"ROOT_MENU_TYPE" => isModuleInstalled("bitrix24")?"superleft":"top",
		"CHILD_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_TIME" => "604800",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_USE_USERS" => "Y",
		"CACHE_SELECTED_ITEMS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "left_vertical",
		"MENU_THEME" => "site"
	),
	false
);

						if ($imBarExists)
						{
							//This component changes user counters on the page.
							//User counters can be changed in the left menu (left_vertical template).
							$APPLICATION->IncludeComponent(
								"bitrix:im.messenger",
								"",
								array(
									"CONTEXT" => "POPUP-FULLSCREEN",
									"RECENT" => "Y",
									"PATH_TO_SONET_EXTMAIL" => SITE_DIR."company/personal/mail/"
								),
								false,
								array("HIDE_ICONS" => "Y")
							);
						}
						?>

						<div id="feed-up-btn-wrap" class="feed-up-btn-wrap" title="<?=GetMessage("BITRIX24_UP")?>" onclick="B24.goUp();">
							<div class="feed-up-btn">
								<span class="feed-up-text"><?=GetMessage("BITRIX24_UP")?></span>
								<span class="feed-up-btn-icon"></span>
							</div>
						</div>
					</td>
					<td class="bx-layout-inner-center" id="content-table">
					<?
					if ($isCompositeMode && !$isIndexPage)
					{
						$dynamicArea = new \Bitrix\Main\Page\FrameStatic("workarea");
						$dynamicArea->setAssetMode(\Bitrix\Main\Page\AssetMode::STANDARD);
						$dynamicArea->setContainerId("content-table");
						$dynamicArea->setStub('
							<table class="bx-layout-inner-inner-table">
								<colgroup>
									<col class="bx-layout-inner-inner-cont">
								</colgroup>
								<tr class="bx-layout-inner-inner-top-row">
									<td class="bx-layout-inner-inner-cont">
										<div class="pagetitle-wrap"></div>
									</td>
								</tr>
								<tr>
									<td class="bx-layout-inner-inner-cont">
										<div id="workarea">
											<div id="workarea-content">
												<div class="workarea-content-paddings">
													<div class="b24-loader" id="b24-loader"><div class="b24-loader-curtain"></div></div>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</table>
							<script>B24.showLoading();</script>'
						);
						$dynamicArea->startDynamicArea();
					}
					?>
						<table class="bx-layout-inner-inner-table <?$APPLICATION->ShowProperty("BodyClass");?>">
							<colgroup>
								<col class="bx-layout-inner-inner-cont">
							</colgroup>
							<?if (!$isIndexPage):?>
							<tr class="bx-layout-inner-inner-top-row">
								<td class="bx-layout-inner-inner-cont">
									<div class="page-header">
										<?
										$APPLICATION->ShowViewContent("above_pagetitle");
										$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_horizontal", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "604800",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_USE_USERS" => "Y",
		"CACHE_SELECTED_ITEMS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "top_horizontal",
		"CHILD_MENU_TYPE" => "left",
		"MENU_THEME" => "site"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);
										?>

										<div class="pagetitle-wrap">
											<div class="pagetitle-inner-container">
						
												<div class="pagetitle">
                                                    <span id="pagetitle" class="pagetitle-item"><b><?$APPLICATION->ShowTitle(false);?></b></span>
													<span class="pagetitle-star" id="pagetitle-star"></span>
												</div>
												<?$APPLICATION->ShowViewContent("inside_pagetitle")?>
											</div>
										</div>
                                        <div class="test-wrap">

                                            <div class="pull-left">
                                                <?$APPLICATION->IncludeComponent(
                                                    "bitrix:breadcrumb",
                                                    "av",
                                                    array(
                                                        "START_FROM" => "0",
                                                        "PATH" => "",
                                                        "SITE_ID" => "s1",
                                                        "COMPONENT_TEMPLATE" => "av"
                                                    ),
                                                    false
                                                );?>
                                            </div>

                                                <?
                                                $pieces = explode("/",  $_SERVER['REQUEST_URI']);
                                                
                                                if($pieces["2"] != "search"){?>
                                            <div class="pull-right">
                                                <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.search", 
	"av", 
	array(
		"ACTION_VARIABLE" => "action",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BASKET_URL" => "/cart/index.php",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"COMPONENT_TEMPLATE" => "av",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "UAH",
		"DETAIL_URL" => "#SERVER_NAME#/partners/catalog/#IBLOCK_CODE#//#ELEMENT_CODE#/",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "139",
		"IBLOCK_TYPE" => "catalog_products",
		"LINE_ELEMENT_COUNT" => "5",
		"NO_WORD_LOGIC" => "Y",
		"OFFERS_CART_PROPERTIES" => array(
			0 => "CML2_LINK",
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "ID",
			1 => "CODE",
			2 => "XML_ID",
			3 => "NAME",
			4 => "TAGS",
			5 => "SORT",
			6 => "PREVIEW_TEXT",
			7 => "PREVIEW_PICTURE",
			8 => "DETAIL_TEXT",
			9 => "DETAIL_PICTURE",
			10 => "DATE_ACTIVE_FROM",
			11 => "ACTIVE_FROM",
			12 => "DATE_ACTIVE_TO",
			13 => "ACTIVE_TO",
			14 => "SHOW_COUNTER",
			15 => "SHOW_COUNTER_START",
			16 => "IBLOCK_TYPE_ID",
			17 => "IBLOCK_ID",
			18 => "IBLOCK_CODE",
			19 => "IBLOCK_NAME",
			20 => "IBLOCK_EXTERNAL_ID",
			21 => "DATE_CREATE",
			22 => "CREATED_BY",
			23 => "CREATED_USER_NAME",
			24 => "TIMESTAMP_X",
			25 => "MODIFIED_BY",
			26 => "USER_NAME",
			27 => "",
		),
		"OFFERS_LIMIT" => "0",
		"OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_SORT_FIELD" => "name",
		"OFFERS_SORT_FIELD2" => "shows",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"PAGER_DESC_NUMBERING" => "Y",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "av_corp",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "30",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => "",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"RESTART" => "N",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "#SERVER_NAME#/partners/catalog/#IBLOCK_CODE#/",
		"SHOW_PRICE_COUNT" => "1",
		"USE_LANGUAGE_GUESS" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>
                                            </div>
                                        <?}?>
                                        </div>

										<div class="pagetitle-below"><?$APPLICATION->ShowViewContent("below_pagetitle")?></div>
									</div>
								</td>
							</tr>
							<?endif?>
							<tr>
								<td class="bx-layout-inner-inner-cont">

									<div id="workarea">
										<?if($APPLICATION->GetProperty("HIDE_SIDEBAR", "N") != "Y"):
											?><div id="sidebar"><?
											$APPLICATION->ShowViewContent("sidebar");
											$APPLICATION->ShowViewContent("sidebar_tools_1");
											$APPLICATION->ShowViewContent("sidebar_tools_2");
											?></div>
										<?endif?>
										<div id="workarea-content">
											<div class="workarea-content-paddings">
											<?$APPLICATION->ShowViewContent("topblock")?>
											<?if ($isIndexPage):?>
												<div class="pagetitle-wrap">
													<div class="pagetitle-menu" id="pagetitle-menu"><?$APPLICATION->ShowViewContent("pagetitle")?></div>
													<div class="pagetitle" id="pagetitle"><?$APPLICATION->ShowTitle(false);?></div>
													<?$APPLICATION->ShowViewContent("inside_pagetitle")?>
												</div>
											<?endif?>
											<?CPageOption::SetOptionString("main.interface", "use_themes", "N"); //For grids?>

