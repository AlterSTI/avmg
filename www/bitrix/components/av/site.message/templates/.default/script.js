function close_old_browser_message() {
     var block = document.getElementById('old_browser_message');
     var top;
    if (isNaN(parseInt(block.style.top))){
        top = 0;
    }
    setInterval(function () {
        if (top > block.offsetHeight*-1){
            top--;
        } else {
            block.remove();
        }
        block.style.top = top + 'px';
    },10);
}