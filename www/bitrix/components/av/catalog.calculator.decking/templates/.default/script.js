// Dropdown calc block
$(function() {
    $('.calc-list').on('click', '.calc-list-dropdown:not(.unable)', function(e){
        //console.log(target);
        let
            parent = this.closest('.calc-list'),
            selects = parent.getElementsByClassName('calc-list-dropdown'),
            $body   = $(this).find('.calc-dropdown-box'),
            target = e.target,
            select = target.closest('.calc-list-dropdown'),
            valueSelect = select.querySelector('.calc-dropdown-title'),
            titleSelect = select.previousElementSibling,
            workWidth = parent.querySelector('.working-width'),
            totalWidth = parent.querySelector('.total-width'),
            productInput = parent.querySelector('.product .calc-dropdown-title'),
            coatingInput = parent.querySelector('.coating .calc-dropdown-title'),
            thicknessInput = parent.querySelector('.thickness .calc-dropdown-title');
        if (this.classList.contains('product') ||
            (this.classList.contains('coating') && productInput.dataset.value != '') ||
            (this.classList.contains('thickness') && productInput.dataset.value != '' && coatingInput.dataset.value != '')) {
            catalogCalculatorDeckingScrollingList(this, $body, selects);
        }


        if (titleSelect.classList.contains('calc-dropdown-title-selected')) {
            catalogCalculatorDeckingSetTitle(titleSelect, valueSelect.textContent, valueSelect.dataset.title);
        }
        if (target.classList.contains('calc-list-data')) {
            valueSelect.textContent = target.dataset.value;
            valueSelect.dataset.value = target.dataset.value;

            if (select.classList.contains('product')) {

                parent.querySelectorAll('.calc-list-dropdown:not(.product) .calc-dropdown-box .calc-list-data').forEach(function (item) {
                    if (!(item.dataset.product.split(' ').indexOf(target.dataset.product) > -1)) {
                        item.classList.add('hide-variant');
                        item.dataset.hidden = '1';
                        /*resetCoating*/
                        coatingInput.dataset.value = '';
                        coatingInput.textContent = coatingInput.dataset.title;
                        coatingInput.classList.remove('black-text');
                        /*resetThickness*/
                        thicknessInput.dataset.value = '';
                        thicknessInput.textContent = thicknessInput.dataset.title;
                        thicknessInput.classList.remove('black-text');
                        /**/
                    } else {
                        item.classList.remove('hide-variant');
                        item.dataset.hidden = '';
                    }

                });
            } else if (select.classList.contains('coating')) {

                parent.querySelectorAll('.calc-list-dropdown:not(.coating):not(.product) .calc-dropdown-box .calc-list-data').forEach(function (item) {
                    if (!(item.dataset.coating.split(' ').indexOf(target.dataset.coating) > -1) && item.dataset.hidden ==='') {
                        item.classList.add('hide-variant');
                        item.dataset.hidden = '2';
                    } else {
                        if (item.dataset.hidden >= '2') {
                            item.classList.remove('hide-variant');
                            item.dataset.hidden = '';
                        }
                    }
                    /*resetThickness*/
                    thicknessInput.dataset.value = '';
                    thicknessInput.textContent = thicknessInput.dataset.title;
                    thicknessInput.classList.remove('black-text');
                    /**/
                });
            } else if (select.classList.contains('thickness')) {

                parent.querySelectorAll('.calc-list-dropdown:not(.coating):not(.product):not(.thickness) .calc-dropdown-box .calc-list-data').forEach(function (item) {
                    if (!(item.dataset.tickness.split(' ').indexOf(target.dataset.tickness) > -1) && item.dataset.hidden ==='') {
                        item.classList.add('hide-variant');
                        item.dataset.hidden = '3';
                    } else {
                        if (item.dataset.hidden >= '3') {
                            item.classList.remove('hide-variant');
                            item.dataset.hidden = '';
                        }
                    }
                });

            }
            let
                valWorkWidth = workWidth.querySelectorAll('.calc-dropdown-box .calc-list-data:not(.hide-variant)'),
                titleWorkWidth = workWidth.querySelector('.calc-dropdown-title'),
                valTotalWidth = totalWidth.querySelectorAll('.calc-dropdown-box .calc-list-data:not(.hide-variant)'),
                titleTotalWidth = totalWidth.querySelector('.calc-dropdown-title');

            if (valWorkWidth.length === 1){
                catalogCalculatorDeckingOneValue(workWidth, valWorkWidth, titleWorkWidth, 'on');
            } else {
                catalogCalculatorDeckingOneValue(workWidth, valWorkWidth, titleWorkWidth, 'off');
            }

            if (valTotalWidth.length === 1){
                catalogCalculatorDeckingOneValue(totalWidth, valTotalWidth, titleTotalWidth, 'on');
            } else {
                catalogCalculatorDeckingOneValue(totalWidth, valTotalWidth, titleTotalWidth, 'off');
            }
            catalogCalculatorDeckingActiveResult(this);
        }
    });
    document.querySelectorAll('.calc-component .calculate-btn-active').forEach(function (item) {
        item.addEventListener('click', function (e) {
            if (catalogCalculatorDeckingActiveResult(this) !== true) return;
            let
                target = e.target,
                result = {},
                parent = this.closest('.calc-inner-content'),
                lengthWall = parseFloat(parent.querySelector('.length-wall').value.replace('.', ',')),
                heightWall = parseFloat(parent.querySelector('.height-wall').value.replace('.', ',')),
                price = parseFloat(parent.querySelector('.price').value.replace('.', ',')),
                // price = parent.querySelector('.price').value,
                workingWidth = parent.querySelector('.working-width .calc-dropdown-title').dataset.value,
                totalWidth = parent.querySelector('.total-width .calc-dropdown-title').dataset.value;

            result = catalogCalculatorDeckingCalculate(lengthWall, heightWall, workingWidth, totalWidth, price);
            parent.querySelector('.calculate-result-container').classList.remove('hide');
            parent.querySelector('.calculate-result-container').classList.add('animate-show');
            parent.querySelector('.number-of-sheets').textContent = result['numberOfSheets']+' шт';
            parent.querySelector('.total-area').textContent = result['totalArea'].toString().replace('.', ',')+' м²';
            parent.querySelector('.number-of-screws').textContent = result['numberOfScrews']+' шт';
            parent.querySelector('.price-result').textContent = result['priceResult'].toString().replace('.', ',') +' грн';
        });
    });
    catalogCalculatorDeckingValidationInput('.calc-component .length-wall', /\d+(\.\d+)?$/, 1, 10000, 'calc-input-title-selected');
    catalogCalculatorDeckingValidationInput('.calc-component .height-wall', /\d+(\.\d+)?$/, 0.5, 12, 'calc-input-title-selected');

    document.body.addEventListener('click', function (e) {
        let
            element = e.target,
            inputs = document.querySelectorAll('.calc-list .calc-list-dropdown');
        if (!element.closest('.calc-list')){
            catalogCalculatorDeckingCloseSelectors(document.querySelectorAll('.calc-list .calc-list-dropdown'), document.querySelector('.calc-list'));
        }
        inputs.forEach(function (i) {
            if (i.querySelector('.calc-dropdown-title').dataset.value.length === 0 && element.querySelector('.calc-list-dropdown')){
                i.previousElementSibling.classList.remove('up');
            }
        })
    });

    // Enter input data
    let findTextField = document.querySelectorAll('.change-txt');
    for (let i = 0; i < findTextField.length; i++) {
        let rezultTxt = findTextField[i];
        rezultTxt.onkeyup = function() {
            let
                rezNum = this.value = this.value.replace(/\D/, ''),
                min = 0,
                max = 0;
            if (this.classList.contains('length-wall')) {
                min = 1;
                max = 10000;
            } else if (this.classList.contains('height-wall')){
                min = 0.5;
                max = 12;
            }
            if (rezNum >= min && rezNum <= max || rezNum == '') {
                this.parentNode.firstChild.nextSibling.style.display = 'none';
            } else {
                this.parentNode.firstChild.nextSibling.style.display = 'inline-block';
            }
        };
    }
    // Animate on click text
    $('.calc-list-dropdown').click(function() {
        let
            prev = $(this).prev()[0],
            parent = this.closest('.calc-list'),
            productInput = parent.querySelector('.product .calc-dropdown-title'),
            coatingInput = parent.querySelector('.coating .calc-dropdown-title');
        if (this.classList.contains('product') ||
            (this.classList.contains('coating') && productInput.dataset.value.length > 0) ||
            (this.classList.contains('thickness') && productInput.dataset.value.length > 0 && coatingInput.dataset.value.length > 0)){
            $(prev).addClass('up');
        }
        //$('.calc-dropdown-title-selected').not($(prev)).removeClass('up');
    });

    // Animate on focus input
    $('.field-write').focus(function() {
        let
            prevInput = $(this).prev()[0];
        $(prevInput).addClass('up');
        //$('.calc-input-title-selected').not($(prevInput)).removeClass('up');
    });

    //Data value font-size
    $('.calc-list').click(function(e) {
       let target = e.target;
       //console.log($(target).hasClass('calc-list-data'));
       if ($(target).hasClass('calc-list-data')) {
           let itogData = $(target).closest('.calc-dropdown-box').prev()[0];
           $(itogData).addClass('black-text');
       }
    });

    document.querySelectorAll('.calculate-btn-cancel').forEach(function (item) {
        item.addEventListener('click', function (e) {
            location.reload();
        });
    });
});
                                            /*(workWidth, valWorkWidth, titleWorkWidth)*/
