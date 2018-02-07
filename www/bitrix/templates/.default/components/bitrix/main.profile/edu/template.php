<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

<div class="bx-auth-profile">
    <div class="profile-link profile-user-div-link "><h3><?=GetMessage("USER_PERSONAL_INFO")?></h3></div>
<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<script type="text/javascript">
<!--
var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
if (strlen($arResult["opened"]) > 0)
{
	echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
}
else
{
	$arResult["opened"] = "reg";
	echo "'reg'";
}
?>];
//-->

var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>
<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" class="av-user-profile">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value="<?=$arResult["ID"]?>" />

	<div class="col-md-8">

        <div class="col-md-4 col-md-offset-1">

            <div class="input-wrap">
                <label>
                    <?=GetMessage('NAME')?>
                    <input type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" />
                </label>

                <label>
                    <?=GetMessage('LAST_NAME')?>
                    <input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" />
                </label>


                <label>
                    <?=GetMessage('SECOND_NAME')?></font>
                 <input type="text" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" />
                </label>

                <label>
                    <?=GetMessage('EMAIL')?><?if($arResult["EMAIL_REQUIRED"]):?><span class="starrequired">*</span><?endif?>
                    <input type="text" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"]?>" />
                </label>


                <label>
                    <?=GetMessage('LOGIN')?><span class="starrequired">*</span>
                   <input type="text" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"]?>" />
                </label>


                <?if($arResult["arUser"]["EXTERNAL_AUTH_ID"] = ''):?>

                    <label>
                        <?=GetMessage('NEW_PASSWORD_REQ')?>
                        <input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input" />
                    </label>
                    <?if($arResult["SECURE_AUTH"]):?>
                        <span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
                        <noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
                        </noscript>
                        <script type="text/javascript">
                            document.getElementById('bx_auth_secure').style.display = 'inline-block';
                        </script>

                    <?endif?>

                        <label>
                        <?=GetMessage('NEW_PASSWORD_CONFIRM')?>
                        <input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" /></label>

                <?endif?>

            </div>


<?if($arResult["arUser"]["EXTERNAL_AUTH_ID2"] == ''):?>
					<? $APPLICATION->IncludeComponent
							(
							"av:form.input.password", "av-form",
								[
								"NAME"     => $arrayInfo["NEW_PASSWORD"],
								"VALUE"    => "",
								"TITLE"    => GetMessage('NEW_PASSWORD_REQ'),
								"CLASS"    => "bx-auth-input"
								]
							);
					?>

<?if($arResult["SECURE_AUTH"]):?>
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
				<noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
				</noscript>
<script type="text/javascript">
document.getElementById('bx_auth_secure').style.display = 'inline-block';
</script>
<?endif?>
					<?
						$APPLICATION->IncludeComponent
							(
							"av:form.input.password", "av-form",
								[
								"NAME"     => $arrayInfo["NEW_PASSWORD_CONFIRM"],
								"VALUE"    => "",
								"TITLE"    => GetMessage('NEW_PASSWORD_CONFIRM')
								]
							);
					?>


<?endif?>
            <div class="hidden-sm hidden-xs text-center"><br>
                <?
                $APPLICATION->IncludeComponent
                (
                    "av:form.button", "av",
                    [
                        "BUTTON_TYPE" => 'submit',
                        "NAME"        => 'save',
                        "TITLE"       => GetMessage("MAIN_SAVE"),
                        "ATTR"        => 'submit-button'
                    ]
                );
                ?>
                &nbsp;&nbsp;
                <?
                $APPLICATION->IncludeComponent
                (
	                "av:form.button", "av",
                    [
                        "BUTTON_TYPE" => 'reset',
                        "NAME"        => 'reset',
                        "TITLE"       => GetMessage("MAIN_RESET"),
                        "ATTR"        => ['class'=>'btn-reset']
                    ]
                );
                ?>
            </div>
        </div>

        <div class=" hidden-md hidden-lg col-md-12 userPhotoSectionMobile text-center">


            <br>
            <div hidden ><?=$arResult["arUser"]["PERSONAL_PHOTO_INPUT"]?></div>
            <?
            if (strlen($arResult["arUser"]["PERSONAL_PHOTO"])>0)
            {
                ?>
                <?=$arResult["arUser"]["PERSONAL_PHOTO_HTML"]?>
                <span id="downloadPhoto" class="av-form-elements-av_site-button "><?echo GetMessage("UPLOAD_PHOTO")?></span>
                <span id="deletePhoto" class="av-form-elements-av_site-button"><?echo GetMessage("DELETE_PHOTO")?></span>
                <?
            }
            ?>
            <br>
        </div>


