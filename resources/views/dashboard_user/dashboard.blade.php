@extends('layouts.utama')
@section('isi')

 <!-- Page Preloder -->
 <div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->

<!-- Header Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="categories__item categories__large__item set-bg"
                data-setbg="{{asset('/assets/img/categories/category-1.jpg')}}">
                <div class="categories__text">
                    <h1>Samsung</h1>
                    <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                    edolore magna aliquapendisse ultrices gravida.</p>
                    <a href="/">Shop now</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                    <div class="categories__item set-bg" data-setbg="{{asset('/assets/img/categories/category-2.jpg')}}">
                        <div class="categories__text">
                            <h4>Oppo</h4>
                            <p>358 items</p>
                            <a href="/">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                    <div class="categories__item set-bg" data-setbg="{{asset('/assets/img/categories/category-3.jpg')}}">
                        <div class="categories__text">
                            <h4>Infinix</h4>
                            <p>273 items</p>
                            <a href="/">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                    <div class="categories__item set-bg" data-setbg="{{asset('/assets/img/categories/category-4.jpg')}}">
                        <div class="categories__text">
                            <h4>Xiaomi</h4>
                            <p>159 items</p>
                            <a href="/">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                    <div class="categories__item set-bg" data-setbg="{{asset('/assets/img/categories/category-5.jpg')}}">
                        <div class="categories__text">
                            <h4>Vivo</h4>
                            <p>792 items</p>
                            <a href="/">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="section-title">
                <h4>New product</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <ul class="filter__controls">
                <li class="active" data-filter="*">All</li>
            </ul>
        </div>
    </div>
    <div class="row property__gallery">
        @forelse ($barang as $item)    
        <div class="col-lg-3 col-md-4 col-sm-6 mix women">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="{{asset($item->path)}}">
                    <ul class="product__hover">
                        <li><a href="{{asset($item->path)}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                        <li><a href="/barang/detail/{{ $item->id_brg }}"><span class="icon_bag_alt"></span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="#">{{$item->nama_barang}}</a></h6>
                    <div class="product__price">{{$item->harga}}</div>
                </div>
            </div>
        </div>
        @empty
    </div>
    <div class="row property__gallery">
        <div class="col-lg-3 col-md-4 col-sm-6 mix women">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="{{asset('/assets/img/product/product-1.jpg')}}">
                    <ul class="product__hover">
                        <li><a href="{{asset('/assets/img/product/product-1.jpg')}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="#">Buttons tweed blazer</a></h6>
                    <div class="product__price">$ 59.0</div>
                </div>
            </div>
        </div>
        
    </div>
    @endforelse
</div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->

<!-- Banner Section End -->

<!-- Trend Section Begin -->
<!-- Trend Section End -->

<!-- Discount Section Begin -->
<section class="discount">
<div class="container">
    <div class="row">
        <div class="col-lg-6 p-0">
            <div class="discount__pic">
                <img src="{{asset('/assets/img/samsung.jpg')}}" alt="">
            </div>
        </div>
        <div class="col-lg-6 p-0">
            <div class="discount__text">
                <div class="discount__text__title">
                    <span>Discount</span>
                    <h2>Fall 2023</h2>
                    <h5><span>Sale</span> 69%</h5>
                </div>
                <div class="discount__countdown" id="countdown-time">
                    <div class="countdown__item">
                        <span>22</span>
                        <p>Days</p>
                    </div>
                    <div class="countdown__item">
                        <span>18</span>
                        <p>Hour</p>
                    </div>
                    <div class="countdown__item">
                        <span>46</span>
                        <p>Min</p>
                    </div>
                    <div class="countdown__item">
                        <span>05</span>
                        <p>Sec</p>
                    </div>
                </div>
                <a href="#">Shop now</a>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
                <i class="fa fa-car"></i>
                <h6>Free Shipping</h6>
                <p>For all oder over $99</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
                <i class="fa fa-money"></i>
                <h6>Money Back Guarantee</h6>
                <p>If good have Problems</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
                <i class="fa fa-support"></i>
                <h6>Online Support 24/7</h6>
                <p>Dedicated support</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
                <i class="fa fa-headphones"></i>
                <h6>Payment Secure</h6>
                <p>100% secure payment</p>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Services Section End -->

<!-- Instagram Begin -->
<!-- Instagram End -->

<!-- Footer Section Begin -->

    
@endsection