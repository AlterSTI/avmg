$(function()
{
    $('.pipe-ctatalog-item-tablet .more-btn').on('click', function() {
        AvWaitingScreen("on");
        AvBlurScreen("on", 999);
        $.ajax
        ({
            type    : 'POST',
            url     : PipeCatalogElement,
            data    :
                {
                    "component_params"  :   $('.av-catalog-section').attr("data-section-params"),
                    "element_id"        :   $(this).closest('.pipe-ctatalog-item-tablet').attr("data-element-id")
                },
            success : function(scriptResult)
            {
                $('<div class="my-popup av-alert-popup">'+scriptResult+ '<div data-close-form2></div></div>')
                    .appendTo('body')
                    .positionCenter(99999, 'Y')
                    .onClickout(function ()
                    {
                        $('.my-popup').remove();
                        AvBlurScreen("off");
                    })
                    .on('click', '[data-close-form2]', function()
                    {
                        $(this).closest('.av-alert-popup').remove();
                        $('[form-input-error-123]').removeClass("show");

                        AvBlurScreen("off");
                    });
            },
            complete: function() {AvWaitingScreen("off")}
        });

    });

});