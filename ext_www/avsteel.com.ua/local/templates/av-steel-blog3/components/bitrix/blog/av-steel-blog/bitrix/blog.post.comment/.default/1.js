
function onLightEditorShow(content)
{
    if (!window.oBlogComLHE)
        return BX.addCustomEvent(window, 'LHE_OnInit', function(){setTimeout(function(){onLightEditorShow(content);},	500);});

    oBlogComLHE.SetContent(content || '');
    oBlogComLHE.CreateFrame(); // We need to recreate editable frame after reappending editor container
    oBlogComLHE.SetEditorContent(oBlogComLHE.content);
    oBlogComLHE.SetFocus();
}

function showComment(key, error, userName, userEmail, needData)
{
    subject = '';
    comment = '';

    if(needData == "Y")
    {
        subject = window["title"+key];
        comment = window["text"+key];
    }

    if($('#form_c_del').css("display") == "none") {
        var pFormCont = BX('form_c_del');
        BX('form_comment_' + key).appendChild(pFormCont); // Move form
        pFormCont.style.display = "none"; $('#form_c_del').slideToggle( "slow" );

    }



    document.form_comment.parentId.value = key;
    document.form_comment.edit_id.value = '';
    document.form_comment.act.value = 'add';
    document.form_comment.post.value = 'ОТПРАВИТЬ КОММЕНТАРИЙ';
    document.form_comment.action = document.form_comment.action + "#" + key;

    if(error == "Y")
    {
        if(comment.length > 0)
        {
            comment = comment.replace(/\/</gi, '<');
            comment = comment.replace(/\/>/gi, '>');
        }
        if(userName.length > 0)
        {
            userName = userName.replace(/\/</gi, '<');
            userName = userName.replace(/\/>/gi, '>');
            document.form_comment.user_name.value = userName;
        }
        if(userEmail.length > 0)
        {
            userEmail = userEmail.replace(/\/</gi, '<');
            userEmail = userEmail.replace(/\/>/gi, '>');
            document.form_comment.user_email.value = userEmail;
        }
        if(subject && subject.length>0 && document.form_comment.subject)
        {
            subject = subject.replace(/\/</gi, '<');
            subject = subject.replace(/\/>/gi, '>');
            document.form_comment.subject.value = subject;
        }
    }

    files = BX('form_comment')["UF_BLOG_COMMENT_DOC[]"];
    if(files !== null && typeof files != 'undefined')
    {
        if(!files.length)
        {
            BX.remove(files);
        }
        else
        {
            for(i = 0; i < files.length; i++)
                BX.remove(BX(files[i]));
        }
    }
    filesForm = BX.findChild(BX('blog-comment-user-fields-UF_BLOG_COMMENT_DOC'), {'className': 'file-placeholder-tbody' }, true, false);
    if(filesForm !== null && typeof filesForm != 'undefined')
        BX.cleanNode(filesForm, false);

    filesForm = BX.findChild(BX('blog-comment-user-fields-UF_BLOG_COMMENT_DOC'), {'className': 'feed-add-photo-block' }, true, true);
    if(filesForm !== null && typeof filesForm != 'undefined')

    {
        for(i = 0; i < filesForm.length; i++)
        {
            if(BX(filesForm[i]).parentNode.id != 'file-image-template')
                BX.remove(BX(filesForm[i]));
        }
    }

    filesForm = BX.findChild(BX('blog-comment-user-fields-UF_BLOG_COMMENT_DOC'), {'className': 'file-selectdialog' }, true, false);
    if(filesForm !== null && typeof filesForm != 'undefined')
    {
        BX.hide(BX.findChild(BX('blog-comment-user-fields-UF_BLOG_COMMENT_DOC'), {'className': 'file-selectdialog' }, true, false));
        BX.show(BX('blog-upload-file'));
    }

    onLightEditorShow(comment);
    return false;
}

function editComment(key)
{
    subject = window["title"+key];
    comment = window["text"+key];

    if(comment.length > 0)
    {
        comment = comment.replace(/\/</gi, '<');
        comment = comment.replace(/\/>/gi, '>');
    }

    var pFormCont = BX('form_c_del');
    BX('form_comment_' + key).appendChild(pFormCont); // Move form
    pFormCont.style.display = "";

    files = BX('form_comment')["UF_BLOG_COMMENT_DOC[]"];
    if(files !== null && typeof files != 'undefined')
    {
        if(!files.length)
        {
            BX.remove(files);
        }
        else
        {
            for(i = 0; i < files.length; i++)
                BX.remove(BX(files[i]));
        }
    }
    filesForm = BX.findChild(BX('blog-comment-user-fields-UF_BLOG_COMMENT_DOC'), {'className': 'file-placeholder-tbody' }, true, false);
    if(filesForm !== null && typeof filesForm != 'undefined')
        BX.cleanNode(filesForm, false);

    filesForm = BX.findChild(BX('blog-comment-user-fields-UF_BLOG_COMMENT_DOC'), {'className': 'feed-add-photo-block' }, true, true);
    if(filesForm !== null && typeof filesForm != 'undefined')

    {
        for(i = 0; i < filesForm.length; i++)
        {
            if(BX(filesForm[i]).parentNode.id != 'file-image-template')
                BX.remove(BX(filesForm[i]));
        }
    }

    filesForm = BX.findChild(BX('blog-comment-user-fields-UF_BLOG_COMMENT_DOC'), {'className': 'file-selectdialog' }, true, false);
    if(filesForm !== null && typeof filesForm != 'undefined')
    {
        BX.hide(BX.findChild(BX('blog-comment-user-fields-UF_BLOG_COMMENT_DOC'), {'className': 'file-selectdialog' }, true, false));
        BX.show(BX('blog-upload-file'));
    }

    onLightEditorShow(comment);

    document.form_comment.parentId.value = '';
    document.form_comment.edit_id.value = key;
    document.form_comment.act.value = 'edit';
    document.form_comment.post.value = 'Сохранить';
    document.form_comment.action = document.form_comment.action + "#" + key;

    if(subject && subject.length > 0 && document.form_comment.subject)
    {
        subject = subject.replace(/\/</gi, '<');
        subject = subject.replace(/\/>/gi, '>');
        document.form_comment.subject.value = subject;
    }
    return false;
}

