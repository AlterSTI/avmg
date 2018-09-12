<?php
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
class KyivstarTel {
    private $token = '';
    private $urlStat='https://fmc.kyivstar.ua/api/cdr/v1/callstat.json';
    private $urlCall='https://fmc.kyivstar.ua/api/onebox/v1/originate';
    private $method = '';

    public function __construct($method = '', $token =''){
        $this->token = !empty($token) ? $token : '6677d49d220da64e4a0cd8219284a10fd149cea29bc41c8f3518ea0f0cd2cf65';
        $this->method = !empty($method) ? $method : 'stat';
    }

    public function requestStat (){
        $data = [
            'token' => $this->token,
            'from' => '2018-09-11T00:00:00',
            'to' => '2018-09-11T23:59:59',
            'ownership' => 'on'
        ];

        $queryData = http_build_query($data);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 0,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->urlStat.'?'.$queryData
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

    public function callOut(){
        $data = [
            'token' => $this->token,
            'calling_number' => '0676230518',
            'called_number' => '0676329610'
        ];

        $queryData = http_build_query($data);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 0,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->urlCall . '?' . $queryData
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
    private function isJson($string){
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}

$a = new KyivstarTel();
pre($a->callOut());