function catalogCalculatorDeckingOneValue(obj, valObj, titleObj, action) {
    if (action === 'on') {
        obj.querySelector('.calc-dropdown-title').textContent = valObj[0].dataset.value;
        catalogCalculatorDeckingSetTitle(obj.previousElementSibling, valObj.textContent, titleObj.dataset.title);
        obj.querySelector('.calc-dropdown-title').dataset.value = valObj[0].dataset.value;
        obj.querySelector('.calc-dropdown-title').classList.add('singleton');
        obj.previousElementSibling.classList.add('up');
        obj.classList.add('unable');

    } else {
        obj.querySelector('.calc-dropdown-title').classList.remove('singleton');
        obj.previousElementSibling.classList.remove('up');
        obj.classList.remove('unable');
    }
}
function catalogCalculatorDeckingScrollingList(object, $body, selects) {
    let
        z = 2;
    if ($body.is(':visible')){
        $(object).addClass('closed');
        $body.addClass('closed');
        $(object).find('.calc-dropdown-title').next().css('z-index', z);
        $(object).find('.calc-dropdown-title').removeClass('selected-drop');
        $body.slideUp();
    } else{
        catalogCalculatorDeckingCloseSelectors(selects);
        $(object).removeClass('closed');
        $body.removeClass('closed');
        $(object).find('.calc-dropdown-title').next().css('z-index', z++);
        $(object).find('.calc-dropdown-title').addClass('selected-drop');
        $body.slideDown();
    }
}
function catalogCalculatorDeckingActiveResult(element) {
    let
        parent = element.closest('.calc-inner-content'),
        warnings = 0,
        obj = {
            product         : parent.querySelector('.product .calc-dropdown-title'),
            // coating         : parent.querySelector('.coating .calc-dropdown-title'),
            // thickness       : parent.querySelector('.thickness .calc-dropdown-title'),
            lengthWall      : parent.querySelector('.calc-component .length-wall'),
            heightWall      : parent.querySelector('.calc-component .height-wall'),
            // workingWidth    : parent.querySelector('.working-width .calc-dropdown-title'),
            // totalWidth      : parent.querySelector('.total-width .calc-dropdown-title'),
            //price           : parent.querySelector('.calc-component .price')
        };
        for (let key in obj){
            if (obj.hasOwnProperty(key)){
                if (!(obj[key].dataset.value.length > 0)){
                    obj[key].classList.add('warning');
                    warnings++;
                } else {
                    obj[key].classList.remove('warning');
                }
            }
        }
        return warnings === 0;
}

