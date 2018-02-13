<?php
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
use \Av\Client\ClientInfo;

$params = array();

try{
    $a = new ClientInfo();
    $a->setBrowserChecking('firefox', 59.0);
    $a->setBrowserChecking('opera', 50.0);
    $params = $a->getBrowsersCheckingParams();
} catch (\Exception $e){
    echo $e->getMessage();

}


if ($a->isOld()){
    pre('Версия старая');
} else{
    pre('Версия новая');
}
pre($a->getBrowserObj());



