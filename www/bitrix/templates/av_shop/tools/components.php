<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$filePathExplode = explode(SITE_TEMPLATE_PATH, __FILE__);
Loc::loadMessages($filePathExplode[0].SITE_TEMPLATE_PATH."/template.php");
/* -------------------------------------------------------------------- */
/* -------------------------- call back form -------------------------- */
/* -------------------------------------------------------------------- */
?>
<div id="page-header-call-back-form">
	<i class="close fa fa-times"></i>
	<div class="title">
		<?=Loc::getMessage("AV_SHOP_CALL_BACK_FORM_TITLE")?>
	</div>
	<div class="separator"></div>
	<div class="body">
		<?$APPLICATION->IncludeFile("/include/call_back_form.php")?>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------------- sidebar ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div id="page-header-sidebar">
	<?
	/* ------------------------------------------- */
	/* --------------- user block ---------------- */
	/* ------------------------------------------- */
	?>
	<?if($userIsAuthorized):?>
		<div class="user-block" tabindex="0">
			<?if($userPersonalPhoto):?>
				<div class="icon-user">
					<img src="<?=$userPersonalPhoto?>" alt="<?=$userName?>" title="<?=$userName?>">
				</div>
			<?else:?>
				<i class="icon-default fa fa-user-circle"></i>
			<?endif?>

			<div class="title-block">
				<div class="title"><?=$userName?></div>
				<div class="arrow fa fa-angle-down"></div>
			</div>
		</div>

		<div class="user-menu">
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:menu", "av-naked",
					[
					"ROOT_MENU_TYPE"     => "user",
					"MAX_LEVEL"          => 1,
					"CHILD_MENU_TYPE"    => "",
					"USE_EXT"            => "Y",
					"DELAY"              => "N",
					"ALLOW_MULTI_SELECT" => "N",

					"MENU_CACHE_TYPE"       => "N",
					"MENU_CACHE_TIME"       => "",
					"MENU_CACHE_USE_GROUPS" => ""
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
			<a href="?logout=yes" rel="nofollow"><?=Loc::getMessage("AV_SHOP_LOGOUT")?></a>
		</div>
	<?else:?>
		<div class="guest-block">
			<i class="icon fa fa-user-circle"></i>
			<div class="title-block">
				<div data-header-login-button><?=Loc::getMessage("AV_SHOP_LOGIN")?></div>
				<?if($registrationAvailable):?>
				<div data-header-registration-button><?=Loc::getMessage("AV_SHOP_REGISTRATION")?></div>
				<?endif?>
			</div>
		</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ------------------ menu ------------------- */
	/* ------------------------------------------- */
	?>
	<div class="menu-block">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:menu", "av-shop-mobile",
				[
				"ROOT_MENU_TYPE"     => "top",
				"MAX_LEVEL"          => 2,
				"CHILD_MENU_TYPE"    => "left",
				"USE_EXT"            => "Y",
				"DELAY"              => "N",
				"ALLOW_MULTI_SELECT" => "Y",

				"MENU_CACHE_TYPE"       => "A",
				"MENU_CACHE_TIME"       => 360000,
				"MENU_CACHE_USE_GROUPS" => "Y"
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
	</div>
	<?
	/* ------------------------------------------- */
	/* ----------- lanfuages selector ------------ */
	/* ------------------------------------------- */
	?>
	<!--
	<div class="language-selector-block">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:main.site.selector", "av-round",
				[
				"SITE_LIST"  => ["AV", "SH", "EN"],
				"CACHE_TIME" => 3600000,
				"CACHE_TYPE" => "A"
				],
			false, ["HIDE_ICONS" => true]
			);
		?>
	</div>
	-->
	<?
	/* ------------------------------------------- */
	/* --------------- links block --------------- */
	/* ------------------------------------------- */
	?>
	<div class="links-block">
		<a href="<?=$templateVariables["COMPANY_INFO"]["SITE"]?>" target="_blank" rel="nofollow">
			<?=Loc::getMessage("AV_SHOP_COMPANY_SITE")?>
		</a>
		<a href="<?=$templateVariables["COMPANY_BASES_LINK"]?>" target="_blank" rel="nofollow">
			<?=Loc::getMessage("AV_SHOP_BASES")?>
		</a>
	</div>
</div>