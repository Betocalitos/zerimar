var myCenter = new google.maps.LatLng(32.46286170819636, -114.71220909339232);
function initialize() {
    var mapProp = {
        center: myCenter,
        scrollwheel: false,
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(
        document.getElementById("googleMap"),
        mapProp
    );

    var marker = new google.maps.Marker({
        position: myCenter,
        map: map
    });

    const infowindow = new google.maps.InfoWindow({
        content:
            '<div class="gmap-marker-wrap"><h5 class="gmap-marker-title">Montecargas Zerimar</h5><div class="gmap-marker-content"><i class="ion-android-pin" aria-hidden="true"></i> Av. Obregón # 5062 Col. Parque<br />\nIndustrial C.P. 53455.</div></div>'
    });

    google.maps.event.addListener(marker, "click", function() {
        infowindow.open(map, marker);
    });
    infowindow.open(map, marker);

    var styles = [
        {
            featureType: "landscape.man_made",
            elementType: "geometry",
            stylers: [
                {
                    color: "#f7f1df"
                }
            ]
        },
        {
            featureType: "landscape.natural",
            elementType: "geometry",
            stylers: [
                {
                    color: "#d0e3b4"
                }
            ]
        },
        {
            featureType: "landscape.natural.terrain",
            elementType: "geometry",
            stylers: [
                {
                    visibility: "off"
                }
            ]
        },
        {
            featureType: "poi",
            elementType: "labels",
            stylers: [
                {
                    visibility: "off"
                }
            ]
        },
        {
            featureType: "poi.business",
            elementType: "all",
            stylers: [
                {
                    visibility: "off"
                }
            ]
        },
        {
            featureType: "poi.medical",
            elementType: "geometry",
            stylers: [
                {
                    color: "#fbd3da"
                }
            ]
        },
        {
            featureType: "poi.park",
            elementType: "geometry",
            stylers: [
                {
                    color: "#bde6ab"
                }
            ]
        },
        {
            featureType: "road",
            elementType: "geometry.stroke",
            stylers: [
                {
                    visibility: "off"
                }
            ]
        },
        {
            featureType: "road",
            elementType: "labels",
            stylers: [
                {
                    visibility: "off"
                }
            ]
        },
        {
            featureType: "road.highway",
            elementType: "geometry.fill",
            stylers: [
                {
                    color: "#ffe15f"
                }
            ]
        },
        {
            featureType: "road.highway",
            elementType: "geometry.stroke",
            stylers: [
                {
                    color: "#efd151"
                }
            ]
        },
        {
            featureType: "road.arterial",
            elementType: "geometry.fill",
            stylers: [
                {
                    color: "#ffffff"
                }
            ]
        },
        {
            featureType: "road.local",
            elementType: "geometry.fill",
            stylers: [
                {
                    color: "black"
                }
            ]
        },
        {
            featureType: "transit.station.airport",
            elementType: "geometry.fill",
            stylers: [
                {
                    color: "#cfb2db"
                }
            ]
        },
        {
            featureType: "water",
            elementType: "geometry",
            stylers: [
                {
                    color: "#a2daf2"
                }
            ]
        }
    ];

    map.setOptions({ styles: styles });
    marker.setMap(map);
}
google.maps.event.addDomListener(window, "load", initialize);
