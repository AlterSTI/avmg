<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");



    $APPLICATION->IncludeComponent(
	"bitrix:learning.course.list", 
	"av_corp", 
	array(
		"COURSE_DETAIL_TEMPLATE" => "course.php?COURSE_ID=#COURSE_ID#",
		"CHECK_PERMISSIONS" => "N",
		"COURSES_PER_PAGE" => "20",
		"SORBY" => "SORT",
		"SORORDER" => "ASC",
		"SET_TITLE" => "Y",
		"LIST_TITLE" => "Обучающие курсы",
		"COMPONENT_TEMPLATE" => "av_corp"
	),
	false
);



    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>