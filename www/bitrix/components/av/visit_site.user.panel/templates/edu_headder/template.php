<?
use
	\Bitrix\Main\Page\Asset,
	\Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CJSCore::Init(["av_form_elements"]);
Asset::getInstance()->addJs("https://www.google.com/recaptcha/api.js");
/* -------------------------------------------------------------------- */
/* ---------------------------- logined bar --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["LOGINED"])):?>
<div id="av-auth-user-panel">

	<span><?=$arResult["LOGINED"]["USER_NAME"]?></span>
    <div class="user-bg" style="background: url('<?=$arResult["LOGINED"]["USER_PHOTO"] ? $arResult["LOGINED"]["USER_PHOTO"] : $this->GetFolder().'/images/user_default_icon.png'?>') no-repeat top"></div>

	<div class="user-exit">
        <form >
        <input type="hidden" name="logout" value="yes">
        <button hidden name="logout_butt"><?=Loc::getMessage("AV_AUTH_LOGINED_LOGOUT_BUTTON")?></button></form>
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 2000 2000" enable-background="new 0 0 2000 2000" xml:space="preserve">
            <g>
                <g>
                    <g>
                        <path fill="#CACBCD" d="M1911.8,1044.3c0.4-0.4,0.4-0.4,0.8-0.8c1.2-1.6,2.4-2.9,3.3-4.5c0.4-0.4,0.4-0.8,0.8-1.2
                            c0.8-1.6,2-3.3,2.9-4.9c0-0.4,0.4-0.8,0.4-0.8c0.8-1.6,1.6-3.3,2.4-5.3c0-0.4,0-0.4,0.4-0.8c0.8-1.6,1.2-3.7,2-5.7
                            c0-0.4,0-0.8,0.4-0.8c0.4-2,1.2-3.7,1.2-5.7c0-0.8,0-1.2,0.4-2c0.4-1.6,0.4-3.3,0.8-4.9c0.4-2.4,0.4-4.5,0.4-6.9
                            c0-2.4,0-4.5-0.4-6.9c0-1.6-0.4-3.3-0.8-4.9c0-0.8,0-1.2-0.4-2c-0.4-2-0.8-3.7-1.2-5.7c0-0.4,0-0.8-0.4-0.8c-0.4-2-1.2-3.7-2-5.7
                            c0-0.4,0-0.4-0.4-0.8c-0.8-1.6-1.6-3.7-2.4-5.3c0-0.4-0.4-0.8-0.4-0.8c-0.8-1.6-1.6-3.3-2.9-4.9c-0.4-0.4-0.4-0.8-0.8-1.2
                            c-1.2-1.6-2-3.3-3.3-4.5c-0.4-0.4-0.4-0.4-0.8-0.8c-1.6-1.6-2.9-3.7-4.9-5.3l-403.8-403.3c-27.4-27.4-71.9-27.4-99.2,0
                            c-27.4,27.4-27.4,71.9,0,99.2L1688.1,930H558.5c-38.8,0-70.2,31.4-70.2,69.8c0,38.8,31.4,70.2,70.2,70.2h1130l-282.1,282.1
                            c-27.4,27.4-27.4,71.9,0,99.2c13.5,13.5,31.4,20.4,49.4,20.4c18,0,35.9-6.9,49.4-20.4l401.3-401.3
                            C1908.6,1047.6,1910.2,1045.9,1911.8,1044.3z"/>
                        <path fill="#CACBCD" d="M451.9,140h522.6c38.8,0,70.2-31.4,70.2-69.8c0-38.8-31.4-70.2-70.2-70.2H451.9
                            C242.5,0,71.9,170.6,71.9,380.1v1239.8c0,209.4,170.6,380.1,380.1,380.1h514c38.8,0,70.2-31.4,70.2-69.8
                            c0-38.8-31.4-70.2-70.2-70.2h-514c-132.3,0-240-107.8-240-240V380.1C212.3,247.4,319.7,140,451.9,140z"/>
                    </g>
                </g>
            </g>
        </svg>
    </div>
</div>

<?endif?>
