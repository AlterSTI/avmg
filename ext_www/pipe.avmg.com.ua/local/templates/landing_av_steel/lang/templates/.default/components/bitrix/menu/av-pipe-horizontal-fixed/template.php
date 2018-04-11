<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (empty($arResult)) return;
?>

<ul class="col-md-12  av-pipe-horizontal-main-menu-fixed hidden-xs hidden-sm text-center text-uppercase">
    <?
        if(!isset($arParams['MAX_LEVEL']) || empty($arParams['MAX_LEVEL']) || $arParams['MAX_LEVEL'] == 1) {
            require_once('levels/level1.php');
        }else if (isset($arParams['MAX_LEVEL']) && $arParams['MAX_LEVEL'] > 4){
            require_once('levels/level4.php');
        } else {
            require_once('levels/level'.$arParams['MAX_LEVEL'].'php');
        }
    ?>
</ul>

