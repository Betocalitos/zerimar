@extends('layouts.main')
@section('title','Nosotros - '.config('app.name'))
@section('content')
<!--====================  page content wrapper ====================-->
<div class="page-content-wrapper">
    <!--====================  about revslider ====================-->
    <div class="about-revslider">
        <div id="rev_slider_14_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="about-01" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <!-- START REVOLUTION SLIDER 5.4.7 fullwidth mode -->
            <div id="rev_slider_14_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
                <ul>
                    <!-- SLIDE  -->
                    <li data-index="rs-32" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('img/slider/about/about-slide-bg.jpg')}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption   tp-resizeme" id="slide-32-layer-1" data-x="['left','left','left','left']" data-hoffset="['371','75','75','52']" data-y="['top','top','top','top']" data-voffset="['240','262','272','198']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;"> </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption   tp-resizeme" id="slide-32-layer-2" data-x="['left','left','left','left']" data-hoffset="['371','75','75','52']" data-y="['top','top','top','top']" data-voffset="['361','383','403','325']" data-fontsize="['50','50','35','35']" data-lineheight="['64','64','45','45']" data-width="['881','881','600','400']" data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; min-width: 881px; max-width: 881px; white-space: normal; font-size: 50px; line-height: 64px; font-weight: 700; color: #ffffff; letter-spacing: 0px;font-family:Roboto;">Somos un equipo de especialistas,
                            en nuestro ramo  </div>

                        <!-- LAYER NR. 3 -->
                        <a class="tp-caption TM-Button-flat-01 rev-btn " href="{{route('contact')}}" target="_self" id="slide-32-layer-3" data-x="['left','left','left','left']" data-hoffset="['371','75','75','52']" data-y="['top','top','top','top']" data-voffset="['519','541','531','546']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-actions='' data-responsive_offset="on" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(34,34,34);bg:rgb(255,255,255);bs:solid;bw:0 0 0 0;"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[17,17,17,17]" data-paddingright="[30,30,30,30]" data-paddingbottom="[17,17,17,17]" data-paddingleft="[30,30,30,30]" style="z-index: 7; white-space: nowrap; letter-spacing: 0.5px;text-transform:uppercase;border-color:rgba(0,0,0,1);outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;text-decoration: none;">Cont&aacute;ctanos </a>
                    </li>
                </ul>
                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
            </div>
        </div><!-- END REVOLUTION SLIDER -->
    </div>
    <!--====================  End of about revslider  ====================-->
    <!--====================  about text content ====================-->
    <div class="about-text-area section-space--inner--top--100 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-area">
                        <h2 class="title title--left">Historia</h2>
                    </div>
                    <div class="about-text-wrapper">
                        <p>
                            Nuestros inicios se remontan al año de 1991 donde la empresa fue fundada, en la ciudad de San Luis Rio Colorado, Sonora. En principio se inició como
                            un taller pequeño el cual estaba ubicado en el callejón Guadalupe Victoria, entre las calles 16 y 17; en donde se comenzó ofreciendo los servicios de
                            venta, renta, reparación y refacciones tanto para montacargas como para pallet jack.
                        </p>
                        <p>
                            Es desde entonces que nos encontramos en el mercado de los equipos elevadores, de tal manera que conforme los años han estado transcurriendo nuestra experiencia
                            en el ramo crece de forma simultánea, gracias a esto, junto con nuestro servicio y calidad de trabajo nos ha llevado a mantenernos en constante crecimiento, de
                            tal manera que en 2003 tuvimos que trasladarnos a una nueva ubicación en donde actualmente nos encontramos, en Av. Obregón # 5062 en la misma ciudad de San Luis Rio Colorado.
                        </p>
                        <p>
                            Con estos {{date('Y') - 1991}} años de experiencia transcurridos en el mercado, tenemos el compromiso de cumplir con cualquier necesidad que se le presente a nuestros clientes,
                            tratándolos siempre con el debido respeto y honestidad en forma conjunta.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of about text content  ====================-->

    <div class="feature-background__area dark-bg">
        <div class="row no-gutters">
            <div class="col-md-6">
                <!-- feature background -->
                <div class="feature-background__image bg-img" data-bg="/img/backgrounds/24.jpg" style="background-image: url(&quot;assets/img/backgrounds/24.jpg&quot;);"></div>
            </div>
            <div class="col-md-6">
                <div class="feature-background__content feature-background__content--style2">
                    <div class="section-title-area">
                        <h2 class="title title--style4 section-space--bottom--30 text-white">Ofrecemos un excelente servicio a nuestros clientes.</h2>

                        <ul class="feature-list section-space--bottom--40">
                            <li>Soporte personalizado a tu empresa o negocio.</li>
                            <li>Los mejores equipos.</li>
                            <li>Contamos con cualquier refacción para tu equipo.</li>
                            <li>Simpre grantizamos todos nuestros trabajos y equipos.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  about text content ====================-->
    <div class="about-text-area section-space--inner--top--100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-title-area">
                        <h5 class="title title--left" style="font-size: 1.8rem;">Misión</h5>
                    </div>
                    <div class="about-text-wrapper">
                        <p>
                            Ofrecer a nuestros clientes soluciones optimas a sus problemas que proporcionen un alto rendimiento, con servicios y productos de calidad.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-title-area">
                        <h5 class="title title--left" style="font-size: 1.8rem;">Visión</h5>
                    </div>
                    <div class="about-text-wrapper">
                        <p>
                            Ser una empresa líder de montacargas y maquinaria para manejo de carga en el mercado nacional.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                     <div class="section-title-area">
                        <h5 class="title title--left" style="font-size: 1.8rem;">Valores</h5>
                      </div>
                      <div class="about-text-wrapper">
                        <p>
                            Nuestra empresa está comprometida en tener siempre en prioridad los valores que nos caracterizan:
                        </p>
                      </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <ul class="feature-list section-space--bottom--40">
                                <li>Responsabilidad</li>
                                <li>Respeto</li>
                                <li>Honestidad</li>
                                <li>Calidad</li>
                                <li>Competitividad</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="feature-list section-space--bottom--40">
                                <li>Pasión</li>
                                <li>Servicio al cliente</li>
                                <li>Orientación al cliente</li>
                                <li>Resolución de problemas</li>
                                <li>Responsabilidad social</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--====================  End of about text content  ====================-->
    <!--====================  cta area ====================-->
    <div class="cta-area section-space--inner--60 default-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <!-- cta text -->
                    <h2 class="cta-text text-center text-lg-left">¿Estas buscando un equipo?</h2>
                </div>
                <div class="col-lg-4 text-center text-lg-right">
                    <a href="{{route('contact')}}" class="ht-btn ht-btn--transparent ht-btn--transparent--alt-dark">pregúntanos</a>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of cta area  ====================-->
