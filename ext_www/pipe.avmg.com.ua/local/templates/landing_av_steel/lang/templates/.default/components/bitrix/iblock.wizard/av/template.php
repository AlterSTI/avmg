<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="wizard">
    <style>
        .wizard table td,.wizard table th {
            padding: 0 !important;
            border: none !important;
        }
    </style>
<form method="post"  action="<?=POST_FORM_ACTION_URI?>" name="wizard">
<input type=hidden name=LAST_SECTION_ID value="<?=$arResult['LAST_SECTION_ID']?>">
<input type=hidden name=CURRENT_STEP value="<?=$arResult['CURRENT_STEP']?>">

<?
if ($arResult['ERROR'])
	echo '<div><font class=wizard_errortext>'.$arResult['ERROR'].'</font></div>';
elseif($arResult['MESSAGE'])
	echo '<div><font class=wizard_oktext>'.$arResult['MESSAGE'].'</font></div>';


?>
<table cellspacing=0 cellpadding=0 border=0 width=100%>


		<h3 class=wizard_title><?=GetMessage("WZ_TITLE")?></h3>
		<?
		if ($arResult['TOP_MESSAGE'])
			echo "<div class=wizard_smalltext>".$arResult['TOP_MESSAGE']."</div>";
?>
<tr>

	<td valign=bottom><div class=wizard_step><b><?=$arResult['CURRENT_STEP_TEXT']?></b></div></td>

</tr>

<tr>


	<td>
		<table cellspacing=0 cellpadding=8 border=0 width="100%" class="form-wrap">
			<?
			if (count($arResult['SECTIONS']))
			{
				echo '<tr><td>';
				foreach($arResult['SECTIONS'] as $f)
				{
					$id = $f['ID'];
					echo "<div class=wizard_sections>";
                    echo "<input type=radio name=SECTION_ID value='$id' id='section_$id'>";
                    echo " <label for='section_$id'><font class=text>".$f['NAME']."</font></label></div>";
				}
				echo '</td></tr>';
			}

			if (count($arResult['FIELDS']))
			{
				$i=0;
				foreach($arResult['FIELDS'] as $num=>$f)
				{
					if (trim($f['DETAIL_TEXT']))
					{
						$i++;
						$link = '&nbsp;<a href="#note'.$i.'"><sup>'.$i.'</sup></a>';
						$arHelp[$i] = $f['DETAIL_TEXT'];
					}
					else
						$link = '';


					$id = $f['FIELD_ID'];

					echo '<tr>
						<td valign=top align=left>';

					if ($f['FIELD_TYPE']=='text') // simple input field
						echo '<div class="wizard_field_name">' . $f['NAME'] . ':</div>' .
								'<input name="wizard['.$id.']" size=65 value="'.$f['FIELD_VALUE'].'">' .
									'<br><font class=smalltext>' . $f['PREVIEW_TEXT'] . $link . '</font>';
					elseif ($f['FIELD_TYPE']=='checkbox') // checkbox
						echo '<div class="wizard_field_name"><input type=checkbox value="'.GetMessage('WZ_YES').'" name="wizard['.$id.']" '.($f['FIELD_VALUE']?'checked':'').' id="'.$id.'">' .
							'<label for="'.$id.'"><b>' . $f['NAME'] . '</b></label></div>' .
								'<font class=smalltext>' . $f['PREVIEW_TEXT'] . $link . '</font>';
					elseif ($f['FIELD_TYPE']=='select') // select box
					{
						echo 	'<div class="wizard_field_name">' . $f['NAME'] . ':</div>' .
								'<select name="wizard['.$id.']">';

							foreach($f['FIELD_VALUES'] as $v)
								echo '<option value="'.$v.'" '.($f['FIELD_VALUE']==$v?'selected':'').'>'.$v.'</option>';

						echo ' </select>' .
								'<br><font class=smalltext>' . $f['PREVIEW_TEXT'] . $link . '</font>';
					}
					elseif ($f['FIELD_TYPE']=='radio') // radio box
					{
						echo 	'<div class="wizard_field_name">' . $f['NAME'] . ':</div>' .
								'<table cellspacing=2 cellpadding=0 border=0>';
							foreach($f['FIELD_VALUES'] as $k=>$v)
								echo '<tr><td align=left><input type=radio name="wizard['.$id.']" value="'.$v.'" '.($f['FIELD_VALUE']==$v?'checked':'').' id="'.$id.'_'.$k.'"><label for="'.$id.'_'.$k.'"> '.$v.'</label></td></tr>';
						echo	'</table><font class=smalltext>' . $f['PREVIEW_TEXT'] . $link . '</font>';
					}
					elseif ($f['FIELD_TYPE']=='multitext') // input options
					{
						echo 	'<div class="wizard_field_name">' . $f['NAME'] . ':</div>' .
								'<table cellspacing=2 cellpadding=0 border=0>';
							foreach($f['FIELD_VALUES'] as $k=>$v)
								echo '<tr><td align=right>'.$v.':</td><td><input name="wizard['.$id.']['.$k.']" value="'.($f['FIELD_VALUE'][$k]).'"></td></tr>';
						echo	'</table><font class=smalltext>' . $f['PREVIEW_TEXT'] . $link . '</font>';
					}
					else // textarea, default
						echo 	'<div class="wizard_field_name">' . $f['NAME'] . ':</div>' .
								'<textarea name="wizard['.$id.']" rows=3 >'.$f['FIELD_VALUE'].'</textarea>' .
									'<br><font class=smalltext>' . $f['PREVIEW_TEXT'] . $link . '</font>';

					echo '	</td>
						</tr>';

					unset($arResult['FIELDS'][$field_num]['FIELD_VALUE']);
				}
			}

