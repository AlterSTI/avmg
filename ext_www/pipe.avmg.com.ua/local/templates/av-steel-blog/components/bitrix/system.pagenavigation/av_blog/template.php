<div class="blog-page-navigation">
<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if($arResult["NavPageCount"] <= 1)                              return;

$baseUrl = $arResult["sUrlPath"].($arResult["NavQueryString"] ? '?'.$arResult["NavQueryString"] : '');
$pageUrl = $baseUrl.($arResult["NavQueryString"] ? '&' : '?').'PAGEN_'.$arResult["NavNum"].'=';
?>
<div class="av-pager">
	<?
/* ------------------------------------------- */
	/* ----------------- "back" ------------------ */
	/* ------------------------------------------- */
	?>
	<?if($arResult["NavPageNomer"] > 1):?>
	<a class="pager-switch back" href="<?if(($arResult["NavPageNomer"]-1) == 1){echo($baseUrl);}else{echo('$baseUrl . ($arResult["NavPageNomer"]-1)');};
				?>"><</a>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* --------------- first page ---------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["NavPageNomer"] == 1):?><div class="page selected blog-page-current">1</div>
	<?else:?><a class="page" href="<?if(($arResult["NavPageNomer"]-1) == 1){echo($baseUrl);}else{echo('$baseUrl . ($arResult["NavPageNomer"]-1)');};
				?>">1</a>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* --------------- pages list ---------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["NavPageNomer"] >= 5):?><div class="space">...</div><?endif?>
	<?if($arResult["NavPageNomer"] >= 3):?><div class="space mobile">...</div><?endif?>

	<?foreach([$arResult["NavPageNomer"] - 2, $arResult["NavPageNomer"] - 1, $arResult["NavPageNomer"], $arResult["NavPageNomer"] + 1, $arResult["NavPageNomer"] + 2] as $page):?>
		<?if($page >= 2 && $page <= $arResult["NavPageCount"] - 1):?>
			<?if($page == $arResult["NavPageNomer"]):?><div class="page additional selected blog-page-current"><?=$page?></div>
			<?else:?>                                  <a class="page additional" href="<?=$pageUrl.$page?>"><?=$page?>A</a>
			<?endif?>
		<?endif?>
	<?endforeach?>

	<?if($arResult["NavPageNomer"] <= $arResult["NavPageCount"] - 4):?><div class="space">...</div><?endif?>
	<?if($arResult["NavPageNomer"] <= $arResult["NavPageCount"] - 2):?><div class="space mobile">...</div><?endif?>
	<?
	/* ------------------------------------------- */
	/* ---------------- last page ---------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["NavPageNomer"] == $arResult["NavPageCount"]):?><div class="page selected blog-page-current"><?=$arResult["NavPageCount"]?></div>
	<?else:?>                                                      <a class="page" href="<?=$pageUrl.$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ---------------- "forward" ---------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
	<a class="pager-switch next" href="<?=$pageUrl.($arResult["NavPageNomer"]+1)?>" rel="nofollow">></a>
	<?endif?>
</div>
</div>