window.onload = function () {
alert(1111);
    function greateGoogleMap($item) {

        /*var center = new google.maps.LatLng($item.dataset.cordinateX,$item.dataset.cordinateY);
        var mapOptions = {
            zoom: 11,
            center: center
        }
        var map = new google.maps.Map(document.getElementById('base_'+$item.dataset.baseId), mapOptions);

        new google.maps.Marker({
            position: new google.maps.LatLng($item.dataset.cordinateX, $item.dataset.cordinateY),
            title:coordinates[i].dataset.title
        }).setMap(map);*/
    }
/******************/



    var coordinates = document.getElementsByClassName('banks-cord');

    for(var i=0; i < coordinates.length; i++){
        greateGoogleMap(coordinates[i]);
    }



}























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