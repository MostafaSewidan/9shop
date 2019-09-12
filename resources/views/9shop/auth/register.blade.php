<?php $cities = \App\Models\City::all(); ?>

@extends('9shop.layouts.app')
@section('content')


    <!--================Login Box Area =================-->
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="login_form_inner register_form_inner">
                        <h3>Create an account</h3>
                        {!! Form::open(['url'=>'/client-register' , 'method'=>'post' , 'class'=>'row login_form' , 'id'=>'register_form']) !!}

                            <div class="col-md-12 form-group">

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
                             </div>

                            <div class="col-md-12 form-group">

                                {!! Form::text('email' , old('email') ,
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

                                {!! Form::text('phone' , old('phone') ,
                               [
                                   'class'=>'form-control' ,
                                   'placeholder'=>__('9shop.phone')
                               ]) !!}

                                @if($errors->has('phone'))

                                    <label class="error_label">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('phone') }}
                                    </label>

                                @endif
                            </div>

                            <div class="col-lg-12 form-group">
                                <select style="width: 100%" name="city_id">
                                    <option value="{{null}}">Choose City</option>
                                    @foreach($cities as $city)

                                        <option value="{{optional($city)->id}}">{{optional($city)->name}}</option>

                                    @endforeach
                                </select>
                                @if($errors->has('city_id'))

                                    <label class="error_label">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('city_id') }}
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
                        </div>


                        <div class="col-md-12 form-group">

                            {!! Form::password('password_confirmation' ,
                           [
                               'class'=>'form-control' ,
                               'placeholder'=>__('9shop.password_confirmation')
                           ]) !!}
                            @if($errors->has('password_confirmation'))

                                <label class="error_label">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $errors->first('password') }}
                                </label>

                            @endif
                        </div>

                            <div class="col-md-12 form-group">

                                <button type="submit" value="submit" class="button button-login w-100">Register</button>

                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->

@endsection