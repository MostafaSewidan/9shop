@extends('9shop.layouts.app')


@section('content')

    <!--================Login Box Area =================-->
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover">
                            <h4>{{__('9shop.New_to_our_website')}}</h4>
                            <p>{{__('9shop.login_p')}}</p>
                            <a class="button button-account" href="register.html">{{__('9shop.Create_an_account')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>{{__('9shop.Log_in_to_enter')}}</h3>

                        {!! Form::open(['url'=>'login' , 'method'=>'post' , 'class'=>'row login_form' , 'id'=>'contactForm']) !!}

                            <div class="col-md-12 form-group">
                                {!! Form::text('email' , old('email') ,
                                [
                                    'class'=>'form-control' ,
                                    'placeholder'=>__('9shop.Username')
                                ]) !!}

                                @if($errors->has('email'))

                                    <label class="error_label">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('email') }}
                                    </label>

                                @endif

                                @if(session()->get('email_error'))

                                    <label class="error_label">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ session()->get('email_error') }}
                                    </label>

                                @endif

                            </div>
                            <div class="col-md-12 form-group">
                                {!! Form::password('password' ,
                                [
                                    'class'=>'form-control' ,
                                    'placeholder'=>__('9shop.Password')
                                ]) !!}

                                @if($errors->has('password'))

                                   <label class="error_label">
                                       <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('password') }}
                                   </label>

                                @endif

                                @if(session()->get('pass_error'))

                                    <label class="error_label">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ session()->get('pass_error') }}
                                    </label>

                                @endif

                            </div>

                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="remember">
                                    <label for="f-option2">{{__('9shop.Keep_me_logged_in')}}</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="button button-login w-100">{{__('9shop.Log_In')}}</button>
                                <a href="#">{{__('9shop.Forgot_Password')}}</a>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->


@endsection