<div class="col-md-4 col-md-offset-1">

    <label><?=GetMessage("USER_NOTES")?>
        <textarea cols="30" rows="5" name="PERSONAL_NOTES"><?=$arResult["arUser"]["PERSONAL_NOTES"]?></textarea>
    </label>
    <?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>

        <div id="user_div_user_properties" class="profile-block-<?=strpos($arResult["opened"], "user_properties") === false ? "hidden" : "shown"?>">

                <?$first = true;?>
                <div hidden>
                <?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
                    <label >
                            <?if ($arUserField["MANDATORY"]=="Y"):?>
                                <span class="starrequired">*</span>
                            <?endif;?>


                            <?$APPLICATION->IncludeComponent(
                                "bitrix:system.field.edit",
                                $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                                array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField), null, array("HIDE_ICONS"=>"N"));?></label>
                <?endforeach;?>
                </div>
            <label >Резюме:<br>
                    <?
            $APPLICATION->IncludeComponent
            (
                "av:form.file", "av-form",
                [

                    "NAME" => 'UF_RESUME_FILE',
                    "NAME_DELETE" => 'UF_RESUME_FILE_del',
                    "TITLE" => 'Загрузить резюме',
                    "VALUE" => $arUserField['VALUE']
                ],
                false, ["HIDE_ICONS" => 'Y']
            );
            $rsFile = CFile::GetPath($arUserField['VALUE']);


            ?></label>
            <br>
            <span>Размер не должен превышать 10 мб <br>Допустимые типы файлов: doc, pdf, txt</span>
        </div>
    <?endif;?>
    <br>
        <?/*   SOCIAL ICONS !!!!!!!!!!!!!!!!!!
        if($arResult["SOCSERV_ENABLED"])
        {
            $APPLICATION->IncludeComponent(
                "bitrix:socserv.auth.split",
                "av-twitpost",
                array(
                    "SHOW_PROFILES" => "Y",
                    "ALLOW_DELETE" => "Y",
                    "COMPONENT_TEMPLATE" => "av-twitpost",
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO"
                ),
                false
            );
        }
        */?>

</div>

</div>
<div class="col-md-4 hidden-sm hidden-xs userPhotoSection text-center">


    <br>
		<div hidden ><?=$arResult["arUser"]["PERSONAL_PHOTO_INPUT"]?></div>
			<?
			if (strlen($arResult["arUser"]["PERSONAL_PHOTO"])>0)
			{
			?>
				<?=$arResult["arUser"]["PERSONAL_PHOTO_HTML"]?>
                <span id="downloadPhoto" class="av-form-elements-av_site-button "><?echo GetMessage("UPLOAD_PHOTO")?></span>
		<span id="deletePhoto" class="av-form-elements-av_site-button"><?echo GetMessage("DELETE_PHOTO")?></span>
			<?
			}
			?>
<br>
</div>
<div class="hidden-lg hidden-md text-center">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					[
					"BUTTON_TYPE" => 'submit',
					"NAME"        => 'save',
					"TITLE"       => GetMessage("MAIN_SAVE"),
					"ATTR"        => 'submit-button'
					]
				);
			?>
&nbsp;&nbsp;
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					[
					"BUTTON_TYPE" => 'reset',
					"NAME"        => 'reset',
					"TITLE"       => GetMessage("MAIN_RESET"),
					"ATTR"        => ''
					]
				);
			?>
</div>




	<?// ******************** /User properties ***************************************************?>


</form></div>

