<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/* --------------------------------------------------------------------- */
/* ------------------------------- params ------------------------------ */
/* --------------------------------------------------------------------- */
$arResult['REQUIRED']       = $arParams['REQUIRED'] == 'Y';
$arResult['DISABLED']       = $arParams['DISABLED'] == 'Y';
$arResult['NAME']           = trim($arParams['NAME']);
$arResult['VALUE']          = trim($arParams['VALUE']);
$arResult['TITLE']          = html_entity_decode($arParams['TITLE']);
$arResult['EMPTY_TITLE']    = html_entity_decode($arParams['EMPTY_TITLE']);
$arResult['LIST']           = is_array($arParams['LIST']) ? $arParams['LIST'] : [];
$arResult['ATTR']           = $arParams['ATTR'];

foreach ($arResult['LIST'] as $index => $value)
{
    $arResult['LIST'][$index] = html_entity_decode($value);
}

if (is_array($arResult['ATTR']))
{
	$attrArray = [];
	foreach ($arResult['ATTR'] as $index => $value)
    {
        $attrArray[] = $index.'="'.str_replace("'", "\"", $value).'"';
    }
	$arResult['ATTR'] = implode(' ', $attrArray);
}
/* --------------------------------------------------------------------- */
/* ------------------------------- output ------------------------------ */
/* --------------------------------------------------------------------- */
$this->IncludeComponentTemplate();