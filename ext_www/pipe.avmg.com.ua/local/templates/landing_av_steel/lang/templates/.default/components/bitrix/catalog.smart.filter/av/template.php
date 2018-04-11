<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["ITEMS"]))                                  return;
?>
<form
	class="
		av-smart-filter
		<?if($arResult["FILTER_CONDITION"] == "open"):?>active<?endif?>
		"
	name="<?=$arResult["FILTER_NAME"]?>_form"
	action="<?=$arResult["FORM_ACTION"]?>"
	method="get"
>
	<?foreach($arResult["HIDDEN"] as $arItem):?>
	<input type="hidden" name="<?=$arItem["CONTROL_NAME"]?>" id="<?=$arItem["CONTROL_ID"]?>" value="<?=$arItem["HTML_VALUE"]?>">
	<?endforeach?>
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- head ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<div class="head">
		<div class="title"><?=Loc::getMessage("AV_SMART_FILTER_TITLE")?></div>
		<i class="arrow fa fa-angle-down"></i>
	</div>
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- body ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<div class="body-wraper">
		<div class="body">
			<?
			/* ------------------------------------------- */
			/* -------------- fields block --------------- */
			/* ------------------------------------------- */
			?>
			<div class="fields-block">
				<?foreach($arResult["ITEMS"] as $fieldInfo):?>
					<?if(!$fieldInfo["PRICE"]):?>
					<div class="field-cell">
						<?
						/* ---------------------------- */
						/* ------ list multiple ------- */
						/* ---------------------------- */
						?>
						<?if($fieldInfo["DISPLAY_TYPE"] == 'F'):?>
						<div class="
							field
							multiple
							<?if($fieldInfo["DISPLAY_EXPANDED"] == 'Y'):?>open active<?else:?>closed<?endif?>
							<?if($fieldInfo["APPLIED"]):?>applied<?endif?>
							"
						>
							<div class="title-block">
								<div class="title">
									<div class="text"><?=$fieldInfo["NAME"]?></div>
									<i class="condition fa fa-check"></i>
								</div>
								<i class="arrow fa fa-angle-down"></i>
							</div>
							<ul>
								<?foreach($fieldInfo["VALUES"] as $listItemInfo):?>
								<li <?if($listItemInfo["CHECKED"]):?>class="checked"<?endif?>>
									<i class="icon fa fa-check"></i>
									<div class="title"><?=$listItemInfo["VALUE"]?></div>
									<input
										type="checkbox"
										value="Y"
										name="<?=$listItemInfo["CONTROL_NAME"]?>"
										<?if($listItemInfo["CHECKED"]):?>checked<?endif?>
									>
								</li>
								<?endforeach?>
							</ul>
						</div>
						<?
						/* ---------------------------- */
						/* ------- list single -------- */
						/* ---------------------------- */
						?>
						<?elseif($fieldInfo["DISPLAY_TYPE"] == "K" || $fieldInfo["DISPLAY_TYPE"] == "P"):?>
						<div class="
							field
							single
							<?if($fieldInfo["DISPLAY_EXPANDED"] == 'Y'):?>open active<?else:?>closed<?endif?>
							<?if($fieldInfo["APPLIED"]):?> applied<?endif?>
							"
						>
							<input
								type="radio"
								name="<?=$fieldInfo["INPUT_NAME"]?>"
								value="<?=$fieldInfo["INPUT_VALUE"]?>"
								checked
							>
							<div class="title-block">
								<div class="title">
									<div class="text"><?=$fieldInfo["NAME"]?></div>
									<div class="condition"></div>
								</div>
								<i class="arrow fa fa-angle-down"></i>
							</div>
							<ul>
								<li
									class="default<?if(!$fieldInfo["APPLIED"]):?> checked<?endif?>"
									data-value=""
								>
									<?=Loc::getMessage("AV_SMART_FILTER_LIST_VALUE_ALL")?>
								</li>
								<?foreach($fieldInfo["VALUES"] as $listItemInfo):?>
								<li
									<?if($listItemInfo["CHECKED"]):?>class="checked"<?endif?>
									data-value="<?=$listItemInfo["HTML_VALUE_ALT"]?>"
								>
									<?=$listItemInfo["VALUE"]?>
								</li>
								<?endforeach?>
							</ul>
						</div>
						<?
						/* ---------------------------- */
						/* ----------- list ----------- */
						/* ---------------------------- */
						?>
						<?else:?>
							<pre>
								<?print_r($fieldInfo)?>
							</pre>
						<?endif?>
					</div>
					<?endif?>
				<?endforeach?>
			</div>
			<?
			/* ------------------------------------------- */
			/* -------------- control block -------------- */
			/* ------------------------------------------- */
			?>
			<div class="control-block">
				<div class="buttons-row">
					<?
					$APPLICATION->IncludeComponent
						(
						"av:form.button", "av-shop",
							[
							"BUTTON_TYPE" => 'link',
							"LINK"        => $arResult["SEF_SET_FILTER_URL"],
							"TITLE"       => Loc::getMessage("AV_SMART_FILTER_APPLY_FILTER"),
							"ATTR"        => 'apply-button'
							],
						false, ["HIDE_ICONS" => 'Y']
						);
					$APPLICATION->IncludeComponent
						(
						"av:form.button", "av-shop-alt2",
							[
							"BUTTON_TYPE" => 'link',
							"LINK"        => $arResult["SEF_DEL_FILTER_URL"],
							"TITLE"       => Loc::getMessage("AV_SMART_FILTER_CLEAR_FILTER"),
							"ATTR"        => 'clear-button'
							],
						false, ["HIDE_ICONS" => 'Y']
						);
					?>
				</div>
				<div class="items-count">
					<?=Loc::getMessage("AV_SMART_FILTER_ITEMS_COUNT", ["#COUNT#" => '<span class="count"></span>'])?>
				</div>
			</div>
		</div>
	</div>
</form>