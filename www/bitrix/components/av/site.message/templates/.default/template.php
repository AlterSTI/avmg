<?php
use \Bitrix\Main\Localization\Loc;
/*Loc::getMessage();
pre($arParams);*/
?>

<div id = "old_browser_message" class = "old_browser_message">

    <span><?=Loc::getMessage('MESSAGE_OLD_BROWSER');?></span>
    <div class="close_old_browser_message" onclick="close_old_browser_message()"><i class="fa fa-times" aria-hidden="true"></i>
    </div>
</div>
