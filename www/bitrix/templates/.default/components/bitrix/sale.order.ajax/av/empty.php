<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<div class="bx-soa-empty-cart-container">
	<div class="bx-soa-empty-cart-image">
		<img src="" alt="">
	</div>
	<div class="bx-soa-empty-cart-text"><?=Loc::getMessage("EMPTY_BASKET_TITLE")?></div>
	<div class="bx-soa-empty-cart-desc"><?=Loc::getMessage(
			'EMPTY_BASKET_HINT',
			array(
				'#A1#' => '<a href="/">',
				'#A2#' => '</a>'
			))?>
	</div>
</div>