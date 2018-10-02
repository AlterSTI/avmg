<?php
$arOrder = array('ID' => 'DESC');
$arFilter = array(
    'IBLOCK_ID' => $arResult['IBLOCK_ID'],
    'WF_PARENT_ELEMENT_ID' => $arResult['ELEMENT_ID'],   // ID элемента
    'SHOW_HISTORY' => 'Y',
);
//pre($arResult["FIELDS"]);
$arSelect = array_merge(["ID", "CREATED_BY", "DATE_CREATE"], array_keys($arResult["FIELDS"]));
$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
while ($ar = $res->Fetch()){
    $arResult['HISTORY'][] = $ar;
}

foreach ($arResult["FIELDS"] as $key => $value){
    $arResult['HISTORY_FIELDS'][$key] = $value['NAME'];
}

foreach ($arResult['HISTORY'] as $key => $value) {
    foreach ($value as $k => $v) {
        if (($k != 'ID' && stristr($k, 'ID')) || ($k != 'DESCRIPTION' && stristr($k, 'DESCRIPTION'))) {
            unset($arResult['HISTORY'][$key][$k]);
        } else if ($k != 'VALUE' && stristr($k, '_VALUE')){
            $arResult['HISTORY'][$key][str_replace('_VALUE','', $k)] =  $arResult['HISTORY'][$key][$k];
            unset($arResult['HISTORY'][$key][$k]);
        }
    }
}

foreach ($arResult['HISTORY'] as $key => $value) {
    foreach ($value as $k => $v) {
        switch ($arResult["FIELDS"][$k]['TYPE']){
            case 'CREATED_BY':
            case 'MODIFIED_BY':
            case 'S:employee':
                $res = CUser::GetList($by="id", $order="desc", ['ID' => $arResult['HISTORY'][$key][$k]], ['ID', 'NAME', 'LAST_NAME']);
                if (intval($res->SelectedRowsCount()) === 1) {
                    while ($ar = $res->Fetch()) {
                        $arResult['HISTORY'][$key][$k] = '<a href="/company/personal/user/'.$arResult['HISTORY'][$key][$k].'/" target="_blank">'.$ar['NAME'] . ' ' . $ar['LAST_NAME'].'</a>';
                    }
                }
            break;
            case 'E':
                //pre($arResult["FIELDS"][$k]['LINK_IBLOCK_ID']);
                $res = CIBlockElement::GetList(
                    [],
                    [
                        'ID' => $arResult['HISTORY'][$key][$k],
                        'IBLOCK' => $arResult["FIELDS"][$k]['LINK_IBLOCK_ID']
                    ],
                    false,
                    false,
                    ['NAME']);
                if (intval($res->SelectedRowsCount()) === 1) {
                    while ($ar = $res->Fetch()) {
                        $arResult['HISTORY'][$key][$k] = $ar['NAME'];
                    }
                }
            break;
            case 'F':
                $val = '';
                if (is_array($arResult['HISTORY'][$key][$k])){
                    foreach ($arResult['HISTORY'][$key][$k] as $file){
                        $val.= '<a href="'.CFile::GetPath($file).'">Скачать</a><br/>';
                    }
                    $arResult['HISTORY'][$key][$k] = $val;
                }
            break;
        }
    }
}