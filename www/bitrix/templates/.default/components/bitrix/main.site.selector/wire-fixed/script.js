document.addEventListener("DOMContentLoaded", function () {
    document.body.addEventListener('click', function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement;
        var langDrop = document.getElementById('wire-fixed-lang-drop');
        var list = langDrop.getElementsByClassName('lang-drop-list-hide-part');
        var arrow = langDrop.getElementsByClassName('arrow');
        if (target === langDrop || langDrop.contains(target)) {
                if (!list[0].classList.contains('active') && !list[0].classList.contains('select')) {
                    list[0].classList.add('select');
                    arrow[0].classList.remove('fa-angle-down');
                    arrow[0].classList.add('fa-angle-up');
                } else if (!list[0].classList.contains('active') && list[0].classList.contains('select')) {
                    list[0].classList.remove('select');
                    arrow[0].classList.remove('fa-angle-up');
                    arrow[0].classList.add('fa-angle-down');
                }
        }else {
             if (!list[0].classList.contains('active') && list[0].classList.contains('select')) {
                 list[0].classList.remove('select');
                 arrow[0].classList.remove('fa-angle-up');
                 arrow[0].classList.add('fa-angle-down');
              }
        }
    }, false);
});