<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/*echo '<pre>';
print_r ($arParams);
//print_r($arParams['USER_PROPERTY']);
//print_r(get_included_files());

//print_r($arResult);
echo '</pre>';/**/
$bFirst = true;

	foreach ($arResult["VALUE"] as $ID => $res):
		$surl = GetIBlockElementLinkById($ID);
		if ($surl && strlen($surl) > 0)
			$res = '<a href="'.$surl.'">'.$res.'</a>';
	
		if (!$bFirst):
			?>, <?
		else:
			$bFirst = false;
		endif;

		?><span class="fields enumeration"><?=$res?></span><?
	endforeach;
?>