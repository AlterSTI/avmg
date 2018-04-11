<?if($workAreaType == 'left_menu_page'):?>
    </div>

<?endif?>

<div class="col-md-10 col-sm-12 col-xs-12 discription"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/footer-text.php'))?></div>
<?if($workAreaType != 'full_screen_page'):?>
    </div>

<?endif?>
</div>



</body>
</html>