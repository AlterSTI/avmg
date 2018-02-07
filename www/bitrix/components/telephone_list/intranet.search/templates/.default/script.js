window.onload = function () {
    /*AvPhoneSearchRefresh объявлена в component_epilog.php*/

    Reqest = new Reqest(AvPhoneSearchRefresh);
    var peopleSearch = document.getElementById('peopleSearch');
    var page;
    var telephoneSearch,resultTable, res, resetFilter  = false;
    var activeUser, activeUserAll=true;
    var def = 'Искать по телефону, фамилии, городу ...';
    var timer;
    var timerNull;
    var interval = 1000;

    for (var i=0; i < peopleSearch.childNodes.length; i++){
        if (peopleSearch.childNodes[i].name == 'telephoneSearch') {
            telephoneSearch = peopleSearch.childNodes[i];
        } else if (peopleSearch.childNodes[i].name == 'res'){
            res = peopleSearch.childNodes[i];
        } else if (peopleSearch.childNodes[i].name == 'resetFilter'){
            resetFilter = peopleSearch.childNodes[i];
        } else if (peopleSearch.childNodes[i].name == 'activeUser'){
            activeUser = peopleSearch.childNodes[i];
        } else if (peopleSearch.childNodes[i].id == 'resultTable'){
            resultTable = peopleSearch.childNodes[i];
        }
    }
    if (typeof activeUser !== 'undefined'){
        activeUserAll = activeUser.checked;
    }
    telephoneSearch.dataset.searching = 'N';
    peopleSearch.onkeyup = function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement;
        clearTimeout(timerNull);
        if (target.name == 'telephoneSearch') {
            if (event.keyCode == '13'  && target.value.length > 2) {
                resultTable.dataset.search = telephoneSearch.value;
                if (typeof target.dataset.filterOption === 'undefined'){
                    resultTable.dataset.filterOption = '';
                }
                resetFilter.disabled = false;
                search(telephoneSearch.value, resultTable, activeUserAll, telephoneSearch);
            } else if (target.value.length > 2) {
                res.disabled = false;
                resetFilter.disabled = false;
                clearTimeout(timer);
                timer = setTimeout(function () {
                    search(telephoneSearch.value, resultTable, activeUserAll, telephoneSearch)
                }, interval);
            } else if (target.value.length == 0) {
                resetFilter.disabled = true;
                setTimeout(function () {
                    timerNull = search(telephoneSearch.value, resultTable, activeUserAll, telephoneSearch)
                }, interval);
            } else {
                res.disabled = true;

            }
        }
    }
    peopleSearch.onclick = function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement;
        /*console.log(activeUser.checked);*/
        if (resultTable.dataset.search.length > 0){
            resetFilter.disabled = false;
        } else {
            resetFilter.disabled = true;
        }
       /* if (resultTable.dataset.search.length === 0) {*/
            resultTable.dataset.search = telephoneSearch.value;
       /* }*/
        if (typeof target.dataset.filterOption === 'undefined'){
            resultTable.dataset.filterOption = '';
        }
        if (target==telephoneSearch && telephoneSearch.value == def){
            telephoneSearch.value = '';
        } else if (target != telephoneSearch && telephoneSearch.value.length === 0){
            telephoneSearch.value = def;
        }
        if (resultTable.dataset.search == def){
            resultTable.dataset.search = '';
        }
        if (target == resetFilter){
            resultTable.dataset.search='';
            resetFilter.disabled = true;
            telephoneSearch.value = def;
            search(resultTable.dataset.search, resultTable, activeUserAll, telephoneSearch);
        }
        if (telephoneSearch && resultTable && target.dataset.page){
            if (resultTable.dataset.filterOption.length >2){
                search(resultTable.dataset.search, resultTable, activeUserAll, telephoneSearch, target.dataset.page, resultTable.dataset.filterOption);
            } else {
                search(resultTable.dataset.search, resultTable, activeUserAll, telephoneSearch, target.dataset.page);
            }
        } else if (target == res && resultTable.dataset.search.length > 2) {
            resetFilter.disabled = false;
            search(resultTable.dataset.search, resultTable, activeUserAll, telephoneSearch);
        } else if (typeof target.dataset.filter != 'undefined' && typeof target.dataset.filterOption != 'undefined'){
            if (typeof target.dataset.page === 'undefined'){
                page = 1;
            } else{
                page = target.dataset.page;
            }
            resultTable.dataset.search = target.dataset.filter;
            resultTable.dataset.filterOption = target.dataset.filterOption;
            telephoneSearch.value = target.dataset.filter;
            search(resultTable.dataset.search, resultTable, activeUserAll, telephoneSearch, page, target.dataset.filterOption);
        }
    }
}

function search(telephoneSearchValue, resultTable, activeUser, input, page, filterOption) {
    activeUser=activeUser || true;
    page = page || 1;
    filterOption = filterOption || false;
    input = input || false;

    if (input.dataset.searching == 'N'){
        input.readOnly = true;
        input.dataset.searching = 'Y';

        data = 'ARPARAMS=' + resultTable.dataset.componentParams;
        data+= '&VIEW=' + resultTable.dataset.view;
        data+= '&COMPONENT=' + resultTable.dataset.component;
        data+= '&SEARCH=' + telephoneSearchValue;
        data+= '&I_NUM_PAGE=' + page;
        if (typeof filterOption !== 'undefined'){
            data+= '&DATA_FILTER_OPTION=' + filterOption;
        }
        data+='&ACTIVE_USER='+activeUser;
        AvWaitingScreen('on');
        Reqest.async(data,function () {
            resultTable.innerHTML = '';
            var obj = this;
            resultTable.innerHTML = obj;
            AvWaitingScreen('off');
            input.readOnly = false;
            input.dataset.searching = 'N';
        });
    } else {
        return;
    }
}