@extends('layouts.main')
@section('title','Contacto - '.config('app.name'))
@section('content')
 <!--====================  page content wrapper ====================-->
<!--====================  support footer area ====================-->
<div class="support-footer__area">
    <div class="row no-gutters">
        <div class="col-lg-12">
            <!-- google map -->
            <div id="googleMap" style="height: 450px"></div>
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

    <!--map js code here-->
    <script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE"></script>
    <script  src="https://www.google.com/jsapi"></script>
    <script src="/js/map.js"></script>
@endsection
