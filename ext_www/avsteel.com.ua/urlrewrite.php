<?
$arUrlRewrite = array(
    array(
    "CONDITION" => "#^/test/#",
    "PATH" => "/test.php",
    ),
	array(
		"CONDITION" => "#^/blog/#",
		"RULE" => "",
		"ID" => "bitrix:blog",
		"PATH" => "/blog/index.php",
	),

    array(
		"CONDITION" => "#^/calculator/#",
		"PATH" => "/calculator/index.php",
	),
);
?>