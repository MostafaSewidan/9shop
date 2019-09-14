@extends('9shop.layouts.app')
<?php
    $categories = \App\Models\Category::all();
    $trending_products = \App\Models\Product::where('trend' , '1')->paginate(10);
    $new_products = \App\Models\Product::where('trend' , '0')->paginate(10);
?>
@section('content')

    <main class="site-main">

        <!--================ Hero banner start =================-->
        <section class="hero-banner">
            <div class="container">
                <div class="row no-gutters align-items-center pt-60px">
                    <div class="col-5 d-none d-sm-block">
                        <div class="hero-banner__img">
                            <img class="img-fluid" src="{{asset('9shop/img/home/hero-banner.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                        <div class="hero-banner__content">
                            <h4>Shop is fun</h4>
                            <h1>Browse Our Premium Product</h1>
                            <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
                            <a class="button button-hero" href="#">Browse Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Hero banner start =================-->

        <!--================ Hero Carousel start =================-->
        <section class="section-margin mt-0">
            <div class="owl-carousel owl-theme hero-carousel">

                @foreach($categories as $category)

                    <div class="hero-carousel__slide">
                        <img src="{{asset('9shop/img/category/'.optional($category->image()->first())->name)}}" alt="" class="img-fluid">
                        <a href="#" class="hero-carousel__slideOverlay">
                            <h3>{{optional($category)->name}}</h3>
                            <p>{{optional($category)->details}}</p>
                        </a>
                    </div>

                @endforeach
            </div>
        </section>
        <!--================ Hero Carousel end =================-->

        <!-- ================ trending product section start ================= -->
        <section class="section-margin calc-60px">
            <div class="container">
                <div class="section-intro pb-60px">
                    <p>{{__('9shop.Popular Item in the market')}}</p>
                    <h2>{{__('9shop.Trending')}} <span class="section-intro__style">{{__('9shop.Products')}}</span></h2>
                </div>
                <div class="row">

                    @foreach($trending_products as $trending_product)

                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <span class="ribbon r2">
                            <span>{{100-optional($trending_product)->offer_price/optional($trending_product)->price*100}} %</span>
                            </span>
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <img class="card-img" src="{{asset('9shop/img/products/'.optional($trending_product->image()->first())->name)}}" alt="">
                                    <ul class="card-product__imgOverlay">
                                        <li><a href="#"><button><i class="ti-shopping-cart"></i></button></a></li>
                                        <li><a href="#"><button><i class="ti-heart"></i></button></a></li>
                                    </ul>
                                </div>
                                <div class="card-body">

                                    @for($i = 0 ; optional($trending_product)->rate > $i ; $i++ )

                                        <i class="fa fa-star" style="color: gold;"></i>

                                    @endfor

                                    @for($i = 0 ; 5 - optional($trending_product)->rate > $i ; $i++ )

                                        <i class="far fa-star" style="color: gold;"></i>

                                    @endfor

                                        <h4 class="card-product__title"><a href="single-product.html">{{optional($trending_product)->name}}</a></h4>
                                    <p class="card-product__price">
                                        <span style="text-decoration: line-through;
    text-decoration-color: red;
    padding-right: 1pc;
">
                                            {{optional($trending_product)->price}} . LG
                                        </span>
                                        <span style="    color: #3e61f0;">
                                            {{optional($trending_product)->offer_price}} .LG
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </section>
        <!-- ================ trending product section end ================= -->


        <!-- ================ offer section start ================= -->
        <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="offer__content text-center">
                            <h3>Up To 50% Off</h3>
                            <h4>Winter Sale</h4>
                            <p>Him she'd let them sixth saw light</p>
                            <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ offer section end ================= -->

        <!-- ================ Best Selling item  carousel ================= -->
        <section class="section-margin calc-60px">
            <div class="container">
                <div class="section-intro pb-60px">
                    <p>{{__('9shop.Popular Item in the market')}}</p>
                    <h2>{{__('9shop.New')}} <span class="section-intro__style">{{__('9shop.Products')}}</span></h2>
                </div>
                <div class="owl-carousel owl-theme" id="bestSellerCarousel">

                    @foreach($new_products as $new_product)
                        <div class="card text-center card-product">
                            <div class="card-product__img">

                                <img class="img-fluid" src="{{asset('9shop/img/products/'.$new_product->image()->first()->name)}}" alt="">
                                <ul class="card-product__imgOverlay">
                                    <li><a href="#"><button><i class="ti-shopping-cart"></i></button></a></li>
                                    <li><a href="#"><button><i class="ti-heart"></i></button></a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                @for($i = 0 ; optional($new_product)->rate > $i ; $i++ )

                                    <i class="fa fa-star" style="color: gold;"></i>

                                @endfor

                                @for($i = 0 ; 5 - optional($new_product)->rate > $i ; $i++ )

                                    <i class="far fa-star" style="color: gold;"></i>

                                @endfor

                                <h4 class="card-product__title"><a href="single-product.html">{{optional($new_product)->name}}</a></h4>
                                <p class="card-product__price">
                                    <span>
                                            {{optional($new_product)->price}} . LG
                                    </span>
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- ================ Best Selling item  carousel end ================= -->
    </main>

@endsection

