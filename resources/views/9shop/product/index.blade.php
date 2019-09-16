@extends('9shop.layouts.app')
<?php
        $new_products = \App\Models\Product::latest()->paginate(10);
?>

@section('content')

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="owl-carousel owl-theme s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{asset('9shop/img/category/s-p1.jpg')}}" alt="">
                        </div>
                        <!-- <div class="single-prd-item">
                            <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>Faded SkyBlu Denim Jeans</h3>
                        <h2>$149.99</h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span>Category</span> : Household</a></li>
                            <li><a href="#"><span>Availibility</span> : In Stock</a></li>
                        </ul>
                        <p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for
                            something that can make your interior look awesome, and at the same time give you the pleasant warm feeling
                            during the winter.</p>
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                    class="increase items-count" type="button"><i class="ti-angle-left"></i></button>
                            <input type="text" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                    class="reduced items-count" type="button"><i class="ti-angle-right"></i></button>
                            <a class="button primary-btn" href="#">Add to Cart</a>
                        </div>
                        <div class="card_area d-flex align-items-center">
                            <a class="icon_btn" href="#"><i class="ti-heart" style="    color: #00000069;
    font-weight: bolder;
    font-size: 19px;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->


    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                       aria-selected="false">Specification</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                       aria-selected="false">Comments</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes
                        and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in
                        Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to
                        London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an
                        officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a
                        job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when
                        showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a
                        child’s painting set for her birthday and it was with this that she produced her first significant work, a
                        half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly
                        named ‘Hangover’ by Beryl’s husband and</p>
                    <p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing
                        more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and
                        the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for
                        more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a
                        streamlined plan of cooking that is more efficient for one person creating less</p>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <h5>Width</h5>
                                </td>
                                <td>
                                    <h5>128mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Height</h5>
                                </td>
                                <td>
                                    <h5>508mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Depth</h5>
                                </td>
                                <td>
                                    <h5>85mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Weight</h5>
                                </td>
                                <td>
                                    <h5>52gm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Quality checking</h5>
                                </td>
                                <td>
                                    <h5>yes</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Freshness Duration</h5>
                                </td>
                                <td>
                                    <h5>03days</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>When packeting</h5>
                                </td>
                                <td>
                                    <h5>Without touch of hand</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Each Box contains</h5>
                                </td>
                                <td>
                                    <h5>60pcs</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h5>Overall</h5>
                                        <h4>4.0</h4>
                                        <h6>(03 Reviews)</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>Based on 3 Reviews</h3>
                                        <ul class="list">
                                            <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review_list">
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/review-1.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/review-2.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/review-3.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Add a Review</h4>
                                {!! Form::open(['url'=>'/product' , 'action' => 'post']) !!}

                                <p>Your Rating:</p>
                                <span class="star-rating" id="star_rating">
   <!--RADIO 1-->
                                    <input type='checkbox' class="radio_item" value="1" name="item" id="radio1" style="display: none" >
                                        <label class="label_item" for="radio1"><li class="fa fa-star"  id="star1"></li></label>

                                                                    <!--RADIO 2-->
                                    <input type='checkbox' class="radio_item" value="2" name="item" id="radio2" style="display: none">
                                    <label class="label_item" for="radio2"><li class="fa fa-star"  id="star2"></li></label>

                                                                    <!--RADIO 3-->
                                    <input type='checkbox' class="radio_item" value="3" name="item" id="radio3" style="display: none">
                                    <label class="label_item" for="radio3"><li class="fa fa-star"  id="star3"></li></label>


                                                                    <!--RADIO 4-->
                                    <input type='checkbox' class="radio_item" value="4" name="item" id="radio4" style="display: none">
                                    <label class="label_item" for="radio4"><li class="fa fa-star"  id="star4"></li></label>

                                                                    <!--RADIO 5-->
                                    <input type='checkbox' class="radio_item" value="5" name="item" id="radio5" style="display: none">
                                    <label class="label_item" for="radio5"><li class="fa fa-star"  id="star5"></li></label>
                                </span>


                                <div class="form-contact form-review mt-3">
                                    <div class="form-group">
                                        <input class="form-control" name="name" type="text" placeholder="Enter your name" required>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" name="email" type="email" placeholder="Enter email address" required>
                                    </div>

                                    <div class="form-group">
                                        <textarea class="form-control different-control w-18px" name="textarea" id="textarea" cols="30" rows="5" placeholder="Enter Message"></textarea>
                                    </div>

                                    <div class="form-group text-center text-md-right mt-3">
                                        <button type="submit" class="button button--active button-review">Submit Now</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->


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

@section('script')
<script>

    $(document).ready(function() {

        $('.star-rating input').click( function(){
            starvalue = $(this).attr('value');

            // iterate through the checkboxes and check those with values lower than or equal to the one you selected. Uncheck any other.



                for(i=0; i<=5; i++){
                if (i <= starvalue){
                    $("#radio" + i).prop('checked', true);
                    $("#star" + i).css('font-weight', 'bolder');
                    $("#star" + i).css('font-size', '20px');
                } else {
                    $("#radio" + i).prop('checked', false);
                    $("#star" + i).css('font-weight', '100');
                    $("#star" + i).css('font-size', '15px');
                }
            }
        });
    });

</script>

@endsection