<?php
namespace Av\Client;
use \Exception;

class ClientInfo implements ClientInfoInterface {

    public function setBrowserChecking(string $browserName = '', float $minBrowserVersion = 0){
        if ($browserName === '') return;
        if ($minBrowserVersion === 0) return;
        $browserName = strtolower(htmlspecialchars(trim($browserName)));

        if(array_key_exists($browserName, self::$browsersTableAliase) && $minBrowserVersion != 0){
            $this->oldBrowsers[self::$browsersTableAliase[$browserName]] = $minBrowserVersion;
        }
    }
    public function getBrowsersCheckingParams(){
        return $this->oldBrowsers;
    }
    public function isOld(){
        foreach ($this->oldBrowsers as $brow => $ver) {
            if (stristr($this->browserObj->browser, $brow) && $this->browserObj->version < $ver) {
                return true;
            }
        }
        return false;
    }
    public function __construct(){
        if (!$this->browserObj = get_browser(null, false)) {
            throw new Exception('PHP library browscap.ini is not install');
        }
        $this->oldBrowsers = self::$oldBrowsersDefault;
    }
    private $browserObj = null;
    private $oldBrowsers = array();
    private static $browsersTableAliase = array(
        'firefox'           => 'Firefox',
        'mozilla'           => 'Firefox',
        'chrome'            => 'Chrome',
        'google chrome'     => 'Chrome',
        'opera'             => 'Opera',
        'safari'            => 'Safari',
        'yandex'            => 'Yandex',
        'yandex browser'    => 'Yandex',
        'msie'              => 'MSIE',
        'internet explorer' => 'MSIE',
        'ie'                => 'MSIE',
        'edge'              => 'Edge',
        'android browser'   => 'Android',
        'android'           => 'Android'
    );
    private static $oldBrowsersDefault = array(
        'Firefox'           => 0.0,
        'Chrome'            => 0.0,
        'Opera'             => 0.0,
        'Safari'            => 0.0,
        'MSIE'              => 0.0,
        'Yandex'            => 0.0,
        'Edge'              => 0.0,
        'Android'           => 0.0
    );
}