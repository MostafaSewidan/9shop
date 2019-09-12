

@extends('9shop.layouts.app')
@section('content')


    <!--================Login Box Area =================-->
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="login_form_inner register_form_inner">
                        <h6>{{__('9shop.confirm_pinCode')}}</h6>
                        {!! Form::open(['url'=>'/confirm-pinCode' , 'method'=>'post' , 'class'=>'row login_form' , 'id'=>'register_form']) !!}

                        <div class="col-md-12 form-group">

                            {!! Form::text('pin_code' , old('pin_code') ,
                            [
                                'class'=>'form-control' ,
                                'placeholder'=>__('9shop.pin_code'),
                                'autocomplete' => 'off'
                            ]) !!}
                            @if($errors->has('pin_code'))

                                <label class="error_label">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $errors->first('pin_code') }}
                                </label>

                            @endif
                        </div>


                        <div class="col-md-12 form-group">

                            <button type="submit" value="submit" class="button button-login w-100">Send</button>

                        </div>
                        <div class="col-md-12" style="padding-bottom: 1pc">

                            @if($errors->has('was_send_again'))

                                <p class="p_link">
                                    {{ $errors->first('was_send_again') }}
                                </p>

                            @endif

                            <a href="{{url('/Resend-pin-code')}}" class="link">{{__('9shop.Resend_pin_code')}}</a>

                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->

@endsection