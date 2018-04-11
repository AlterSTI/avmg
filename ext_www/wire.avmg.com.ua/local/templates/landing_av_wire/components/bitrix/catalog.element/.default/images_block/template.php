<?//
//if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
///* -------------------------------------------------------------------- */
///* --------------------------- image block ---------------------------- */
///* -------------------------------------------------------------------- */
//?>
<!--<div class="main-image-wraper">-->
<!--	--><?//if(count($arResult["IMAGES"][0])):?>
<!--		<img-->
<!--			src="--><?//=$arResult["IMAGES"][0]["SRC"]?><!--"-->
<!--			alt="--><?//=$arResult["IMAGES"][0]["ALT"]?><!--"-->
<!--			title="--><?//=$arResult["IMAGES"][0]["TITLE"]?><!--"-->
<!--		>-->
<!--	--><?//else:?>
<!--		<img-->
<!--			class="default"-->
<!--			src="--><?//=$this->GetFolder()?><!--/images/default_image.jpg"-->
<!--			alt="--><?//=$arResult["NAME"]?><!--"-->
<!--			title="--><?//=$arResult["NAME"]?><!--"-->
<!--		>-->
<!--	--><?//endif?>
<!--</div>-->
<!---->
<?//if(count($arResult["IMAGES"]) > 1):?>
<!--<div class="slider">-->
<!--	<i class="navigation prev fa fa-angle-left"></i>-->
<!---->
<!--	<div class="slider-block">-->
<!--		--><?//for($i = 0;$i <= count($arResult["IMAGES"]) - 1;$i++):?>
<!--		<div class="slider-image">-->
<!--			<img-->
<!--				src="--><?//=$arResult["IMAGES"][$i]["SRC"]?><!--"-->
<!--				alt="--><?//=$arResult["IMAGES"][$i]["ALT"]?><!--"-->
<!--				title="--><?//=$arResult["IMAGES"][$i]["TITLE"]?><!--"-->
<!--			>-->
<!--		</div>-->
<!--		--><?//endfor?>
<!--	</div>-->
<!---->
<!--	<i class="navigation next fa fa-angle-right"></i>-->
<!--</div>-->
<?//endif?>
<?//
///* -------------------------------------------------------------------- */
///* ---------------------------- big slider ---------------------------- */
///* -------------------------------------------------------------------- */
//?>
<?//if(count($arResult["IMAGES"][0])):?>
<!--<div class="av-catalog-element-image-viewer--><?//if(count($arResult["IMAGES"]) > 1):?><!-- has-slider--><?//endif?><!--">-->
<!--	<i class="close fa fa-times"></i>-->
<!--	<div class="title">--><?//=$arResult["NAME"]?><!--</div>-->
<!--	<div class="body">-->
<!--		<div class="slider-main">-->
<!--			<i class="navigation prev fa fa-angle-left"></i>-->
<!---->
<!--			<div class="slider-block">-->
<!--				--><?//for($i = 0;$i <= count($arResult["IMAGES"]) - 1;$i++):?>
<!--				<div class="slider-image">-->
<!--					<img-->
<!--						src="--><?//=$arResult["IMAGES"][$i]["SRC"]?><!--"-->
<!--						alt="--><?//=$arResult["IMAGES"][$i]["ALT"]?><!--"-->
<!--						title="--><?//=$arResult["IMAGES"][$i]["TITLE"]?><!--"-->
<!--					>-->
<!--				</div>-->
<!--				--><?//endfor?>
<!--			</div>-->
<!---->
<!--			<i class="navigation next fa fa-angle-right"></i>-->
<!--		</div>-->
<!---->
<!--		--><?//if(count($arResult["IMAGES"]) > 1):?>
<!--		<div class="slider-vertical">-->
<!--			<i class="navigation prev fa fa-angle-up"></i>-->
<!---->
<!--			<div class="slider-block">-->
<!--				--><?//for($i = 0;$i <= count($arResult["IMAGES"]) - 1;$i++):?>
<!--				<div class="slider-image">-->
<!--					<img-->
<!--						src="--><?//=$arResult["IMAGES"][$i]["SRC"]?><!--"-->
<!--						alt="--><?//=$arResult["IMAGES"][$i]["ALT"]?><!--"-->
<!--						title="--><?//=$arResult["IMAGES"][$i]["TITLE"]?><!--"-->
<!--					>-->
<!--				</div>-->
<!--				--><?//endfor?>
<!--			</div>-->
<!---->
<!--			<i class="navigation next fa fa-angle-down"></i>-->
<!--		</div>-->
<!--		--><?//endif?>
<!--	</div>-->
<!--</div>-->
<?//endif?>