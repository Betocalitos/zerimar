@extends('layouts.main')
@section('title',"$equipment->name |".config('app.name'))
@section('meta-title',$equipment->name)
@section('description',$equipment->description)
@section('image',asset($equipment->images[0]->path))
@section('content')
 <!--====================  End of header area  ====================-->
    <!--====================  breadcrumb area ====================-->
    <div class="breadcrumb-area breadcrumb-area-bg section-space--inner--80 bg-img" data-bg="/img/backgrounds/20.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="breadcrumb-page-title">{{$equipment->name}}</h2>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb-page-list text-uppercase">
                        <li class="has-children"><a href="{{route('index')}}">Inicio</a></li>
                        <li>Detalles del Producto</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->
    <!--====================  page content wrapper ====================-->
    <div class="page-content-wrapper section-space--inner--120">
        <!--====================  product details  area ====================-->
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
                                                @foreach ($equipment->images as $image)
                                                <div class="swiper-slide">
                                                    <div class="product-details__image-single">
                                                        <img src="{{asset($image->path)}}" class="img-fluid" alt="{{$equipment->name}}">
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="swiper-pagination swiper-pagination-15"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product-details__content">
                                        <h2 class="product-details__title">{{$equipment->name}}</h2>
                                        <div class="product-details__price">
                                            <span class="discounted-price">$@if ($equipment->price_sale) {{number_format($equipment->price_sale,2)}} {{$equipment->exchange}}@endif</span>
                                        </div>
                                        <div class="product-details__desc section-space--bottom--30">
                                            <p>
                                                {{$equipment->description}}
                                            </p>
                                        </div>
                                        <div class="product-details__meta-wrap">
                                            @if ($equipment->brand)
                                                <div class="single-meta">
                                                    <h4 class="title">Marca: </h4>
                                                    <span class="sku">{{$equipment->brand}}</span>
                                                </div>
                                            @endif
                                            @if ($equipment->model)
                                                <div class="single-meta">
                                                    <h4 class="title">Modelo: </h4>
                                                    <span class="sku">{{$equipment->model}}</span>
                                                </div>
                                            @endif
                                            @if ($equipment->series)
                                                <div class="single-meta">
                                                    <h4 class="title">Serie: </h4>
                                                    <span class="sku">{{$equipment->series}}</span>
                                                </div>
                                            @endif
                                            @if ($equipment->year)
                                                <div class="single-meta">
                                                    <h4 class="title">A&ntilde;o: </h4>
                                                    <span class="sku">{{$equipment->year}}</span>
                                                </div>
                                            @endif
                                            @if ($equipment->capacity)
                                                <div class="single-meta">
                                                    <h4 class="title">Capacidad: </h4>
                                                    <span class="sku">{{$equipment->capacity}}</span>
                                                </div>
                                            @endif
                                            @if ($equipment->motor)
                                                <div class="single-meta">
                                                    <h4 class="title">Motor: </h4>
                                                    <span class="sku">{{$equipment->motor}}</span>
                                                </div>
                                            @endif
                                            <div class="single-meta">
                                                <h4 class="title">Categoría: </h4>
                                                <span class="sku"><a href="{{route('equipments.index',[$equipment->type->slug])}}">{{$equipment->type->name}}</a></span>
                                            </div>
                                            <div class="single-meta">
                                                <h4 class="title">Compartir: </h4>
                                                <div class="social-links d-inline-block">
                                                    <ul>
                                                        <li><a href="javascript:window.open('https://www.facebook.com/sharer.php?u={{url()->current()}}','newwindow','width=500,height=700')" data-tippy="Facebook" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__black" data-tippy-placement="top"><i class="ion-social-facebook"></i></a></li>
                                                        <li><a href="javascript:window.open('https://wa.me/?text=Te%20comparto%este%20equipo,%20{{url()->current()}}')" data-tippy="Whatsapp" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__black" data-tippy-placement="top"><i class="ion-social-whatsapp"></i></a></li>
                                                        <li><a href="javascript:window.open(`https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}&title={{$equipment->name}}&summary={{$equipment->description}}&source=LinkedIn`,'newwindow','width=500,height=700')" data-tippy="Linkedin" data-tippy-inertia="false" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder__black" data-tippy-placement="top"><i class="ion-social-linkedin"></i></a></li>
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
        <!--====================  End of product details  area  ====================-->
        <!--=======  single product description tab area  =======-->
        <div class="single-product-description-tab-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--=======  description tab navigation  =======-->

                        <div class="description-tab-navigation">
                            <div class="nav nav-tabs" id="nav-tab2" role="tablist">
                                <a class="nav-item nav-link active" id="additional-info-tab" data-toggle="tab" href="#product-additional-info" role="tab" aria-selected="false">Informaci&oacute;n adicional</a>
                            </div>
                        </div>

                        <!--=======  End of description tab navigation  =======-->
                    </div>
                </div>
            </div>
            @if ($equipment->features)
                <!--=======  description tab content  =======-->
            <div class="single-product-description-tab-content">

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="product-additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  additional info content  =======-->

                                    <div class="additional-info-content">
                                        <table class="additional-info-table">
                                            <tbody>
                                                @foreach ($equipment->features as $feature)
                                                <tr>
                                                    <th>{{$feature->name}}</th>
                                                    <td class="product_dimensions">{{$feature->value}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!--=======  End of additional info content  =======-->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--=======  End of description tab content  =======-->
            @endif
        </div>
        <!--=======  End of single product description tab area  =======-->
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
                                                        <img src="{{asset($other->images[0]->path)}}" class="img-fluid" alt="{{$other->name}}">
                                                    </a>
                                                </div>

                                                <div class="shop-single-product__cart-btn">
                                                    <a href="{{route('equipments.show',[$other->name_slug])}}"> VER M&Aacute;S...</a>
                                                </div>
                                            </div>
                                            <div class="shop-single-product__content">
                                                <h3 class="shop-single-product__title"><a href="{{route('equipments.show',[$other->name_slug])}}">{{$other->name}}</a></h3>
                                                <div class="shop-single-product__price">
                                                    <span class="main-price ">${{number_format($other->price_sale,2)}} {{$other->exchage}}</span>
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
