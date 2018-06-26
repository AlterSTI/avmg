<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?$APPLICATION->SetPageProperty("keywords", "профнастил, профлист, металлочерепица");
$APPLICATION->SetPageProperty("description", "Полезные советы про металлочерепицу и профнастил! Звоните ☎(067)566-05-54 Мы расскажем как правильно рассчитать✔выбрать✔крепить профлист!");
$APPLICATION->SetTitle("Профнастил и металлочерепица: выбор, стоимость, применение и монтаж 🏠 | Статьи AVsteel ✏ avsteel.com.ua");
CJSCore::Init(["jquery", "fx"]);
$APPLICATION->SetAdditionalCSS(implode('/', $pageUrlArray).'/style.css');

CPageOption::SetOptionString("main", "nav_page_in_session", "N");
?>
    <div class="av-calc-wrap">
    <div class="container">
        <div class="calc-inner-block">
            <h1 class="calc-main-top">Калькулятор расчета профнастила</h1>
            <span>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/include/calc/calc_title.php"
                    )
                );?>
            </span>
        </div>
    </div>
        <div class="calc-component">
            <?$APPLICATION->IncludeComponent(
               "av:catalog.calculator.decking",
               ".default",
                array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "IBLOCK_DECKING_ID" => "149",
                    "SECTION_DECKING_ID" => "3095",
                    "PROPERTY_COATING" => "1287",
                    "IBLOCK_DECKING_ID_OLD" => "149",
                    "PROPERTY_THICKNESS" => "1285",
                    "PROPERTY_WORKING_WIDTH" => "1290",
                    "PROPERTY_TOTAL_WIDTH" => "1284"
                ),
                false
            );?>
        </div>
    </div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>