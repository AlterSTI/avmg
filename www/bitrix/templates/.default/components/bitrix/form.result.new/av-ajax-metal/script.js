$(function()
{
    $(document).on('vclick', '.av-form-ajax-metal [data-submit-button]', function(){
        var
            formItem            = this,
            form                = null,
            formButton          = this,
            errorBlock          = null,
            resultBlock         = null,
            handler             = null;


        while (!formItem.classList.contains('av-form-ajax-metal') && formItem.tagName !== 'HTML') {
            formItem = formItem.parentNode;
        }
        form        = formItem.getElementsByTagName('form')[0];
        handler     = window.atob(this.closest('.av-form-ajax-metal').dataset.ajaxHandler);
        errorBlock  = formItem.getElementsByClassName('errors-block')[0];
        resultBlock = formItem.getElementsByClassName('result_form_price')[0];

        if (!$(form).checkFormValidation())
            return;

        AvWaitingScreen('on');
        $.ajax
        ({
            type    : 'POST',
            url     : handler,
            data    : $(form).serialize(),
            success : function(result){
                var
                    answer  = {},
                    success = false,
                    errors   = [],
                    messages = [],
                    eventOk             = new Event('AjaxFormOk'),
                    eventError          = new Event('AjaxFormError'),
                    event               = eventError;

                try
                {
                    answer   = JSON.parse(result);
                    success  = 'success'  in answer ? answer.success    : false;
                    errors   = 'errors'   in answer ? answer.errors     : [];
                    messages = 'messages' in answer ? answer.messages   : [];

                    if (typeof success !== 'boolean')
                        success = false;
                    if (!Array.isArray(errors))
                        errors = [];
                    if (!Array.isArray(messages))
                        messages = [];
                }
                catch (messages)
                {

                }

                if (success === true && messages.length > 0) {
                    resultBlock.classList.add('result_form_price_ok');
                    messages.forEach(function (item) {
                        resultBlock.innerHTML += item;
                    });
                    event = eventOk;
                }
                if (errors.length > 0){
                    errorBlock.classList.add('errors-block-true');
                    errors.forEach(function (item) {
                        errorBlock.innerHTML += item;
                    });
                }
                form.classList.add('form-hide');

                while (formButton.tagName !== 'HTML'){
                    formButton.dispatchEvent(event);
                    formButton = formButton.parentNode;
                }
            },
            complete: function(){
                AvWaitingScreen('off');
            }
        });
    });
});