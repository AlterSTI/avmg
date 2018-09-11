<?php
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
$query = 'SELECT * FROM `b_option`';
$res = $DB->Query($query);
while ($row = $res->Fetch()){
    $rows[] = $row;
}
pre($rows);