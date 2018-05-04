<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();


/** ********************************************************************************************************************
******************************************************variables*********************************************************
***********************************************************************************************************************/

$bases                      = 0;
$resultUserIDs              = [];
$basesIDs                   = [];
$leftCoastIDs               = [];
$rightCoastIDs              = [];
$leftCoast                  = [];
$rightCoast                 = [];
$resultBasesOptions         = [];
$resultUserFields           = [];

$iblockId                   = (int) $arParams['IBLOCK_ID'];
$streamsInfoIblockId        = (int) $arParams['AV_BASES_STREAMS_INFO_IBLOCK'];
$managerStreamsId           = (int) $arParams['AV_BASES_STREAMS_MANAGER_STREAM'];

$alias                      = array_map(function ($val){return (string)$val;}, $arParams['AV_BASES_STREAMS_NAME_ALIAS']);
$alias                      = array_diff($alias, ['']);

$noDisplayItems             = array_map(function ($val){return (int)$val;}, $arParams['AV_BASES_STREAMS_NO_DISPLAY']);
$noDisplayItems             = array_diff($noDisplayItems, [0]);


$leftCoustItems             = array_map(function ($val){return (int)$val;}, $arParams['AV_BASES_STREAMS_LEFT_COAST']);
$leftCoustItems             = array_diff($leftCoustItems, [0]);

$rightCoustItems            = array_map(function ($val){return (int)$val;}, $arParams['AV_BASES_STREAMS_RIGHT_COAST']);
$rightCoustItems            = array_diff($rightCoustItems, [0]);

if( $iblockId                   <= 0 ||
    $streamsInfoIblockId        <= 0 ||
    $managerStreamsId           <= 0 ||
    count($noDisplayItems)      <= 0 ||
    count($leftCoustItems)      <= 0 ||
    count($rightCoustItems)     <= 0 ||
    count($alias)               <= 0
) return;


/** ********************************************************************************************************************
 ******************************************************getBasesIDs******************************************************
 ***********************************************************************************************************************/
foreach ($arResult["ITEMS"] as $bases) {
    if (array_search($bases['ID'],$noDisplayItems) !== false) continue;

    if (array_search($bases['ID'], $leftCoustItems) !== false) {
        $i = array_search($bases['ID'], $leftCoustItems);
        $leftCoastIDs[$i] = $bases['ID'];

        $leftCoast[$i]['BASE_ID'] = $bases['ID'];
        $leftCoast[$i]['IBLOCK_ID']     = $bases['IBLOCK_ID'];
        $leftCoast[$i]['cordinateX']    = $bases["PROPERTIES"]["cordinate_x"]["VALUE"];
        $leftCoast[$i]['cordinateY']    = $bases["PROPERTIES"]["cordinate_y"]["VALUE"];
        $leftCoast[$i]['OPEN_HOURSES']  = $bases["PROPERTIES"]['open_houres']['VALUE'];
        $leftCoast[$i]['ADDRESS']       = $bases["PROPERTIES"]['address']['VALUE']['TEXT'];
        $leftCoast[$i]['ADDRESS']       = substr($leftCoast[$i]['ADDRESS'], strpos($leftCoast[$i]['ADDRESS'], ',')+1);
        $leftCoast[$i]['GOOGLE_MARKER'] = 'https://'.$_SERVER['SERVER_NAME'].
                                           CFile::GetFileArray($bases["PROPERTIES"]["icon_google_maps_dnepr"]['VALUE'])['SRC'];

        if ($alias[$bases['ID']] && $alias[$bases['ID']] != ''){
            $leftCoast[$i]['NAME'] = $alias[$bases['ID']];
        } else {
            $leftCoast[$i]['NAME'] = $bases['NAME'];
        }

    } elseif (array_search($bases['ID'], $rightCoustItems) !== false) {
        $i = array_search($bases['ID'], $rightCoustItems);
        $rightCoastIDs[array_search($bases['ID'], $rightCoustItems)] = $bases['ID'];

        $rightCoast[$i]['BASE_ID'] = $bases['ID'];
        $rightCoast[$i]['IBLOCK_ID']    = $bases['IBLOCK_ID'];
        $rightCoast[$i]['cordinateX']   = $bases["PROPERTIES"]["cordinate_x"]["VALUE"];
        $rightCoast[$i]['cordinateY']   = $bases["PROPERTIES"]["cordinate_y"]["VALUE"];
        $rightCoast[$i]['OPEN_HOURSES'] = $bases["PROPERTIES"]['open_houres']['VALUE'];
        $rightCoast[$i]['ADDRESS']      = $bases["PROPERTIES"]['address']['VALUE']['TEXT'];
        $rightCoast[$i]['ADDRESS']       = substr($rightCoast[$i]['ADDRESS'], strpos($rightCoast[$i]['ADDRESS'], ',')+1);
        $rightCoast[$i]['GOOGLE_MARKER'] = 'https://'.$_SERVER['SERVER_NAME'].
                                            CFile::GetFileArray($bases["PROPERTIES"]["icon_google_maps_dnepr"]['VALUE'])['SRC'];
        if ($alias[$bases['ID']] && $alias[$bases['ID']] != ''){
            $rightCoast[$i]['NAME'] = $alias[$bases['ID']];
        } else {
            $rightCoast[$i]['NAME'] = $bases['NAME'];
        }
    }
}
ksort($rightCoastIDs);
ksort($leftCoastIDs);
$basesIDs = array_merge($rightCoastIDs, $leftCoastIDs);

