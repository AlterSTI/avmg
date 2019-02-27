<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
//pre($arParams);
?>
<div class="calc-inner-content">
                <div class="container">
                    <div class="col-xs-7 col-sm-7 col-md-5 calc-left-side">
                        <div class="calc-list">
                            <div class="calc-dropdown-title-selected"></div>
                            <div class="calc-list-dropdown product">
                                <span class="calc-dropdown-title" data-title="Марка профнастила:" data-value="">Марка профнастила:</span>
                                <ul class="calc-dropdown-box closed">
                                    <?foreach ($arResult['ITEMS'] as $item){?>
                                        <li><span class="calc-list-data"
                                                  data-product="<?=$item['ID']?>"
                                                  data-value="<?=$item['VALUE']?>"><?=$item['VALUE']?></span></li>
                                    <?}?>
                                </ul>
                            </div>
                            <div class="calc-dropdown-title-selected"></div>
                            <div class="calc-list-dropdown coating">
                                <span class="calc-dropdown-title" data-title="Покрытие:" data-value="">Покрытие:</span>
                                <ul class="calc-dropdown-box closed">
                                    <?foreach ($arResult['COATING'] as $item){?>
                                        <li><span class="calc-list-data"
                                                  data-product="<?=implode(' ',$item['ORDERS'])?>"
                                                  data-coating="<?=$item['ID']?>"
                                                  data-hidden = ""
                                                  data-value="<?=$item['VALUE']?>"><?=$item['VALUE']?>
                                            </span>
                                        </li>
                                    <?}?>

                                </ul>
                            </div>
                            <div class="calc-dropdown-title-selected"></div>
                            <div class="calc-list-dropdown thickness">
                                <span class="calc-dropdown-title" data-title="Толщина металла, мм:" data-value="">Толщина металла, мм:</span>
                                <ul class="calc-dropdown-box closed">
                                    <?foreach ($arResult['THICKNESS'] as $item){?>
                                        <li><span class="calc-list-data"
                                                  data-product="<?=implode(' ',$item['ORDERS'])?>"
                                                  data-coating="<?=implode(' ',$item['COATING'])?>"
                                                  data-tickness="<?=$item['ID']?>"
                                                  data-hidden = ""
                                                  data-value="<?=$item['VALUE']?>"><?=$item['VALUE']?>
                                            </span>
                                        </li>
                                    <?}?>
                                </ul>
                            </div>
                            <div class="field-write-block">
                                <span class="popup-right-numbers">min 1м, max 10000м</span>
                                <span class="calc-input-title-selected"></span>
                                <input type="text" placeholder="Длина стены (L), м:" class="field-write length-wall change-txt" data-value="">
                            </div>
                            <div class="field-write-block">
                                <span class="popup-right-numbers">min 0.5м, max 12м</span>
                                <span class="calc-input-title-selected"></span>
                                <input type="text" placeholder="Высота стены (h), м:" class="field-write height-wall change-txt" data-value="">
                            </div>
                            <div class="calc-dropdown-title-selected"></div>
                            <div class="calc-list-dropdown working-width">
                                <span class="calc-dropdown-title" data-title="Рабочая ширина листа (монтажная), мм:" data-value="">Рабочая ширина листа (монтажная), мм:</span>
                                <ul class="calc-dropdown-box closed">
                                    <?foreach ($arResult['WORKING_WIDTH'] as $item){?>
                                        <li>
                                            <span class="calc-list-data"
                                                  data-product="<?=implode(' ',$item['ORDERS'])?>"
                                                  data-coating="<?=implode(' ',$item['COATING'])?>"
                                                  data-tickness="<?=implode(' ',$item['THICKNESS'])?>"
                                                  data-hidden = ""
                                                  data-value="<?=$item['VALUE']?>"><?=$item['VALUE']?>
                                            </span>
                                        </li>
                                    <?}?>
                                </ul>
                            </div>
                            <div class="calc-dropdown-title-selected"></div>
                            <div class="calc-list-dropdown total-width">
                                <span class="calc-dropdown-title" data-title="Общая ширина листа, мм:" data-value="">Общая ширина листа, мм:</span>
                                <ul class="calc-dropdown-box closed">
                                    <?foreach ($arResult['TOTAL_WIDTH'] as $item){?>
                                        <li><span class="calc-list-data"
                                                  data-product="<?=implode(' ',$item['ORDERS'])?>"
                                                  data-coating="<?=implode(' ',$item['COATING'])?>"
                                                  data-tickness="<?=implode(' ',$item['THICKNESS'])?>"
                                                  data-hidden = ""
                                                  data-value="<?=$item['VALUE']?>"><?=$item['VALUE']?>
                                            </span>
                                        </li>
                                    <?}?>
                                </ul>
                            </div>
                            <div class="field-write-block">
                                <span class="calc-input-title-selected"></span>
                                <input type="text" placeholder="Цена грн. за кв.м.:" data-title="Цена грн. за кв.м.:" class="field-write price change-txt" data-value="">
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
                <div class="calculate-result-container hide">
                    <div class="container">
                        <div class="calc-done-block">
                            <div class="calc-inner-block">
                                <h1>Расчёт произведён!</h1>
                            </div>
                            <div class="calc-done-rezult clearfix">
                                <div class="col-md-3">
                                    <div class="calc-done-list">
                                        <span class="calc-done-txt ">Количество листов:</span>
                                        <span class="calc-done-num number-of-sheets"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="calc-done-list">
                                        <span class="calc-done-txt">Общая площадь:</span>
                                        <span class="calc-done-num total-area"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="calc-done-list">
                                        <span class="calc-done-txt">Количество саморезов:</span>
                                        <span class="calc-done-num number-of-screws"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="calc-done-list">
                                        <span class="calc-done-txt">Цена:</span>
                                        <span class="calc-done-num price-result"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="calc-done-btn-block">
                                <!--<button class="calc-done-btn">Отправить заявку</button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?
//pre($arResult);