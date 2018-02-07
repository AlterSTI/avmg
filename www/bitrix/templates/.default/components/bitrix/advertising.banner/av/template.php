<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["BANNERS_INFO"]))                           return;
?>
<div class="av-banner">
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------ slides ------------------------------ */
	/* -------------------------------------------------------------------- */
	?>
	<?foreach($arResult["BANNERS_INFO"] as $index => $bannerInfo):?>
	<div class="item<?if($index === 0):?> first<?endif?>">
		<?
		/* ------------------------------------------- */
		/* ------------------ link ------------------- */
		/* ------------------------------------------- */
		?>
		<?if($bannerInfo["LINK"]["LINK"]):?>
		<a
			class="link"
			href="<?=$bannerInfo["LINK"]["LINK"]?>"
			title="<?=$bannerInfo["LINK"]["TITLE"]?>"
			target="<?=$bannerInfo["LINK"]["TARGET"]?>"
		>
		</a>
		<?endif?>
		<?
		/* ------------------------------------------- */
		/* ------------------ image ------------------ */
		/* ------------------------------------------- */
		?>
		<?if($bannerInfo["IMAGE"]["LINK"]):?>
		<div class="image">
			<img
				src="<?=$bannerInfo["IMAGE"]["LINK"]?>"
				alt="<?=$bannerInfo["IMAGE"]["ALT"]?>"
				title="<?=$bannerInfo["IMAGE"]["TITLE"]?>"
			>
		</div>
		<?endif?>
		<?
		/* ------------------------------------------- */
		/* ------------------ video ------------------ */
		/* ------------------------------------------- */
		?>
		<?if($bannerInfo["VIDEO"]["LINK"]):?>
		<div class="video">
			<iframe
				<?if($bannerInfo["VIDEO"]["YOUTUBE_VIDEO_ID"]):?>class="youtube"<?endif?>
				src="<?=$bannerInfo["VIDEO"]["LINK"]?>"
			></iframe>
		</div>
		<?endif?>
		<?
		/* ------------------------------------------- */
		/* ------------------ text ------------------- */
		/* ------------------------------------------- */
		?>
		<?if($bannerInfo["TITLE"]["TEXT"] || $bannerInfo["PREVIEW"]["TEXT"] || $bannerInfo["BUTTON"]["LINK"]):?>
		<div class="text-block">
			<?if($bannerInfo["TITLE"]["TEXT"]):?>
			<h2><?=$bannerInfo["TITLE"]["TEXT"]?></h2>
			<?endif?>

			<?if($bannerInfo["PREVIEW"]["TEXT"]):?>
			<div class="text"><?=$bannerInfo["PREVIEW"]["TEXT"]?></div>
			<?endif?>

			<?
			if($bannerInfo["BUTTON"]["LINK"])
				$APPLICATION->IncludeComponent
					(
					"av:form.button", "av",
						[
						"BUTTON_TYPE" => "link",
						"LINK"        => $bannerInfo["BUTTON"]["LINK"],
						"TITLE"       => $bannerInfo["BUTTON"]["TEXT"],
						"PLACEHOLDER" => $bannerInfo["BUTTON"]["TITLE"],
						"ATTR"        => ["target" => $bannerInfo["BUTTON"]["TARGET"]]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
			?>
		</div>
		<?endif?>
	</div>
	<?endforeach?>
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------ pager ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<?if(count($arResult["BANNERS_INFO"]) > 1):?>
	<div class="pager">
		<?foreach($arResult["BANNERS_INFO"] as $index => $bannerInfo):?>
		<div<?if($index === 0):?> class="selected"<?endif?> tabindex="0"></div>
		<?endforeach?>
	</div>
	<?endif?>
</div>