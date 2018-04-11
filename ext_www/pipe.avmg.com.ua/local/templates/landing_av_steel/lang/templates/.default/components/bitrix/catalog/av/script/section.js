$(function()
	{
	$(".av-catalog.section .page-controller-cell")
		.on("change", "select", function()
			{
			var
				cookieParams =
					{
					"avCatalogPageSize" : $(this).val(),
					"domain"            : document.domain,
					"path"              : "/"
					},
				cookieParamsArray = [];

			$.each(cookieParams, function(index, value)
				{
				cookieParamsArray.push(index+"="+value);
				});

			document.cookie = cookieParamsArray.join(";");
			location.reload();
			})
		.on("vclick", ".type-selector > *:not(.selected)", function()
			{
			var
				type              = $(this).attr("data-type"),
				cookieParams      =
					{
					"avCatalogPageType" : type,
					"domain"            : document.domain,
					"path"              : "/"
					},
				cookieParamsArray = [];

			$.each(cookieParams, function(index, value)
				{
				cookieParamsArray.push(index+"="+value);
				});

			$(this).parent().children().removeClass("selected");
			$(this).addClass("selected");

			document.cookie = cookieParamsArray.join(";");
			     if(type == "tablet") $(document).trigger("avCatalogSectionViewTypeChangeTablet");
			else if(type == "list")   $(document).trigger("avCatalogSectionViewTypeChangeList");
			});
	});