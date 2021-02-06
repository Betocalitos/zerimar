@extends('layouts.main')
@section('title','Contacto - '.config('app.name'))
@section('content')
 <!--====================  page content wrapper ====================-->
<!--====================  support footer area ====================-->
<div class="support-footer__area">
    <div class="row no-gutters">
        <div class="col-lg-12">
            <!-- google map -->
            <div class="google-map google-map--style-2" id="google-map-one" data-width="100%" data-zoom_enable=""
                data-zoom="10" data-map_type="roadmap"></div>
        </div>
    </div>
</div>
<!--====================  End of support footer area  ====================-->
<!--====================  icon info area ====================-->
<div class="icon-info-area section-space--inner--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="icon-info-wrapper">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="single-icon-info">
                                <div class="single-icon-info__image">
                                    <img src="{{asset('img/icons/location-yellow.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="single-icon-info__content">
                                    <h4 class="single-icon-info__title single-icon-info__title--black2">Ubicación
                                    </h4>
                                    <p class="single-icon-info__text">
                                        Av. Obregón # 5062 Col. Parque Industrial C.P. 53455. <br> San Luis Rio Colorado, Sonora.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-icon-info">
                                <div class="single-icon-info__image">
                                    <img src="{{asset('img/icons/support-yellow.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="single-icon-info__content">
                                    <h4 class="single-icon-info__title single-icon-info__title--black2">Teléfonos
                                    </h4>
                                    <p class="single-icon-info__text">
                                        Oficina<br> 653 534 3827 – 653 535 3068 <br>
                                        Whatsapp <br>653 139 5433

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-icon-info">
                                <div class="single-icon-info__image">
                                    <img src="{{asset('img/icons/message-yellow.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="single-icon-info__content">
                                    <h4 class="single-icon-info__title single-icon-info__title--black2">Correo
                                    </h4>
                                    <p class="single-icon-info__text"><a href="mailto:fjrg.admon@montacargaszerimar.com">fjrg.admon@montacargaszerimar.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====================  End of icon info area  ====================-->
 <div class="page-content-wrapper section-space--inner--bottom--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="career-title-area text-center section-space--bottom--50">
                    <h2 class="title">Escribenos para estar en contacto</h2>
                    <p class="subtitle">Dejanos un mensaje con tu informacion, pronto nos pondremos en contacto con usted.</p>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-9 mx-auto">
                <div class="contact-form-wrapper">
                    <form  v-on:submit.prevent="sendMessage()">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" v-model="form.name" @focus="errorMessage = ''" placeholder="Nombre *">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" v-model="form.phone" @focus="errorMessage = ''" placeholder="Teléfono">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" v-model="form.email" @focus="errorMessage = ''" placeholder="Correo *">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" v-model="form.subject" @focus="errorMessage = ''" placeholder="Asunto*">
                            </div>
                            <div class="col-lg-12">
                                <textarea v-model="form.message" @focus="errorMessage = ''" placeholder="Mensaje *" ></textarea>
                            </div>
                            <div class="col-sm-12" v-if="errorMessage != ''">
                                <p class="text-danger">
                                  <i class="fa fa-times-circle"></i>
                                  <span v-text="errorMessage"></span>
                                </p>
                              </div>
                            <div class="col-lg-12 text-center">
                                <button :disabled="sending" type="submit"
                                v-text="sending?'ENVIANDO...':'ENVIAR'"
                                    class="ht-btn ht-btn--default">ENVIAR</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-message text-center"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Gmap3 JS -->
<script src="{{asset('js/plugins/gmap3.min.js')}}"></script>
<!-- Google Map -->
<script
src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}"></script>

