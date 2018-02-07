<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["CATEGORIES"]))                             return;
/* -------------------------------------------------------------------- */
/* -------------------------- items refactor -------------------------- */
/* -------------------------------------------------------------------- */
$itemsImages    = [];
$sectionsImages = [];
$allResults     = [];

foreach($arResult["CATEGORIES"] as $catagoryIndex => $catagoryInfo)
	{
	if($catagoryIndex == "all")
		$allResults = $catagoryInfo["ITEMS"][0];

	foreach($catagoryInfo["ITEMS"] as $itemIndex => $itemInfo)
		{
		if(!$itemInfo["PARAM1"] && !$itemInfo["PARAM2"])
			{
			unset($arResult["CATEGORIES"][$catagoryIndex]["ITEMS"][$itemIndex]);
			continue;
			}

		$arResult["CATEGORIES"][$catagoryIndex]["ITEMS"][$itemIndex]["URL"]  = str_replace("index.php", "", $itemInfo["URL"]);
		$arResult["CATEGORIES"][$catagoryIndex]["ITEMS"][$itemIndex]["NAME"] = strip_tags($itemInfo["NAME"]);
		if($itemInfo["ITEM_ID"])
			{
			if(strpos($itemInfo["ITEM_ID"], "S") !== false) $sectionsImages[str_replace("S", "", $itemInfo["ITEM_ID"])] = "";
			else                                            $itemsImages[$itemInfo["ITEM_ID"]]                          = "";
			$arResult["CATEGORIES"][$catagoryIndex]["IMAGES"] = true;
			}
		}
	}
/* -------------------------------------------------------------------- */
/* --------------------------- images query --------------------------- */
/* -------------------------------------------------------------------- */
if(count($itemsImages))
	{
	$quetyList = CIBlockElement::GetList([], ["ID" => array_keys($itemsImages)], false, false, ["ID", "PREVIEW_PICTURE"]);
	while($quetyElement = $quetyList->GetNext())
		if($quetyElement["PREVIEW_PICTURE"])
			$itemsImages[$quetyElement["ID"]] = CFile::GetPath($quetyElement["PREVIEW_PICTURE"]);
	}
if(count($sectionsImages))
	{
	$quetyList = CIBlockSection::GetList([], ["ID" => array_keys($sectionsImages)], false, ["ID", "PICTURE"]);
	while($quetyElement = $quetyList->GetNext())
		if($quetyElement["PICTURE"])
			$sectionsImages["S".$quetyElement["ID"]] = CFile::GetPath($quetyElement["PICTURE"]);
	}
foreach($arResult["CATEGORIES"] as $catagoryIndex => $catagoryInfo)
	foreach($catagoryInfo["ITEMS"] as $itemIndex => $itemInfo)
		if($itemInfo["ITEM_ID"])
			$arResult["CATEGORIES"][$catagoryIndex]["ITEMS"][$itemIndex]["IMAGE"] = $itemsImages[$itemInfo["ITEM_ID"]] ? $itemsImages[$itemInfo["ITEM_ID"]] : $sectionsImages[$itemInfo["ITEM_ID"]];
/* -------------------------------------------------------------------- */
/* ------------------------------ output ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<?foreach($arResult["CATEGORIES"] as $categoryId => $catagoryInfo):?>
<div class="group-block">
	<?foreach($catagoryInfo["ITEMS"] as $itemInfo):?>
	<a class="item<?if($catagoryInfo["IMAGES"]):?> image<?endif?>" href="<?=$itemInfo["URL"]?>">
		<?if($catagoryInfo["IMAGES"]):?>
		<div class="image-block">
			<img
				src="<?=($itemInfo["IMAGE"] ? $itemInfo["IMAGE"] : $this->GetFolder()."/images/default_image.jpg")?>"
				alt="<?=$itemInfo["NAME"]?>"
				title="<?=$itemInfo["NAME"]?>"
			>
		</div>
		<?endif?>

		<div class="title">
			<?=$itemInfo["NAME"]?>
		</div>
	</a>
	<?endforeach?>
</div>
<?endforeach?>

<?if(count($allResults)):?>
<div class="group-block">
	<a class="all-results-link" href="<?=$allResults["URL"]?>">
		<?=$allResults["NAME"]?>
	</a>
</div>
<?endif?>