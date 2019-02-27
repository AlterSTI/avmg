<?php
declare(strict_types=1);

/** **********************************************************************
 * @var array $this->$arParams
 * @var array $this->$arResult
 ************************************************************************/
use Bitrix\Iblock\IblockTable,
    Bitrix\Iblock\PropertyTable,
    Bitrix\Iblock\ElementTable,
    Bitrix\Iblock\SectionTable,
    Bitrix\Main\Loader,
    Bitrix\Main\LoaderException,
    Bitrix\Main\HttpRequest,
    Bitrix\Main\Context,
    Bitrix\Main\ArgumentException,
    Bitrix\Main\ObjectPropertyException,
    Bitrix\Main\SystemException ;
/** **********************************************************************
 *  Function calls __includeComponent in order to execute the component.
 *
 * @return mixed
 ************************************************************************/
class BasesCatalogDetail extends CBitrixComponent
{
    /** **********************************************************************
     *
     ************************************************************************/
    public function executeComponent()
    {
        $this->arResult['ERRORS']   = $this->arResult['ERRORS'] ?? [];
        $validatedParams            = [];
        $fieldsCollection           = [];
        try {
            $this->checkNeedModules();
        } catch (LoaderException $exception) {
            $this->endWorkingWithCriticalError("Modules load error: {$exception->getMessage()}");
        }
        $request            = Context::getCurrent()->getRequest();

        try {
            $validatedParams = $this->validateIncomingParams($this->arParams);
        } catch (RuntimeException $exception){
            $this->endWorkingWithCriticalError($exception->getMessage());
        }
        $action             = $this->getActionType($request, $validatedParams);
        $baseIblocks        = $validatedParams['IBLOCKS_BASE'];
        $additionalIblocks  = $validatedParams['IBLOCKS_ADDITIONAL'];
        $defaultLanguage    = $validatedParams['DEFAULT_LANGUAGE'];
        try {
            $fieldsCollection = [
                'BASE'       => $this->getFieldsCollection($baseIblocks, $defaultLanguage),
                'ADDITIONAL' => $this->getFieldsCollection($additionalIblocks, $defaultLanguage)
            ];
        } catch (Throwable $exception) {
            $this->endWorkingWithCriticalError("Fields found error: {$exception->getMessage()}");
        }

        //pre($fieldsCollection);
        /*
        $fieldsCollection           = $this->getFieldsCollection($iblockCollection, $validatedParams);
        */
        return;
        switch ($action) {
            case 'add':
                try {
                    $this->addItem($fieldsCollection, $request);
                    $this->reload();
                } catch (RuntimeException $exception) {
                    $this->endWorkingWithCriticalError("Base adding error: {$exception->getMessage()}");
                }
                break;
            case 'delete':
                try {
                    $this->deleteItem($fieldsCollection, $request);
                    $this->reload();
                } catch (RuntimeException $exception) {
                    $this->endWorkingWithCriticalError("Base deleting error: {$exception->getMessage()}");
                }
                break;
            case 'update':
                try {
                    $this->updateItem($fieldsCollection, $request);
                    $this->reload();
                } catch (RuntimeException $exception) {
                    $this->endWorkingWithCriticalError("Base updating error: {$exception->getMessage()}");
                }
                break;
            case 'view':
            default:
                $this->runTemplate($fieldsCollection, $request);
        }
    }
    /** **********************************************************************
     * uyfuyf
     *
     * @return void
     * @throws  LoaderException             modules load error
     ************************************************************************/
    protected function checkNeedModules() : void
    {
        $modules = ['iblock'];
        foreach ($modules as $module) {
            try {
                Loader::includeModule($module);
            } catch (LoaderException $exception){
                throw new LoaderException($exception);
            }
        }
    }
    /** **********************************************************************
     * @param   $error                       string errors
     *
     * @return void
     ************************************************************************/
    protected function endWorkingWithCriticalError(string $error) : void
    {
        $this->arResult['ERRORS'][] = $error;
        $this->initComponentTemplate();
    }
    /** **********************************************************************
     * @param   array                       $arParams array errors
     * @return  array                       $validatedParams
     * @throws  RuntimeException           modules load error
     ************************************************************************/
    protected function validateIncomingParams(array $arParams) : array
    {
        $iBlockIds                                  = [];
        $iBlocks                                    = [];
        $iBlockLanguages                            = [];
        $validatedParams['IBLOCKS_BASE']            = [];
        $validatedParams['IBLOCKS_ADDITIONAL']      = [];
        $validatedParams                            = [];
        $realIBlockIds                              = [];
        $languagesRaw       = $arParams['LANGUAGES']            ?? [];
        $baseCode           = (string) ($arParams['BASE_CODE']  ?? '');
        $languageDefaultRaw = (string) ($arParams['DEFAULT_LANGUAGE']     ?? '');

        $validatedParams['BASE_CODE'] = $baseCode;
        $languages          = $this->getLanguages($languagesRaw);
        $languageDefault    = $this->getDefaultLanguage($languageDefaultRaw, $languages);

        foreach ($languages as $language) {
            $base       = (int)($arParams["BASE_IBLOCK_$language"] ?? 0);
            $additional = (int)($arParams["ADDITIONAL_IBLOCK_$language"] ?? 0);
            if ($base > 0 && $additional > 0) {
                $iBlockLanguages            = $iBlockLanguages            ?? [];
                $iBlockLanguages[$language] = $iBlockLanguages[$language] ?? [];
                $iBlockIds                  = $iBlockIds                  ?? [];

                $iBlockIds[] = $base;
                $iBlockIds[] = $additional;
                $languageDefault = strlen($languageDefault) > 0 ? $languageDefault : $language;
                $iBlockLanguages[$language] = [
                    'BASE'          => $base,
                    'ADDITIONAL'    => $additional,
                ];
                $validatedParams['IBLOCKS_BASE'][$language]          = $base;
                $validatedParams['IBLOCKS_ADDITIONAL'][$language]    = $additional;
            }
        }

        $validatedParams['IBLOCK_LANGUAGES'] = $iBlockLanguages;
        $validatedParams['DEFAULT_LANGUAGE'] = $languageDefault;
        //validate iBlocks
        if (count($iBlockIds) > 0) {
            try {
                $result = IblockTable::getList([
                    'filter' => ['=ID' => $iBlockIds, '!ID' => false],
                    'select' => ['ID']
                ]);
            } catch (ArgumentException | ObjectPropertyException | SystemException $exception) {
               throw new RuntimeException("IblockTable::getList error validated: {$exception->getMessage()}");
            }
            while ($item = $result->Fetch()) {
                $realIBlockIds[$item['ID']] = $item['ID'];
            }
            foreach ($iBlocks as $key => $iBlockId) {
                $base       = (int) ($realIBlockIds[$iBlockId['BASE']] ?? 0);
                $additional = (int) ($realIBlockIds[$iBlockId['ADDITIONAL']] ?? 0);
                if ($base == 0 || $additional == 0) {
                    unset($iBlockIds[$key]);
                }
            }
            $validatedParams['IBLOCK_IDS'] = $iBlockIds;
        }

        if (count($validatedParams['IBLOCK_IDS']) > 0 && count($validatedParams['IBLOCK_LANGUAGES']) > 0 &&
            strlen($validatedParams['DEFAULT_LANGUAGE']) > 0) {
            return $validatedParams;
        } else {
            throw new RuntimeException('Error validated incoming values');
        }

    }
    /** **********************************************************************
     * @param   HttpRequest $request
     * @param   array       $validatedParams
     * @return string       $action
     ************************************************************************/
    protected function getActionType(HttpRequest $request, array $validatedParams) : string
    {
        //if (!$request->isPost()) return 'view';
        $action     = 'view';
        $itemCode   = $validatedParams['BASE_CODE'];
        $actionPost = $request->getPost('ACTION');
        if (strlen($itemCode) > 0 && $actionPost == 'delete') {
            $action = 'delete';
        } else if (strlen($itemCode) > 0 && $actionPost == 'update') {
            $action = 'update';
        } else if (strlen($itemCode) == 0 && $actionPost == 'new') {
            $action = 'new';
        }
        return $action;
    }
    /** **********************************************************************
     * @param   array       $validatedParams
     * @return array        $iBlockCollection
     ************************************************************************/
/*    protected function getIblockCollection(array $validatedParams) : array
    {
        return $validatedParams['IBLOCK_LANGUAGES'];
    }*/
    /** **********************************************************************
     * @param   string      $defaultLanguage
     * @param   array       $iblockCollection
     * @return  array       $fieldsCollection
     ************************************************************************/
    protected function getFieldsCollection(array $iblockCollection, string $defaultLanguage) : array
    {
        return array_merge(
            $this->getBaseFieldsCollection($iblockCollection, $defaultLanguage),
            $this->getPropertiesCollection($iblockCollection, $defaultLanguage)
        );
    }