function waitResult(id)
{
    r = 'new_comment_' + id;
    ob = BX(r);
    if(ob.innerHTML.length > 0)
    {
        var obNew = BX.processHTML(ob.innerHTML, true);
        scripts = obNew.SCRIPT;
        BX.ajax.processScripts(scripts, true);
        if(window.commentEr && window.commentEr == "Y")
        {
            BX('err_comment_'+id).innerHTML = ob.innerHTML;
            ob.innerHTML = '';
        }
        else
        {
            if(BX('edit_id').value > 0)
            {
                if(BX('blg-comment-'+id))
                {
                    BX('blg-comment-'+id+'old').innerHTML = BX('blg-comment-'+id).innerHTML;
                    BX('blg-comment-'+id+'old').id = 'blg-comment-'+id;
                    if(BX.browser.IsIE()) //for IE, numbered list not rendering well
                        setTimeout(function (){BX('blg-comment-'+id).innerHTML = BX('blg-comment-'+id).innerHTML}, 10);
                }
                else
                {
                    BX('blg-comment-'+id+'old').innerHTML = ob.innerHTML;
                    if(BX.browser.IsIE()) //for IE, numbered list not rendering well
                        setTimeout(function (){BX('blg-comment-'+id+'old').innerHTML = BX('blg-comment-'+id+'old').innerHTML}, 10);

                }
            }
            else
            {
                BX('new_comment_cont_'+id).innerHTML += ob.innerHTML;
                if(BX.browser.IsIE()) //for IE, numbered list not rendering well
                    setTimeout(function (){BX('new_comment_cont_'+id).innerHTML = BX('new_comment_cont_'+id).innerHTML}, 10);
            }
            ob.innerHTML = '';
            BX('form_c_del').style.display = "none";
        }
        window.commentEr = false;

        BX.closeWait();
        BX('post-button').disabled = false;
    }
    else
        setTimeout("waitResult('"+id+"')", 500);
}

function submitComment()
{
    oBlogComLHE.SaveContent();
    BX('post-button').focus();
    BX('post-button').disabled = true;
    obForm = BX('form_comment');
    BX.submit(obForm);
}

function cancelComment()
{
    BX('form_c_del').style.display = "";
    $('#form_c_del').slideToggle( "slow" );
}

function hideShowComment(url, id)
{
    var bcn = BX('blg-comment-'+id);
    BX.showWait(bcn);
    bcn.id = 'blg-comment-'+id+'old';
    BX('err_comment_'+id).innerHTML = '';

    BX.ajax.get(url, function(data) {
        var obNew = BX.processHTML(data, true);
        scripts = obNew.SCRIPT;
        BX.ajax.processScripts(scripts, true);
        var nc = BX('new_comment_'+id);
        var bc = BX('blg-comment-'+id+'old');
        nc.style.display = "none";
        nc.innerHTML = data;

        if(BX('blg-comment-'+id))
        {
            bc.innerHTML = BX('blg-comment-'+id).innerHTML;
        }
        else
        {
            BX('err_comment_'+id).innerHTML = nc.innerHTML;
        }
        BX('blg-comment-'+id+'old').id = 'blg-comment-'+id;

        BX.closeWait();
    });

    return false;
}

function deleteComment(url, id)
{
    BX.showWait(BX('blg-comment-'+id));

    BX.ajax.get(url, function(data) {
        var obNew = BX.processHTML(data, true);
        scripts = obNew.SCRIPT;
        BX.ajax.processScripts(scripts, true);

        var nc = BX('new_comment_'+id);
        nc.style.display = "none";
        nc.innerHTML = data;

        if(BX('blg-com-err'))
        {
            BX('err_comment_'+id).innerHTML = nc.innerHTML;
        }
        else
        {
            BX('blg-comment-'+id).innerHTML = nc.innerHTML;
        }
        nc.innerHTML = '';

        BX.closeWait();
    });

    return false;
}

function blogShowFile()
{
    el = BX('blog-upload-file');
    if(el.style.display != 'none')
        BX.hide(el);
    else
        BX.show(el);
    BX.onCustomEvent(BX('blog-comment-user-fields-UF_BLOG_COMMENT_DOC'), "BFileDLoadFormController");
}



