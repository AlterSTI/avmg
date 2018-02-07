<?
$aMenuLinks = Array(
	Array(
		"Телефонный справочник", 
		"/company/telephones.php", 
		Array(), 
		Array('WARNING' => 'Y'),
		"" 
	),
	Array(
		"Компания", 
		"/about/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Сотрудники", 
		"/company/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"АВ Грузоперевозки", 
		"/cargo_traffic/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Диски", 
		"/docs/", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('CommonDocuments')" 
	),
	Array(
		"Сервисы", 
		"/services/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Техподдержка", 
		"/services/support.php?show_wizard=Y", 
		Array(), 
		Array('WARNING' => 'Y'),
		"" 
	),
	Array(
		"Заявки", 
		"/services/requests/", 
		Array(), 
		Array('WARNING' => 'Y'),
		"" 
	),
	Array(
		"Группы", 
		"/workgroups/", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Workgroups')" 
	),
	Array(
		"CRM", 
		"/crm/", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('crm') && CModule::IncludeModule('crm') && CCrmPerms::IsAccessEnabled()" 
	),
	Array(
		"Приложения", 
		"/marketplace/", 
		Array(), 
		Array(), 
		"IsModuleInstalled('rest')" 
	),
	Array(
		"Почта", 
		"https://mail.avmg.com.ua", 
		Array(), 
		Array('WARNING' => 'Y', "target"=>"_blank"),
		"" 
	)
);
?>