document.addEventListener("DOMContentLoaded", function () {
    var marker = [];
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
                /*element.click();*/
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