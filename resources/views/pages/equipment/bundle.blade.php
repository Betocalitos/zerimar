@extends('layouts.main')
@section('title',"$bundle->name | ".config('app.name'))
@section('meta-title',$bundle->name)
@section('description',$bundle->description)
@section('content')
    <!--====================  breadcrumb area ====================-->
    <div class="breadcrumb-area breadcrumb-area-bg section-space--inner--80 bg-img" data-bg="/img/backgrounds/20.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="breadcrumb-page-title">{{$bundle->name}}</h2>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb-page-list text-uppercase">
                        <li class="has-children"><a href="{{route('index')}}">Inicio</a></li>
                        <li>Paquetes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->
    <!--====================  page content wrapper ====================-->
    <div class="page-content-wrapper section-space--inner--120">
        <!--====================  product details area ====================-->
        <div class="product-details-area section-space--bottom--50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details">
                            <div class="row row-35">
                                <div class="col-lg-6">
                                    <div class="product-details__image-slider">
                                        <div class="swiper-container product-details__image-slider-container">
                                            <div class="swiper-wrapper product-details__image-slider-wrapper">
                                                @foreach ($bundle->equipments as $idx => $item)
                                                    @foreach ($item->images as $image)
                                                    <div class="swiper-slide">
                                                        <div class="product-details__image-single">
                                                            <img src="{{ $image->url }}" class="img-fluid" alt="{{$item->name}}">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="swiper-pagination swiper-pagination-15"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product-details__content">
                                        <h2 class="product-details__title">{{$bundle->name}}</h2>
                                        <div class="product-details__price">
                                            <span class="discounted-price">@if ($bundle->price_sale) ${{number_format($bundle->price_sale,2)}} {{$bundle->exchange}}@endif</span>
                                        </div>
                                        <div class="product-details__desc section-space--bottom--30">
                                            <p>
                                                {{$bundle->description}}
                                            </p>
                                        </div>
                                        <div class="product-details__meta-wrap">
                                            <div class="single-meta">
                                                <h4 class="title">Equipos incluidos: </h4>
                                                <span class="sku">{{$bundle->equipments->count()}} unidades</span>
                                            </div>
                                            @foreach ($bundle->equipments as $item)
                                            <div class="single-meta" style="border-bottom: 1px solid #eee; padding-bottom: 8px; margin-bottom: 8px;">
                                                <h4 class="title">{{$loop->iteration}}. {{$item->brand}} {{$item->model}}</h4>
                                                <span class="sku">
                                                    @if ($item->year) Año: {{$item->year}} | @endif
                                                    @if ($item->capacity) Cap: {{$item->capacity}} | @endif
                                                    @if ($item->battery) Batería: Sí @endif
                                                </span>
                                            </div>
                                            @endforeach
                                            <div class="single-meta">
                                                <h4 class="title">Compartir: </h4>
                                                <div class="social-links d-inline-block">
                                                    <ul>
                                                        <li><a href="javascript:window.open('https://www.facebook.com/sharer.php?u={{url()->current()}}','newwindow','width=500,height=700')" data-tippy="Facebook" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__black" data-tippy-placement="top"><i class="ion-social-facebook"></i></a></li>
                                                        <li><a href="javascript:window.open('https://wa.me/?text=Te%20comparto%20este%20paquete,%20{{url()->current()}}')" data-tippy="Whatsapp" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__black" data-tippy-placement="top"><i class="ion-social-whatsapp"></i></a></li>
                                                        <li><a href="javascript:window.open(`https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}&title={{$bundle->name}}&summary={{$bundle->description}}&source=LinkedIn`,'newwindow','width=500,height=700')" data-tippy="Linkedin" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__black" data-tippy-placement="top"><i class="ion-social-linkedin"></i></a></li>
                                                    </ul>
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
        <!--====================  related product slider ====================-->
        <div class="related-product-slider-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area section-space--bottom--50">
                            <h2 class="title">Equipos</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="related-product-slider">
                            <div class="swiper-container related-product-slider__container">
                                <div class="swiper-wrapper related-product-slider__wrapper">
                                    @foreach ($randomEquipments as $other)
                                    <div class="swiper-slide">
                                        <div class="shop-single-product mb-0">
                                            <div class="shop-single-product__thumb-wrapper">
                                                <div class="shop-single-product__image">
                                                    <a href="{{route('equipments.show',[$other->name_slug])}}">
                                                        <img src="{{ $other->images[0]->url }}" class="img-fluid" alt="{{$other->name}}">
                                                    </a>
                                                </div>
                                                <div class="shop-single-product__cart-btn">
                                                    <a href="{{route('equipments.show',[$other->name_slug])}}"> VER M&Aacute;S...</a>
                                                </div>
                                            </div>
                                            <div class="shop-single-product__content">
                                                <h3 class="shop-single-product__title"><a href="{{route('equipments.show',[$other->name_slug])}}">{{$other->name}}</a></h3>
                                                <div class="shop-single-product__price">
                                                    <span class="main-price ">${{number_format($other->price_sale,2)}} {{$other->exchange}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="ht-swiper-button-prev ht-swiper-button-prev-15 ht-swiper-button-nav"><i class="ion-chevron-left"></i></div>
                            <div class="ht-swiper-button-next ht-swiper-button-next-15 ht-swiper-button-nav"><i class="ion-chevron-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of related product slider  ====================-->
    </div>
    <!--====================  End of page content wrapper  ====================-->
@endsection