</div>
<!--====================  End of page content wrapper  ====================-->

<!--====================  brand logo slider area ====================-->
<div class="brand-logo-slider-area section-space--inner--50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- brand logo slider -->
                <div class="brand-logo-slider__container-area">
                    <div class="swiper-container brand-logo-slider__container">
                        <div class="swiper-wrapper brand-logo-slider__wrapper">
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <img src="{{asset('img/brand-logo/1.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="image-hover">
                                    <img src="{{asset('img/brand-logo/1b.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <img src="{{asset('img/brand-logo/2.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="image-hover">
                                    <img src="{{asset('img/brand-logo/2b.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <img src="{{asset('img/brand-logo/3.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="image-hover">
                                    <img src="{{asset('img/brand-logo/3b.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <img src="{{asset('img/brand-logo/4.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="image-hover">
                                    <img src="{{asset('img/brand-logo/4b.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <img src="{{asset('img/brand-logo/5.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="image-hover">
                                    <img src="{{asset('img/brand-logo/5b.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <img src="{{asset('img/brand-logo/6.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="image-hover">
                                    <img src="{{asset('img/brand-logo/6b.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <img src="{{asset('img/brand-logo/7.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="image-hover">
                                    <img src="{{asset('img/brand-logo/7b.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <img src="{{asset('img/brand-logo/8.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="image-hover">
                                    <img src="{{asset('img/brand-logo/8b.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide brand-logo-slider__single">
                                <div class="image">
                                    <img src="{{asset('img/brand-logo/9.png')}}" class="img-fluid" alt="">
                                </div>
                                <div class="image-hover">
                                    <img src="{{asset('img/brand-logo/9b.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====================  End of brand logo slider area  ====================-->
@endsection
