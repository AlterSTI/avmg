$(function()
{
    $(document).on('vclick', '.av-bases-list > .item', function()
    {
        $(this).find('a')[0].click();
    });
});