<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>

<ul class="wire-lang-drop" id = "wire-lang-drop">
    <li class="empty"></li>
    <?foreach ($arResult["SITES"] as $siteInfo):?>
        <?if ($siteInfo["CURRENT"] == 'Y'):?>
            <li class="lang-drop-list active">
                <span title="<?=$siteInfo['NAME']?>"><?=strtoupper($siteInfo['LANG'])?></span>
                <i class="fa fa-angle-down arrow" aria-hidden="true"></i>
            </li>
        <?endif?>
    <?endforeach;?>
    <li class="lang-drop-list-hide-part">
        <ul>
            <?foreach ($arResult["SITES"] as $siteInfo):?>
                <?if ($siteInfo["CURRENT"] == 'N'):?>
                    <li>
                        <a title="<?=$siteInfo['NAME']?>" href="<?=$siteInfo['LINK']?>"><?=strtoupper($siteInfo['LANG'])?></a>
                    </li>
                <?endif?>
            <?endforeach;?>
        </ul>
    </li>

</ul>
