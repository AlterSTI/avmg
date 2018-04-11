<?
use
	\Bitrix\Main\Page\Asset,
	\Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

Loc::loadMessages(SERVER_ROOT.SITE_NAME.$this->GetFolder()."/template.php");

CJSCore::Init(["av", "font_awesome"]);
Asset::getInstance()->addCss($this->GetFolder()."/style/section.css");
Asset::getInstance()->addJs ($this->GetFolder()."/script/section.js");
/* -------------------------------------------------------------------- */
/* ------------------------- subsections html ------------------------- */
/* -------------------------------------------------------------------- */
$subsectionsHtml = "";
ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:catalog.section.list", "av_slider",
		[
		"IBLOCK_TYPE"  => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"    => $arParams["IBLOCK_ID"],
		"SECTION_ID"   => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],

		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],

		"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
		"CACHE_TIME"   => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

		"ADD_SECTIONS_CHAIN" => "N"
		]
	);
$subsectionsHtml = ob_get_contents();
ob_end_clean();
/* -------------------------------------------------------------------- */
/* --------------------------- filter html ---------------------------- */
/* -------------------------------------------------------------------- */
$filterHtml = "";
ob_start();
if($arParams["USE_FILTER"] == "Y")
	$APPLICATION->IncludeComponent
		(
		"bitrix:catalog.smart.filter", "av",
			[
			"IBLOCK_TYPE"        => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID"          => $arParams["IBLOCK_ID"],
			"SECTION_ID"         => $arResult["VARIABLES"]["SECTION_ID"],
			"SECTION_CODE"       => $arResult["VARIABLES"]["SECTION_CODE"],
			"FILTER_NAME"        => $arParams["FILTER_NAME"],
			"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],

			"SEF_MODE"          => $arParams["SEF_MODE"],
			"SEF_RULE"          => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
			"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],

			"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
			"CACHE_TIME"   => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

			"SAVE_IN_SESSION"   => "N",

			"PRICE_CODE"       => $arParams["PRICE_CODE"],
			"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
			"CURRENCY_ID"      => $arParams["CURRENCY_ID"]
			]
		);
$filterHtml = ob_get_contents();
ob_end_clean();
/* -------------------------------------------------------------------- */
/* ------------------------------- page ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-catalog section">
	<?
	/* ------------------------------------------- */
	/* ------------- page controller ------------- */
	/* ------------------------------------------- */
	?>
	<div class="page-controller-cell">
		<div class="title"><?=Loc::getMessage("AV_CATALOG_SECTION_PAGE_SIZE")?>:</div>
		<div class="size-selector">
			<?
			$listValues = [];
			foreach($arParams["PAGE_SIZE_VALUES"] as $value) $listValues[$value] = $value;

			$APPLICATION->IncludeComponent
				(
				"av:form.select", "av-shop-noscroll",
					[
					"VALUE" => $arResult["SECTION_PAGE_SIZE"],
					"NAME"  => "av_catalog_page_size",
					"LIST"  => $listValues
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>

		<?if(count($arResult["SECTION_PAGE_TYPE_VALUES"])):?>
		<div class="type-selector">
			<?foreach($arResult["SECTION_PAGE_TYPE_VALUES"] as $type => $title):?>
			<i
				class="
					<?if($type == "tablet"):?>  fa fa-th
					<?elseif($type == "list"):?>fa fa-th-list
					<?endif?>
					<?if($arResult["SECTION_PAGE_TYPE"] == $type):?>
					selected
					<?endif?>
					"
				data-type="<?=$type?>"
				title="<?=$title?>"
				tabindex="0"
			></i>
			<?endforeach?>
		</div>
		<?endif?>
	</div>
	<?
	/* ------------------------------------------- */
	/* ------------------ menu ------------------- */
	/* ------------------------------------------- */
	?>
	<div class="menu-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:catalog.section.list", "av-shop-vertical",
				[
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID"   => $arParams["IBLOCK_ID"],

				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],

				"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
				"CACHE_TIME"   => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

				"ADD_SECTIONS_CHAIN" => "N"
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
	</div>
	<?
	/* ------------------------------------------- */
	/* ------------------ body ------------------- */
	/* ------------------------------------------- */
	?>
	<div class="body-cell">
		<?if($filterHtml):?>
		<div class="filter-cell"><?=$filterHtml?></div>
		<?endif?>

		<?if($subsectionsHtml):?>
		<div class="subsections-cell"><?=$subsectionsHtml?></div>
		<?endif?>

		<div class="list-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:catalog.section", "av",
					[
					"IBLOCK_TYPE"  => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID"    => $arParams["IBLOCK_ID"],
					"SECTION_ID"   => $arResult["VARIABLES"]["SECTION_ID"],
					"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],

					"SECTION_USER_FIELDS"       => [],
					"FILTER_NAME"               => $arParams["FILTER_NAME"],
					"INCLUDE_SUBSECTIONS"       => $arParams["INCLUDE_SUBSECTIONS"],
					"SHOW_ALL_WO_SECTION"       => "N",
					"HIDE_NOT_AVAILABLE"        => $arParams["HIDE_NOT_AVAILABLE"],
					"HIDE_NOT_AVAILABLE_OFFERS" => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

					"ELEMENT_SORT_FIELD"  => $arParams["ELEMENT_SORT_FIELD"],
					"ELEMENT_SORT_ORDER"  => $arParams["ELEMENT_SORT_ORDER"],
					"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
					"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
					"OFFERS_SORT_FIELD"   => $arParams["OFFERS_SORT_FIELD"],
					"OFFERS_SORT_ORDER"   => $arParams["OFFERS_SORT_ORDER"],
					"OFFERS_SORT_FIELD2"  => $arParams["OFFERS_SORT_FIELD2"],
					"OFFERS_SORT_ORDER2"  => $arParams["OFFERS_SORT_ORDER2"],

					"PROPERTY_CODE"        => $arParams["LIST_PROPERTY_CODE"],
					"OFFERS_FIELD_CODE"    => $arParams["LIST_OFFERS_FIELD_CODE"],
					"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
					"PAGE_ELEMENT_COUNT"   => $arResult["SECTION_PAGE_SIZE"],

					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
					"DETAIL_URL"  => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],

					"SEF_MODE" => "N",

					"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
					"CACHE_TIME"   => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => $arParams["CACHE_FILTER"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

					"SET_TITLE"                => "Y",
					"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
					"ADD_SECTIONS_CHAIN"       => "Y",

					"PRICE_CODE"        => $arParams["PRICE_CODE"],
					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"CONVERT_CURRENCY"  => $arParams["CONVERT_CURRENCY"],
					"CURRENCY_ID"       => $arParams["CURRENCY_ID"],

					"PAGER_TEMPLATE"       => $arParams["PAGER_TEMPLATE"],
					"DISPLAY_TOP_PAGER"    => $arParams["DISPLAY_TOP_PAGER"],
					"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],

					"SET_STATUS_404" => $arParams["SET_STATUS_404"],
					"SHOW_404"       => $arParams["SHOW_404"],
					"MESSAGE_404"    => $arParams["MESSAGE_404"],
					"FILE_404"       => $arParams["FILE_404"],

					"PAGE_TYPE" => $arResult["SECTION_PAGE_TYPE"]
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
	</div>
</div>