    /** **********************************************************************
     * @param   string      $defaultLanguage
     * @param   array       $iblockCollection
     * @return  array       $answerFieldsCollection
     ************************************************************************/
    protected function getBaseFieldsCollection(array $iblockCollection, string $defaultLanguage) : array
    {
        $answerFieldsCollection   = [];
        $baseFields         = [
            'ACTIVE'         => 'bool',
            'ACTIVE_FROM'    => 'datetime',
            'ACTIVE_TO'      => 'datetime',
            'CODE'           => 'stringSingle',
            'NAME'           => 'string'
        ];
        foreach ($baseFields as $fieldName => $fieldType) {
            $answerFieldsCollection[] = [
                'TYPE'     => $fieldType,
                'TITLE'    => $fieldName,
                'IS_BASE'  => 'Y',
                'VALUES'   => [],
            ];
        }
        $sectionCollection = $this->getSectionCollection($iblockCollection, $defaultLanguage);
        $answerFieldsCollection[] = [
            'TYPE'     => 'sections',
            'TITLE'    => 'IBLOCK_SECTIONS',
            'IS_BASE'  => 'Y',
            'VALUES'   => $sectionCollection,
        ];
        pre($answerFieldsCollection);
        return $answerFieldsCollection;
    }

    /** **********************************************************************
     * @param   string      $defaultLanguage
     * @param   array       $iblockCollection
     * @return  array       $sectionCollection
     ************************************************************************/
    protected function getSectionCollection(array $iblockCollection, string $defaultLanguage) : array
    {
        $queryResult            = [];
        $iblockCollectionNew    = array_flip($iblockCollection);

        $arFilter = ['IBLOCK_ID'=> $iblockCollection, 'ACTIVE' => 'Y'];
        $arSelect = ['ID', 'IBLOCK_ID', 'CODE', 'NAME'];
        $result = SectionTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
        while ($item = $result->Fetch()) {
            $iblockId                               = $iblockCollectionNew[$item['IBLOCK_ID']];
            $queryResult[$iblockId]                 = $queryResult[$iblockId] ?? [];
            $queryResult[$iblockId][$item['CODE']]  = $item;
        }
        $sectionCollection = $queryResult[$defaultLanguage] ?? [];
        if (count($queryResult) > 1) {
            $resultArray = call_user_func_array('array_intersect_assoc', $queryResult);
            $sectionCollection = array_intersect_assoc($queryResult[$defaultLanguage], $resultArray);
        }
        return $sectionCollection;
    }

