<?php
//pre($arParams);
//pre($arResult);
?>
<?foreach($arResult as $arItem):?>
    <li><a href="<?=$arItem['LINK']?>"><?=$arItem['TEXT']?></a></li>
<? endforeach?>
