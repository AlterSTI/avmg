<?
use Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* ============================================================================================= */
/* ========================================= COUNTINGS ========================================= */
/* ============================================================================================= */
$currentPage         = $APPLICATION->GetCurPage(false);
$dirProperty         = $APPLICATION->GetDirPropertyList();
$workAreaType        = 'left_menu_page';
$leftMenuSeted       = false;
$useBreadcrumbs      = $dirProperty["NOT_SHOW_NAV_CHAIN"] == 'Y' ? false : true;
$availableMarkupType = ["container_page", "left_menu_page", "full_screen_page"];

foreach(["top", "left"] as $menuType)
{
    $menuObj = new CMenu($menuType);
    $menuObj->Init($APPLICATION->GetCurPage());
    if($menuType == 'left' && count($menuObj->arMenu)) $leftMenuSeted = true;

    foreach($menuObj->arMenu as $menuInfo)
    {
        $menuLink            = explode('?', $menuInfo[1])[0];
        $menuSubstring       = substr_count($currentPage, $menuLink)        ? true : false;
        $inheritWorkareaType = $menuInfo[3]["inherit_workarea_type"] == 'Y' ? true : false;

        if
        (
            in_array($menuInfo[3]["workarea_type"], $availableMarkupType)
            &&
            (
                $currentPage == $menuLink
                ||
                ($menuSubstring && $inheritWorkareaType)
            )
        )
            $workAreaType = $menuInfo[3]["workarea_type"];
        elseif
        (
            in_array($menuInfo[3]["children_workarea_type"], $availableMarkupType)
            &&
            $currentPage != $menuLink
            &&
            $menuSubstring
        )
            $workAreaType = $menuInfo[3]["children_workarea_type"];
    }
}

if(!$workAreaType && $leftMenuSeted)             $workAreaType   = 'left_menu_page';
if(!$workAreaType)                               $workAreaType   = 'container_page';
if($currentPage == SITE_DIR || ERROR_404 == 'Y') $workAreaType   = 'left_menu_page';
if($workAreaType == 'full_screen_page')          $useBreadcrumbs = false;
/* ============================================================================================= */
/* ========================================== DOCUMENT ========================================= */
/* ============================================================================================= */
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- HEAD ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <title><?$APPLICATION->ShowTitle()?></title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <?$APPLICATION->ShowHead();
		CJSCore::Init(["bootstrap", "font_awesome", "av_site"]);
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/script.js');
		?>
	</head>

	<body id="av-shpola">

<div id="panel"><?$APPLICATION->ShowPanel()?></div>

<headder>
<div class="col-md-12 headder-wrap">
    <div class="col-md-5 pull-left inline-flex align-center">

        <div class="col-md-5 col-sm-7 no-padding logo-wrap"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/logo_mobile.php'))?></div>
        <div class="col-md-7  no-padding hidden-sm hidden-xs"><div class="desktop-search-cell">
                <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                ".default",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => "/include/search.php",
                    "COMPONENT_TEMPLATE" => ".default",
                    "EDIT_TEMPLATE" => ""
                ),
                false
            );?>
            </div></div>
    </div>



    <div class="col-md-5 pull-right inline-flex align-center">
        <div class="col-md-3 no-padding"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/headderPhone.php'))?></div>
        <div class="col-md-2 no-padding lang-switch">LANG</div>
        <div class="col-md-2 no-padding">BELL</div>
        <div class="col-md-5 no-padding"><?
            $APPLICATION->IncludeComponent(
	"av:visit_site.user.panel",
	"edu_headder",
	array(
		"USER_MENU_TYPE" => "user",
		"REGISTRATION_SHOW_FIELDS" => array(
			0 => "EMAIL",
			1 => "NAME",
			2 => "LAST_NAME",
			3 => "PERSONAL_MOBILE",
		),
		"REGISTRATION_SHOW_USER_PROPS" => array(
		),
		"REGISTRATION_REQUIRED_FIELDS" => array(
		),
		"REGISTRATION_REQUIRED_USER_PROPS" => array(
		),
		"COMPONENT_TEMPLATE" => "edu_headder"
	),
	false
);
            ?>
        </div>

    </div>

</div>
</headder>


<div class="page-workarea <?=$workAreaType?>">
    <?if($workAreaType != 'full_screen_page'):?>
    <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">
        <?endif?>


        <?if($workAreaType == 'left_menu_page'):?>
        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs left-column">
            <div class="left-side-toggle"><svg height="20px" id="Layer_1" style="enable-background:new 0 0 20 20;" version="1.1" viewBox="0 0 20 20" width="20px" xml:space="preserve" <polygon points="352,128.4 319.7,96 160,256 160,256 160,256 319.7,416 352,383.6 224.7,256 "/></svg></div>
            <?
            $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "av_edu-vertical-left",
                array(
                    "ROOT_MENU_TYPE" => "left",
                    "MAX_LEVEL" => "1",
                    "CHILD_MENU_TYPE" => "left",
                    "USE_EXT" => "Y",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "N",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "360000",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "COMPONENT_TEMPLATE" => "av_edu-vertical-left",
                    "MENU_CACHE_GET_VARS" => array(
                    )
                ),
                false
            );?>
            <div class="bottom">
                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'sect'))?>
            </div>
        </div>
        <?if($useBreadcrumbs):?>
            <div class="page-breadcrumbs">
                <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"av", 
	array(
		"COMPONENT_TEMPLATE" => "av",
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "AV"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?><br>
            </div>
        <?endif?>
        <div class="col-lg-9 col-md-9 col-sm-11 col-xs-11 right-column">
            <?endif?>