//pre($basesIDs);

/** ********************************************************************************************************************
 ******************************************************getBasesInfo*****************************************************
 ***********************************************************************************************************************/
if (count($basesIDs) > 0) {
    $res = CIBlockElement::GetList
    (
        ['SORT' => 'ASC'],
        [
            "IBLOCK_ID" => $streamsInfoIblockId,
            "PROPERTY_BASE" => $basesIDs,
            "PROPERTY_STREAM" => $managerStreamsId
        ],
        false,
        false,
        ["ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "PROPERTY_MANAGER", "PROPERTY_PRICE", "PROPERTY_BASE"]
    );

    while ($ob = $res->Fetch()) {
        $resultBasesOptions[$ob['PROPERTY_BASE_VALUE']] = $ob;
        $resultUserIDs[$ob['PROPERTY_BASE_VALUE']] = $ob['PROPERTY_MANAGER_VALUE'][0];
    }
    //pre($resultBasesOptions);
    //pre($resultUserIDs);
}
/** ********************************************************************************************************************
 ******************************************************getUsersInfo*****************************************************
 ***********************************************************************************************************************/
if (count($resultUserIDs) > 0) {
    $rsUsers = CUser::GetList(
        $by = 'id',
        $order = 'asc',
        ['ID' => implode('|', $resultUserIDs)],
        [
            'FIELDS' => ['ID','NAME', 'LAST_NAME', 'WORK_PHONE']
        ]
    );
    while ($obUsers = $rsUsers->Fetch()) {

        $resultUserFields[$obUsers['ID']]['MANAGER_FIO']  = $obUsers['LAST_NAME'].' '.$obUsers['NAME'];
        $resultUserFields[$obUsers['ID']]['WORK_PHONE'] = $obUsers['WORK_PHONE'];
        switch (strlen($obUsers['WORK_PHONE'])){
            case '13':
                $resultUserFields[$obUsers['ID']]['PHONE'] =
                    '('.
                    $obUsers['WORK_PHONE'][3].
                    $obUsers['WORK_PHONE'][4].
                    $obUsers['WORK_PHONE'][5].
                    ') '.
                    $obUsers['WORK_PHONE'][6].
                    $obUsers['WORK_PHONE'][7].
                    $obUsers['WORK_PHONE'][8].
                    ' '.
                    $obUsers['WORK_PHONE'][9].
                    $obUsers['WORK_PHONE'][10].
                    ' '.
                    $obUsers['WORK_PHONE'][11].
                    $obUsers['WORK_PHONE'][12];
                break;
            default:
                $resultUserFields[$obUsers['ID']]['PHONE'] = $obUsers['WORK_PHONE'];
                break;
        }

    }
    //pre($resultUserFields);
}
/** ********************************************************************************************************************
 ******************************************************collectResult*****************************************************
 ***********************************************************************************************************************/
if (count($resultUserFields) > 0){

    foreach ($leftCoastIDs as $number => $id){
        $leftCoast[$number] = array_merge($leftCoast[$number], $resultUserFields[$resultUserIDs[$id]]);
        $leftCoast[$number]['PRICE'] = $resultBasesOptions[$id]['PROPERTY_PRICE_VALUE'];
    }
    foreach ($rightCoastIDs as $number => $id){
        $rightCoast[$number] = array_merge($rightCoast[$number], $resultUserFields[$resultUserIDs[$id]]);
        $rightCoast[$number]['PRICE'] = $resultBasesOptions[$id]['PROPERTY_PRICE_VALUE'];
    }

ksort($leftCoast);
ksort($rightCoast);
}


/** ********************************************************************************************************************
 ******************************************************form_$arResult['ITEMS']******************************************
 ***********************************************************************************************************************/

$arResult['ITEMS']                   = [];
$arResult['ITEMS']['LEFT_COAST']     = $leftCoast;
$arResult['ITEMS']['RIGHT_COAST']    = $rightCoast;