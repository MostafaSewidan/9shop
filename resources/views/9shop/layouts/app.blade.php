<?php  $categories = App\Models\Category::all(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aroma Shop - Home</title>
    <link rel="icon" href="{{asset('9shop/img/title_logo.jpeg')}}" type="image/png">

    <link rel="stylesheet" href="{{asset('9shop/vendors/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('9shop/vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('9shop/vendors/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('9shop/vendors/nice-select/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('9shop/vendors/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('9shop/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('9shop/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('9shop/css/9shop_style.css')}}">
    <style>
    body {
        font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
</style>
</head>
<body>
<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{url('/')}}"><img src="{{asset('9shop/img/logo.png')}}" style="width: 9pc" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">{{__('9shop.home')}}</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">{{__('9shop.categories')}}</a>
                            <ul class="dropdown-menu">

                                @foreach( $categories as $category)

                                    <li class="nav-item"><a class="nav-link" href="{{url('/category/'.$category->id)}}">{{optional($category)->name}}</a></li>

                                @endforeach

                            </ul>
                        </li>


                        <li class="nav-item "><a class="nav-link" href="{{url('/')}}">{{__('9shop.my_orders')}}</a></li>

                        <li class="nav-item "><a class="nav-link" href="{{url('/')}}">{{__('9shop.Customer_Service')}}</a></li>

                        <li class="nav-item"><a class="nav-link" href="#contact">{{__('9shop.contact_us')}}</a></li>
                    </ul>

                    <ul class="nav-shop">
                        <li class="nav-item"><button class="btn1"><i class="ti-search"></i></button></li>

                        <li class="nav-item">
                            <button>
                                <i class="ti-shopping-cart"></i>
                                <span class="nav-shop__circle">3</span>
                            </button>
                        </li>

                        <li class="nav-item">

                            @if(!auth()->guard('client')->check())

                                <a class="button button-header" href="{{url('/client-login')}}">
                                    {{__('9shop.login')}}
                                </a>

                            @else

                                <a class="button button-header" id="btn2" href="#">
                                    {{auth()->guard('client')->user()->name}}
                                </a>

                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_panel trans_300">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
                        <form action="#">
                            <input type="text" class="search_input" placeholder="Search" required="required">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="client_panel" style="display:none">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
                        <form action="#">
                            <h3>mostafa</h3>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>



<!--================ End Header Menu Area =================-->

   @yield('content')

    <!-- ================ Subscribe section start ================= -->
<div id="contact" ></div>
    <section class="subscribe-position">
        <div class="container">
            <div class="subscribe text-center" style="    padding: 85px 48px;">
                <h3 class="subscribe__title">{{__('9shop.CONTACT_US')}}</h3>

                    {!! Form::open(['route' => 'contacts.store' , 'method' => 'post' , 'class' => 'row login_form']) !!}
                            @if(!auth()->guard('client')->check())

                                <div class="col-md-12 form-group">
                                    <center>
                                        {!! Form::text('name' , old('name') ,
                                            [
                                                'class'=>'form-control' ,
                                                'placeholder'=>__('9shop.Username')
                                            ]) !!}

                                        @if($errors->has('name'))

                                            <label class="error_label">
                                                <i class="fas fa-exclamation-circle"></i>
                                                {{ $errors->first('name') }}
                                            </label>

                                        @endif
                                    </center>
                                </div>
                                <br>
                                <div class="col-md-12 form-group">
                                    {!! Form::email('email' , old('email') ,
                                        [
                                            'class'=>'form-control' ,
                                            'placeholder'=>__('9shop.email'),
                                            'id'=>'exampleFormControlInput1'
                                        ]) !!}

                                    @if($errors->has('email'))

                                        <label class="error_label">
                                            <i class="fas fa-exclamation-circle"></i>
                                            {{ $errors->first('email') }}
                                        </label>

                                    @endif
                                </div>
                                <br>
                                <div class="col-md-12 form-group">
                                    <textarea name="body" id="exampleFormControlTextarea1" rows="3"
                                              class="form-control" placeholder="{{__('9shop.Contact body ....')}}">{{old('body')}}</textarea>
                                    @if($errors->has('body'))

                                        <label class="error_label">
                                            <i class="fas fa-exclamation-circle"></i>
                                            {{ $errors->first('body') }}
                                        </label>

                                    @endif
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class=" button button-login " id="contact_btn">{{__('9shop.contact')}}</button>
                                </div>
                            @else
                                <div class="col-md-12 form-group">
                                                <textarea name="body" id="exampleFormControlTextarea1" rows="3"
                                                          class="form-control" placeholder="{{__('9shop.Contact body ....')}}">{{old('body')}}</textarea>
                                    @if($errors->has('body'))

                                        <label class="error_label">
                                            <i class="fas fa-exclamation-circle"></i>
                                            {{ $errors->first('body') }}
                                        </label>

                                    @endif
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class=" button button-login " id="contact_btn">{{__('9shop.contact')}}</button>
                                </div>
                            @endif

                {!! Form::close() !!}


            </div>
        </div>
    </section>
    <!-- ================ Subscribe section end ================= -->




<!--================ Start footer Area  =================-->
<footer class="footer">
    <div class="footer-area">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title large_title">Our Mission</h4>
                        <p>
                            So seed seed green that winged cattle in. Gathering thing made fly you're no
                            divided deep moved us lan Gathering thing us land years living.
                        </p>
                        <p>
                            So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved
                        </p>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Quick Links</h4>
                        <ul class="list">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Product</a></li>
                            <li><a href="#">Brand</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget instafeed">
                        <h4 class="footer_title">Gallery</h4>
                        <ul class="list instafeed d-flex flex-wrap">
                            <li><img src="{{asset('9shop/img/gallery/r1.jpg')}}" alt=""></li>
                            <li><img src="{{asset('9shop/img/gallery/r2.jpg')}}" alt=""></li>
                            <li><img src="{{asset('9shop/img/gallery/r3.jpg')}}" alt=""></li>
                            <li><img src="{{asset('9shop/img/gallery/r5.jpg')}}" alt=""></li>
                            <li><img src="{{asset('9shop/img/gallery/r7.jpg')}}" alt=""></li>
                            <li><img src="{{asset('9shop/img/gallery/r8.jpg')}}" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Contact Us</h4>
                        <div class="ml-40">
                            <p class="sm-head">
                                <span class="fa fa-location-arrow"></span>
                                Head Office
                            </p>
                            <p>123, Main Street, Your City</p>

                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                Phone Number
                            </p>
                            <p>
                                +123 456 7890 <br>
                                +123 456 7890
                            </p>

                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Email
                            </p>
                            <p>
                                free@infoexample.com <br>
                                www.infoexample.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->



<script src="{{asset('9shop/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('9shop/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('9shop/vendors/skrollr.min.js')}}"></script>
<script src="{{asset('9shop/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('9shop/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('9shop/vendors/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('9shop/vendors/mail-script.js')}}"></script>
<script src="{{asset('9shop/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script>
    $(document).ready(function(){
        $(".btn1").click(function(){

            $("#client_panel").hide();
            $(".search_panel").slideToggle(90);
        });

        $("#btn2").click(function(){

            $(".search_panel").hide();
            $("#client_panel").slideToggle(90);

        });

    @if( session()->get('success'))

    Swal.fire(
        'Good job!',
        '{{session('success')}}',
        'success'
    );

    @elseif(session()->get('fail'))
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: '{{session('fail')}}'
        });
    @endif

    });
</script>

    @yield('script')

</body>
</html>