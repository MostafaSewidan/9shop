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
                            <a class="button button-account" href="{{url('/client-register')}}">{{__('9shop.Create_an_account')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>{{__('9shop.Log_in_to_enter')}}</h3>

                        {!! Form::open(['url'=>'/client-login' , 'method'=>'post' , 'class'=>'row login_form' , 'id'=>'contactForm']) !!}

                            <div class="col-md-12 form-group">
                                {!! Form::text('email' , old('email') ,
                                [
                                    'class'=>'form-control' ,
                                    'placeholder'=>__('9shop.email')
                                ]) !!}


                                    <label class="error_label" style="display: none" id="email">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span></span>
                                    </label>




                            </div>
                            <div class="col-md-12 form-group">
                                {!! Form::password('password' ,
                                [
                                    'class'=>'form-control' ,
                                    'placeholder'=>__('9shop.Password')
                                ]) !!}

                                <label class="error_label" style="display: none" id="password">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span></span>
                                </label>

                            </div>

                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="remember">
                                    <label for="f-option2">{{__('9shop.Keep_me_logged_in')}}</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="button" class="button button-login w-100" id="login_button">{{__('9shop.Log_In')}}</button>
                                <a href="{{url('email-Reset-password')}}">{{__('9shop.Forgot_Password')}}</a>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->


@endsection

@section('script')

    <script>
        $(document).ready(function() {

            $('#login_button').click(function () {

                var url = $('#contactForm').attr('action');
                var form_data = $('#contactForm').serialize();

                $('#email').hide();
                $('#password').hide();

                $('#email span').text('');
                $('#password span').text('');
                $.ajax({
                    url: url,
                    type: 'post',
                    data: form_data,
                    success:function(data){

                        if (data.redirect) {
                            // data.redirect contains the string URL to redirect to
                            window.location.href = data.redirect;
                        }

                    },
                    error: function (data) {
                        var error = data.responseJSON.errors;
                        if( error.hasOwnProperty("email"))
                        {

                            $('#email span').text('').append(error['email']);
                            $('#email').show();

                        }
                        if( error.hasOwnProperty("password"))
                        {

                            $('#password span').text('').append(error['password']);
                            $('#password').show();

                        }
                    }
                });
            });
        });
    </script>

@endsection