function catalogCalculatorDeckingCloseSelectors(selects){
    $(selects).each(function () {
        if (!this.classList.contains('closed')) {
            this.classList.add('closed');
        }
        $(this).find('.calc-dropdown-box').slideUp();
    });
}
function catalogCalculatorDeckingSetTitle(titleSelect, title, defaultValue) {
    if (titleSelect.textContent.length === 0 && titleSelect.textContent !== defaultValue) {
        titleSelect.textContent = defaultValue;
    }
}
function catalogCalculatorDeckingValidationInput(selector, regExp, valueMin, valueMax, classWarningItem) {
    let
        result      = false;
    document.querySelectorAll(selector).forEach(function (item) {
        item.addEventListener('blur', function (event) {
            let
                reg1        = new RegExp(regExp);
            if (reg1.test(event.target.value) === true &&
                parseFloat(event.target.value.replace(',', '.')) >= valueMin &&
                parseFloat(event.target.value.replace(',', '.')) <= valueMax){

                this.classList.remove('warning');
                this.dataset.value = event.target.value.replace(',', '.');
                catalogCalculatorDeckingActiveResult(this);

                if (event.target.previousElementSibling !== null &&
                    event.target.previousElementSibling.classList.contains(classWarningItem)){
                    event.target.previousElementSibling.classList.remove('warning');
                }
                result = true;
            } else {
                this.classList.add('warning');
                this.dataset.value = "";
                //catalogCalculatorDeckingActiveResult(this);
                if (event.target.previousElementSibling !== null &&
                    event.target.previousElementSibling.classList.contains(classWarningItem)){
                    event.target.previousElementSibling.classList.add('warning');
                }
                result = false;
            }
        });
        item.addEventListener('focus', function (event) {
            if (event.target.previousElementSibling !== null && event.target.previousElementSibling.classList.contains(classWarningItem)){
                event.target.previousElementSibling.textContent = event.target.placeholder;
            }
        });
    });
    return result;
}

function catalogCalculatorDeckingCalculate(lengthWall, heightWall, workingWidth, totalWidth, price) {
    let
        numberOfSheets  = Math.ceil(lengthWall/(workingWidth/1000)),
        totalArea       = (numberOfSheets * totalWidth * heightWall/1000).toFixed(1),
        numberOfScrews  = Math.ceil(totalArea * 7),
        priceResult     = Math.ceil(price * totalArea);
    if (isNaN(priceResult)) priceResult = 0;

    return {
        'numberOfSheets'    :   numberOfSheets,
        'totalArea'         :   totalArea,
        'numberOfScrews'    :   numberOfScrews,
        'priceResult'       :   priceResult
    };
}
