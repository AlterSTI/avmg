<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!CModule::IncludeModule("catalog"))                          die();

global $USER_FIELD_MANAGER;
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
$iblockType          = "catalog_products";
$iblockNeedArray     = [];
$iblockSectionsArray = [];
/* -------------------------------------------------------------------- */
/* -------------------------- catalog query --------------------------- */
/* -------------------------------------------------------------------- */
$queryList = CCatalog::GetList
	(
	["SORT" => "ASC"],
		[
		"IBLOCK_TYPE_ID"    => $iblockType,
		"PRODUCT_IBLOCK_ID" => false,
		"ACTIVE"            => "Y",
		"SITE_ID"           => SITE_ID
		],
	false, false, ["ID"]
	);
while($queryElement = $queryList->GetNext()) $iblockNeedArray[] = $queryElement["ID"];
/* -------------------------------------------------------------------- */
/* --------------------------- menu adding ---------------------------- */
/* -------------------------------------------------------------------- */
if(count($iblockNeedArray))
	{
	$queryList = CIBlockSection::GetTreeList
		(
		["IBLOCK_ID" => $iblockNeedArray, "ACTIVE" => "Y"],
		false, ["ID", "NAME", "IBLOCK_ID", "SECTION_PAGE_URL", "DEPTH_LEVEL"]
		);
	while($queryElement = $queryList->GetNext()) $iblockSectionsArray[$queryElement["IBLOCK_ID"]][] = $queryElement;

	$queryList = CIBlock::GetList(["SORT" => "ASC"], ["ID" => $iblockNeedArray]);
	while($queryElement = $queryList->GetNext())
		{
		$iconFilePath = "";
		$iconFileId   = $USER_FIELD_MANAGER->GetUserFields("ASD_IBLOCK", $queryElement["ID"])["UF_ICON"]["VALUE"];
		if($iconFileId) $iconFilePath = CFile::GetPath($iconFileId);

		$aMenuLinks[] =
			[
			$queryElement["NAME"],
			str_replace
				(
				["#IBLOCK_ID#",       "#IBLOCK_CODE#",       "#SITE_DIR#"],
				[$queryElement["ID"], $queryElement["CODE"], ""],
				$queryElement["LIST_PAGE_URL"]
				),
			[],
			["ICON" => $iconFilePath]
			];

		foreach($iblockSectionsArray[$queryElement["ID"]] as $sectionInfo)
			$aMenuLinks[] =
				[
				$sectionInfo["NAME"],
				$sectionInfo["SECTION_PAGE_URL"],
				[],
				["DEPTH_LEVEL" => $sectionInfo["DEPTH_LEVEL"] + 1]
				];
		}
	}