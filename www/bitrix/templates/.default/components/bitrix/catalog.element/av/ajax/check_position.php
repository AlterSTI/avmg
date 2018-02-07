<?
use
	\Bitrix\Main\Application,
	\Bitrix\Main\Loader,
	\Bitrix\Sale\Basket,
	\Bitrix\Sale\Fuser;

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!Loader::includeModule("sale"))                              die();
if(!Loader::includeModule("catalog"))                           die();
/* -------------------------------------------------------------------- */
/* ----------------------------- variables ---------------------------- */
/* -------------------------------------------------------------------- */
$request                = Application::getInstance()->getContext()->getRequest();
$productId              = 0;
$parentProductId        = 0;
$productSectionId       = 0;
$parentProductSectionId = 0;
$productIblockId        = 0;
$parentProductIblockId  = 0;
$productName            = "";
$productQuantity        = (int) $request->getPost("quantity");
$siteId                 = $request->getPost("siteId");
$priceId                = CCatalogGroup::GetList ([], ["NAME" => $request->getPost("priceType")], false, false, ["ID"])->GetNext()["ID"];
$basketObject           = NULL;
$basketItemObject       = NULL;
$resultOutput           =
	[
	"result"          => "error",
	"productId"       => 0,
	"productQuantity" => 0
	];

$queryList = CIBlockElement::GetList([], ["ID" => (int) $request->getPost("productId")], false, false, ["ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID"]);
while($queryElement = $queryList->GetNext())
	{
	$productId        = $queryElement["ID"];
	$productSectionId = $queryElement["IBLOCK_SECTION_ID"];
	$productIblockId  = $queryElement["IBLOCK_ID"];
	$productName      = $queryElement["NAME"];
	}
if($productId)
	{
	$parentProductInfo = CCatalogSKU::GetProductInfo($productId);
	if(is_array($parentProductInfo))
		{
		$parentProductId       = $parentProductInfo["ID"];
		$parentProductIblockId = $parentProductInfo["IBLOCK_ID"];
		}
	}
if($parentProductId)
	{
	$queryList = CIBlockElement::GetList([], ["ID" => $parentProductId], false, false, ["ID", "IBLOCK_SECTION_ID"]);
	while($queryElement = $queryList->GetNext()) $parentProductSectionId = $queryElement["IBLOCK_SECTION_ID"];
	}

if($siteId)
	$basketObject = Basket::loadItemsForFUser(Fuser::getId(), $siteId);
if($basketObject && $productId)
	foreach($basketObject->getOrderableItems() as $object)
		if($object->getField("PRODUCT_ID") == $productId)
			{
			$basketItemObject = $object;
			break;
			}
/* -------------------------------------------------------------------- */
/* ------------------------- remove position -------------------------- */
/* -------------------------------------------------------------------- */
if($basketItemObject && !$productQuantity)
	{
	$resultOutput["productId"] = $basketItemObject->getField("PRODUCT_ID");
	$basketItemObject->delete();
	$basketObject->save();
	$resultOutput["result"] = "removed";
	}
/* -------------------------------------------------------------------- */
/* -------------------------- change position ------------------------- */
/* -------------------------------------------------------------------- */
elseif($basketItemObject && $productQuantity)
	{
	$basketItemObject->setField("QUANTITY", $productQuantity);
	$basketObject->save();
	$resultOutput["result"]          = "quantityChanged";
	$resultOutput["productId"]       = $basketItemObject->getField("PRODUCT_ID");
	$resultOutput["productQuantity"] = $basketItemObject->getField("QUANTITY");
	}
/* -------------------------------------------------------------------- */
/* --------------------------- add position --------------------------- */
/* -------------------------------------------------------------------- */
elseif($basketObject && $productId && $productQuantity && $priceId)
	{
	$basketNewItemObject  = $basketObject->createItem("catalog", $productId);
	$productPriceInfo     = CPrice::GetList([], ["PRODUCT_ID" => $productId, "CATALOG_GROUP_ID" => $priceId], false, false, ["PRICE", "CURRENCY"])->GetNext();
	$productDiscountInfo  = CCatalogDiscount::GetDiscountByProduct($productId, $USER->GetUserGroupArray(), "N", [$priceId], $siteId);
	$productSectionProps  = $parentProductIblockId && $parentProductSectionId
		? CIBlockSectionPropertyLink::GetArray($productIblockId, $parentProductSectionId)
		: CIBlockSectionPropertyLink::GetArray($productIblockId, $productSectionId);
	$productPropsInfo     = [];
	$productPropsSort     = 100;
	$iblockItemsNameQuery = [];
	/* ------------------------------------------- */
	/* ----------- product props value ----------- */
	/* ------------------------------------------- */
	foreach($productSectionProps as $propertyInfo)
		{
		$queryList = CIBlockElement::GetProperty($productIblockId, $productId, [], ["ID" => $propertyInfo["PROPERTY_ID"]]);
		while($queryElement = $queryList->GetNext())
			{
			$productPropsInfo[] =
				[
				"NAME"  => $queryElement["NAME"],
				"CODE"  => $queryElement["ID"],
				"VALUE" => $queryElement["VALUE_ENUM"] ? $queryElement["VALUE_ENUM"] : $queryElement["VALUE"],
				"SORT"  => $productPropsSort
				];
			if($queryElement["PROPERTY_TYPE"] == "E") $iblockItemsNameQuery[$queryElement["VALUE"]] = "";
			$productPropsSort += 100;
			}
		}
	/* ------------------------------------------- */
	/* --------- iblock items name query --------- */
	/* ------------------------------------------- */
	if(count($iblockItemsNameQuery))
		{
		$queryList = CIBlockElement::GetList([], ["ID" => array_keys($iblockItemsNameQuery)], false, false, ["ID", "NAME"]);
		while($queryElement = $queryList->GetNext())
			$iblockItemsNameQuery[$queryElement["ID"]] = $queryElement["NAME"];
		}
	foreach($productPropsInfo as $index => $propertyInfo)
		if($iblockItemsNameQuery[$propertyInfo["VALUE"]])
			$productPropsInfo[$index]["VALUE"] = $iblockItemsNameQuery[$propertyInfo["VALUE"]];

	$basketNewItemObject
		->setFields
			([
			"NAME"         => $productName,
			"QUANTITY"     => $productQuantity,
			"CURRENCY"     => $productPriceInfo["CURRENCY"],
			"LID"          => $siteId,
			"PRICE"        => CCatalogProduct::CountPriceWithDiscount($productPriceInfo["PRICE"], $productPriceInfo["CURRENCY"], $productDiscountInfo),
			"CUSTOM_PRICE" => "Y",
			]);
	$basketObject->save();

	if(count($productPropsInfo))
		{
		$basketPropertyCollection = $basketNewItemObject->getPropertyCollection();
		$basketPropertyCollection->setProperty($productPropsInfo);
		$basketPropertyCollection->save();
		}

	$resultOutput["result"]          = "created";
	$resultOutput["productId"]       = $basketNewItemObject->getField("PRODUCT_ID");
	$resultOutput["productQuantity"] = $basketNewItemObject->getField("QUANTITY");
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ output ------------------------------ */
/* -------------------------------------------------------------------- */
echo json_encode($resultOutput);