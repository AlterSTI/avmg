<?php
declare(strict_types=1);

/** **********************************************************************
 * @var array $this->$arParams
 * @var array $this->$arResult
 ************************************************************************/

use
    Bitrix\Iblock\SectionTable,
    Bitrix\Iblock\ElementTable,
    Bitrix\Iblock\PropertyTable,
    Bitrix\Iblock\PropertyEnumerationTable,
    Bitrix\Main\Loader,
    Bitrix\Main\LoaderException;



/** **********************************************************************
 *  Function calls __includeComponent in order to execute the component.
 *
 * @return mixed
 ************************************************************************/
class BasesCatalogDetailLight extends CBitrixComponent
{
    public function executeComponent()
    {
        try {
            Loader::includeModule('iblock');
        }
        catch (LoaderException $exception) {
            throw new LoaderException($exception);
        }
        $uaIBlockID        = $this->arParams['UA_IBLOCK'];
        $ruIBlockID        = $this->arParams['RU_IBLOCK'];
        $iBlockIds         = [$uaIBlockID, $ruIBlockID];
        $uaStreamsIBlockID = $this->arParams['UA_STREAMS_IBLOCK'];
        $ruStreamsIBlockID = $this->arParams['RU_STREAMS_IBLOCK'];
        $uaActionsIBlockID = $this->arParams['UA_ACTIONS_IBLOCK'];
        $ruActionsIBlockID = $this->arParams['RU_ACTIONS_IBLOCK'];
        $uaStreams        = [];
        $ruStreams        = [];
        $uaRegions        = [];
        $ruRegions        = [];
        $uaCities         = [];
        $ruCities         = [];
        $uaBases          = [];
        $ruBases          = [];
        $uaActions        = [];
        $ruActions        = [];
        $propertyListsIds = [];
        $uaTypeBases      = 0;
        $ruTypeBases      = 0;
        $uaWholesaleBases = 0;
        $ruWholesaleBases = 0;
        $uaClosedBases    = 0;
        $ruClosedBases    = 0;
        $propertyVariants = [];
        /*
         * Select Streams
         * */
        $arSelect = ['ID', 'IBLOCK_SECTION_ID', 'IBLOCK_ID', 'NAME', 'CODE'];
        $arFilter = ['IBLOCK_ID' => [$uaStreamsIBlockID, $ruStreamsIBlockID]];
        $result   = ElementTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
        while ($item = $result->Fetch()) {
            //pre($item);
            switch ($item['IBLOCK_ID']) {
                case $uaStreamsIBlockID:
                    $uaStreams[$item['CODE']] = $item;
                    break;
                case $ruStreamsIBlockID:
                    $ruStreams[$item['CODE']] = $item;
            }
        }
        /*
         * Select regions
         * */
        $arSelect = ['ID', 'IBLOCK_SECTION_ID', 'IBLOCK_ID', 'DEPTH_LEVEL', 'NAME', 'CODE'];
        $arFilter = ['IBLOCK_ID' => [$uaIBlockID, $ruIBlockID]];
        $result = SectionTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
        while ($item = $result->Fetch()) {
            //pre($item);
            if ($item['DEPTH_LEVEL'] == 1) {
                switch ($item['IBLOCK_ID']) {
                    case $uaIBlockID:
                        $uaRegions[$item['ID']] = $item;
                        break;
                    case $ruIBlockID:
                        $ruRegions[$item['ID']] = $item;
                }
            }
            else if ($item['DEPTH_LEVEL'] == 2) {
                switch ($item['IBLOCK_ID']) {
                    case $uaIBlockID:
                        $uaCities[$item['ID']] = $item;
                        break;
                    case $ruIBlockID:
                        $ruCities[$item['ID']] = $item;
                }
            }
        }
        /*
         * select bases
         * */
        $arSelect = ['ID', 'IBLOCK_SECTION_ID', 'IBLOCK_ID', 'NAME', 'CODE'];
        $arFilter = ['IBLOCK_ID' => [$uaIBlockID, $ruIBlockID]];
        $result   = ElementTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
        while ($item = $result->Fetch()) {
            switch ($item['IBLOCK_ID']) {
                case $uaIBlockID:
                    $uaBases[$item['CODE']] = $item;
                    break;
                case $ruIBlockID:
                    $ruBases[$item['CODE']] = $item;
            }
        }
        /*
         * select properties list
         * */
        $arSelect = ['ID', 'IBLOCK_ID', 'CODE', 'MULTIPLE'];
        $arFilter = ['IBLOCK_ID' => [$uaIBlockID, $ruIBlockID]];
        $arFilter['CODE'] = 'type_bases';
        $result           = PropertyTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
        while ($item = $result->Fetch()) {
            $propertyListsIds[] = $item['ID'];
            switch ($item['IBLOCK_ID']) {
                case $uaIBlockID:
                    $uaTypeBases = $item['ID'];
                    break;
                case $ruIBlockID:
                    $ruTypeBases = $item['ID'];
            }
        }
        $arFilter['CODE'] = 'wholesale';//, 'wholesale', 'closed']
        $result           = PropertyTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
        while ($item = $result->Fetch()) {
            $propertyListsIds[] = $item['ID'];
            switch ($item['IBLOCK_ID']) {
                case $uaIBlockID:
                    $uaWholesaleBases = $item['ID'];
                    break;
                case $ruIBlockID:
                    $ruWholesaleBases = $item['ID'];
            }
        }
        $arFilter['CODE'] = 'closed';//, 'wholesale', 'closed']
        $result           = PropertyTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
        while ($item = $result->Fetch()) {
            $propertyListsIds[] = $item['ID'];
            switch ($item['IBLOCK_ID']) {
                case $uaIBlockID:
                    $uaClosedBases = $item['ID'];
                    break;
                case $ruIBlockID:
                    $ruClosedBases = $item['ID'];
            }
        }
        $arSelect = ['ID', 'PROPERTY_ID', 'VALUE', 'XML_ID'];
        $arFilter = ['PROPERTY_ID' => $propertyListsIds];
        $result   = PropertyEnumerationTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
        while ($item = $result->Fetch()) {
            $propertyVariants[$item['PROPERTY_ID']]   = $propertyVariants[$item['PROPERTY_ID']] ?? [];
            $propertyVariants[$item['PROPERTY_ID']][] = $item;
        }
        /*
         * actions
         * */
        $arSelect = ['ID', 'IBLOCK_SECTION_ID', 'IBLOCK_ID', 'NAME', 'CODE'];
        $arFilter = ['IBLOCK_ID' => [$uaActionsIBlockID, $ruActionsIBlockID]];
        $result   = ElementTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
        while ($item = $result->Fetch()) {
            switch ($item['IBLOCK_ID']) {
                case $uaActionsIBlockID:
                    $uaActions[$item['CODE']] = $item;
                    break;
                case $ruActionsIBlockID:
                    $ruActions[$item['CODE']] = $item;
            }
        }
        $result = [
            'PROPERTY_VARIANTS'     => $propertyVariants,
            'UA_STREAMS'            => $uaStreams,
            'RU_STREAMS'            => $ruStreams,
            'UA_REGIONS'            => $uaRegions,
            'RU_REGIONS'            => $ruRegions,
            'UA_CITIES'             => $uaCities,
            'RU_CITIES'             => $ruCities,
            'UA_BASES'              => $uaBases,
            'RU_BASES'              => $ruBases,
            'UA_TYPE_BASES'         => $uaTypeBases,
            'RU_TYPE_BASES'         => $ruTypeBases,
            'UA_WHOLESALE_BASES'    => $uaWholesaleBases,
            'RU_WHOLESALE_BASES'    => $ruWholesaleBases,
            'UA_CLOSED_BASES'       => $uaClosedBases,
            'RU_CLOSED_BASES'       => $ruClosedBases,
            'UA_ACTIONS'            => $uaActions,
            'RU_ACTIONS'            => $ruActions,
            'IBLOCK_IDS'            => $iBlockIds,

        ];
        $this->arResult = array_merge($this->arResult, $result);
        //pre($result['UA_ACTIONS']);
       /* pre($result['RU_STREAMS']);*/
        $this->runTemplate();
    }
    /** **********************************************************************     *
     * @return  void
     ************************************************************************/
    protected function runTemplate() : void
    {
        $this->IncludeComponentTemplate();
    }
}