

@extends('9shop.layouts.app')
@section('content')


    <!--================Login Box Area =================-->
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="login_form_inner register_form_inner">
                        {!! Form::open(['url'=>'/reset-password-form' , 'method'=>'post' , 'class'=>'row login_form' , 'id'=>'register_form']) !!}


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
                        </div>


                        <div class="col-md-12 form-group">

                            {!! Form::password('password_confirmation' ,
                            [
                                'class'=>'form-control' ,
                                'placeholder'=>__('9shop.password_confirmation')
                            ]) !!}
                        </div>


                        <div class="col-md-12 form-group">

                            <button type="submit" value="submit" class="button button-login w-100">{{__('9shop.save')}}</button>

                        </div>


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->

@endsection