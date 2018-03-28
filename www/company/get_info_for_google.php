<?php
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";
class AvBases {
    private $baseList = array();
    private $ids = array();
    private $regions = array();
    private $basesIbID;
    private $basesDirectionIbID;

    public function getBases (){
        //pre($this->baseList);
        $i=0;
        $fp = fopen('file.csv', 'w');
        foreach ($this->baseList as $line) {
            fputcsv($fp, $line);
            $i++;
        }
        fclose($fp);
        echo $i;/**/
    }
    private function addToBaseList ($elemetID, $settingsName, $value){
        $this->baseList[$elemetID][$settingsName] = $value;
    }
    private function addToBaseListUrl ($elemetID, $settingsName, $value){
        if ($this->baseList[$elemetID][$settingsName] == '') {
            $this->baseList[$elemetID][$settingsName] = 'https://avmg.com.ua/metallobaza/';
        }
        $this->baseList[$elemetID][$settingsName].= $value;
        if (substr($this->baseList[$elemetID][$settingsName], -1, 1) != '/'){
            $this->baseList[$elemetID][$settingsName].= '/';
        }
    }

    private function getSections (){
        $arFilter=array('IBLOCK_ID'=>$this->basesIbID, 'GLOBAL_ACTIVE'=>'Y'/*, "DEPTH_LEVEL" => IntVal(1)*/);
        $arSelect = array("ID","IBLOCK_ID", "NAME", "DEPTH_LEVEL", "IBLOCK_SECTION_ID", "CODE");

        $res = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter, false, $arSelect, false);
        while($ob = $res->Fetch()){
            $this->regions[] = $ob;
        }
    }
    private function getMyRegion ($searchID){
        $res=array();

        foreach ($this->regions as $region){
            if ($region['ID'] == $searchID){
                $res['CITY'] = $region['NAME'];
                $res['CITY_CODE'] = $region['CODE'];
                $searchID = $region['IBLOCK_SECTION_ID'];
                break;
            }
        }
        //pre($searchID);
        foreach ($this->regions as $region){
            if ($region['ID'] == $searchID){
                $res['REGION'] = $region['NAME'];
                $res['REGION_CODE'] = $region['CODE'];
                break;
            }
        }
        //pre($res);
        return $res;
    }
    private function getBaseFields (){
        $i = 0;
        $arFilter = array("IBLOCK_ID" => $this->basesIbID, /*"PROPERTY_1145_VALUE" => "Да"*/);
        $arSelect = array("ID", "IBLOCK_ID", "NAME","ACTIVE", "IBLOCK_SECTION_ID", "CODE", "PROPERTY_1145", "PROPERTY_1146", "PROPERTY_1148", "PROPERTY_1149", "PROPERTY_1150");

        $res = CIBlockElement::GetList(array('SORT' => 'ASC'), $arFilter, false, false, $arSelect);

        while($ob = $res->Fetch()){
            //pre($ob);
            $arResult[$i] = $ob;
            $this->ids[$i] = $ob['ID'];
            $resultArray = $this->getMyRegion($ob['IBLOCK_SECTION_ID']);
            $this->addToBaseList($i,'REGION', $resultArray['REGION']);
            $this->addToBaseList($i,'CITY', $resultArray['CITY']);
            $this->addToBaseList($i,'NAME', $ob['NAME']);
            $this->addToBaseList($i,'ADDRESS', $ob['PROPERTY_1146_VALUE']['TEXT']);
            $this->addToBaseList($i,'COORDINATES', $ob['PROPERTY_1149_VALUE'].', '.$ob['PROPERTY_1150_VALUE']);
            $this->addToBaseList($i,'WORKTIME', implode(', ',$ob['PROPERTY_1148_VALUE']));

            $this->addToBaseListUrl($i, 'URL', $resultArray['REGION_CODE']);
            $this->addToBaseListUrl($i, 'URL', $resultArray['CITY_CODE']);
            $this->addToBaseListUrl($i, 'URL', $ob['CODE']);
            $i++;
        }
    }

    private function getTelephonesByID ($idArray, $iblockID){
        $resultUser = array();

        foreach ($idArray as $idUser){
            $res = CUser::GetByID($idUser);
            while($ob = $res->Fetch()){
                if ($ob['WORK_PHONE'] != '') {
                    $resultUser[] = $ob['WORK_PHONE'];
                }
            }
        }
        $this->addToBaseList($iblockID,'WORK_PHONE', implode(', ', $resultUser));
    }

    private function getTelephones (){
        $result = array();
        foreach ($this->ids as $iblockID => $value) {
            $arFilter = array("IBLOCK_ID" => $this->basesDirectionIbID, "PROPERTY_1155" => $value);
            $arSelect = array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "PROPERTY_*");
            $res = CIBlockElement::GetList(array('SORT' => 'ASC'), $arFilter, false, false, $arSelect);
            while ($ob = $res->Fetch()) {
                $result[] = $ob;
                $this->getTelephonesByID($ob['PROPERTY_1157'], $iblockID);
                $this->addToBaseList($iblockID,'1C_CODE', $ob['PROPERTY_1160']);
            }
        }
    }
    /**
     * $basesIbID - ID инфоблока с металлобазами
     * $basesDirectionIbID - ID инфоблока с направлениями
     * */
    public function __construct($basesIbID, $basesDirectionIbID){
        $this->basesIbID = $basesIbID;
        $this->basesDirectionIbID = $basesDirectionIbID;
        $this->getSections();
        $this->getBaseFields();
        $this->getTelephones();
    }
}

    $bases = new AvBases(IntVal(134), IntVal(136));
    $bases->getBases();


require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";