    /** **********************************************************************
     * @param   string      $defaultLanguage
     * @param   array       $iblockCollection
     * @return  array       $answerFieldsCollection
     ************************************************************************/
    protected function getPropertiesCollection(array $iblockCollection, string $defaultLanguage) : array
    {
        //pre($iblockCollection);
        $iblockCollectionNew    = array_flip($iblockCollection);
        //pre($iblockCollectionNew);
        $queryResult = [];

        $arFilter = ['IBLOCK_ID'=> $iblockCollection, 'ACTIVE' => 'Y'];
        $arSelect = ['IBLOCK_ID', 'CODE', 'NAME', 'PROPERTY_TYPE', 'USER_TYPE', 'MULTIPLE'];
        $result = PropertyTable::getList(['filter' => $arFilter, 'select' => $arSelect]);
        while ($item = $result->Fetch()) {
            $iblockId                               = $iblockCollectionNew[$item['IBLOCK_ID']];
            $queryResult[$iblockId]                 = $queryResult[$iblockId] ?? [];
            $queryResult[$iblockId][$item['CODE']]  = $item;
        }
        //pre($queryResult);
        $fieldsCollection = $queryResult[$defaultLanguage] ?? [];
        if (count($queryResult) > 1) {
            $resultArray = call_user_func_array('array_intersect_assoc', $queryResult);
            $fieldsCollection = array_keys(array_intersect_assoc($queryResult[$defaultLanguage], $resultArray));
        }
        //$answerFieldsCollection = $this->getAnswerFieldsCollection();
        pre($fieldsCollection);
        return [];
    }

