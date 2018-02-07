<?
$aMenuLinks = Array(
	Array(
		"Структура компании", 
		"/company/vis_structure.php", 
		Array(), 
		Array(), 
		"" 
	),
    Array(
        "Отчет по структуре",
        "/company/getUsers.php",
        Array(),
        Array(),
        "\$GLOBALS['USER']->IsAdmin()"
    ),
	Array(
		"Телефонный справочник", 
		"/company/telephones.php", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Кадровые изменения", 
		"/company/events.php", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('StaffChanges')" 
	),
	Array(
		"Эффективность", 
		"/company/report.php", 
		Array(), 
		Array(), 
		"IsModuleInstalled('tasks')" 
	),
	Array(
		"Доска почета", 
		"/company/leaders.php", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Дни рождения", 
		"/company/birthdays.php", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Фотогалерея", 
		"/company/gallery/", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Gallery')" 
	)
);
?>