?>
		</table>
	</td>

</tr>
<tr>

	<td>
        <p align=right style="padding-right:15px;padding-top:15px">
            <? if (count($arResult['SECTIONS'])) { ?>
                <? if ($arResult['CURRENT_STEP']>1)
                {
                        echo '<input   type=submit value="1'.GetMessage('WZ_BTN_BACK').'" name="back">';
                }
                elseif ($arParams['BACK_URL'])
                {


                        $APPLICATION->IncludeComponent
                        (
                            "av:form.button", "av",
                            [
                                "BUTTON_TYPE" => 'submit',
                                "NAME"        => 'back',
                                "TITLE"       => GetMessage('WZ_BTN_BACK'),

                            ],
                            false, ["HIDE_ICONS" => 'Y']
                        );
                }
                ?>

            <?
                $APPLICATION->IncludeComponent
                (
                    "av:form.button", "av",
                    [
                        "BUTTON_TYPE" => 'submit',
                        "NAME"        => 'next',
                        "TITLE"       => GetMessage('WZ_BTN_NEXT'),

                    ],
                    false, ["HIDE_ICONS" => 'Y']
                );
            ?>
            <? } else { // Finish ?>
                <script>
                    function Goto(url)
                    {
                        var wizard = document.forms.wizard;
                        wizard.action=url;
                        BX.submit(wizard);
                    }
                </script>

            <?
            $img = $templateFolder.'/images/'.LANGUAGE_ID.'/button_back.gif';
            if (file_exists($_SERVER['DOCUMENT_ROOT'].$img))

                echo '<input  class="back-btn" type=submit value="'.GetMessage('WZ_BTN_BACK').'" name="back">';

                if (file_exists($_SERVER['DOCUMENT_ROOT'].$img))

                    echo '<input class="next-btn"  type=submit value="'.GetMessage('WZ_BTN_FINISH').'" name="wizard" onclick="Goto(\''.htmlspecialcharsbx(addslashes($arParams['NEXT_URL'])).'\')">'

                ?>
            <? } ?>
        </p>
    </td>
    <td style="border-right:1px solid #BEC0CF"><img src="/bitrix/images/1.gif" width=1 height=1></td>
</tr>

</table>
    <?
    if (count($arResult['HIDDEN']))
    {
        foreach($arResult['HIDDEN'] as $k=>$v)
        {
            if (is_array($v))
                foreach($v as $k1=>$v1)
                    echo '<input type=hidden name="wizard['.$k.']['.$k1.']" value="'.$v1.'">';
            else
                echo '<input type=hidden name="wizard['.$k.']" value="'.$v.'">';
        }
    }
    ?>
</form>
    <?

    // Help
    if (count($arHelp))
    {
        ?>
        <br>
        <table cellspacing=4 cellpadding=2 style="background-color:#FFFFEF;border:1px solid #d7d7be;" width="100%">
            <?
            foreach($arHelp as $i=>$help)
                echo '<tr><td valign=top><font class=smalltext><b>'.$i.'.</b></font></td><td><font class=smalltext><a name="note'.$i.'"></a> ' . $help . '</font></td></tr>';
            ?>
        </table>
        <?
    }
    ?>
</div>

