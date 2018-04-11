$(function(){
    if($('.right-column').height() < $(window).height()){
        $('.page-workarea').css('height', $(window).height() - $('.headder-wrap').height() + "px");
        $( window ).resize(function() {
            $('.page-workarea').css('min-height', $(window).height() - $('.headder-wrap').height() + "px");
        });
    } else {

    }



    $(document).on('click','.left-side-toggle:not(.active)',function() {
        $('.left-column').css('margin-left', '-320px');
        $('.page-workarea > div.col-md-12 > .col-md-9').css('width', '96%');
        $('.left-side-toggle').addClass('active');

    });


    $(document).on('click','.left-side-toggle.active', function() {
        $('.left-column').css('margin-left', '0px');
        $('.page-workarea > div.col-md-12 > .col-md-9').css('width', '80%');
        $('.left-side-toggle').removeClass('active');
    });
});
