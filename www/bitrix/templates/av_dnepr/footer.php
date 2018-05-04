<footer class="footer">
    <?$APPLICATION->SetTitle('Днепр')?>
    <div class="container">
        <div class="row">
            <a href="/" class="logo-footer"><img src="<?=SITE_TEMPLATE_PATH?>/img/logo-footer.png" alt="Лого подвала"></a>
            <a href="/" class="logo-footer-mobile"><img src="<?=SITE_TEMPLATE_PATH?>/img/mobile-footer-logo.png" alt="Лого подвала(мобильная версия)"></a>
        </div>
    </div>
</footer>
<div id="page-up-button"></div>
</body>
<script>
    var l = document.getElementsByClassName('bx-authform');
    if (l.length > 0) {
        l[0].remove();
    }
    $('html, body').stop().animate({
        scrollTop: 0
    }, 0);
</script>
<script data-skip-moving="true">
    (function(w,d,u){
        var s=d.createElement('script');s.async=1;s.src=u+'?'+(Date.now()/60000|0);
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://corp.avmg.com.ua/upload/crm/site_button/loader_15_z9ovza.js');
</script>
<!-- FONT AWESOME -->
<!--<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>-->
<!-- JQUERY -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<!--<script src="js/main.js"></script>-->
</html>