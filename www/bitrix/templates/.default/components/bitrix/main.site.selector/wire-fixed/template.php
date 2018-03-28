<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>

<ul class="wire-fixed-lang-drop" id = "wire-fixed-lang-drop">
    <li class="empty"></li>
    <?foreach ($arResult["SITES"] as $siteInfo):?>
        <?if ($siteInfo["CURRENT"] == 'Y'):?>
            <li class="lang-drop-list active">
                <span title="<?=$siteInfo['NAME']?>"><?=strtoupper($siteInfo['LANG'])?></span>
                <i class="fa fa-angle-down arrow" aria-hidden="true"></i>
            </li>
        <?endif?>
    <?endforeach;?>
    <li class="lang-drop-list-hide-part ">
        <ul>
            <?foreach ($arResult["SITES"] as $siteInfo):?>
                <?if ($siteInfo["CURRENT"] == 'N'):?>
                    <li>
                        <a title="<?=$siteInfo['NAME']?>" href="<?=$siteInfo['LINK']?>"><span class="not-active-langs"><?=strtoupper($siteInfo['LANG'])?></span></a>
                    </li>
                <?endif?>
            <?endforeach;?>
        </ul>
    </li>

</ul>
