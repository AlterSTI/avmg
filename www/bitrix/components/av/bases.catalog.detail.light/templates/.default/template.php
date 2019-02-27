<?php
declare(strict_types=1);

use Bitrix\Main\Application,
    Bitrix\Main\Web\Uri;

/** **********************************************************************
 * @var array $arParams
 * @var array $arResult
 ************************************************************************/


if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->SetTitle('Редактирование баз');

$context    = Application::getInstance()->getContext();
$server     = $context->getServer();
$request    = $context->getRequest();
$uri        = new Uri($request->getRequestUri());
$protocol   = $request->isHttps() ? 'https' : $uri->getScheme();
$pageUrl    = $protocol.'://'.$server->getServerName().$uri->getPath();
?>
<div
        class="bases"
        id="bases"
        data-handler="<?=$protocol?>://<?=$server->getServerName()?><?=$this->GetFolder()?>/handler.php"
        data-iblocks="<?=implode(',', $arResult['IBLOCK_IDS'])?>"
        data-iblock-ua="<?=$arParams['UA_IBLOCK']?>"
        data-iblock-ru="<?=$arParams['RU_IBLOCK']?>"
>
    <div class="error hide-error">
        <span class="error-text"></span>
    </div>
    <div class="table">
        <div class="row">
            <div class="cell">
                <div class="">НАЗВАНИЕ</div>
            </div>
            <div class="cell">
                <div class="">UA</div>
            </div>
            <div class="cell">
                <div class="">RU</div>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <div class="">Область</div>
            </div>
            <div class="cell">
                <div class="select-wrap">
                    <select name="UA_REGION" class="region" data-iblock-id="<?=$arParams['UA_IBLOCK']?>">
                        <option value="">Все</option>
                        <?foreach ($arResult['UA_REGIONS'] as $regionCode => $region):?>
                            <option
                                    value="<?=$region['ID']?>"
                                    data-region-id = "<?=$region['CODE']?>"
                            >
                                <?=$region['NAME']?>
                            </option>
                        <?endforeach;?>
                    </select>
                </div>
            </div>
            <div class="cell">
                <div class="select-wrap">
                    <select name="RU_REGION" class="region" data-iblock-id="<?=$arParams['RU_IBLOCK']?>">
                        <option value="">Все</option>
                        <?foreach ($arResult['RU_REGIONS'] as $regionCode => $region):?>
                            <option
                                    value="<?=$region['ID']?>"
                                    data-region-id = "<?=$region['CODE']?>"
                            >
                                <?=$region['NAME']?>
                            </option>
                        <?endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <div class="">Город</div>
            </div>
            <div class="cell">
                <div class="select-wrap">
                    <select name="UA_CITY" class="city variant" data-iblock-id="<?=$arParams['UA_IBLOCK']?>">
                        <option value="" data-region-id="default">Все</option>
                        <?foreach ($arResult['UA_CITIES'] as $cityCode => $uaCity):?>
                        <option
                                    value="<?=$uaCity['ID']?>"
                                    data-region-id="<?=$arResult['UA_REGIONS'][$uaCity['IBLOCK_SECTION_ID']]['CODE']?>"
                                    data-city-id="<?=$arResult['UA_CITIES'][$cityCode]['CODE']?>"
                                    class="hide-base"
                            >
                                <?=$uaCity['NAME']?>
                            </option>
                        <?endforeach;?>
                    </select>
                </div>
            </div>
            <div class="cell">
                <div class="select-wrap">
                    <select name="RU_CITY" class="city variant" data-iblock-id="<?=$arParams['RU_IBLOCK']?>">
                        <option value="" data-region-id="default">Все</option>
                        <?foreach ($arResult['RU_CITIES'] as $cityCode => $ruCity):?>
                            <option
                                    value="<?=$ruCity['ID']?>"
                                    data-region-id="<?=$arResult['RU_REGIONS'][$ruCity['IBLOCK_SECTION_ID']]['CODE']?>"
                                    data-city-id="<?=$arResult['RU_CITIES'][$cityCode]['CODE']?>"
                                    class="hide-base"
                            >
                                <?=$ruCity['NAME']?>
                            </option>
                        <?endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <div class="">База</div>
            </div>
            <div class="cell">
                <div class="select-wrap">
                    <select name="UA_BASE" class="base" data-iblock-id="<?=$arParams['UA_IBLOCK']?>">
                        <option value="" data-base-id="">Новая</option>
                        <?foreach ($arResult['UA_BASES'] as $baseCode => $uaBase):?>
                            <option
                                    value="<?=$uaBase['ID']?>"
                                    data-city-id="<?=$arResult['UA_CITIES'][$uaBase['IBLOCK_SECTION_ID']]['CODE']?>"
                                    data-base-id="<?=$arResult['UA_BASES'][$baseCode]['CODE']?>"
                                    class="hide-base"
                            >
                                <?=$uaBase['NAME']?>
                            </option>
                        <?endforeach;?>
                    </select>
                </div>
            </div>
            <div class="cell">
                <div class="select-wrap">
                    <select name="RU_BASE" class="base" data-iblock-id="<?=$arParams['RU_IBLOCK']?>">
                        <option name="" data-base-id="">Новая</option>
                        <?foreach ($arResult['RU_BASES'] as $baseCode => $ruBase):?>
                            <option
                                    value="<?=$ruBase['ID']?>"
                                    data-city-id="<?=$arResult['RU_CITIES'][$ruBase['IBLOCK_SECTION_ID']]['CODE']?>"
                                    data-base-id="<?=$arResult['RU_BASES'][$baseCode]['CODE']?>"
                                    class="hide-base"
                            >
                                <?=$ruBase['NAME']?>
                            </option>
                        <?endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <div class="">Название</div>
            </div>
            <div class="cell">
                <div class="">
                    <input type="text" name="UA_NAME" data-iblock-id="<?=$arParams['UA_IBLOCK']?>"/>
                    <label><input type="checkbox" name="NAME_CODE_ACTIVE" data-active-block="UA_NAME"><span>Для кода</span></label>
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <input type="text" name="RU_NAME" data-iblock-id="<?=$arParams['RU_IBLOCK']?>"/>
                    <label><input type="checkbox" checked="checked" name="NAME_CODE_ACTIVE"><span>Для кода</span></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <div class="">Активность</div>
            </div>
            <div class="cell">
                <div class="">
                    <label>
                        <input
                                type="checkbox"
                                checked = "checked"
                                name="UA_ACTIVE[]"
                                data-code="active"
                                value="0"
                                data-iblock-id="<?=$arParams['UA_IBLOCK']?>"
                        /><span class="text">Да</span>
                    </label>
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <label>
                        <input
                                type="checkbox"
                                checked = "checked"
                                name="RU_ACTIVE[]"
                                data-code="active"
                                value="0"
                                data-iblock-id="<?=$arParams['RU_IBLOCK']?>"
                        /><span class="text">Да</span>
                    </label>
                </div>
            </div>
        </div>
      <div class="row">
            <div class="cell">
                <div class="">Начало активности</div>
            </div>
            <div class="cell">
                <div class="">
                    <?$APPLICATION->IncludeComponent('bitrix:main.calendar', '', [
                        'SHOW_INPUT' => 'Y',
                        'FORM_NAME' => '',
                        'INPUT_NAME' => 'UA_DATE_ACTIVE_FROM',
                        'INPUT_VALUE' => date('d.m.Y H:i:s'),
                        'INPUT_VALUE_FINISH' => '',
                        'SHOW_TIME' => 'Y',
                        'HIDE_TIMEBAR' => 'N',
                        'INPUT_ADDITIONAL_ATTR' => 'placeholder="дд.мм.гггг", data-iblock-id="'.$arParams['UA_IBLOCK'].'"
                                                    data-code="dateActiveFrom"'
                        ]
                    );?>
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <?$APPLICATION->IncludeComponent('bitrix:main.calendar', '', [
                        'SHOW_INPUT' => 'Y',
                        'FORM_NAME' => '',
                        'INPUT_NAME' => 'RU_DATE_ACTIVE_FROM',
                        'INPUT_VALUE' => date('d.m.Y H:i:s'),
                        'INPUT_VALUE_FINISH' => '',
                        'SHOW_TIME' => 'Y',
                        'HIDE_TIMEBAR' => 'N',
                        'INPUT_ADDITIONAL_ATTR' => 'placeholder="дд.мм.гггг", data-iblock-id="'.$arParams['RU_IBLOCK'].'"
                                                    data-code="dateActiveFrom"'
                        ]
                    );?>
                </div>
            </div>
        </div>
      <div class="row">
            <div class="cell">
                <div class="">Конец активности</div>
            </div>
            <div class="cell">
                <div class="">
                    <?$APPLICATION->IncludeComponent('bitrix:main.calendar', '', [
                            'SHOW_INPUT' => 'Y',
                            'FORM_NAME' => '',
                            'INPUT_NAME' => 'UA_DATE_ACTIVE_TO',
                            'INPUT_VALUE' => '',
                            'INPUT_VALUE_FINISH' => '',
                            'SHOW_TIME' => 'Y',
                            'HIDE_TIMEBAR' => 'N',
                            'INPUT_ADDITIONAL_ATTR' => 'placeholder="дд.мм.гггг", data-iblock-id="'.$arParams['UA_IBLOCK'].'"
                                                        data-code="dateActiveTo"'
                        ]
                    );?>
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <?$APPLICATION->IncludeComponent('bitrix:main.calendar', '', [
                            'SHOW_INPUT' => 'Y',
                            'FORM_NAME' => '',
                            'INPUT_NAME' => 'RU_DATE_ACTIVE_TO',
                            'INPUT_VALUE' => '',
                            'INPUT_VALUE_FINISH' => '',
                            'SHOW_TIME' => 'Y',
                            'HIDE_TIMEBAR' => 'N',
                            'INPUT_ADDITIONAL_ATTR' => 'placeholder="дд.мм.гггг", data-iblock-id="'.$arParams['RU_IBLOCK'].'"
                                                         data-code="dateActiveTo"'
                        ]
                    );?>
                </div>
            </div>
        </div>
      <div class="row">
            <div class="cell">
                <div class="">Символный код</div>
            </div>
            <div class="cell">
                <div class="">
                    <input type="text" name="UA_CODE" data-code="symbolCode" data-iblock-id="<?=$arParams['UA_IBLOCK']?>"/>
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <input type="text" name="RU_CODE" data-code="symbolCode" data-iblock-id="<?=$arParams['RU_IBLOCK']?>"/>
                </div>
            </div>
        </div>
      <div class="row">
            <div class="cell">
                <div class="">Основные направления</div>
            </div>
            <div class="cell">
                <?foreach ($arResult['UA_STREAMS'] as $streamCode => $uaStream):?>
                    <div>
                        <label>
                            <input
                                    type="checkbox"
                                    name="UA_PROPERTY_STREAMS[]"
                                    data-code = "<?=$streamCode?>"
                                    data-iblock-id="<?=$arParams['UA_IBLOCK']?>"
                                    value="<?=$uaStream['ID']?>"
                            />
                            <span class="text"><?=$uaStream['NAME']?></span>
                        </label>
                    </div>
                <?endforeach;?>
            </div>
            <div class="cell">
               <?foreach ($arResult['RU_STREAMS'] as $streamCode => $ruStream):?>
                   <div>
                       <label>
                           <input
                                   type="checkbox"
                                   name="RU_PROPERTY_STREAMS[]"
                                   data-code = "<?=$streamCode?>"
                                   data-iblock-id="<?=$arParams['RU_IBLOCK']?>"
                                   value="<?=$ruStream['ID']?>"
                           />
                           <span class="text"><?=$ruStream['NAME']?></span>
                       </label>
                   </div>
               <?endforeach;?>
            </div>
        </div>
      <div class="row">
            <div class="cell">
                <div class="">Тип объекта</div>
            </div>
            <div class="cell">
                <?foreach ($arResult['PROPERTY_VARIANTS'][$arResult['UA_TYPE_BASES']] as $property):?>
                    <div>
                        <label>
                            <input
                                    type="checkbox"
                                    name="UA_PROPERTY_TYPE_BASES[]"
                                    data-code="<?=$property['XML_ID']?>"
                                    data-iblock-id="<?=$arParams['UA_IBLOCK']?>"
                                    value="<?=$property['ID']?>"
                            />
                            <span class="text"><?=$property['VALUE']?>
                        </label>
                    </div>
                <?endforeach;?>
            </div>
            <div class="cell">
                <?foreach ($arResult['PROPERTY_VARIANTS'][$arResult['RU_TYPE_BASES']] as $property):?>
                    <div>
                        <label>
                            <input
                                    type="checkbox"
                                    name="RU_PROPERTY_TYPE_BASES[]"
                                    data-code = "<?=$property['XML_ID']?>"
                                    data-iblock-id="<?=$arParams['RU_IBLOCK']?>"
                                    value="<?=$property['ID']?>"
                            />
                            <span class="text"><?=$property['VALUE']?></span>
                        </label>
                    </div>
                <?endforeach;?>
            </div>
        </div>
      <div class="row">
            <div class="cell">
                <div class="">Оптовый</div>
            </div>
            <div class="cell">
                <div class="select-wrap">
                    <select name="UA_PROPERTY_WHOLESALE" data-iblock-id="<?=$arParams['UA_IBLOCK']?>">
                    <?foreach ($arResult['PROPERTY_VARIANTS'][$arResult['UA_WHOLESALE_BASES']] as $property):?>
                        <option value="<?=$property['ID']?>" data-code="<?=$property['XML_ID']?>"><?=$property['VALUE']?></option>
                    <?endforeach;?>
                    </select>
                </div>
            </div>
            <div class="cell">
                <div class="select-wrap">
                    <select name="RU_PROPERTY_WHOLESALE" data-iblock-id="<?=$arParams['RU_IBLOCK']?>">
                    <?foreach ($arResult['PROPERTY_VARIANTS'][$arResult['RU_WHOLESALE_BASES']] as $property):?>
                        <option value="<?=$property['ID']?>" data-code="<?=$property['XML_ID']?>"><?=$property['VALUE']?></option>
                    <?endforeach;?>
                    </select>
                </div>
            </div>
        </div>
      <div class="row">
            <div class="cell">
                <div class="">Адрес</div>
            </div>
            <div class="cell">
                <div class="">
                    <textarea name="UA_PROPERTY_ADDRESS" data-iblock-id="<?=$arParams['UA_IBLOCK']?>"></textarea>
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <textarea name="RU_PROPERTY_ADDRESS" data-iblock-id="<?=$arParams['RU_IBLOCK']?>"></textarea>
                </div>
            </div>
        </div>
      <div class="row">
            <div class="cell">
                <div class="">Телефон</div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="UA_PROPERTY_PHONE[]" data-iblock-id="<?=$arParams['UA_IBLOCK']?>" data-code="PHONE_ADD"
                    /><input
                            name="UA_PHONE_ADD"
                            class="input-add"
                            type="button"
                            value="+"
                            data-code="PHONE_ADD_BUTTON"
                            data-code-next="1"
                            data-name-input = "UA_PROPERTY_PHONE[]"
                            data-iblock-id="<?=$arParams['UA_IBLOCK']?>"
                    />
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="RU_PROPERTY_PHONE[]" data-iblock-id="<?=$arParams['RU_IBLOCK']?>" data-code="PHONE_ADD"
                    /><input
                            name="RU_PHONE_ADD"
                            class="input-add"
                            type="button"
                            value="+"
                            data-code="PHONE_ADD_BUTTON"
                            data-code-next="1"
                            data-name-input = "RU_PROPERTY_PHONE[]"
                            data-iblock-id="<?=$arParams['RU_IBLOCK']?>"
                    />
                </div>
            </div>
      </div>
      <div class="row">
            <div class="cell">
                <div class="">График работы</div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="UA_PROPERTY_OPEN_HOURES[]" data-iblock-id="<?=$arParams['UA_IBLOCK']?>"
                    /><input
                            name="UA_OPEN_HOURES_ADD"
                            class="input-add"
                            type="button"
                            value="+"
                            data-code-next="1"
                            data-input-synchronization="1"
                            data-code="OPEN_HOURES_ADD_BUTTON"
                            data-name-input = "UA_PROPERTY_OPEN_HOURES[]"
                            data-iblock-id="<?=$arParams['UA_IBLOCK']?>"
                    />
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="RU_PROPERTY_OPEN_HOURES[]" data-iblock-id="<?=$arParams['RU_IBLOCK']?>"
                    /><input
                            name="RU_OPEN_HOURES_ADD"
                            class="input-add"
                            type="button"
                            value="+"
                            data-code-next="1"
                            data-input-synchronization="1"
                            data-code="OPEN_HOURES_ADD_BUTTON"
                            data-name-input = "RU_PROPERTY_OPEN_HOURES[]"
                            data-iblock-id="<?=$arParams['RU_IBLOCK']?>"
                    />
                </div>
            </div>
        </div>
       <div class="row">
            <div class="cell">
                <div class="">GPS широта</div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="UA_PROPERTY_CORDINATE_X" data-code = "PROPERTY_ADDRESS_COORDINATE_X" data-iblock-id="<?=$arParams['UA_IBLOCK']?>"/>
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="RU_PROPERTY_CORDINATE_X" data-code = "PROPERTY_ADDRESS_COORDINATE_X" data-iblock-id="<?=$arParams['RU_IBLOCK']?>"/>
                </div>
            </div>
        </div>
       <div class="row">
            <div class="cell">
                <div class="">GPS долгота</div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="UA_PROPERTY_CORDINATE_Y" data-code = "PROPERTY_ADDRESS_COORDINATE_Y" data-iblock-id="<?=$arParams['UA_IBLOCK']?>"/>
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="RU_PROPERTY_CORDINATE_Y" data-code = "PROPERTY_ADDRESS_COORDINATE_Y" data-iblock-id="<?=$arParams['RU_IBLOCK']?>"/>
                </div>
            </div>
        </div>
       <div class="row">
            <div class="cell">
                <div class="">Объект №</div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="UA_PROPERTY_NUMBER_OBJECT" data-code = "PROPERTY_NUMBER_OBJECT" data-iblock-id="<?=$arParams['UA_IBLOCK']?>"/>
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="RU_PROPERTY_NUMBER_OBJECT" data-code = "PROPERTY_NUMBER_OBJECT" data-iblock-id="<?=$arParams['RU_IBLOCK']?>"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <div class="">Объект закрыт</div>
            </div>
            <div class="cell">
                    <?foreach ($arResult['PROPERTY_VARIANTS'][$arResult['UA_CLOSED_BASES']] as $property):?>
                        <div>
                            <label>
                                <input
                                        type="checkbox"
                                        name="UA_PROPERTY_CLOSED[]"
                                        data-code="<?=$property['XML_ID']?>"
                                        data-iblock-id="<?=$arParams['UA_IBLOCK']?>"
                                        value="<?=$property['ID']?>"
                                />
                                <span class="text"><?=$property['VALUE']?></span>
                            </label>
                        </div>
                    <?endforeach;?>
            </div>
            <div class="cell">
                    <?foreach ($arResult['PROPERTY_VARIANTS'][$arResult['RU_CLOSED_BASES']] as $property):?>
                        <div>
                            <label>
                                <input
                                        type="checkbox"
                                        name="RU_PROPERTY_CLOSED[]"
                                        data-code="<?=$property['XML_ID']?>"
                                        data-iblock-id="<?=$arParams['RU_IBLOCK']?>"
                                        value="<?=$property['ID']?>"
                                />
                                <span class="text"><?=$property['VALUE']?></span>
                            </label>
                        </div>
                    <?endforeach;?>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <div class="">Действующая акция</div>
            </div>
            <div class="cell">
                <div class="select-wrap">
                    <select name="UA_PROPERTY_CURRENT_ACTION" data-iblock-id="<?=$arParams['UA_IBLOCK']?>">
                        <option value="">Нет</option>
                        <?foreach ($arResult['UA_ACTIONS'] as $actionCode => $action):?>
                            <option value="<?=$action['ID']?>" data-code="<?=$actionCode?>"><?=$action['NAME']?></option>
                        <?endforeach;?>
                    </select>
                </div>
            </div>
            <div class="cell">
                <div class="select-wrap">
                    <select name="RU_PROPERTY_CURRENT_ACTION" data-iblock-id="<?=$arParams['RU_IBLOCK']?>">
                        <option value="" >Нет</option>
                        <?foreach ($arResult['RU_ACTIONS'] as $actionCode => $action):?>
                            <option value="<?=$action['ID']?>" data-code="<?=$actionCode?>"><?=$action['NAME']?></option>
                        <?endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <div class="">Дополнительный заголовок</div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="UA_PROPERTY_ADDITIONAL_TITLE" data-code = "PROPERTY_ADDITIONAL_TITLE" data-iblock-id="<?=$arParams['UA_IBLOCK']?>"/>
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="RU_PROPERTY_ADDITIONAL_TITLE" data-code = "PROPERTY_ADDITIONAL_TITLE" data-iblock-id="<?=$arParams['RU_IBLOCK']?>"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cell"></div>
             <div class="cell">
                <div class="title">ИНФОРМАЦИЯ ПО НАПРАВЛЕНИЯМ</div>
             </div>
             <div class="cell"></div>
        </div>
        <div class="row stream-item">
            <div class="cell">
                <div class="">Направление</div>
            </div>
            <div class="cell">
                <div class="">
                    <select name="STREAMS_UA_PROPERTY_STREAM">
                        <option value="" >Все</option>
                        <?foreach ($arResult['UA_STREAMS'] as $streamCode => $streamItem):?>
                            <option value="<?=$streamItem['ID']?>" data-code="<?=$streamCode?>"><?=$streamItem['NAME']?></option>
                        <?endforeach;?>
                    </select>
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <select name="STREAMS_RU_PROPERTY_STREAM">
                        <option value="" >Все</option>
                        <?foreach ($arResult['RU_STREAMS'] as $streamCode => $streamItem):?>
                            <option value="<?=$streamItem['ID']?>" data-code="<?=$streamCode?>"><?=$streamItem['NAME']?></option>
                        <?endforeach;?>
                    </select>
                </div>
            </div>
        </div>
      <div class="row stream-item">
            <div class="cell">
                <div class="">Телефон</div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="STREAMS_UA_PROPERTY_PHONE" data-iblock-id="<?=$arParams['UA_IBLOCK']?>" data-code="STREAMS_PHONE_ADD"
                    /><input
                            name="STREAMS_UA_PHONE_ADD"
                            class="input-add"
                            type="button"
                            value="+"
                            data-code="STREAMS_PHONE_ADD_BUTTON"
                            data-code-next="1"
                            data-name-input = "STREAMS_UA_PROPERTY_PHONE[]"
                            data-iblock-id="<?=$arParams['UA_IBLOCK']?>"
                    />
                </div>
            </div>
            <div class="cell">
                <div class="">
                    <input name="STREAMS_RU_PROPERTY_PHONE" data-iblock-id="<?=$arParams['RU_IBLOCK']?>" data-code="STREAMS_PHONE_ADD"
                    /><input
                            name="STREAMS_RU_PHONE_ADD"
                            class="input-add"
                            type="button"
                            value="+"
                            data-code="STREAMS_PHONE_ADD_BUTTON"
                            data-code-next="1"
                            data-name-input = "STREAMS_RU_PROPERTY_PHONE[]"
                            data-iblock-id="<?=$arParams['RU_IBLOCK']?>"
                    />
                </div>
            </div>
      </div>
      <div class="row stream-item">
          <div class="cell">
              <div class="">Прайс</div>
          </div>
          <div class="cell">
              <div class="">
                  <input name="STREAMS_UA_PROPERTY_PRICE" data-code = "STREAMS_PROPERTY_PRICE" data-iblock-id="<?=$arParams['UA_IBLOCK']?>"/>
              </div>
          </div>
          <div class="cell">
              <div class="">
                  <input name="STREAMS_RU_PROPERTY_PRICE" data-code = "STREAMS_PROPERTY_PRICE" data-iblock-id="<?=$arParams['RU_IBLOCK']?>"/>
              </div>
          </div>
      </div>
      <div class="row stream-item">
          <div class="cell">
              <div class="">Код склада</div>
          </div>
          <div class="cell">
              <div class="">
                  <input name="STREAMS_UA_PROPERTY_CODE_1C" data-code = "STREAMS_PROPERTY_CODE_1C" data-iblock-id="<?=$arParams['UA_IBLOCK']?>"/>
              </div>
          </div>
          <div class="cell">
              <div class="">
                  <input name="STREAMS_RU_PROPERTY_CODE_1C" data-code = "STREAMS_PROPERTY_CODE_1C" data-iblock-id="<?=$arParams['RU_IBLOCK']?>"/>
              </div>
          </div>
      </div>

        <!--      <div class="row">
                    <div class="cell">
                        <div class="">Телефон</div>
                    </div>
                    <div class="cell">
                        <div class="">
                            <input name="STREAMS_UA_PROPERTY_PHONE[]" data-iblock-id="<?/*=$arParams['UA_IBLOCK']*/?>" data-code="STREAMS_PHONE_ADD1"
                            /><input
                                    name="STREAMS_UA_PHONE_ADD1"
                                    class="input-add"
                                    type="button"
                                    value="+"
                                    data-code="STREAMS_PHONE_ADD_BUTTON1"
                                    data-code-next="1"
                                    data-name-input = "STREAMS_UA_PROPERTY_PHONE[]"
                                    data-iblock-id="<?/*=$arParams['UA_IBLOCK']*/?>"
                            />
                        </div>
                    </div>
                    <div class="cell">
                        <div class="">
                            <input name="STREAMS_RU_PROPERTY_PHONE[]" data-iblock-id="<?/*=$arParams['RU_IBLOCK']*/?>" data-code="STREAMS_PHONE_ADD1"
                            /><input
                                    name="STREAMS_RU_PHONE_ADD1"
                                    class="input-add"
                                    type="button"
                                    value="+"
                                    data-code="STREAMS_PHONE_ADD_BUTTON1"
                                    data-code-next="1"
                                    data-name-input = "STREAMS_RU_PROPERTY_PHONE[]"
                                    data-iblock-id="<?/*=$arParams['RU_IBLOCK']*/?>"
                            />
                        </div>
                    </div>
              </div>-->

    </div>
    <div>
        <input type="button" value="Сохранить" class="button-save" disabled="disabled">
    </div>
</div>


