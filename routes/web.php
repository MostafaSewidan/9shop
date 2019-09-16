<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/language', function () {

    session()->put('language' , 'en');
    return back();
});

Route::group(['middleware'=> ['language' , 'confirmPinCode']] , function ()
{

    Route::group(['namespace'=>'shopControllers'] , function ()
    {

        Route::group(['middleware'=>'loginBlock'] , function ()
        {

        /******************************(( Auth Module))************************/

        Route::get('client-login', 'AuthController@showLoginForm');

        Route::post('client-login', 'AuthController@login');

        Route::get('client-register', 'AuthController@showRegisterForm');

        Route::post('client-register', 'AuthController@register');

        Route::get('/Reset-password', 'AuthController@showResetPassword');
        Route::post('/Reset-password', 'AuthController@Reset_password');
        Route::get('/email-Reset-password', 'AuthController@showEmailResetPassword');
        Route::post('/email-Reset-password', 'AuthController@email_Reset_password');

        Route::get('/Resend-reset-pin-code', 'AuthController@Resend_reset_pin_code');

        Route::get('/reset-password-form', 'AuthController@showResetPasswordForm');
        Route::post('/reset-password-form', 'AuthController@reset_password_form');

        /************************************************************************/

        });

        Route::group(['middleware'=>'authCheck'] , function ()
        {


        });

        /******************************(( Home Module))************************/

        Route::resource('/' , 'HomeController');

        /************************************************************************/


        /******************************(( contacts Module))************************/

        Route::resource('/contacts' , 'ContactController');

        /************************************************************************/

        /******************************(( Categories Module))************************/

        Route::resource('/category' , 'CategoryController');

        /************************************************************************/

        /******************************(( Products Module))************************/

        Route::resource('/product' , 'ProductController');

        /************************************************************************/
    });

});


Route::group(['middleware'=>'authCheck'] , function () {

    /******************************(( pin code Module))************************/

    Route::get('/confirm-pinCode', 'shopControllers\AuthController@showConfirmPinCode');
    Route::post('/confirm-pinCode', 'shopControllers\AuthController@confirm_pinCode');
    Route::get('/Resend-pin-code', 'shopControllers\AuthController@Resend_pinCode');

    /************************************************************************/

});
Auth::routes();

