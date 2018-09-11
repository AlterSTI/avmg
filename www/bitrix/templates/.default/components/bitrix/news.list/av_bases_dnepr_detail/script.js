document.addEventListener("DOMContentLoaded", function () {
    /* -------------------------------------------------------------------- */
    /* ---------------------------- HERE MAP ---------------------------- */
    /* -------------------------------------------------------------------- */
    /**
     * Boilerplate map initialization code starts below:
     */
    function greateHereMap($item, defaultLayers) {
//Step 2: initialize a map - this map is centered.
        var map = new H.Map(document.getElementById('base_' + $item.dataset.baseId),
            defaultLayers.normal.map, {
                center: {lat: $item.dataset.cordinateX, lng: $item.dataset.cordinateY},
                zoom: 11
            });

        var ui = H.ui.UI.createDefault(map, defaultLayers, 'ru-RU');
        ui.removeControl('mapsettings');
        //console.log($item.dataset.marker);
        var icon = new H.map.Icon($item.dataset.marker,
            {
                size:{
                    w:30,
                    h:45
                }
            }
        );

        var Marker = new H.map.Marker({
                lat: $item.dataset.cordinateX,
                lng: $item.dataset.cordinateY
            },
            {icon:icon}
        );
        map.addObject(Marker);
//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
        var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

    }

    var coordinates = document.getElementsByClassName('banks-cord'),
       container  = document.querySelector('.av-bases-list-detail-container');

//Step 1: initialize communication with the platform
    var platform = new H.service.Platform({
        app_id: container.dataset.dataHereMapAppId,
        app_code: container.dataset.dataHereMapAppCode,
        useHTTPS: true
    });
    var defaultLayers = platform.createDefaultLayers('', '', 'RUS');


    for (var i = 0; i < coordinates.length; i++) {
        greateHereMap(coordinates[i], defaultLayers);
    }

});






















/* -------------------------------------------------------------------- */
/* ----------------------- google map function ------------------------ */
/* -------------------------------------------------------------------- */
/*function initGoogleMap($mapObject)
	{
	var
		coordinateX = parseFloat($mapObject.attr("data-cordinate-x")),
		coordinateY = parseFloat($mapObject.attr("data-cordinate-y")),
		title       = $mapObject.attr("data-store-name"),
		map         =
		    coordinateX && coordinateY
		    ? new google.maps.Map
				(
				$mapObject[0],
					{
					zoom                  :14,
					draggable             : true,
					disableDefaultUI      : true,
					disableDoubleClickZoom: true,
					scrollwheel           : true,
					mapTypeId             : google.maps.MapTypeId.ROADMAP,
					center                : new google.maps.LatLng(coordinateX, coordinateY)
					}
				)
		    : false;

	if(map && title)
		new google.maps.Marker
			({
			position: {lat: coordinateX, lng: coordinateY},
			map     : map,
			title   : title
			});
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- handlers ----------------------------- */
/* -------------------------------------------------------------------- */
/*$(function()
	{
	$('#dnepr_bases_map').each(function() {initGoogleMap($(this))});

	$(document)
		.on("vclick", '.av-bases-list-element', function(event)
			{
			if(!$(event.target).closest('#dnepr_bases_map').length)
				$(this).find('a')[0].click();
			});
	});
*/