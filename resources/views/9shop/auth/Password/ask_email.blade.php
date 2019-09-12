

@extends('9shop.layouts.app')
@section('content')


    <!--================Login Box Area =================-->
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="login_form_inner register_form_inner">
                        <h6>{{__('9shop.ask_email')}}</h6>
                        {!! Form::open(['url'=>'/email-Reset-password' , 'method'=>'post' , 'class'=>'row login_form' , 'id'=>'register_form']) !!}

                        <div class="col-md-12 form-group">

                            {!! Form::email('email' , old('email') ,
                            [
                                'class'=>'form-control' ,
                                'placeholder'=>__('9shop.email')
                            ]) !!}
                            @if($errors->has('email'))

                                <label class="error_label">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $errors->first('email') }}
                                </label>

                            @endif
                        </div>


                        <div class="col-md-12 form-group">

                            <button type="submit" value="submit" class="button button-login w-100">Send</button>

                        </div>


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->

@endsection