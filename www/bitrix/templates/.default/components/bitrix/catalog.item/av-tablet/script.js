window.onload = function() {
    $(function()
    {
        adDot();
        $(document)
            .on("vclick", '.av-ctatalog-item-tablet', function()
            {
                $(this).find('a')[0].click();
            })
            .on("avCatalogSectionViewTypeChanged", function ()
            {
                adDot();
            });
    });

    // Добавление троеточия если высота больше определенной
    function adDot() {
        var dot = document.querySelectorAll('.element-title');

        for (i = 0; i < dot.length; i++) {
            var rezult = dot[i];
            var h = rezult.clientHeight;
            if (h > 53) {
                rezult.style.height = '47px';
                rezult.classList.add('title-after');
            }
        }
    }
}