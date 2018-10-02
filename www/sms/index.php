<?php
declare(strict_types=1);

use \Av\GSM\SMS\Vodaphone;
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";

$a = new Vodaphone();
//pre($a);
$a->setSender('Ivan');
$a->setRecipients(['380676329610']);
$a->setContent('Hellow World');
$a->send();
