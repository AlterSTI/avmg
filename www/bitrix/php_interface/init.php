<?
/* -------------------------------------------------------------------- */
/* ---------------------------- constants ----------------------------- */
/* -------------------------------------------------------------------- */
$siteName          = explode(":", $_SERVER["SERVER_NAME"])[0];
$serverNameExplode = explode(DIRECTORY_SEPARATOR, str_replace($siteName, "", $_SERVER["DOCUMENT_ROOT"]));
$serverNameExplode = array_diff($serverNameExplode, [""]);

define("CURRENT_PROTOCOL",           $_SERVER["HTTPS"] && $_SERVER["HTTPS"] != "off" ? "https" : "http");
define("SERVER_ROOT",                DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, $serverNameExplode).DIRECTORY_SEPARATOR);
define("CORE_ROOT",                  DIRECTORY_SEPARATOR."home".DIRECTORY_SEPARATOR."bitrix".DIRECTORY_SEPARATOR."www".DIRECTORY_SEPARATOR);
define("SITE_NAME",                  $siteName);
define("GOOGLE_RECAPTCHA_SITEKEY",   "6LdWqCkTAAAAABTDuDaNXUub1rFqK-o0aSPjK5_W");
define("GOOGLE_RECAPTCHA_SECRETKEY", "6LdWqCkTAAAAAM_AshmUWM-yG1IWAicM8oAgmK6-");
/* -------------------------------------------------------------------- */
/* ---------------------------- includings ---------------------------- */
/* -------------------------------------------------------------------- */
include "js_libaries_registration.php";
include "av_functions.php";
include "corp_business_process.php";
include "mobile/mobile_corp_form_to_ib.php";
/* -------------------------------------------------------------------- */
/* ------------------------ classes autoloader ------------------------ */
/* -------------------------------------------------------------------- */
CModule::AddAutoloadClasses
	(
	"", 
		array(
            "AvComponentsIncludings"                           => "/bitrix/php_interface/av_classes/components_includings/AvComponentsIncludings.php",
            "av\image_processing\watermarks\WatermarkAdding"   => "/bitrix/php_interface/av_classes/image_processing/watermarks/WatermarkAdding.php",
            "Av\\Client\\ClientInfoInterface"                  => "/bitrix/php_interface/av_classes/client/ClientInfoInterface.php",
            "Av\\Client\\ClientInfo"                           => "/bitrix/php_interface/av_classes/client/ClientInfo.php",
            "Av\GSM\SMS\SMSInterface"                          => "/bitrix/php_interface/av_classes/sms/SMSInterface.php",
            "Av\GSM\SMS\AbstractSMS"                           => "/bitrix/php_interface/av_classes/sms/AbstractSMS.php",
            "Av\GSM\SMS\Vodaphone"                             => "/bitrix/php_interface/av_classes/sms/Vodafone.php",
        )
	);
