<?php

namespace App\Http\Controllers\shopControllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('9shop.auth.login');
    }

    public function login(Request $request)
    {

        $rules =
            [
                'email'=>'required',
                'password'=>'required'
            ];

        $error_sms =
            [
                'email.required'=>__('9shop.please_enter_your_email'),
                'password.required'=>__('9shop.please_enter_your_password')
            ];

        $data = validator()->make($request->all() , $rules , $error_sms );

        if($data->fails())
        {
            return redirect('/login')->withInput()->withErrors($data->errors());
        }

        $remember = $request->has('remember')?true:false;
        if(Auth::guard('client')->attempt(['email' => $request->email , 'password' => $request->password ] , $remember))
        {
            redirect('/');
        }else{

//            $email = optional(Client::where('email' , $request->email)->first());
//
//            if($email)
//            {
//                session()->flash('pass_error' , __('9shop.pass_error'));
//                return back();
//            }else
//            {
//                session()->flash('email_error' , __('9shop.email_error'));
//                return back();
//            }

        }
    }
}
