<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "профнастил, профлист, металлочерепица");
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
    <div class="calc-inner-content">
        <div class="container">
            <div class="col-md-5 calc-left-side">
                <div class="calc-list">
                    <div class="calc-list-dropdown">
                        <span class="calc-dropdown-title">Марка профнастила:<span class="calc-dropdown-icon"><img src="/upload/av_site/landings/av-steel/arrow.png" alt=""></span></span>
                        <ul class="calc-dropdown-box">
                            <li><a href="#" class="calc-list-data">Профнастил С-8</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил С-10</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил Т-14</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил Т-18</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил ПК, ПС-20</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил НС-35</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил Н-44</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил НС-57</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил Н-75</a></li>
                        </ul>
                    </div>

                    <div class="calc-list-dropdown">
                        <span class="calc-dropdown-title">Покрытие:<span class="calc-dropdown-icon"><img src="/upload/av_site/landings/av-steel/arrow.png" alt=""></span></span>
                        <ul class="calc-dropdown-box">
                            <li><a href="#" class="calc-list-data">Профнастил С-8</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил С-10</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил Т-14</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил Т-18</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил ПК, ПС-20</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил НС-35</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил Н-44</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил НС-57</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил Н-75</a></li>
                        </ul>
                    </div>

                    <div class="calc-list-dropdown">
                        <span class="calc-dropdown-title">Толщина металла:<span class="calc-dropdown-icon"><img src="/upload/av_site/landings/av-steel/arrow.png" alt=""></span></span>
                        <ul class="calc-dropdown-box">
                            <li><a href="#" class="calc-list-data">Профнастил С-8</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил С-10</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил Т-14</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил Т-18</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил ПК, ПС-20</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил НС-35</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил Н-44</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил НС-57</a></li>
                            <li><a href="#" class="calc-list-data">Профнастил Н-75</a></li>
                        </ul>
                    </div>
                    <div class="field-write-block">
                        <input type="text" placeholder="Длина стены (L), м:" class="field-write">
                    </div>
                    <div class="field-write-block">
                        <input type="text" placeholder="Высота стены (h), м:" class="field-write">
                    </div>
                    <div class="field-write-block">
                        <input type="text" placeholder="Рабочая ширина листа (монтажная), мм:" class="field-write">
                    </div>
                    <div class="field-write-block">
                        <input type="text" placeholder="Общая ширина листа, мм:" class="field-write">
                    </div>
                    <div class="field-write-block">
                        <input type="text" placeholder="Цена грн. за кв.м.:" class="field-write">
                    </div>
                </div>
            </div>
            <div class="col-md-7 calc-right-side">
                <img src="/upload/av_site/landings/av-steel/calc-pict.png" alt="">
            </div>
        </div>
        <div class="calculate-btn-block">
            <button class="calculate-btn-active">Расчитать</button>
            <button class="calculate-btn-cancel">Сброс</button>
        </div>
    </div>
    <div class="container">
        <div class="calc-done-block">
            <div class="calc-inner-block">
                <h1>Расчёт произведён!</h1>
            </div>
            <div class="calc-done-rezult clearfix">
                <div class="col-md-3">
                    <div class="calc-done-list">
                        <span class="calc-done-txt">Количество листов:</span>
                        <span class="calc-done-num">9</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="calc-done-list">
                        <span class="calc-done-txt">Общая площадь:</span>
                        <span class="calc-done-num">21,6 m2</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="calc-done-list">
                        <span class="calc-done-txt">Цена:</span>
                        <span class="calc-done-num">150 грн</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="calc-done-list">
                        <span class="calc-done-txt">количество саморезов:</span>
                        <span class="calc-done-num">192 шт</span>
                    </div>
                </div>
            </div>
            <div class="calc-done-btn-block">
                <button class="calc-done-btn">Отправить заявку</button>
            </div>
        </div>
    </div>
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
