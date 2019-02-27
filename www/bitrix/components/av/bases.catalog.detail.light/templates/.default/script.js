addEventListener('DOMContentLoaded', function(){
    let
        basesBlock              = document.getElementById('bases'),
        request                 = new MsRequest(basesBlock.dataset.handler),
        regionInputs            = basesBlock.querySelectorAll('.region'),
        citiesInputs            = basesBlock.querySelectorAll('.city'),
        basesInputs             = basesBlock.querySelectorAll('.base'),
        uaButtonPhoneInputAdd   = basesBlock.querySelector('.input-add[name="UA_PHONE_ADD"]'),
        ruButtonPhoneInputAdd   = basesBlock.querySelector('.input-add[name="RU_PHONE_ADD"]'),
        uaButtonHouresInputAdd  = basesBlock.querySelector('.input-add[name="UA_OPEN_HOURES_ADD"]'),
        ruButtonHouresInputAdd  = basesBlock.querySelector('.input-add[name="RU_OPEN_HOURES_ADD"]'),
        regions, cities, bases,wholesales, currentActions, item, parallelChangeInputs, items, names, codes,
        errorBlock              = basesBlock.querySelector('.error'),
        errorText               = errorBlock.querySelector('.error-text'),
        buttonSave              = basesBlock.querySelector('.button-save'),
        form                                = {};
        form.inputs                         = {};
        form.checkboxes                     = {};
        form.selectors                      = {};
        form.multyInputs                    = {};
        form.inputs.uaName                  = basesBlock.querySelector('[name="UA_NAME"]');
        form.inputs.ruName                  = basesBlock.querySelector('[name="RU_NAME"]');
        form.inputs.uaCode                  = basesBlock.querySelector('[name="UA_CODE"]');
        form.inputs.ruCode                  = basesBlock.querySelector('[name="RU_CODE"]');
        form.inputs.uaActivityDateFrom      = basesBlock.querySelector('[name="UA_DATE_ACTIVE_FROM"]');
        form.inputs.ruActivityDateFrom      = basesBlock.querySelector('[name="RU_DATE_ACTIVE_FROM"]');
        form.inputs.uaActivityDateTo        = basesBlock.querySelector('[name="UA_DATE_ACTIVE_TO"]');
        form.inputs.ruActivityDateTo        = basesBlock.querySelector('[name="RU_DATE_ACTIVE_TO"]');
        form.inputs.uaCordinateX            = basesBlock.querySelector('[name="UA_PROPERTY_CORDINATE_X"]');
        form.inputs.ruCordinateX            = basesBlock.querySelector('[name="RU_PROPERTY_CORDINATE_X"]');
        form.inputs.uaCordinateY            = basesBlock.querySelector('[name="UA_PROPERTY_CORDINATE_Y"]');
        form.inputs.ruCordinateY            = basesBlock.querySelector('[name="RU_PROPERTY_CORDINATE_Y"]');
        form.inputs.uaObjectNumber          = basesBlock.querySelector('[name="UA_PROPERTY_NUMBER_OBJECT"]');
        form.inputs.ruObjectNumber          = basesBlock.querySelector('[name="RU_PROPERTY_NUMBER_OBJECT"]');
        form.inputs.uaAdditionalTitle       = basesBlock.querySelector('[name="UA_PROPERTY_ADDITIONAL_TITLE"]');
        form.inputs.ruAdditionalTitle       = basesBlock.querySelector('[name="RU_PROPERTY_ADDITIONAL_TITLE"]');
        form.inputs.uaAddress               = basesBlock.querySelector('[name="UA_PROPERTY_ADDRESS"]');
        form.inputs.ruAddress               = basesBlock.querySelector('[name="RU_PROPERTY_ADDRESS"]');
        form.checkboxes.uaActive            = basesBlock.querySelectorAll('[name="UA_ACTIVE[]"]');
        form.checkboxes.ruActive            = basesBlock.querySelectorAll('[name="RU_ACTIVE[]"]');
        form.checkboxes.uaStreams           = basesBlock.querySelectorAll('[name="UA_PROPERTY_STREAMS[]"]');
        form.checkboxes.ruStreams           = basesBlock.querySelectorAll('[name="RU_PROPERTY_STREAMS[]"]');
        form.checkboxes.uaBaseTypes         = basesBlock.querySelectorAll('[name="UA_PROPERTY_TYPE_BASES[]"]');
        form.checkboxes.ruBaseTypes         = basesBlock.querySelectorAll('[name="RU_PROPERTY_TYPE_BASES[]"]');
        form.checkboxes.uaClosed            = basesBlock.querySelectorAll('[name="UA_PROPERTY_CLOSED[]"]');
        form.checkboxes.ruClosed            = basesBlock.querySelectorAll('[name="RU_PROPERTY_CLOSED[]"]');
        form.selectors.uaRegion             = basesBlock.querySelector('[name="UA_REGION"]');
        form.selectors.ruRegion             = basesBlock.querySelector('[name="RU_REGION"]');
        form.selectors.uaCities             = basesBlock.querySelector('[name="UA_CITY"]');
        form.selectors.ruCities             = basesBlock.querySelector('[name="RU_CITY"]');
        form.selectors.uaBases              = basesBlock.querySelector('[name="UA_BASE"]');
        form.selectors.ruBases              = basesBlock.querySelector('[name="RU_BASE"]');
        form.selectors.uaWholesale          = basesBlock.querySelector('[name="UA_PROPERTY_WHOLESALE"]');
        form.selectors.ruWholesale          = basesBlock.querySelector('[name="RU_PROPERTY_WHOLESALE"]');
        form.selectors.uaCurrentAction      = basesBlock.querySelector('[name="UA_PROPERTY_CURRENT_ACTION"]');
        form.selectors.ruCurrentAction      = basesBlock.querySelector('[name="RU_PROPERTY_CURRENT_ACTION"]');
        form.multyInputs.uaPhoneInputs      = basesBlock.querySelectorAll('[name="UA_PROPERTY_PHONE[]"]');
        form.multyInputs.ruPhoneInputs      = basesBlock.querySelectorAll('[name="RU_PROPERTY_PHONE[]"]');
        regions                             = [form.selectors.uaRegion, form.selectors.ruRegion];
        cities                              = [form.selectors.uaCities, form.selectors.ruCities];
        bases                               = [form.selectors.uaBases, form.selectors.ruBases];
        wholesales                          = [form.selectors.uaWholesale, form.selectors.ruWholesale];
        currentActions                      = [form.selectors.uaCurrentAction, form.selectors.ruCurrentAction];
        names                               = [form.inputs.uaName, form.inputs.ruName];
        codes                               = [form.inputs.uaCode, form.inputs.ruCode];
//console.log(form);

    basesBlock.addEventListener("click", plusInput);
    basesBlock.addEventListener('click', function(e){
        let
            tar =  e.target,
            formData,
            data;
        if (tar.classList.contains('button-save')) {
            errorMessage('hide');
            AvBlurScreen('on');
            AvWaitingScreen('on');
            formData =JSON.stringify(form.getValues());
                data = {
                    ACTION      : 'EDIT',
                    BASE_CODE   : '',
                    DATA        : formData,
                    IBLOCKS_IDS : basesBlock.dataset.iblocks,
                };
            //console.log(formData);
            request.async(data,function(){
                let
                    serverAnswer = JSON.parse(this),
                    result  = serverAnswer['RESULT'],
                    error   = serverAnswer['ERROR'];
                AvBlurScreen('off');
                AvWaitingScreen('off');
                window.scroll(0,0);
                if (result === true){
                   setTimeout(location.reload(), 5000);
                }
                errorMessage('show', error, result);

                //console.log(serverAnswer);
            });
        }

    });
    names.forEach(function(name){
        name.addEventListener('keyup', function(){
            let
                space = '-',
                text = this.value.toLowerCase(),
                // Массив для транслитерации
                transl = {
                    'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
                    'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
                    'о': 'o', 'п': 'p', 'р': 'r','с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
                    'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh','ъ': space, 'ы': 'y', 'ь': space, 'э': 'e', 'ю': 'yu', 'я': 'ya',
                    ' ': space, '_': space, '`': space, '~': space, '!': space, '@': space,
                    '#': space, '$': space, '%': space, '^': space, '&': space, '*': space,
                    '(': space, ')': space,'-': space, '\=': space, '+': space, '[': space,
                    ']': space, '\\': space, '|': space, '/': space,'.': space, ',': space,
                    '{': space, '}': space, '\'': space, '"': space, ';': space, ':': space,
                    '?': space, '<': space, '>': space, '№':space
                },
                result = '', i,
                current_sim = '',
                trimStr = function(s){
                    s = s.replace(/^-/, '');
                    return s.replace(/-$/, '');
                };
            if (this.nextElementSibling.querySelector('[name="NAME_CODE_ACTIVE"]').checked !== true) {
                return;
            }
            for(i=0; i < text.length; i++) {
                // Если символ найден в массиве то меняем его
                if(transl[text[i]] !== undefined) {
                    if(current_sim !== transl[text[i]] || current_sim !== space){
                        result += transl[text[i]];
                        current_sim = transl[text[i]];
                    }
                // Если нет, то оставляем так как есть
                } else {
                      result += text[i];
                      current_sim = text[i];
                }
            }
            result = trimStr(result);
            codes.forEach(function(code){
                code.value = result;
            });
        });
    });
    regionInputs.forEach(function(region){
        region.addEventListener("change", function () {
            let
                regionCode      = this.options[this.selectedIndex].dataset.regionId;
            errorMessage('hide');
            cities.forEach(function(item){
                item.selectedIndex = 0;
            });
            bases.forEach(function(item){
                item.selectedIndex = 0;
            });
            parallelChange(regionCode, regions, cities, 'regionId');
        });
    });

    citiesInputs.forEach(function(city){
        city.addEventListener("change", function () {
            let
                regionCode      = this.options[this.selectedIndex].dataset.cityId;
            errorMessage('hide');
            bases.forEach(function(item){
                item.selectedIndex = 0;
            });
            parallelChange(regionCode, cities, bases, 'cityId');
            buttonSave.disabled = this.options[this.selectedIndex].value.length === 0;
        });
    });
    basesInputs.forEach(function(base){
        base.addEventListener("change", function(){
            let
                regionCode      = this.options[this.selectedIndex].dataset.baseId,
                data;
            errorMessage('hide');
            parallelChange(regionCode, bases, '', 'baseId');
            if (regionCode !== '') {
                data = {
                    ACTION      : 'GET',
                    BASE_CODE   : regionCode,
                    IBLOCKS_IDS : basesBlock.dataset.iblocks,
                    DATA        : ''
                };
                AvBlurScreen('on');
                AvWaitingScreen('on');
                request.async(data, viewBase);
            }
        });
    });
    //parallel change checkboxes
    for (item in form.checkboxes) {
        if (form.checkboxes.hasOwnProperty(item)) {
            form.checkboxes[item].forEach(function (checkbox){
                checkbox.addEventListener('change', function(){
                    let
                        parallelItems = basesBlock.querySelectorAll('[data-code="' + this.dataset.code + '"]'),
                        checkStatus = this.checked;
                    if (parallelItems.length > 0) {
                        parallelItems.forEach(function(parallelItem){
                            parallelItem.checked = checkStatus;
                        });
                    }
                });
            });
        }
    }
    parallelChangeInputs = function () {
        let
            parallelItems = basesBlock.querySelectorAll('[data-code="' + this.dataset.code + '"]'),
            itemValue = this.value;
        if (parallelItems.length > 0) {
            parallelItems.forEach(function(parallelItem){
                parallelItem.value = itemValue;
            });
        }
    };
    //parallel change inputs
    for (item in form.inputs) {
        if (form.inputs.hasOwnProperty(item)) {
            form.inputs[item].addEventListener('input', parallelChangeInputs);
            form.inputs[item].addEventListener('change', parallelChangeInputs);
        }
    }
    //parallel change multi inputs
    for (items in form.multyInputs) {
        if (form.multyInputs.hasOwnProperty(items)) {
            form.multyInputs[items].forEach(function(item) {
                item.addEventListener('input', parallelChangeInputs);
                item.addEventListener('change', parallelChangeInputs);
            });
        }
    }

    //parallel change other selectors
    wholesales.forEach(function(selector){
        selector.addEventListener('change', function(){
            parallelChange(this.options[this.selectedIndex].dataset.code, wholesales,'', 'code');
        })
    });
    currentActions.forEach(function(selector){
        selector.addEventListener('change', function(){
            parallelChange(this.options[this.selectedIndex].dataset.code, currentActions,'', 'code');
        })
    });
    
    function plusInput(e, text) {
        let
            tar =  ('target' in e) === true ?  e.target : e,
            click = ('target' in e) === true,
            parentBlock, newBlock, newInput, newButtonDel, parallelPlusItems;
    if (tar.classList.contains('input-add')) {
        parallelPlusItems = click === true ? basesBlock.querySelectorAll('[data-code="' + tar.dataset.code + '"]') : [tar];
        parallelPlusItems.forEach(function(item){
            parentBlock = item.parentNode.parentNode;
            newBlock = document.createElement('div');
            newInput = document.createElement('input');
            newButtonDel = document.createElement('input');

            newInput.name = item.dataset.nameInput;
            newInput.value = typeof text !== 'undefined' ? text : '';
            newInput.dataset.iblockId = item.dataset.iblockId;
            if (item.dataset.inputSynchronization !== '1') {
                newInput.dataset.code = item.dataset.code + item.dataset.codeNext;
                newInput.addEventListener('input', parallelChangeInputs);
                newInput.addEventListener('change', parallelChangeInputs);
            }
            newButtonDel.classList.add('input-del');
            newButtonDel.type = 'button';
            newButtonDel.dataset.nameInput = item.dataset.nameInput;
            newButtonDel.value = '-';
            newButtonDel.dataset.code = item.dataset.code+'_DEL_'+item.dataset.codeNext;
            item.dataset.codeNext++;

            parentBlock.appendChild(newBlock);
            newBlock.appendChild(newInput);
            newBlock.appendChild(newButtonDel);
        });

    } else if (tar.classList.contains('input-del')){
        parallelPlusItems = basesBlock.querySelectorAll('[data-code="' + tar.dataset.code + '"]');
        parallelPlusItems.forEach(function(item){
            item.parentNode.remove();
        });
    }

    }
    function viewBase() {
        let
            obj = JSON.parse(this),
            replay = obj['DATA'],
            result = obj['RESULT'],
            error = obj['ERROR'],
            inputDeletes = basesBlock.querySelectorAll('.input-del'),
            item, multiCount,
            option;
        AvWaitingScreen('off');
        AvBlurScreen('off');
        if (inputDeletes.length > 0) {
            inputDeletes.forEach(function(item){
                plusInput(item);
            });
        }
        if (result !== true || error.length > 0){
            errorMessage('show', error, result);
            return;
        }

        //name
        form.inputs.uaName.value = replay[basesBlock.dataset.iblockUa]['NAME'];
        form.inputs.ruName.value = replay[basesBlock.dataset.iblockRu]['NAME'];
        //code
        form.inputs.uaCode.value = replay[basesBlock.dataset.iblockUa]['CODE'];
        form.inputs.ruCode.value = replay[basesBlock.dataset.iblockRu]['CODE'];

        //datesActivity

        form.inputs.uaActivityDateFrom.value    = typeof replay[basesBlock.dataset.iblockUa]['DATE_ACTIVE_FROM'] !== 'undefined'
                                        ? replay[basesBlock.dataset.iblockUa]['DATE_ACTIVE_FROM']
                                        : '';
        form.inputs.ruActivityDateFrom.value    = typeof replay[basesBlock.dataset.iblockUa]['DATE_ACTIVE_FROM'] !== 'undefined'
                                        ? replay[basesBlock.dataset.iblockRu]['DATE_ACTIVE_FROM']
                                        : '';
        form.inputs.uaActivityDateTo.value      = typeof replay[basesBlock.dataset.iblockUa]['DATE_ACTIVE_TO'] !== 'undefined'
                                        ? replay[basesBlock.dataset.iblockUa]['DATE_ACTIVE_TO']
                                        : '';
        form.inputs.ruActivityDateTo.value      = typeof replay[basesBlock.dataset.iblockUa]['DATE_ACTIVE_TO'] !== 'undefined'
                                        ? replay[basesBlock.dataset.iblockRu]['DATE_ACTIVE_TO']
                                        : '';
        //active
        form.checkboxes.uaActive[0].checked = replay[basesBlock.dataset.iblockUa]['ACTIVE'] === 'Y';
        form.checkboxes.ruActive[0].checked = replay[basesBlock.dataset.iblockRu]['ACTIVE'] === 'Y';
        //streams
        form.checkboxes.uaStreams.forEach(function (stream) {
            stream.checked = replay[basesBlock.dataset.iblockUa]['PROPERTY_STREAMS_VALUE'].indexOf(stream.value) > -1;
        });
        form.checkboxes.ruStreams.forEach(function (stream) {
            stream.checked = replay[basesBlock.dataset.iblockRu]['PROPERTY_STREAMS_VALUE'].indexOf(stream.value) > -1;
        });
        //type base
        form.checkboxes.uaBaseTypes.forEach(function (type) {
            type.checked = Object.keys(replay[basesBlock.dataset.iblockUa]['PROPERTY_TYPE_BASES_VALUE']).indexOf(type.value) > -1;
        });
        form.checkboxes.ruBaseTypes.forEach(function (type) {
            type.checked = Object.keys(replay[basesBlock.dataset.iblockRu]['PROPERTY_TYPE_BASES_VALUE']).indexOf(type.value) > -1;
        });
        //uaWholesale
        for (option in form.selectors.uaWholesale){
            if (form.selectors.uaWholesale.options.hasOwnProperty(option)) {
                if (form.selectors.uaWholesale.options[option].value === replay[basesBlock.dataset.iblockUa]['PROPERTY_WHOLESALE_ENUM_ID']){
                    form.selectors.uaWholesale.selectedIndex = option;
                }
            }
        }
        for (option in form.selectors.ruWholesale){
            if (form.selectors.ruWholesale.options.hasOwnProperty(option)) {
                if (form.selectors.ruWholesale.options[option].value === replay[basesBlock.dataset.iblockRu]['PROPERTY_WHOLESALE_ENUM_ID']){
                    form.selectors.ruWholesale.selectedIndex = option;
                }
            }
        }
        //address
        form.inputs.uaAddress.value = replay[basesBlock.dataset.iblockUa]['PROPERTY_ADDRESS_VALUE']['TEXT'];
        form.inputs.ruAddress.value = replay[basesBlock.dataset.iblockRu]['PROPERTY_ADDRESS_VALUE']['TEXT'];

        //phones_ua
        if (replay[basesBlock.dataset.iblockUa]['PROPERTY_PHONE_VALUE'].length > 1) {
            for (item = 0; item < replay[basesBlock.dataset.iblockUa]['PROPERTY_PHONE_VALUE'].length-1; item++) {
                plusInput(uaButtonPhoneInputAdd);
            }
        }
        form.multyInputs.uaPhoneInputs = basesBlock.querySelectorAll('[name="UA_PROPERTY_PHONE[]"]');
        multiCount = Object.keys(replay[basesBlock.dataset.iblockUa]['PROPERTY_PHONE_VALUE']);
        if (form.multyInputs.uaPhoneInputs.length > 0 && multiCount.length > 0) {
            replay[basesBlock.dataset.iblockUa]['PROPERTY_PHONE_VALUE'].forEach(function(item, i){
                form.multyInputs.uaPhoneInputs[i].value =  item;
            })
        }
        //phones_ru
        if (replay[basesBlock.dataset.iblockRu]['PROPERTY_PHONE_VALUE'].length > 1) {
            for (item = 0; item < replay[basesBlock.dataset.iblockRu]['PROPERTY_PHONE_VALUE'].length-1; item++) {
                plusInput(ruButtonPhoneInputAdd);
            }
        }
        form.multyInputs.ruPhoneInputs = basesBlock.querySelectorAll('[name="RU_PROPERTY_PHONE[]"]');
        multiCount = Object.keys(replay[basesBlock.dataset.iblockRu]['PROPERTY_PHONE_VALUE']);
        if (form.multyInputs.ruPhoneInputs.length > 0 && multiCount.length > 0) {
            replay[basesBlock.dataset.iblockRu]['PROPERTY_PHONE_VALUE'].forEach(function(item, i){
                form.multyInputs.ruPhoneInputs[i].value =  item;
            })
        }
        //houres_ua
        if (replay[basesBlock.dataset.iblockUa]['PROPERTY_OPEN_HOURES_VALUE'].length > 1) {
            for (item = 0; item < replay[basesBlock.dataset.iblockUa]['PROPERTY_OPEN_HOURES_VALUE'].length-1; item++) {
                plusInput(uaButtonHouresInputAdd);
            }
        }
        form.multyInputs.uaHouresInputs = basesBlock.querySelectorAll('[name="UA_PROPERTY_OPEN_HOURES[]"]');

        multiCount = Object.keys(replay[basesBlock.dataset.iblockUa]['PROPERTY_OPEN_HOURES_VALUE']);
        if (form.multyInputs.uaHouresInputs.length > 0 && multiCount.length > 0) {
            replay[basesBlock.dataset.iblockUa]['PROPERTY_OPEN_HOURES_VALUE'].forEach(function(item, i){
                form.multyInputs.uaHouresInputs[i].value =  item;
            })
        }
        //houres_ru
        if (replay[basesBlock.dataset.iblockRu]['PROPERTY_OPEN_HOURES_VALUE'].length > 1) {
            for (item = 0; item < replay[basesBlock.dataset.iblockUa]['PROPERTY_OPEN_HOURES_VALUE'].length-1; item++) {
                plusInput(ruButtonHouresInputAdd);
            }
        }
        form.multyInputs.ruHouresInputs = basesBlock.querySelectorAll('[name="RU_PROPERTY_OPEN_HOURES[]"]');
        multiCount = Object.keys(replay[basesBlock.dataset.iblockRu]['PROPERTY_OPEN_HOURES_VALUE']);
        if (form.multyInputs.ruHouresInputs.length > 0 && multiCount.length > 0) {
            replay[basesBlock.dataset.iblockRu]['PROPERTY_OPEN_HOURES_VALUE'].forEach(function(item, i){
                form.multyInputs.ruHouresInputs[i].value =  item;
            })
        }
        //cordinates
        form.inputs.uaCordinateX.value = replay[basesBlock.dataset.iblockUa]['PROPERTY_CORDINATE_X_VALUE'];
        form.inputs.ruCordinateX.value = replay[basesBlock.dataset.iblockRu]['PROPERTY_CORDINATE_X_VALUE'];

        form.inputs.uaCordinateY.value = replay[basesBlock.dataset.iblockUa]['PROPERTY_CORDINATE_Y_VALUE'];
        form.inputs.ruCordinateY.value = replay[basesBlock.dataset.iblockRu]['PROPERTY_CORDINATE_Y_VALUE'];
        //object_number
        form.inputs.uaObjectNumber.value = replay[basesBlock.dataset.iblockUa]['PROPERTY_NUMBER_OBJECT_VALUE'];
        form.inputs.ruObjectNumber.value = replay[basesBlock.dataset.iblockRu]['PROPERTY_NUMBER_OBJECT_VALUE'];
        //
        form.checkboxes.uaClosed[0].checked = typeof (replay[basesBlock.dataset.iblockUa]['PROPERTY_CLOSED_ENUM_ID']) !== 'object';
        form.checkboxes.ruClosed[0].checked = typeof (replay[basesBlock.dataset.iblockRu]['PROPERTY_CLOSED_ENUM_ID']) !== 'object';
        //actions
        form.selectors.uaCurrentAction.selectedIndex = 0;
        for (option in form.selectors.uaCurrentAction) {
            if (form.selectors.uaCurrentAction.options.hasOwnProperty(option)) {
                if (form.selectors.uaCurrentAction.options[option].value === replay[basesBlock.dataset.iblockUa]['PROPERTY_CURRENT_ACTION_VALUE']){
                    form.selectors.uaCurrentAction.selectedIndex = option;
                }
            }
        }
        form.selectors.ruCurrentAction.selectedIndex = 0;
        for (option in form.selectors.ruCurrentAction) {
            if (form.selectors.ruCurrentAction.options.hasOwnProperty(option)) {
                if (form.selectors.ruCurrentAction.options[option].value === replay[basesBlock.dataset.iblockRu]['PROPERTY_CURRENT_ACTION_VALUE']){
                    form.selectors.ruCurrentAction.selectedIndex = option;
                }
            }
        }
        form.inputs.uaAdditionalTitle.value = replay[basesBlock.dataset.iblockUa]['PROPERTY_ADDITIONAL_TITLE_VALUE'];
        form.inputs.ruAdditionalTitle.value = replay[basesBlock.dataset.iblockRu]['PROPERTY_ADDITIONAL_TITLE_VALUE'];
    }
    form.inputs.getValue = function(){
        let
            property,
            answer = {};
        for (property in this) {
            if (this.hasOwnProperty(property)){
                answer[this[property].dataset.iblockId] = typeof answer[this[property].dataset.iblockId] === 'object'
                                                          ? answer[this[property].dataset.iblockId]
                                                          : {};
                answer[this[property].dataset.iblockId][this[property].name.substr(3)] = this[property].value;

            }
        }
        return answer;
    };
    form.checkboxes.getValue = function(){
        let
            property, prop, nameObj,iBlockId,
            $i = 0,
            answer = {};

        for (property in this) {
            if (this.hasOwnProperty(property)) {
                $i = 0;
                for(prop in this[property]){
                    if (this[property].hasOwnProperty(prop) && typeof this[property][prop].name !== 'undefined') {
                        nameObj = this[property][prop].name.substr(3).slice(0, -2);
                        iBlockId = this[property][prop].dataset.iblockId;
                        answer[iBlockId] = typeof answer[iBlockId] === 'object' ? answer[iBlockId] : {};
                        answer[iBlockId][nameObj] = typeof answer[iBlockId][nameObj] === 'object' ? answer[iBlockId][nameObj] : {};
                        if (nameObj !== 'ACTIVE') {
                            if (this[property][prop].checked === true) {
                                answer[iBlockId][nameObj][$i++] = this[property][prop].value;
                            }
                        } else {
                            answer[iBlockId][nameObj] = this[property][prop].checked === true ? 'Y' : 'N';
                        }
                    }
                }
            }
        }
        return answer;
    };
    form.selectors.getValue = function () {
        let
            property, nameObj,iBlockId,
            answer = {};
        for (property in this) {
            if (this.hasOwnProperty(property)) {
                nameObj = this[property].name.substr(3);
                iBlockId = this[property].dataset.iblockId;
                answer[iBlockId] = typeof answer[iBlockId] === 'object' ? answer[iBlockId] : {};
                if (nameObj !== 'REGION') {
                    answer[iBlockId][nameObj] = this[property][this[property].selectedIndex].value;
                }
            }
        }
        return answer;
    };
    form.multyInputs.getValue = function () {
        let
            property, nameObj,iBlockId, prop,
            multyInputs,
            answer = {};
        form.multyInputs.uaPhoneInputs = basesBlock.querySelectorAll('[name="UA_PROPERTY_PHONE[]"]');
        form.multyInputs.ruPhoneInputs = basesBlock.querySelectorAll('[name="RU_PROPERTY_PHONE[]"]');
        form.multyInputs.uaHouresInputs = basesBlock.querySelectorAll('[name="UA_PROPERTY_OPEN_HOURES[]"]');
        form.multyInputs.ruHouresInputs = basesBlock.querySelectorAll('[name="RU_PROPERTY_OPEN_HOURES[]"]');
        multyInputs = form.multyInputs;
        for (property in multyInputs) {
            if (multyInputs.hasOwnProperty(property)) {
                for (prop in multyInputs[property]) {
                    if (multyInputs[property].hasOwnProperty(prop)) {
                        nameObj = multyInputs[property][prop].name.substr(3).slice(0, -2);
                        iBlockId = multyInputs[property][prop].dataset.iblockId;
                        answer[iBlockId] = typeof answer[iBlockId] === 'object' ? answer[iBlockId] : {};
                        answer[iBlockId][nameObj] = typeof answer[iBlockId][nameObj] === 'object' ? answer[iBlockId][nameObj] : {};
                        answer[iBlockId][nameObj][prop] = multyInputs[property][prop].value;
                    }
                }
            }
        }
        return answer;
    };
    Object.defineProperty(form.inputs,      'getValue',{enumerable:false});
    Object.defineProperty(form.checkboxes,  'getValue',{enumerable:false});
    Object.defineProperty(form.selectors,   'getValue',{enumerable:false});
    Object.defineProperty(form.multyInputs, 'getValue',{enumerable:false});

    form.getValues = function() {
       let
           answerInputs, answerCheckboxes, answerSelectors, answerMultyInputs, key,
           generalAnswer = {};

       answerInputs = form.inputs.getValue();
       answerCheckboxes = form.checkboxes.getValue();
       answerSelectors = form.selectors.getValue();
       answerMultyInputs = form.multyInputs.getValue();
       for (key in answerInputs){
           if (answerInputs.hasOwnProperty(key)) {
               generalAnswer[key] = Object.assign(answerInputs[key],answerCheckboxes[key],answerSelectors[key], answerMultyInputs[key]);
           }
       }
       return generalAnswer;
    };
    function errorMessage(action, message, result) {
        let
            classError = result === true ? 'success' : 'fatal';
        window.scrollBy(0,0);
        switch (action) {
            case 'show':
                if (message !== undefined){
                    errorBlock.classList.remove('hide-error');
                    errorBlock.classList.add(classError);
                    errorText.innerHTML = message;
                }
                break;
            case 'hide':
            default:
                errorBlock.classList.add('hide-error');
                errorBlock.classList.remove('success');
                errorBlock.classList.remove('fatal');
                errorText.innerHTML = '';
                break;
        }

    }
    function parallelChange(selectedCode, firstSelect, secondSelect, $dataParam) {
        firstSelect.forEach(function (region) {
            let
                searchAnother = false,
                option;

            for (option in region.options) {
                if (region.options.hasOwnProperty(option)) {
                    if (region.options[option].dataset[$dataParam] === selectedCode) {
                        region.selectedIndex = option;
                        region.classList.remove('warning');
                        searchAnother = true;
                        if (typeof secondSelect === 'object') {
                            showHideOptions(selectedCode, secondSelect, $dataParam);
                        }
                    }
                }
            }
            if (searchAnother === false) {
                region.classList.add('warning');
                region.selectedIndex = 0;
            }
        });
    }

    function showHideOptions(selectedCode, items, $dataParam) {
        items.forEach(function (item) {
            let city;
            for (city in item.options) {
                if (item.options.hasOwnProperty(city)) {
                    if (item.options[city].dataset[$dataParam] === selectedCode) {
                        item.options[city].classList.remove('hide-base');
                    } else if (item.options[city].dataset[$dataParam] !== item.options[0].dataset[$dataParam]) {
                        item.options[city].classList.add('hide-base');
                    }
                }
            }

        });
    }
});


