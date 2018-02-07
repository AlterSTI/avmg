<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
CJSCore::RegisterExt("bootstrap", ["css" => "/bitrix/css/main/bootstrap.supermin.css"]);
?>
<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- HEAD ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<head>
    <title><?$APPLICATION->ShowTitle()?></title>
	<link rel="icon" type="image/x-icon" href="/bitrix/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, width=device-width">
    <?$APPLICATION->ShowHead()?>
    <?CJSCore::Init(["jquery","bootstrap"]); ?>
</head>
<div id="panel"><?$APPLICATION->ShowPanel()?></div>
<body id="av-alfasintez">
<script> 
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ 
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), 
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) 
})(window,document,'script','https://www.google-analytics.com/analy....js','ga'); 

ga('create', 'UA-93102149-1', 'auto'); 
ga('send', 'pageview'); 

</script> 