<!-- Map JS -->
<script>
jQuery(document).ready(function ($) {

    var gmMapDiv = $("#google-map-one");

    (
        function ($) {

            if (gmMapDiv.length) {

                var gmHeight = gmMapDiv.attr("data-height");
                var gmWidth = gmMapDiv.attr("data-width");
                var gmZoomEnable = gmMapDiv.attr("data-zoom_enable");
                var gmZoom = gmMapDiv.attr("data-zoom");
                gmMapDiv.width(gmWidth).height(gmHeight);
                gmMapDiv.gmap3({
                    action: "init",
                    marker: {
                        values: [{
                            address: "32.46146478342597,-114.70745981623372",
                            data: "<div class=\"gmap-marker-wrap\"><h5 class=\"gmap-marker-title\">New Jersey Office<\/h5><div class=\"gmap-marker-content\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"><\/i> 799-701 Ballantyne Rd<br \/>\nSyracuse, NY 13207<\/div><\/div>",
                            options: {
                                icon: "",
                                visible: false,
                            }
                        }],
                        events: {
                            click: function (marker, event, context) {
                                if (context.data == 0) {
                                    return;
                                }
                                var map = $(this).gmap3("get");
                                infowindow = $(this).gmap3({
                                    get: {
                                        name: "infowindow"
                                    }
                                });
                                if (infowindow) {
                                    infowindow.open(map, marker);
                                    infowindow.setContent(context.data);
                                } else {
                                    $(this).gmap3({
                                        infowindow: {
                                            anchor: marker,
                                            options: {
                                                content: context.data
                                            }
                                        }
                                    });
                                }
                            }
                        }

                    },
                    overlay: {
                        values: [{
                            address: "40.7590615,-73.969231",
                            data: "<div class=\"gmap-marker-wrap\"><h5 class=\"gmap-marker-title\">New Jersey Office<\/h5><div class=\"gmap-marker-content\"><i class=\"ion-android-pin\" aria-hidden=\"true\"><\/i> 799-701 Ballantyne Rd<br \/>\nSyracuse, NY 13207<\/div><\/div>",
                            options: {
                                content: '<div><div class="animated-dot">' +
                                    '<div class="middle-dot"><i class="ion-android-pin"></i></div>' +
                                    '<div class="signal"></div>' +
                                    '<div class="signal2"></div>' + '</div></div>',
                            }
                        }],
                        events: {
                            click: function (overlay, event, context) {
                                if (context.data == 0) {
                                    return;
                                }
                                var map = $(this).gmap3("get");
                                infowindow = $(this).gmap3({
                                    get: {
                                        name: "infowindow"
                                    }
                                });
                                if (infowindow) {
                                    infowindow.open(map, overlay);
                                    infowindow.setContent(context.data);
                                } else {
                                    $(this).gmap3({
                                        infowindow: {
                                            anchor: overlay,
                                            options: {
                                                content: context.data
                                            }
                                        }
                                    });
                                }
                            }
                        }
                    },
                    map: {
                        options: {
                            zoom: parseInt(gmZoom),
                            zoomControl: true,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                            mapTypeControl: false,
                            scaleControl: false,
                            scrollwheel: gmZoomEnable == 'enable' ? true : false,
                            streetViewControl: false,
                            draggable: true,
                            styles: [{
                                "featureType": "landscape.man_made",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#f7f1df"
                                }]
                            },
                            {
                                "featureType": "landscape.natural",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#d0e3b4"
                                }]
                            },
                            {
                                "featureType": "landscape.natural.terrain",
                                "elementType": "geometry",
                                "stylers": [{
                                    "visibility": "off"
                                }]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "labels",
                                "stylers": [{
                                    "visibility": "off"
                                }]
                            },
                            {
                                "featureType": "poi.business",
                                "elementType": "all",
                                "stylers": [{
                                    "visibility": "off"
                                }]
                            },
                            {
                                "featureType": "poi.medical",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#fbd3da"
                                }]
                            },
                            {
                                "featureType": "poi.park",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#bde6ab"
                                }]
                            },
                            {
                                "featureType": "road",
                                "elementType": "geometry.stroke",
                                "stylers": [{
                                    "visibility": "off"
                                }]
                            },
                            {
                                "featureType": "road",
                                "elementType": "labels",
                                "stylers": [{
                                    "visibility": "off"
                                }]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                    "color": "#ffe15f"
                                }]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.stroke",
                                "stylers": [{
                                    "color": "#efd151"
                                }]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                    "color": "#ffffff"
                                }]
                            },
                            {
                                "featureType": "road.local",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                    "color": "black"
                                }]
                            },
                            {
                                "featureType": "transit.station.airport",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                    "color": "#cfb2db"
                                }]
                            },
                            {
                                "featureType": "water",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#a2daf2"
                                }]
                            }
                            ]


                        }
                    }
                });
            }
        }
    )(jQuery);
});
</script>

<!--=====  End of JS files ======-->
@endsection
