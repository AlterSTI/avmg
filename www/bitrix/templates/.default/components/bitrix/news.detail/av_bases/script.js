$(function()
	{
	/* -------------------------------------------------------------------- */
	/* ---------------------------- google map ---------------------------- */
	/* -------------------------------------------------------------------- */
	var
		//$googleMap  = $(".av-bases-detail .map-col .google-map"),
		$mapBlock = document.querySelector('.av-bases-detail .map-col .google-map'),
		coordinateX = parseFloat($mapBlock.dataset.cordinateX),
		coordinateY = parseFloat($mapBlock.dataset.cordinateY),
        $callBackForm      = $("#page-header-call-back-form");
		//map;

	/*if($googleMap.length)
		{
		map = new google.maps.Map
			(
			$googleMap[0],
				{
				zoom     : 15,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				center   : new google.maps.LatLng(coordinateX, coordinateY)
				}
			);

		new google.maps.Marker
			({
			map     : map,
			position: {lat: coordinateX, lng: coordinateY},
			title   : $googleMap.attr("data-store-name")
			});
		}*/


	/* -------------------------------------------------------------------- */
	/* ---------------------------- H$mapBlockERE MAP ---------------------------- */
	/* -------------------------------------------------------------------- */
        /**
         * Boilerplate map initialization code starts below:
         */

//Step 1: initialize communication with the platform
        var platform = new H.service.Platform({
            app_id: 'LLECS0lJzLLtMRe728wJ',
            app_code: 'l-9gCp2kS44G2_dlfsNvNw',
            /*useCIT: true,*/
            useHTTPS: true
        });
        var defaultLayers = platform.createDefaultLayers('','','UKR');

//Step 2: initialize a map - this map is centered.
    var map = new H.Map($mapBlock,
        defaultLayers.normal.map,{
            center: {lat:coordinateX, lng:coordinateY},
            zoom: 12
        });

    var ui = H.ui.UI.createDefault(map, defaultLayers, 'ru-RU');
    ui.removeControl('mapsettings');
    //marker

    var Marker = new H.map.Marker({
        lat:coordinateX,
        lng:coordinateY
    });
    map.addObject(Marker);


//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
    var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));



		/* -------------------------------------------------------------------- */
	/* ---------------------------- price list ---------------------------- */
	/* -------------------------------------------------------------------- */
	$(".av-bases-detail .info-col")
		.on("vclick", ".price-links-list [data-price-link-multiple]", function()
			{
			var
				$callButton = $(this),
				$linksList  = $callButton.closest(".price-links-list").find(".list");

			if($linksList.is(":visible"))
				{
				$callButton.removeClass("active");
				$linksList.slideUp();
				}
			else
				{
				$callButton.addClass("active");
				$linksList
					.css("margin-left", "20px")
					.slideDown();
				}
			})
		.on("vclick", "[data-price-link], .price-links-list .list > a", function()
			{
			if(typeof(ga) == "function")
				ga
					(
					"send", "event",
						{
						eventCategory: "AV bases prices",
						eventAction  : "click",
						eventLabel   : $(this).attr("href"),
						transport    : "beacon"
						}
					);
			});
	/* -------------------------------------------------------------------- */
	/* --------------------------- streams info --------------------------- */
	/* -------------------------------------------------------------------- */
	$(".av-bases-detail .streams-info-col")
		.on("vclick", ".item:not(.no-info) .title-block", function()
			{
			if($(window).width() >= 768) return;

			$(this).closest(".item")
				.toggleClass("open")
				.find(".body").slideToggle();
			});
	/* -------------------------------------------------------------------- */
	/* --------------------------- scroll/resize -------------------------- */
	/* -------------------------------------------------------------------- */
	$(window).resize(function()
		{
		var screenWidth = $(window).width();
		$(".av-bases-detail .streams-info-col .item").each(function()
			{
			if(screenWidth >= 768)        $(this).find(".body").show();
			else if(!$(this).is(".open")) $(this).find(".body").hide();
			});
		});
        /* -------------------------------------------------------------------- */
        /* -------------------------- call back form -------------------------- */
        /* -------------------------------------------------------------------- */
        $(document)
            .on("vclick", "[data-order-price]", function()
            {
                var smoothScrolling  = $(window).width() > 767 ? "Y" : "N";
                AvBlurScreen("on", 1000);
                $callBackForm
                    .show()
                    .positionCenter(1100, smoothScrolling, smoothScrolling)
                    .onClickout(function()
                    {
                        $callBackForm.find(".close").click();
                    })
                    .on("vclick", ".close", function()
                    {
                        $callBackForm.hide();
                        AvBlurScreen("off");
                    });
            })
            .on("keyup", function(event)
            {
                if(event.keyCode == 27 && $callBackForm.is(":visible"))
                    $callBackForm
                        .find(".close")
                        .click();
            })
            .on("keyup", "form input", function()
            {
                if($(this).val()) {
                    $(this).closest('.av-form-styled-input').removeClass('alert-input');
                }
                console.log($(this).val());
            });
		$(document.body).on('AjaxFormOk AjaxFormError', function () {
            var $result = $callBackForm.addClass("well-done");
            $result.positionCenter(1100, "Y", "Y");
			setTimeout(function () {
				$callBackForm
					.find(".close")
					.click();
			}, 3000);
        });
	});
