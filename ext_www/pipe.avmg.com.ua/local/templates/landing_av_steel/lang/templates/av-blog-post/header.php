<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$serverName = \Bitrix\Main\Config\Option::get("main", "mail_link_protocol", "https", $arParams["SITE_ID"]).'://'.$arParams["SITE_NAME"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head><?/*
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"> */?>
		<title></title>
		<style type="text/css">
			@media only screen and (max-width:480px)
				{
				[lang=x-outer]{
					width:100% !important;
					}
				}
		</style>
	</head>
	<body>

