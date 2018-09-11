<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av"]);
Asset::getInstance()->addString('<meta name="viewport" content="initial-scale=1.0, width=device-width" />');
Asset::getInstance()->addJs('https://js.api.here.com/v3/3.0/mapsjs-core.js');
Asset::getInstance()->addJs('https://js.api.here.com/v3/3.0/mapsjs-service.js');
Asset::getInstance()->addJs('https://js.api.here.com/v3/3.0/mapsjs-ui.js');
Asset::getInstance()->addJs('https://js.api.here.com/v3/3.0/mapsjs-mapevents.js');
Asset::getInstance()->addCss('https://js.api.here.com/v3/3.0/mapsjs-ui.css');
