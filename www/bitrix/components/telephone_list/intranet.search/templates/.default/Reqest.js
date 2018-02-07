/** start class Reqest **/
/*async(url, data, callback)*//*асинхронный запрос с колбеком*/
/*reqest(url, data, element)*//*асинхронный запрос без колбека*/

function Reqest(url){
    if(!url) return error.log();
    this._url = url;
}
Reqest.prototype.reqest = function (data, element){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', this._url, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState != 4) return;
        if (xhr.status != 200) {
            element.innerHTML = xhr.status + ': ' + xhr.statusText;
        } else {
            element.innerHTML = xhr.responseText;
        }
    }
    element.innerHTML =  'Загрузка данных...';
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(data);
}
Reqest.prototype.async = function(data, callback, file){
    file = file || false;
    var xhr = new XMLHttpRequest();
    var form=new FormData();
    var tmp = [];
    var tmp2 = [];

    tmp = data.split('&');	// разделяем переменные
    for(var i=0; i < tmp.length; i++) {
        tmp2 = tmp[i].split('=');
        form.append(tmp2[0], tmp2[1]);
    }
    if (file !== false){
        form.append('FILE', file);
    }
    xhr.open('POST', this._url, true);
    xhr.onreadystatechange = function() {

        if (xhr.readyState != 4) return;
        if (xhr.status != 200) {
            console.log(xhr.status + ': ' + xhr.statusText);
        } else {

            callback.call(xhr.responseText);
        }
    }
    /*console.log('Идет обработка запроса...');*/
    /*callback.call('Идет обработка запроса...');*/
    //xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //xhr.send(data);
    xhr.send(form);
}
/** start class msReqest **/