<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-lang-switcher">
	<?foreach($arResult["SITES"] as $siteInfo):?>
		<?if($siteInfo["CURRENT"] == 'Y'):?><span title="<?=$siteInfo["NAME"]?>"><?=strtoupper($siteInfo["LANG"])?></span>
		<?else:?>                           <a    title="<?=$siteInfo["NAME"]?>" href="<?=$siteInfo["LINK"]?>"><?=strtoupper($siteInfo["LANG"])?></a>
		<?endif?>
	<?endforeach?>
</div>