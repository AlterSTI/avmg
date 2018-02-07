<?php
//require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<style>
    #reportTable, #reportTable tr, #reportTable td, #reportTable th {
        border: 1px solid;
        border-collapse: collapse;
        padding: 5px;
        text-align: center;
    }
</style>
<?$arFilter = Array (
    "ACTIVE" => "Y",
    "UF_DEPARTMENT" => false,
    "EMAIL" => '%@avmg.com.ua',
    "GROUPS_ID" => array('12')//группа пользователей домена
);

$arParameters = array(
    'FIELDS' => array('ID','LAST_NAME','NAME','DATE_REGISTER', 'EMAIL', 'WORK_COMPANY', 'WORK_DEPARTMENT', 'WORK_POSITION', 'WORK_PHONE')
);

$rsUsers = CUser::GetList($by="LAST_NAME", $order="asc", $arFilter, $arParameters);

$html = '<table id="reportTable">';
$html.= '<tr><th>№</th><th>ФИО</th><th>EMAIL</th><th>Компания</th><th>Отдел</th><th>Должность</th><th>Телефон</th></tr>';
$i=1;
if (count($rsUsers) > 0) {
    while ($arUser = $rsUsers->Fetch()) {
        $html .= "<tr>";
        $arResult[] = $arUser;
        $html .= "<td>$i</td>";
        $html .= "<td><a href='/bitrix/admin/user_edit.php?lang=ru&ID=$arUser[ID]' target='_blank'>$arUser[LAST_NAME] $arUser[NAME]</a></td>";
        $html .= "<td>$arUser[EMAIL]</td>";
        $html .= "<td>$arUser[WORK_COMPANY]</td>";
        $html .= "<td>$arUser[WORK_DEPARTMENT]</td>";
        $html .= "<td>$arUser[WORK_POSITION]</td>";
        $html .= "<td>$arUser[WORK_PHONE]</td>";
        $html .= "</tr>";
        $i++;
    }
    $html .= '</table>';
    echo $html;
} else{
    echo '<div>Пользователи отсутствуют</div>';
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");