<?php
namespace Av\Client;
use \Exception;

class ClientInfo implements ClientInfoInterface {

    public function setBrowserChecking(string $browserName = '', float $browserVersion = 0){
        if ($browserName === '') return false;
        if ($browserVersion === 0) return false;



        //$this->oldBrowsers[$browserName] = $browserVersion;
        //return;
    }
    public function getBrowsersCheckingParams(){
        return array_merge($this->oldBrowsersDefault, $this->oldBrowsers);
    }
    public function isOld(){

    }
    public function __construct(){
        if (!$this->browser = get_browser(null, false)) {
            throw new Exception('PHP library browscap.ini is not install');
        }
    }
    private $browser;
    private $oldBrowsers = array();
    private static $oldBrowsersDefault = array(
        'Firefox'           => 0.0,
        'Chrome'            => 0.0,
        'Opera'             => 0.0,
        'Safari'            => 0.0,
        'Internet Explorer' => 0.0,
        'Yandex'            => 0.0,
        'Microsoft Edge'    => 0.0,
        'Android Browser'   => 0.0
    );

}