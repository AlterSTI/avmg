<?
use Bitrix\Main\Localization\Loc;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/** **********************************************************************
 * edit buttons
 ************************************************************************/
foreach ($arResult['ITEMS'] as $item)
{
    $this->AddEditAction  ($item['ID'], $item['EDIT_LINK'],   CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'));
}
/** **********************************************************************
 * pager
 ************************************************************************/
?>
<?if ($arParams['DISPLAY_TOP_PAGER'] == 'Y' && strlen($arResult['NAV_STRING']) > 0):?>
<div class="av-bases-list-pager top">
    <?=$arResult['NAV_STRING']?>
</div>
<?endif?>
<?
/** **********************************************************************
 * empty list
 ************************************************************************/
?>
<?if (count($arResult['ITEMS']) <= 0):?>
<?=Loc::getMessage('AV_BASES_LIST_NO_ITEMS')?>
<?endif?>
<?
/** **********************************************************************
 * list
 ************************************************************************/
?>
<div class="av-bases-list">
<?foreach ($arResult['ITEMS'] as $item):?>
    <div
        id="<?=$this->GetEditAreaId($item['ID'])?>"
        class="
            item
            <?if ($item['PROPERTIES']['closed']['VALUE_XML_ID'] > 0):?>closed<?endif?>
            "
    >
        <h3 class="title">
            <a href="<?=$item['DETAIL_PAGE_URL']?>">
                <?if ($item['PROPERTIES']['closed']['VALUE_XML_ID'] > 0):?><?=Loc::getMessage('AV_BASES_LIST_CLOSED_PREFIX')?> <?endif?><?=$item['NAME']?>
            </a>
        </h3>
        <div class="content">
            <?if (strlen($item['PROPERTIES']['address']['VALUE']['TEXT']) > 0):?>
            <div class="value">
                <?=$item['PROPERTIES']['address']['VALUE']['TEXT']?>
            </div>
            <?endif?>

            <?if (count($item['PROPERTIES']['phone']['VALUE']) > 0):?>
            <div class="value">
                <?=implode(', ', $item['PROPERTIES']['phone']['VALUE'])?>
            </div>
            <?endif?>

            <?if (count($item['PROPERTIES']['STREAMS']['VALUE']) > 0):?>
            <div class="streams">
                <?foreach ($arResult['STREAMS_INFO'] as $stream => $streamParams):?>
                    <?if(in_array($stream, $item['PROPERTIES']['STREAMS']['VALUE'])):?>
                    <div
                        title="<?=$streamParams['NAME']?>"
                        style="width: <?=$streamParams['SVG_WIDTH']?>px;height: <?=$streamParams['SVG_HEIGHT']?>px"
                    >
                        <?=$arResult['STREAMS_INFO'][$stream]['SVG_CONTENT']?>
                    </div>
                    <?endif?>
                <?endforeach?>
            </div>
            <?endif?>
        </div>
        <a
            class="icon"
            href="<?=$item['DETAIL_PAGE_URL']?>"
            title="<?=Loc::getMessage('AV_BASES_LIST_SHOW_ON_MAP')?>"
            rel="nofollow"
        ></a>
    </div>
<?endforeach?>
</div>
<?
/** **********************************************************************
 * pager
 ************************************************************************/
?>
<?if ($arParams['DISPLAY_BOTTOM_PAGER'] == 'Y' && strlen($arResult['NAV_STRING']) > 0):?>
<div class="av-bases-list-pager bottom">
    <?=$arResult['NAV_STRING']?>
</div>
<?endif?>