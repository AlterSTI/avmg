
					<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
				</div>
			</div>
		</td>
	</tr>

</table>
<script type="text/javascript">
	BX.ready(function(){
		var lang_toggle = BX('language-box');
		BX.bind(lang_toggle, 'click', function(){
			BX.PopupMenu.show('feed-filter-popup', lang_toggle, [
				{text : "<?=GetMessage("BITRIX24_LANG_RU")?>", className : "language-box-item ru", onclick : function() { reloadPage("ru"); }},
				{text : "<?=GetMessage("BITRIX24_LANG_EN")?>", className : "language-box-item en", onclick : function() { reloadPage("en"); }},
				{text : "<?=GetMessage("BITRIX24_LANG_DE")?>", className : "language-box-item de", onclick : function() { reloadPage("de"); }},
				{text : "<?=GetMessage("BITRIX24_LANG_UA")?>", className : "language-box-item ua", onclick : function() { reloadPage("ua"); }},
				{text : "<?=GetMessage("BITRIX24_LANG_LA")?>", className : "language-box-item la", onclick : function() { reloadPage("la"); }}
			],
					{   offsetTop:10,
						offsetLeft:0,
						angle:{offset: 33}
					}
			);
		})
	});
	function reloadPage(lang)
	{
		var url = window.location.href;
		url = url.replace(/(\?|\&)user_lang=[A-Za-z]{2}/, "");
		url += (url.indexOf("?") == -1 ? "?" : "&") + "user_lang=" + lang;
		window.location.href = url;
	}
</script>

</body>
</html>