    /** **********************************************************************
     * @param   array       $languagesRaw
     * @return  array       $languages
     ************************************************************************/
    protected function getLanguages(array $languagesRaw) : array
    {
        array_walk($languagesRaw, function (&$arrayItem) {
            $arrayItem = strlen($arrayItem) == 2 && ctype_alpha($arrayItem) ? strtoupper($arrayItem) : '';
        });
        $languages = array_diff($languagesRaw, ['']);
        $languages = array_unique($languages);
        return $languages;
    }
    /** **********************************************************************
     * @param   string       $languageDefaultRaw
     * @param   array        $languages
     * @return  string        $languageDefault
     ************************************************************************/
    protected function getDefaultLanguage(string $languageDefaultRaw, array  $languages) : string
    {
        $languageDefault = strtoupper($languageDefaultRaw);
        $languageDefault = array_search($languageDefault, $languages) !== false ? $languageDefault : '';
        return $languageDefault;
    }
    /** **********************************************************************
     * @return  void
     ************************************************************************/
    protected function reload() : void
    {
        LocalRedirect('');
    }
    /** **********************************************************************
     * @param   array                           $fieldsCollection
     * @param   array                           $iblockCollection
     * @param   HttpRequest                     $request
     * @return  bool                            $result
     * @throws  RuntimeException                add item error
     ************************************************************************/
    protected function addItem(array $iblockCollection, array $fieldsCollection, HttpRequest $request) : bool
    {
        return true;
    }
    /** **********************************************************************
     * @param   array                           $fieldsCollection
     * @param   array                           $iblockCollection
     * @param   HttpRequest                     $request
     * @return  bool                            $result
     * @throws  RuntimeException                add item error
     ************************************************************************/
    protected function deleteItem(array $iblockCollection, array $fieldsCollection, HttpRequest $request) : bool
    {
        return true;
    }
    /** **********************************************************************
     * @param   array                           $fieldsCollection
     * @param   array                           $iblockCollection
     * @param   HttpRequest                     $request
     * @return  bool                            $result
     * @throws  RuntimeException                add item error
     ************************************************************************/
    protected function updateItem(array $iblockCollection, array $fieldsCollection, HttpRequest $request) : bool
    {
        return true;
    }
    /** **********************************************************************
     * @param   array                           $fieldsCollection
     * @param   array                           $iblockCollection
     * @param   HttpRequest                     $request
     * @return  bool                            $result
     ************************************************************************/
    protected function runTemplate(array $iblockCollection, array $fieldsCollection, HttpRequest $request) : bool
    {
        return true;
    }
}