@extends('layouts.main')
@section('title',"$type->name | ".config('app.name'))
@section('content')
     <!--====================  breadcrumb area ====================-->
     <div class="breadcrumb-area breadcrumb-area-bg section-space--inner--80 bg-img" data-bg="/img/backgrounds/20.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="breadcrumb-page-title">{{$type->name}}</h2>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb-page-list text-uppercase">
                        <li class="has-children"><a href="{{route('index')}}">Inicio</a></li>
                        <li>{{$type->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of breadcrumb area  ====================-->
    <!--====================  page content wrapper ====================-->
    <div class="page-content-wrapper section-space--inner--120">
        <!--====================  shop page header ====================-->
        <div class="shop-page-header section-space--bottom--40">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        {{count($equipments)}} resultado(s)
                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of shop page header  ====================-->
        <!--====================  shop page content ====================-->
        <div class="shop-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-single-product-wrapper">
                            <div class="row">
                                @if (count($equipments) + count($bundles))
                                    @foreach ($bundles as $bundle)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="shop-single-product">
                                            <div class="shop-single-product__thumb-wrapper">
                                                <div class="shop-single-product__image">
                                                    @if ($bundle->equipments->first() && $bundle->equipments->first()->images->first())
                                                    <a href="{{route('bundles.show',[$bundle->slug])}}">
                                                        <img src="{{ $bundle->equipments->first()->images->first()->url }}" class="img-fluid" alt="{{$bundle->name}}">
                                                    </a>
                                                    @endif
                                                </div>
                                                <div class="shop-single-product__cart-btn">
                                                    <a href="{{route('bundles.show',[$bundle->slug])}}"> VER M&Aacute;S</a>
                                                </div>
                                            </div>
                                            <div class="shop-single-product__content">
                                                <h3 class="shop-single-product__title"><a href="{{route('bundles.show',[$bundle->slug])}}">{{$bundle->name}}</a></h3>
                                                <div class="shop-single-product__price">
                                                    <span class="discounted-price">@if ($bundle->price_sale) ${{number_format($bundle->price_sale,2)}} {{$bundle->exchange}} @endif</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @foreach ($equipments as $item)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="shop-single-product">
                                            <div class="shop-single-product__thumb-wrapper">
                                                <div class="shop-single-product__image">
                                                    <a href="{{route('equipments.show',[$item->name_slug])}}">
                                                        <img src="{{ $item->images[0]->url }}" class="img-fluid" alt="{{$item->name}}">
                                                    </a>
                                                </div>
                                                <div class="shop-single-product__cart-btn">
                                                    <a href="{{route('equipments.show',[$item->name_slug])}}"> VER M&Aacute;S</a>
                                                </div>
                                            </div>
                                            <div class="shop-single-product__content">
                                                <h3 class="shop-single-product__title"><a href="{{route('equipments.show',[$item->name_slug])}}">{{$item->name}}</a></h3>
                                                <div class="shop-single-product__price">
                                                    <span class="discounted-price">${{number_format($item->price_sale,2)}} {{$item->exchange}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    No se encontraron resultados...
                                @endif
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of shop page content  ====================-->
    </div>
    <!--====================  End of page content wrapper  ====================-->
@endsection
