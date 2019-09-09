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

Route::group(['middleware'=> 'language'] , function ()
{
    Route::get('/', function () {
        return view('9shop.layouts.app');
    });

    Route::group(['namespace'=>'shopControllers'] , function ()
    {

        /******************************(( Home Module))************************/

        Route::resource('/Home' , 'HomeController');

        /************************************************************************/

    });

});