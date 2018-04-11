<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/*echo '<pre>';
//print_r ($arParams);
print_r($arParams['NEED_SEARCH_STRING']);
//print_r(get_included_files());
//print_r($arResult);
echo '</pre>';/**/
if
	(
	!$arResult["NavShowAlways"]
	&&
	($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
	) return;

$strNavQueryString     = $arResult["NavQueryString"] ? $arResult["NavQueryString"].'&amp;' : '';
$strNavQueryStringFull = $arResult["NavQueryString"] ? '?'.$arResult["NavQueryString"]     : '';
/* -------------------------------------------------------------------- */
/* -------------------------------- bar ------------------------------- */
/* -------------------------------------------------------------------- */
/*
			$this->bFirstPrintNav - is first item call
			$this->NavPageNomer - number of current page
			$this->NavPageCount - total page count
			$this->NavPageSize - page size
			$this->NavRecordCount - records count
			$this->bShowAll - show "all" link
			$this->NavShowAll - is all shown
			$this->NavNum - number of navigation
			$this->bDescPageNumbering - reverse paging
			$this->nStartPage - first page in chain
			$this->nEndPage - last page in chain
			$strNavQueryString - query string
			$sUrlPath - current url
*/
?>
<div id="nav_res"></div>
<div class="av-cargo-navigation" id="navigation_ajax">
    <?//$arResult["NavPageNomer"] - номер вызванной страницы?>
	<?if($arResult["NavPageNomer"] > 1):?>
		<span
			class="prev"
			data-page="<?if($arResult["bSavePage"] || $arResult["NavPageNomer"] >= 2):?>
                           <?=$arResult["NavPageNomer"]-1?>
                       <?else:?>
                           <?=$arResult["NavPageNomer"]?>
                       <?endif?>
                      "
        >&lt;</span>
		<?if($arResult["nStartPage"] > 1):?>
			<span data-page="1">1</span>
			<?if ($arResult["nStartPage"] > 2):?>
			<div class="separator">...</div>
			<?endif?>
		<?endif?>
	<?endif?>

	<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
		<?if($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<span class="current"><?=$arResult["nStartPage"]?></span>
		<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
			<span data-page="<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></span>
		<?else:?>
			<span data-page="<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></span>
		<?endif?>
		<?$arResult["nStartPage"]++?>
	<?endwhile?>

	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["nEndPage"] < $arResult["NavPageCount"]):?>
			<?if($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):?>
			<div class="separator">...</div>
			<?endif?>
			<span data-page="<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></span>
		<?endif?>

		<span class="next" data-page="<?=($arResult["NavPageNomer"]+1)?>">&gt;</span>
	<?endif?>
</div>