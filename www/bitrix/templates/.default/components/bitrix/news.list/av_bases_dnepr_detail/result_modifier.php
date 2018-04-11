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
$resultBasesStreamsArray    = [];
$resultBasesStreams         = [];
$resStreamsOptions          = [];
$resultBasesOptionsArray    = [];
$resultUserIDsVsStreams     = [];

$iblockId                   = (int) $arParams['IBLOCK_ID'];
$streamsInfoIblockId        = (int) $arParams['AV_BASES_STREAMS_INFO_IBLOCK'];
$streamsInfoInfoIblockId    = (int) $arParams['AV_BASES_STREAMS_INFO_IBLOCK_ID'];
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
    $streamsInfoInfoIblockId    <= 0 ||
    count($noDisplayItems)      <= 0 ||
    count($leftCoustItems)      <= 0 ||
    count($rightCoustItems)     <= 0 ||
    count($alias)               <= 0
) return;


/** ********************************************************************************************************************
 ******************************************************getBasesIDs******************************************************
 ***********************************************************************************************************************/
//pre($arResult["ITEMS"]);
foreach ($arResult["ITEMS"] as $j=>$bases) {
    if (array_search($bases['ID'],$noDisplayItems) !== false) continue;

    if (array_search($bases['ID'], $leftCoustItems) !== false) {
        $i = array_search($bases['ID'], $leftCoustItems);
        $leftCoastIDs[$i] = $bases['ID'];

        $leftCoast[$i]['BASE_ID'] = $bases['ID'];
        $leftCoast[$i]['IBLOCK_ID']     = $bases['IBLOCK_ID'];
        $leftCoast[$i]['PICTURE']       = $bases['PREVIEW_PICTURE'];
        $leftCoast[$i]['cordinateX']    = $bases["PROPERTIES"]["cordinate_x"]["VALUE"];
        $leftCoast[$i]['cordinateY']    = $bases["PROPERTIES"]["cordinate_y"]["VALUE"];
        $leftCoast[$i]['OPEN_HOURSES']  = $bases["PROPERTIES"]['open_houres']['VALUE'];
        $leftCoast[$i]['ADDRESS']       = $bases["PROPERTIES"]['address']['VALUE']['TEXT'];
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
        $rightCoast[$i]['PICTURE']      = $bases['PREVIEW_PICTURE'];
        $rightCoast[$i]['cordinateX']   = $bases["PROPERTIES"]["cordinate_x"]["VALUE"];
        $rightCoast[$i]['cordinateY']   = $bases["PROPERTIES"]["cordinate_y"]["VALUE"];
        $rightCoast[$i]['OPEN_HOURSES'] = $bases["PROPERTIES"]['open_houres']['VALUE'];
        $rightCoast[$i]['ADDRESS']      = $bases["PROPERTIES"]['address']['VALUE']['TEXT'];
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
 ******************************************************getBasesStreamsIds***********************************************
 ***********************************************************************************************************************/
if (count($basesIDs) > 0) {

    $rsBases = CIBlockElement::GetList(
        ['SORT' => 'ASC'],
        [
            "ID" => $basesIDs,
            "IBLOCK_ID" => $iblockId
        ],
        false,
        false,
        ["ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "PROPERTY_STREAMS"]
    );
    while ($obBases = $rsBases->Fetch()) {
        $resultBasesStreams[$obBases['ID']] = $obBases['PROPERTY_STREAMS_VALUE'];
        $resultBasesStreamsArray = array_merge($resultBasesStreamsArray,$resultBasesStreams[$obBases['ID']]);
    }
    $resultBasesStreamsArray = array_unique($resultBasesStreamsArray);
    //$resultBasesStreams - массив направлений с привязкой к базам
    //$resultBasesStreamsArray - уникальный массив всех направлений
//pre($resultBasesStreams);
}
/** ********************************************************************************************************************
 ******************************************************getStreamsInfo***************************************************
 ***********************************************************************************************************************/
if (count($resultBasesStreamsArray) > 0){
    //
    $resStreamsOpt = CIBlockElement::GetList(
        ['SORT' => 'ASC'],
        [
            "ID"        => $resultBasesStreamsArray,
            "IBLOCK_ID" => $streamsInfoInfoIblockId
        ],
        false,
        false,
        ["ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "PROPERTY_ICON"]
    );
    while ($objStreams = $resStreamsOpt->Fetch()) {
        $resStreamsOptions[$objStreams['ID']] = $objStreams;
        $resStreamsOptions[$objStreams['ID']]['ICON'] = CFile::GetFileArray($objStreams['PROPERTY_ICON_VALUE'])['SRC'];
    }
//$resStreamsOptions - массив данных по опциям направлений с привязкой к направлению
//pre($resStreamsOptions);

}
/** ********************************************************************************************************************
 ******************************************************getBasesDopInfo**************************************************
 ***********************************************************************************************************************/
if (count($basesIDs) > 0) {
    //pre($basesIDs);
    foreach ($resultBasesStreamsArray as $stream) {
        $res = CIBlockElement::GetList
        (
            ['SORT' => 'ASC'],
            [
                "IBLOCK_ID" => $streamsInfoIblockId,//136
                "PROPERTY_BASE" => $basesIDs,
                "PROPERTY_STREAM" => $stream
            ],
            false,
            false,
            ["ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "PROPERTY_MANAGER", "PROPERTY_PRICE", "PROPERTY_BASE", "PROPERTY_STREAM"]
        );

        while ($ob = $res->Fetch()) {
            //$resultBasesOptions[$ob['PROPERTY_BASE_VALUE']] = $ob;
            $resultUserIDsVsStreams[$ob['PROPERTY_BASE_VALUE']][$ob['PROPERTY_STREAM_VALUE']] = $ob['PROPERTY_MANAGER_VALUE'];
            foreach ($ob['PROPERTY_MANAGER_VALUE'] as $userIds) {
                $resultUserIDs[] = $userIds;
            }
            $resultBasesOptionsArray[$ob['PROPERTY_BASE_VALUE']][$ob['PROPERTY_STREAM_VALUE']] = $ob;

        }
    }
    $resultUserIDs = array_unique($resultUserIDs);
    //pre($resultUserIDs);
    //pre($resultBasesOptionsArray);
    //$resultUserIDsVsStreams - массив данных ответственных с привязкой к направлениям базы
    //$resultUserIDs - список всех уникальных ID пользователей
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

        $resultUserFields[$obUsers['ID']]['MANAGER_FIO']  = $obUsers['NAME'].' '.$obUsers['LAST_NAME'];
        $resultUserFields[$obUsers['ID']]['WORK_PHONE'] = $obUsers['WORK_PHONE'];

    }
    //pre($resultUserFields);
    //$resultUserFields - массив
}
/** ********************************************************************************************************************
 ******************************************************collectResult*****************************************************
 ***********************************************************************************************************************/
if (count($resultUserFields) > 0){

    foreach ($leftCoastIDs as $number => $id){
        $leftCoast[$number] = array_merge($leftCoast[$number], $resultUserFields[$resultUserIDsVsStreams[$id][$managerStreamsId][0]]);

        foreach ($resultBasesStreams[$id] as $streamId){
            $leftCoast[$number]['STREAMS'][$streamId]['PRICE'] = $resultBasesOptionsArray[$id][$streamId]['PROPERTY_PRICE_VALUE'];
            $leftCoast[$number]['STREAMS'][$streamId]['ICON'] = $resStreamsOptions[$streamId]['ICON'];
            $leftCoast[$number]['STREAMS'][$streamId]['NAME'] = $resStreamsOptions[$streamId]['NAME'];
            foreach ($resultBasesOptionsArray[$id][$streamId]['PROPERTY_MANAGER_VALUE'] as $managerId){
                switch (strlen($resultUserFields[$managerId]['WORK_PHONE'])){
                    case '13':
                        $leftCoast[$number]['STREAMS'][$streamId]['PHONES'][] =
                            '('.
                            $resultUserFields[$managerId]['WORK_PHONE'][3].
                            $resultUserFields[$managerId]['WORK_PHONE'][4].
                            $resultUserFields[$managerId]['WORK_PHONE'][5].
                            ') '.
                            $resultUserFields[$managerId]['WORK_PHONE'][6].
                            $resultUserFields[$managerId]['WORK_PHONE'][7].
                            $resultUserFields[$managerId]['WORK_PHONE'][8].
                            ' '.
                            $resultUserFields[$managerId]['WORK_PHONE'][9].
                            $resultUserFields[$managerId]['WORK_PHONE'][10].
                            ' '.
                            $resultUserFields[$managerId]['WORK_PHONE'][11].
                            $resultUserFields[$managerId]['WORK_PHONE'][12];

                        break;
                    default:
                        $leftCoast[$number]['STREAMS'][$streamId]['PHONES'][] =  $resultUserFields[$managerId]['WORK_PHONE'];
                        break;
                }
                $leftCoast[$number]['STREAMS'][$streamId]['PHONES_NUMBER'][] =  $resultUserFields[$managerId]['WORK_PHONE'];
            }
        }
    }
    foreach ($rightCoastIDs as $number => $id){
        $rightCoast[$number] = array_merge($rightCoast[$number], $resultUserFields[$resultUserIDsVsStreams[$id][$managerStreamsId][0]]);

        foreach ($resultBasesStreams[$id] as $streamId){
            $rightCoast[$number]['STREAMS'][$streamId]['PRICE'] = $resultBasesOptionsArray[$id][$streamId]['PROPERTY_PRICE_VALUE'];
            $rightCoast[$number]['STREAMS'][$streamId]['ICON'] = $resStreamsOptions[$streamId]['ICON'];
            $rightCoast[$number]['STREAMS'][$streamId]['NAME'] = $resStreamsOptions[$streamId]['NAME'];
            foreach ($resultBasesOptionsArray[$id][$streamId]['PROPERTY_MANAGER_VALUE'] as $managerId){
                switch (strlen($resultUserFields[$managerId]['WORK_PHONE'])){
                    case '13':
                        $rightCoast[$number]['STREAMS'][$streamId]['PHONES'][] =
                            '('.
                            $resultUserFields[$managerId]['WORK_PHONE'][3].
                            $resultUserFields[$managerId]['WORK_PHONE'][4].
                            $resultUserFields[$managerId]['WORK_PHONE'][5].
                            ') '.
                            $resultUserFields[$managerId]['WORK_PHONE'][6].
                            $resultUserFields[$managerId]['WORK_PHONE'][7].
                            $resultUserFields[$managerId]['WORK_PHONE'][8].
                            ' '.
                            $resultUserFields[$managerId]['WORK_PHONE'][9].
                            $resultUserFields[$managerId]['WORK_PHONE'][10].
                            ' '.
                            $resultUserFields[$managerId]['WORK_PHONE'][11].
                            $resultUserFields[$managerId]['WORK_PHONE'][12];

                        break;
                    default:
                        $rightCoast[$number]['STREAMS'][$streamId]['PHONES'][] =  $resultUserFields[$managerId]['WORK_PHONE'];
                        break;
                }
                $rightCoast[$number]['STREAMS'][$streamId]['PHONES_NUMBER'][] =  $resultUserFields[$managerId]['WORK_PHONE'];
            }
        }
    }

ksort($leftCoast);
ksort($rightCoast);
//pre($leftCoast);
//pre($rightCoast);
}


/** ********************************************************************************************************************
 ******************************************************form_$arResult['ITEMS']******************************************
 ***********************************************************************************************************************/

$arResult['ITEMS']                   = [];
$arResult['ITEMS']['LEFT_COAST']     = $leftCoast;
$arResult['ITEMS']['RIGHT_COAST']    = $rightCoast;
//$GLOBALS['AV_BASES_FILTER_DNEPR_IDS'] = $arResult['ITEMS'];
//pre($arResult['ITEMS']);