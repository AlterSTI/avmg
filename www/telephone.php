<?php
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";

class CallOut
{
    private $application_token = '1knh5q1v7t0pde6r32nayxo9qj2ozagl';
    private $userID = 5377;
    private $event = 'ONEXTERNALCALLSTART';
    private $urlRequestCallMe = 'https://10.10.1.180/callme/CallMeOut.php';


    private function isJson($string){
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    private function getBitrixApi($data, $method){
        //$url = $this->getConfig('bitrixApiUrl');
        $url = 'https://corp.avmg.dev2.bx.av/rest/5377/cur1klabu0fefimd/';
        if (!$url) return false;
        $queryUrl = $url . $method . '.json';
        $queryData = http_build_query($data);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => $queryData,
        ));
        $result = curl_exec($curl);
        curl_close($curl);

        if ($this->isJson($result)) {
            $result = json_decode($result, true);
            return $result;
        } else {
            return false;
        }
    }
    private function getIntNumByUSER_ID($userid){
        $result = $this->getBitrixApi(array("ID" => $userid), 'user.get');
        if ($result){
            return $result['result'][0]['UF_PHONE_INNER'];
        } else {
            return false;
        }

    }

    private function runOutputCall($exten, $callerid){
        $result = $this->getBitrixApi(array(
            'USER_PHONE_INNER' =>  $callerid,
            'PHONE_NUMBER' => $exten,
            'USER_ID' => $this->userID,
            'TYPE' => 1,
            'CALL_START_DATE' => date("Y-m-d H:i:s"),
            'CRM_CREATE' => 1,
            /*'CRM_ENTITY_TYPE' => 'LEAD',
            'CRM_ENTITY_ID' => 5242,*/
            'SHOW' => 0,
        ), 'telephony.externalcall.register');
        if ($result) {
            return $result['result']['CALL_ID'];
        } else {
            return false;
        }
    }

    private function endCall($exten){
        $result = $this->getBitrixApi(array(
            'CALL_ID' => $exten,
            'USER_ID' => $this->userID,
            'DURATION' => 100,
        ), 'telephony.externalcall.finish');
        if ($result) {
            return $result/*['result']['CALL_ID']*/;
        } else {
            return false;
        }
    }

    private function execCallMe ($data){
        $queryData = http_build_query($data);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->urlRequestCallMe,
            CURLOPT_POSTFIELDS => $queryData,
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
    /**
     *
     * $request ['auth']['application_token']           //  токен для входящего хука;
     * $request['data']['USER_ID']                      //  id вызывающего юзера
     * $request['data']['PHONE_NUMBER_INTERNATIONAL']   //  вызываемый номер
     * $request['data']['CALL_ID'];                     //  id вызова
     * $request['event'] = 'ONEXTERNALCALLSTART'        //  признак внешнего звонока*
     *
     *
    */
    public function callOutExec($exten){
        if ($callerID = $this->getIntNumByUSER_ID($this->userID)){
            if ($callID = $this->runOutputCall($exten, $callerID)){
               /* pre($callID);
                pre($this->endCall($callID['result']['CALL_ID']));

                exit;*/
                //начало звонка
                $request = [
                    'auth' => [
                        'application_token' => $this->application_token
                    ],
                    'data' => [
                        'USER_ID' => $this->userID,
                        'PHONE_NUMBER_INTERNATIONAL' => $exten,
                        'CALL_ID' => $callID
                    ],
                    'event' => $this->event
                ];
                return $this->execCallMe($request);
            }
        }
        return false;
    }
    public function __construct (){

    }

}
//начало звонка
/*$request ['auth']['application_token'] = $this->application_token;
$request['data']['USER_ID'] = 5377; //id вызывающего юзера
$request['data']['PHONE_NUMBER_INTERNATIONAL'] = 7001;//вызываемый номер
$request['data']['CALL_ID'] = 7000; //id вызова ???
$request['event'] = 'ONEXTERNALCALLSTART'; //внешний звонок

//конец звонка
/*$request['action'] = 'sendcall2b24'; //запрос данных по звонку
$request['call_id'] = '';// идентификатор звонка из результатов вызова метода telephony.externalCall.register
$request['FullFname'] = ''; //url на запись звонка для сохранения в Битрикс24
$request['CallIntNum'] = 7000; //вызывающий
$request['CallDuration'] = 1111; //длительность звонка в секундах
$request['CallDisposition'] = 'ANSWERED'; //результат звонка*/
$call = new CallOut();
pre($call->callOutExec('0676329610'));
