@extends('9shop.layouts.app')
<?php
    $new_products = \App\Models\Product::latest()->paginate(10);
?>

@section('content')

    <!-- ================ category section start ================= -->
    <section class="section-margin--small mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="sidebar-categories">
                        <div class="head">Browse Categories</div>
                        <ul class="main-categories">
                            <li class="common-filter">
                                <form action="#">
                                    <ul>
                                        <li class="filter-list"><input class="pixel-radio" type="radio" id="men" name="brand"><label for="men">Men<span> (3600)</span></label></li>
                                        <li class="filter-list"><input class="pixel-radio" type="radio" id="women" name="brand"><label for="women">Women<span> (3600)</span></label></li>
                                        <li class="filter-list"><input class="pixel-radio" type="radio" id="accessories" name="brand"><label for="accessories">Accessories<span> (3600)</span></label></li>
                                        <li class="filter-list"><input class="pixel-radio" type="radio" id="footwear" name="brand"><label for="footwear">Footwear<span> (3600)</span></label></li>
                                        <li class="filter-list"><input class="pixel-radio" type="radio" id="bayItem" name="brand"><label for="bayItem">Bay item<span> (3600)</span></label></li>
                                        <li class="filter-list"><input class="pixel-radio" type="radio" id="electronics" name="brand"><label for="electronics">Electronics<span> (3600)</span></label></li>
                                        <li class="filter-list"><input class="pixel-radio" type="radio" id="food" name="brand"><label for="food">Food<span> (3600)</span></label></li>
                                    </ul>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-filter">
                        <div class="top-filter-head">Product Filters</div>

                        <div class="common-filter">
                            <div class="head">Color</div>
                            <form action="#">
                                <ul>
                                    <li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
                                    <li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
                                            Leather<span>(29)</span></label></li>
                                    <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
                                            with red<span>(19)</span></label></li>
                                    <li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
                                    <li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
                                </ul>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <!-- Start Filter Bar -->
                    <div class="filter-bar d-flex flex-wrap align-items-center">
                        <div class="sorting">
                            <select>
                                <option value="1">Default sorting</option>
                                <option value="1">Default sorting</option>
                                <option value="1">Default sorting</option>
                            </select>
                        </div>

                        <div>
                            <div class="input-group filter-bar-search">
                                <input type="text" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="button"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Filter Bar -->
                    <!-- Start Best Seller -->
                    <section class="lattest-product-area pb-40 category-list">
                        <div class="row">
                            @foreach($products as $product)
                                @if($product->trend == '1')

                                    <div class="col-md-6 col-lg-4">
                                        <span class="ribbon r2">
                                        <span>{{100-optional($product)->offer_price/optional($product)->price*100}} %</span>
                                        </span>
                                        <div class="card text-center card-product">
                                            <div class="card-product__img">
                                                <img class="card-img" src="{{asset('9shop/img/products/'.optional($product->image()->first())->name)}}" alt="">
                                                <ul class="card-product__imgOverlay">
                                                    <li><a href="#"><button><i class="ti-shopping-cart"></i></button></a></li>
                                                    <li><a href="#"><button><i class="ti-heart"></i></button></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">

                                                @for($i = 0 ; optional($product)->rate > $i ; $i++ )

                                                    <i class="fa fa-star" style="color: gold;"></i>

                                                @endfor

                                                @for($i = 0 ; 5 - optional($product)->rate > $i ; $i++ )

                                                    <i class="far fa-star" style="color: gold;"></i>

                                                @endfor

                                                <h4 class="card-product__title"><a href="single-product.html">{{optional($product)->name}}</a></h4>
                                                <p class="card-product__price">
                                        <span style="text-decoration: line-through;
    text-decoration-color: red;
    padding-right: 1pc;
">
                                            {{optional($product)->price}} . LG
                                        </span>
                                                    <span style="    color: #3e61f0;">
                                            {{optional($product)->offer_price}} .LG
                                        </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                @else
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card text-center card-product">
                                            <div class="card-product__img">
                                                <img class="card-img" src="{{asset('9shop/img/products/'.optional($product->image()->first())->name)}}" alt="">
                                                <ul class="card-product__imgOverlay">
                                                    <li><a href="#"><button><i class="ti-shopping-cart"></i></button></a></li>
                                                    <li><a href="#"><button><i class="ti-heart"></i></button></a></li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <p>Accessories</p>
                                                <h4 class="card-product__title"><a href="#">Quartz Belt Watch</a></h4>
                                                <p class="card-product__price">$150.00</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endforeach
                        </div>

                    </section>
                    <center style="padding-left: 46%;">
                        {{ optional($products)->links() }}
                    </center>

                    <!-- End Best Seller -->
                </div>
            </div>
        </div>
    </section>
    <!-- ================ category section end ================= -->

    <!-- ================ top product area start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>{{__('9shop.Popular Item in the market')}}   </p>
                <h2>{{__('9shop.New')}} <span class="section-intro__style">{{__('9shop.Products')}}</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="bestSellerCarousel">

                @foreach($new_products as $new_product)

                    @if($new_product->trend == '0')
                        <div class="card text-center card-product" style="    width: 10pc;">
                        <div class="card-product__img">

                            <img class="img-fluid" src="{{asset('9shop/img/products/'.$new_product->image()->first()->name)}}" alt="">
                            <ul class="card-product__imgOverlay" style="    padding: 9px 2px;">
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
                    @else
                        <div class="card text-center card-product" style="    width: 10pc;">
                             <span class="ribbon r2" style="left: -7px;">
                                <span style="    padding: 2.3px;
    font-size: 17px;">{{100-optional($new_product)->offer_price/optional($new_product)->price*100}} %</span>
                            </span>
                            <div class="card-product__img">

                                <img class="img-fluid" src="{{asset('9shop/img/products/'.$new_product->image()->first()->name)}}" alt="">
                                <ul class="card-product__imgOverlay" style="    padding: 9px 2px;">
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
                                <p class="card-product__price" style="font-size: 15px;">
                                       <span style="text-decoration: line-through;
    text-decoration-color: red;
    padding-right: 7px;
">
                                            {{optional($new_product)->price}} . LG
                                        </span>
                                    <span style="    color: #3e61f0;">
                                            {{optional($new_product)->offer_price}} .LG
                                        </span>
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- ================ top product area end ================= -->

@endsection