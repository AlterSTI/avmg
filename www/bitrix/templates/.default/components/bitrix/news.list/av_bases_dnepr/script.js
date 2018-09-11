document.addEventListener("DOMContentLoaded", function () {
    /*var marker = [];
    var infowindow = [];
    var content= '';
    var DneprCenter = new google.maps.LatLng(48.464717,35.046183);
    var mapOptions = {
        zoom    : 11,
        center  : DneprCenter
    };
    var map = new google.maps.Map(document.getElementById("dnepr_bases_map"), mapOptions);
    var coordinates = document.getElementsByClassName('google-maps-coordinate-bases');



    for(var i=0; i < coordinates.length; i++){
        var icon = {
            url: coordinates[i].dataset.marker,
            anchor: new google.maps.Point(25,50),
            scaledSize: new google.maps.Size(65,65)
        };
        marker[coordinates[i].dataset.base] = new google.maps.Marker({
            position : new google.maps.LatLng(coordinates[i].dataset.cordinateX, coordinates[i].dataset.cordinateY),
            title    : coordinates[i].dataset.title,
            icon     : icon,
            av_id    : coordinates[i].dataset.base
        });
        marker[coordinates[i].dataset.base].setMap(map);
    }

    var bazes = document.getElementsByClassName('banks-address-popup');

    for(i=0; i < bazes.length; i++){
        infowindow[bazes[i].dataset.itemId] = new google.maps.InfoWindow({
            content: bazes[i],
            maxWidth: 150
        });
        marker[bazes[i].dataset.itemId].addListener('click', function() {
            infowindow[this.av_id].open(map, this);
        });


        bazes[i].addEventListener('click', function (){
            var element = $('[data-item-id-base="' + this.dataset.itemId + '"]');
            if (window.innerWidth <= 991) {
            }
            $('html, body').animate({scrollTop:element.offset().top}, 1000);

            document.body.classList.remove('dark-side');
        });
        bazes[i].addEventListener('mouseenter', function (e) {
            marker[this.dataset.itemId].setAnimation(google.maps.Animation.BOUNCE);
        });
        bazes[i].addEventListener('mouseleave', function (e) {
            marker[this.dataset.itemId].setAnimation(null);
        })
    }*/
    var coordinates = document.getElementsByClassName('google-maps-coordinate-bases'),
    $mapBlock = document.querySelector('#dnepr_bases_map'),
        Marker;
/*    console.log(coordinates);*/
    /* -------------------------------------------------------------------- */
    /* ---------------------------- HERE MAP ---------------------------- */
    /* -------------------------------------------------------------------- */
    /**
     * Boilerplate map initialization code starts below:
     */

//Step 1: initialize communication with the platform
    var platform = new H.service.Platform({
        app_id: $mapBlock.dataset.dataHereMapAppId,
        app_code: $mapBlock.dataset.dataHereMapAppCode,
        useHTTPS: true
    });
    var defaultLayers = platform.createDefaultLayers('','','RUS');

//Step 2: initialize a map - this map is centered.
   var map = new H.Map($mapBlock,
        defaultLayers.normal.map,{
            center: {lat:48.464717, lng:35.046183},
            zoom: 11
        });

    var ui = H.ui.UI.createDefault(map, defaultLayers, 'ru-RU');
    ui.removeControl('mapsettings');
    //markers


    for(var i=0; i < coordinates.length; i++){
        //console.log(coordinates[i].querySelector('.banks-address-inner'));
        var icon = new H.map.Icon(coordinates[i].dataset.marker,
            {
                size:{
                    w:70,
                    h:70
                }
            }
        );
        Marker = new H.map.Marker({
            lat: coordinates[i].dataset.cordinateX,
            lng: coordinates[i].dataset.cordinateY
        },
            {icon:icon}
        );
        var content = document.createElement('div');
        content.classList.add('hereMapPopup');
        content.innerHTML = coordinates[i].querySelector('.banks-address-inner').innerHTML;
        Marker.setData(content);
        //console.log(Marker);
        Marker.addEventListener('tap', function (evt) {
            var bubble =  new H.ui.InfoBubble(evt.target.getPosition(), {
                // read custom data
                content: evt.target.getData()
            });
            // show info bubble
            ui.getBubbles().forEach(function (item) {
                    item.close();
                });
            ui.addBubble(bubble);
        }, false);
        map.addObject(Marker);


    }
//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
   var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

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