<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$GLOBALS['INTRANET_TOOLBAR']->Show();

$current_filter = $_REQUEST['current_filter'] == 'adv' ? 'adv' : 'simple';

$arParams['CURRENT_FILTER'] = $current_filter;
?>

    <div id="peopleSearch">
            <input type="text" name = "telephoneSearch" class="telephoneSearch" value="Искать по телефону, фамилии, городу ..."/><input type="submit" name="res" class="res" disabled value="Поиск">
        <input type="submit" name = "resetFilter" id="filterNow" class="res" disabled value="Сбросить фильтр"/>
        <?if ($USER->IsAdmin()):?>
            <input type="checkbox" name="activeUser" checked/><span>Не показывать уволенных</span>
        <?endif;?>
<?
if (($arParams['CURRENT_VIEW'] == 'list' && $arParams['LIST_VIEW'] == 'group') || ($arParams['CURRENT_VIEW'] == 'table' && $arParams['TABLE_VIEW'] == 'group_table'))
{
	$arParams['SHOW_NAV_TOP'] = 'N';
	$arParams['SHOW_NAV_BOTTOM'] = 'N';
	$arParams['USERS_PER_PAGE'] = 0;
}

$arParams['USER_PROPERTY'] = $arParams['CURRENT_VIEW'] == 'list' ?
	($arParams['LIST_VIEW'] == 'group' ? $arParams['USER_PROPERTY_GROUP'] : $arParams['USER_PROPERTY_LIST']):
	$arParams['USER_PROPERTY_TABLE'];

/*echo '<pre>'; print_r($arParams); echo '</pre>';
/**/
?>
<div id = "resultTable" data-component-params="<?=base64_encode(serialize($arParams))?>" data-view = "<?=$arParams['TABLE_VIEW']?>" data-component = "<?=$component?>" data-search="" data-filter-option="">

<?

$APPLICATION->IncludeComponent("telephone_list:intranet.structure.list", ($arParams['CURRENT_VIEW'] == 'list' ? $arParams['LIST_VIEW'] : ($arParams['TABLE_VIEW']!=''?$arParams['TABLE_VIEW']:'')), $arParams, $component, array('HIDE_ICONS' => 'Y'));
?>
</div>
    </div>

