@extends('layouts.main')
@section('content')
    <!--====================  hero slider area ====================-->
    <div class="hero-slider-area">
        <div id="rev_slider_2_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="home"
            data-source="gallery"
            style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <!-- START REVOLUTION SLIDER 5.4.7 fullwidth mode -->
            <div id="rev_slider_2_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
                <ul>
                    <!-- SLIDE  -->
                    <li data-index="rs-4" data-transition="incube-horizontal" data-slotamount="default"
                        data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                        data-masterspeed="300" data-thumb="{{ asset('img/slider/one/100x50_home_00_01.jpg') }}"
                        data-rotate="0" data-saveperformance="off" data-title="Siguiente" data-param1="" data-param2=""
                        data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                        data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{ asset('img/slider/one/home_00_01.jpg') }}" alt="" data-bgposition="center center"
                            data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption     rev_group" id="slide-4-layer-5"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-width="['988','772','595','99%']" data-height="['454','453','404','347']"
                            data-whitespace="nowrap" data-type="group" data-responsive_offset="on" data-responsive="off"
                            data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                            data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]"
                            style="z-index: 5; min-width: 988px; max-width: 988px; max-width: 454px; max-width: 454px; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption  " id="slide-4-layer-2" data-x="['center','center','center','center']"
                                data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                                data-voffset="['70','90','74','72']" data-fontsize="['90','70','60','40']"
                                data-lineheight="['105','85','75','54']" data-fontweight="['900','900','700','900']"
                                data-width="['800','600','500','350']" data-height="none" data-whitespace="normal"
                                data-type="text" data-responsive_offset="off" data-responsive="off"
                                data-frames='[{"delay":"+930","speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                                data-marginleft="[0,0,0,0]" data-textAlign="['center','center','center','center']"
                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                style="z-index: 6; min-width: 800px; max-width: 800px; white-space: normal; font-size: 90px; line-height: 105px; font-weight: 900; color: #ffffff; letter-spacing: 0px;font-family:Roboto;">
                                Haciendo lo complejo simple
                            </div>

                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption  " id="slide-4-layer-1" data-x="['center','center','center','center']"
                                data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                                data-voffset="['0','0','0','0']" data-width="none" data-height="none"
                                data-whitespace="nowrap" data-type="text" data-responsive_offset="off" data-responsive="off"
                                data-frames='[{"delay":"+620","speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                                data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[10,10,10,10]" data-paddingright="[10,10,10,10]"
                                data-paddingbottom="[10,10,10,10]" data-paddingleft="[10,10,10,10]"
                                style="z-index: 7; white-space: nowrap; font-size: 12px; line-height: 12px; font-weight: 700; color: #ffffff; letter-spacing: 2px;font-family:Roboto;text-transform:uppercase;border-color:rgba(255,255,255,0.2);border-style:solid;border-width:1px 1px 1px 1px;">
                                Construyendo una visión que lidere el futuro
                            </div>

                        </div>
                    </li>
                    <!-- SLIDE  -->
                    <li data-index="rs-5" data-transition="incube-horizontal" data-slotamount="default"
                        data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                        data-masterspeed="300" data-thumb="{{ asset('img/slider/one/100x50_home_00_15.jpg') }}"
                        data-rotate="0" data-saveperformance="off" data-title="Siguiente" data-param1="" data-param2=""
                        data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                        data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{ asset('img/slider/one/home_00_15.jpg') }}" alt="" data-bgposition="center center"
                            data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 6 -->
                        <div class="tp-caption  " id="slide-5-layer-2" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-100','-100','-90','-100']" data-lineheight="['105','105','60','54']"
                            data-fontweight="['900','900','900','700']" data-width="['none','none','90%','400']"
                            data-height="none" data-whitespace="['nowrap','nowrap','normal','normal']" data-type="text"
                            data-responsive_offset="off" data-responsive="off"
                            data-frames='[{"delay":640,"speed":300,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,21]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,21]"
                            data-marginbottom="[0,0,0,15]" data-fontsize="[90, 80, 70, 60]"
                            style="z-index: 5; white-space: nowrap; font-size: 90px; line-height: 105px; font-weight: 900; color: #ffffff; letter-spacing: 0px;font-family:Roboto;">
                            El Mejor Equipo
                        </div>

                        <!-- LAYER NR. 7 -->
                        <div class="tp-caption  " id="slide-5-layer-3" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['0','0','0','0']" data-lineheight="['18','18','18','28']"
                            data-width="['none','none','none','90%']" data-height="none"
                            data-whitespace="['nowrap','nowrap','nowrap','normal']" data-type="text"
                            data-responsive_offset="off" data-responsive="off"
                            data-frames='[{"delay":1040,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 6; white-space: nowrap; font-size: 18px; line-height: 18px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Roboto;">
                            Moderno, Seguro y Confiable
                        </div>

                    </li>
                    <!-- SLIDE  -->
                    <li data-index="rs-6" data-transition="incube-horizontal" data-slotamount="default"
                        data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                        data-masterspeed="300" data-thumb="{{ asset('img/slider/one/100x50_home_00_16.jpg') }}"
                        data-rotate="0" data-saveperformance="off" data-title="Siguiente" data-param1="" data-param2=""
                        data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                        data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{ asset('img/slider/one/home_00_16.jpg') }}" alt="" data-bgposition="center center"
                            data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 10 -->
                        <div class="tp-caption  " id="slide-6-layer-3" data-x="['center','center','center','center']"
                            data-hoffset="['1','1','1','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-150','-150','-170','-140']" data-fontsize="['24','24','18','16']"
                            data-lineheight="['26','26','26','18']" data-fontweight="['700','700','700','400']"
                            data-width="['none','none','100%','300']" data-height="none"
                            data-whitespace="['nowrap','nowrap','nowrap','normal']" data-type="text"
                            data-responsive_offset="off" data-responsive="off"
                            data-frames='[{"delay":490,"speed":300,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5; white-space: nowrap; font-size: 24px; line-height: 26px; font-weight: 700; color: #ffffff; letter-spacing: 0px;font-family:Roboto;">
                            Nos esforzamos al máximo para ser los mejores
                        </div>

                        <!-- LAYER NR. 11 -->
                        <div class="tp-caption  " id="slide-6-layer-2" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['0','-8','-16','2']" data-fontsize="['70','50','40','30']"
                            data-lineheight="['80','65','65','54']" data-width="['1000','600','500','300']"
                            data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="off"
                            data-responsive="off"
                            data-frames='[{"delay":910,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,30,30]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,30,30]"
                            data-marginleft="[0, 0, 'auto', 'auto' ]" data-marginright="[0, 0, 'auto', 'auto' ]"
                            style="z-index: 6; min-width: 1000px; max-width: 1000px; white-space: normal; font-size: 70px; line-height: 80px; font-weight: 700; color: #ffffff; letter-spacing: 0px;font-family:Roboto;">
                            Empresa Lider de Montacargas y Maquinaria
                        </div>

                    </li>
                </ul>
                <div class="tp-bannertimer" style="height: 5px; background: rgba(0,0,0,0.15);"></div>
            </div>
        </div><!-- END REVOLUTION SLIDER -->
    </div>
    <!--====================  End of hero slider area  ====================-->
    <!--====================  featured project area ====================-->
    <div class="featured-project-area bg-img section-space--inner--top--120 section-space--inner--bottom--300"
        data-bg="{{ asset('img/patterns/1.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="featured-project-wrapper">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- section title left align -->
                                <div class="section-title-area">
                                    <h2 class="title title--left">Estamos prosperando y construyendo productos mejores y más
                                        fuertes</h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- section title content -->
                                <div class="section-title-content-area">
                                    <p class="section-title-content">
                                        Estamos comprometidos a brindar a nuestros clientes un servicio excepcional al mismo
                                        tiempo que ofrecemos a nuestros empleados la mejor
                                        capacitación y un entorno de trabajo en el que puedan sobresalir. Este enfoque de la
                                        empresa ha estado vigente durante {{ date('Y') - 1991 }} a&ntilde;os.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of featured project area  ====================-->

    <!--====================  feature project box slider area ====================-->
    <div class="feature-project-box-slider-area grey-bg section-space--inner--bottom--120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- feature project box wrapper -->
                    <div class="feature-project-box-wrapper">
                        <div class="row">
                            @foreach ($randomEquipments1 as $item)
                                <div class="col-md-4">
                                    <!-- single feature project box -->
                                    <div class="single-feature-project-box">
                                        <div class="single-feature-project-box__image">
                                            <img src="{{ $item->images[0]->url }}" class="img-fluid"
                                                alt="{{ $item->name }}" style="height: 278px">
                                        </div>
                                        <div class="single-feature-project-box__content">
                                            <h3 class="single-feature-project-box__title">
                                                {{ $item->name }}
                                            </h3>
                                            <p class="single-feature-project-box__subtitle">
                                                @if ($item->description)
                                                    {{ Str::substr($item->description, 0, 70) . '...' }}
                                                @endif
                                            </p>
                                        </div>
                                        <a href="{{ route('equipments.show', [$item->name_slug]) }}"
                                            class="single-feature-project-box__link"> <span>VER MAS </span> <i
                                                class="ion-arrow-right-c"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--====================  End of feature project box slider area  ====================-->
    <!--====================  industry slider area ====================-->
    <div class="industry-slider-area">
        <!-- industry slider nav -->
        <div class="industry-slider-nav-area">
            <div class="swiper-container industry-slider-nav-container">
                <div class="swiper-wrapper industry-slider-nav-wrapper">
                    <div class="swiper-slide">
                        <div class="industry-single-nav">
                            <div class="industry-single-nav__icon">
                                <i class="flaticon-001-worker-1"></i>
                            </div>
                            <div class="industry-single-nav__title">
                                Compra de Montacargas
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-single-nav">
                            <div class="industry-single-nav__icon">
                                <i class="flaticon-010-tank-1"></i>
                            </div>
                            <div class="industry-single-nav__title">
                                Venta de Montacargas
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-single-nav">
                            <div class="industry-single-nav__icon">
                                <i class="flaticon-026-mechanism"></i>
                            </div>
                            <div class="industry-single-nav__title">
                                Renta de Montacargas
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-single-nav">
                            <div class="industry-single-nav__icon">
                                <i class="flaticon-040-factory"></i>
                            </div>
                            <div class="industry-single-nav__title">
                                Renta a tu medida
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-single-nav">
                            <div class="industry-single-nav__icon">
                                <i class="flaticon-040-factory"></i>
                            </div>
                            <div class="industry-single-nav__title">
                                Venta de partes, accesorios
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-single-nav">
                            <div class="industry-single-nav__icon">
                                <i class="flaticon-041-eco"></i>
                            </div>
                            <div class="industry-single-nav__title">
                                Traslados de Equipos
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-single-nav">
                            <div class="industry-single-nav__icon">
                                <i class="flaticon-008-machine-1"></i>
                            </div>
                            <div class="industry-single-nav__title">
                                Servicios de sistemas hidráulicos
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-single-nav">
                            <div class="industry-single-nav__icon">
                                <i class="flaticon-008-machine-1"></i>
                            </div>
                            <div class="industry-single-nav__title">
                                Reparación general de montacargas
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ht-swiper-button-prev ht-swiper-button-prev-2 ht-swiper-button-nav d-none d-lg-block"><i
                    class="ion-ios-arrow-left"></i></div>
            <div class="ht-swiper-button-next ht-swiper-button-next-2 ht-swiper-button-nav d-none d-lg-block"><i
                    class="ion-ios-arrow-forward"></i></div>
        </div>
        <!-- industry slider content -->
        <div class="industry-slider-content-area">
            <div class="swiper-container industry-slider-content-container">
                <div class="swiper-wrapper industry-slider-content-wrapper">
                    <div class="swiper-slide">
                        <div class="industry-slider-content-single bg-img" data-bg="{{ asset('img/home/1.jpg') }}">
                            <div class="container">
                                <div class="industry-content-inner">
                                    <div class="section-title-area">
                                        <h2 class="title title--left">Compra de montacargas seminuevas y usadas</h2>
                                    </div>
                                    <p class="section-title-content">Compra de equipos en buen estado.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-slider-content-single bg-img" data-bg="{{ asset('img/home/8.jpg') }}">
                            <div class="container">
                                <div class="industry-content-inner">
                                    <div class="section-title-area">
                                        <h2 class="title title--left">Ventas de montacargas nuevas, seminuevas y usadas
                                        </h2>
                                    </div>
                                    <p class="section-title-content"> Venta de maquinaria de alta calidad a cualquier parte
                                        de la República Mexicana.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-slider-content-single bg-img" data-bg="{{ asset('img/home/4.jpg') }}">
                            <div class="container">
                                <div class="industry-content-inner">
                                    <div class="section-title-area">
                                        <h2 class="title title--left">Renta de montacargas con capacidad de 3,000 a 15,000
                                            libras</h2>
                                    </div>
                                    <p class="section-title-content"> Los equipos varían dependiendo su necesidad, ya sea
                                        que necesite algo en particular como tipo de combustible, peso, altura o algún
                                        implemento especial.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-slider-content-single bg-img" data-bg="{{ asset('img/home/2.jpg') }}">
                            <div class="container">
                                <div class="industry-content-inner">
                                    <div class="section-title-area">
                                        <h2 class="title title--left"> Renta a tu medida</h2>
                                    </div>
                                    <p class="section-title-content">La renta se puede adquirir por hora, día, semana o
                                        mes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-slider-content-single bg-img" data-bg="{{ asset('img/home/5.jpg') }}">
                            <div class="container">
                                <div class="industry-content-inner">
                                    <div class="section-title-area">
                                        <h2 class="title title--left"> Venta de partes, accesorios y todo para seguridad
                                            industrial</h2>
                                    </div>
                                    <p class="section-title-content">Manejamos una amplia gama de refacciones tanto
                                        nuevo, como usado. Contamos con todos los accesorios necesarios de seguridad
                                        industrial para cualquier equipo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-slider-content-single bg-img" data-bg="{{ asset('img/home/8.jpg') }}">
                            <div class="container">
                                <div class="industry-content-inner">
                                    <div class="section-title-area">
                                        <h2 class="title title--left">Traslados de Equipos</h2>
                                    </div>
                                    <p class="section-title-content">Traslados y maniobras.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="industry-slider-content-single bg-img" data-bg="{{ asset('img/home/3.jpg') }}">
                            <div class="container">
                                <div class="industry-content-inner">
                                    <div class="section-title-area">
                                        <h2 class="title title--left">Servicios de sistemas hidráulicos </h2>
                                    </div>
                                    <p class="section-title-content">Mangueras, retenes y reparación de sistemas
                                        hidráulicos.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="industry-slider-content-single bg-img" data-bg="{{ asset('img/home/7.jpg') }}">
                            <div class="container">
                                <div class="industry-content-inner">
                                    <div class="section-title-area">
                                        <h2 class="title title--left">Reparación general de montacargas</h2>
                                    </div>
                                    <p class="section-title-content">Reparación general a equipos de manejo de carga o
                                        elevación.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of industry slider area  ====================-->
    <!--====================  featured project two slider area ====================-->
    <div class="featured-project-two-slider-area section-space--inner--120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section title -->
                    <div class="section-title-area section-title-area--middle section-space--bottom--80">
                        <h4 class="subtitle">Venta y Renta</h4>
                        <h2 class="title">Nuestros Equipos</h2>
                    </div>

                    <!-- featured project two slider -->
                    <div class="featured-project-two-slider">
                        <div class="swiper-container featured-project-two-slider-container">
                            <div class="swiper-wrapper featured-project-two-slider-wrapper">
                                @foreach ($randomEquipments2 as $item)
                                    <div class="swiper-slide">
                                        <div class="feature-project-two-single-item">
                                            <div class="feature-project-two-single-item__image">
                                                <img src="{{ $item->images[0]->url }}" style="max-height: 305px;"
                                                    class="img-fluid" alt="{{ $item->name }}">
                                            </div>
                                            <div class="feature-project-two-single-item__content">
                                                <a href="{{ route('equipments.show', [$item->name_slug]) }}"
                                                    class="stretched-link">{{ $item->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-2"></div>
                        <div class="ht-swiper-button-prev ht-swiper-button-prev-1 ht-swiper-button-nav d-none d-lg-block">
                            <i class="ion-ios-arrow-left"></i>
                        </div>
                        <div class="ht-swiper-button-next ht-swiper-button-next-1 ht-swiper-button-nav d-none d-lg-block">
                            <i class="ion-ios-arrow-forward"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of featured project two slider area  ====================-->
    <!--====================  testimonial brand slider area ====================-->
    <div class="testimonial-brand-slider-area section-space--inner--120 grey-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- testimonial slider -->
                    <div class="testimonial-slider__body-wrapper section-space--bottom--60">
                        <!-- testimonial slider title -->
                        <div class="testimonial-slider__title-wrapper section-space--bottom--60">
                            <h2 class="testimonial-slider__title"><i class="icon icomoon-chat-1"></i>Clientes Satisfechos
                            </h2>
                            <div class="testimonial-slider__nav-container">
                                <div class="ht-swiper-button-prev ht-swiper-button-prev-3 ht-swiper-button-nav"><i
                                        class="ion-chevron-left"></i></div>
                                <div class="ht-swiper-button-next ht-swiper-button-next-3 ht-swiper-button-nav"><i
                                        class="ion-chevron-right"></i></div>
                            </div>
                        </div>

                        <div class="testimonial-slider__content-area">
                            <div class="swiper-container testimonial-slider__container">
                                <div class="swiper-wrapper testimonial-slider__wrapper">
                                    <div class="swiper-slide">
                                        <div class="testimonial-slider__single-item">
                                            <div class="testimonial-slider__single-item__image">
                                                <img src="{{ asset('img/testimonial/1.jpg') }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="testimonial-slider__single-item__content">
                                                <h4 class="testimonial-name"> Carlos Martinez <span
                                                        class="designation">Nombre de la empresa</span></h4>
                                                <div class="rating">
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                </div>
                                                <p class="text"> Una opinión de un cliente satisfecho con nuestro
                                                    gran servicio. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial-slider__single-item">
                                            <div class="testimonial-slider__single-item__image">
                                                <img src="{{ asset('img/testimonial/2.jpg') }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="testimonial-slider__single-item__content">
                                                <h4 class="testimonial-name"> Fernando Delgado <span
                                                        class="designation">Nombre de la empresa</span></h4>
                                                <div class="rating">
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                </div>
                                                <p class="text"> Una opinión de un cliente satisfecho con nuestro
                                                    gran servicio. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial-slider__single-item">
                                            <div class="testimonial-slider__single-item__image">
                                                <img src="{{ asset('img/testimonial/3.jpg') }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="testimonial-slider__single-item__content">
                                                <h4 class="testimonial-name"> Jhoana Santos <span
                                                        class="designation">Nombre de la empresa</span></h4>
                                                <div class="rating">
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                </div>
                                                <p class="text"> Una opinión de un cliente satisfecho con nuestro
                                                    gran servicio. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial-slider__single-item">
                                            <div class="testimonial-slider__single-item__image">
                                                <img src="{{ asset('img/testimonial/4.jpg') }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="testimonial-slider__single-item__content">
                                                <h4 class="testimonial-name"> Pedro Rodarte <span
                                                        class="designation">Nombre de la empresa</span></h4>
                                                <div class="rating">
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                </div>
                                                <p class="text"> Una opinión de un cliente satisfecho con nuestro
                                                    gran servicio. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial-slider__single-item">
                                            <div class="testimonial-slider__single-item__image">
                                                <img src="{{ asset('img/testimonial/5.jpg') }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="testimonial-slider__single-item__content">
                                                <h4 class="testimonial-name"> Susana Fuentes <span
                                                        class="designation">Nombre de la empresa</span></h4>
                                                <div class="rating">
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                </div>
                                                <p class="text"> Una opinión de un cliente satisfecho con nuestro
                                                    gran servicio. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination swiper-pagination-3"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- brand logo slider -->
                    <div class="brand-logo-slider__container-area">
                        <div class="swiper-container brand-logo-slider__container">
                            <div class="swiper-wrapper brand-logo-slider__wrapper">
                                <div class="swiper-slide brand-logo-slider__single">
                                    <div class="image">
                                        <img src="{{ asset('img/brand-logo/1.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="image-hover">
                                        <img src="{{ asset('img/brand-logo/1b.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide brand-logo-slider__single">
                                    <div class="image">
                                        <img src="{{ asset('img/brand-logo/2.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="image-hover">
                                        <img src="{{ asset('img/brand-logo/2b.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide brand-logo-slider__single">
                                    <div class="image">
                                        <img src="{{ asset('img/brand-logo/3.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="image-hover">
                                        <img src="{{ asset('img/brand-logo/3b.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide brand-logo-slider__single">
                                    <div class="image">
                                        <img src="{{ asset('img/brand-logo/4.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="image-hover">
                                        <img src="{{ asset('img/brand-logo/4b.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide brand-logo-slider__single">
                                    <div class="image">
                                        <img src="{{ asset('img/brand-logo/5.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="image-hover">
                                        <img src="{{ asset('img/brand-logo/5b.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide brand-logo-slider__single">
                                    <div class="image">
                                        <img src="{{ asset('img/brand-logo/6.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="image-hover">
                                        <img src="{{ asset('img/brand-logo/6b.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide brand-logo-slider__single">
                                    <div class="image">
                                        <img src="{{ asset('img/brand-logo/7.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="image-hover">
                                        <img src="{{ asset('img/brand-logo/7b.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide brand-logo-slider__single">
                                    <div class="image">
                                        <img src="{{ asset('img/brand-logo/8.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="image-hover">
                                        <img src="{{ asset('img/brand-logo/8b.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide brand-logo-slider__single">
                                    <div class="image">
                                        <img src="{{ asset('img/brand-logo/9.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="image-hover">
                                        <img src="{{ asset('img/brand-logo/9b.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of testimonial brand slider area  ====================-->
    <!--====================  project counter area ====================-->
    <div class="project-counter-area">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <div class="project-counter-wrapper">
                    <!-- project counter-bg -->
                    <div class="project-counter-bg bg-img" data-bg="{{ asset('img/backgrounds/7.jpg') }}"></div>
                    <!-- project counter content -->
                    <div class="project-counter-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="project-counter-single-content-wrapper">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- project counter single content -->
                                            <div class="project-counter-single-content">
                                                <div class="project-counter-single-content__image">
                                                    <img src="{{ asset('img/icons/tree.png') }}" class="img-fluid"
                                                        alt="">
                                                </div>
                                                <div class="project-counter-single-content__content">
                                                    <span class="project-counter-single-content__project-count">+</span>
                                                    <span
                                                        class="project-counter-single-content__project-count counter">150</span>
                                                    <h5 class="project-counter-single-content__project-title">
                                                        Compa&ntilde;ías Satisfechas</h5>
                                                    <p class="project-counter-single-content__subtext">Brindamos
                                                        atenci&oacute; y servicios a grandes empresas, simpre con el
                                                        compromiso de cumplir cualquier necesidad.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- project counter single content -->
                                            <div class="project-counter-single-content">
                                                <div class="project-counter-single-content__image">
                                                    <img src="{{ asset('img/icons/home.png') }}" class="img-fluid"
                                                        alt="">
                                                </div>
                                                <div class="project-counter-single-content__content">

                                                    <span class="project-counter-single-content__project-count">+</span>
                                                    <span
                                                        class="project-counter-single-content__project-count counter">3000</span>
                                                    <h5 class="project-counter-single-content__project-title">Equipos
                                                        reparados</h5>
                                                    <p class="project-counter-single-content__subtext">Nuestra experiencia
                                                        de m&aacute;s de {{ date('Y') - 1991 }} a&ntilde;os de servicio
                                                        hace que seamos una de las mejores empresas.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of project counter area  ====================-->

    <!--====================  support footer area ====================-->
    <div class="support-footer__area">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="support-footer__single bg-img" data-bg="{{ asset('img/icons/message.png') }}">
                    Correo:fjrg.admon@montacargaszerimar.com
                </div>
            </div>
            <div class="col-md-6">
                <div class="support-footer__single support-footer__single--dark bg-img"
                    data-bg="{{ asset('img/icons/support.png') }}">
                    Contacto: 653 534 3827
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of support footer area  ====================-->
@endsection
