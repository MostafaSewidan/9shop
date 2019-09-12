<?php

namespace App\Http\Controllers\shopControllers;

use App\Mail\confirmEmail;
use App\Mail\ResetPassword;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{

//    ***************************(( Login view))********************************
    public function showLoginForm()
    {

        return view('9shop.auth.login');

    }
//    **************************************************************************


//    ***************************(( Login request))********************************
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
            return redirect('/client-login')->withInput()->withErrors($data->errors());
        }

        $email = Client::where('email' , $request->email)->first();

        if($email)
        {
            if($email->activation == 'false')   // check validation block
            {
                return back()->withInput()->withErrors(['email' => __('9shop.email_is_wrong')]);
            }
        }

        if(auth()->guard('client')->attempt(['email' => $request->email , 'password' => $request->password]))
        {
            return redirect('/');
        }else{


            if($email)
            {
                return back()->withInput()->withErrors(['password' => __('9shop.password_is_wrong')]);
            }else
            {
                return back()->withInput()->withErrors(['email' => __('9shop.email_is_wrong')]);
            }

        }
    }

//    **************************************************************************


//    ***************************(( register view))********************************
    public function showRegisterForm()
    {
        return view('9shop.auth.register');
    }
//    **************************************************************************


//    ***************************(( register request))********************************
    public function register(Request $request)
    {

        $rules =
            [
                'name'=>'required',
                'email'=>'required|unique:clients',
                'phone'=>'required|unique:clients|regex:/(01)[0-9]{9}/',
                'city_id'=>'required',
                'password'=>'required|confirmed'
            ];


        $data = validator()->make($request->all() , $rules );

        if($data->fails())
        {
            return redirect('/client-register')->withInput()->withErrors($data->errors());
        }


        $code = Str::random(6);   //pin code

        $client = Client::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'city_id'=>$request->city_id,
                'password'=> Hash::make($request->password) ,
                'pin_code' => $code ,
                'activation' => 'not_confirm'
            ]
        );


        Mail::to($client->email)                    //send email with pin code to user email
            ->bcc(__('9shop.siteEmail'))
            ->send(new confirmEmail($code));

        if(auth()->guard('client')->attempt(['email' => $request->email , 'password' => $request->password]))   // make user login
        {
            return redirect('/');
        }

    }
//    **************************************************************************


//    ***************************(( confirm pin code  view))********************************
    public function showConfirmPinCode()
    {
        if(auth()->guard('client')->user()->activation != 'not_confirm') // check if user confirmed his account
        {
            return redirect('/');
        }
        return view('9shop.auth.confirmPinCode');
    }
//    **************************************************************************

//    ***************************(( confirm pin code request))********************************
    public function confirm_pinCode(Request $request)
    {

        $rules =
            [
                'pin_code'=>'required|min:6|max:6'
            ];


        $data = validator()->make($request->all() , $rules );

        if($data->fails())
        {
            return redirect('/confirm-pinCode')->withInput()->withErrors($data->errors());
        }

        $user_pinCode = Str::upper(auth()->guard('client')->user()->pin_code);

        $input_pinCode = Str::upper($request->pin_code);

        if( $user_pinCode == $input_pinCode )
        {
            $pin_code = Str::random(6);

            Client::find(auth()->guard('client')->user()->id)->update([
               'pin_code' => $pin_code,
               'activation' => 'true'           // update activation means the account is confirmed
            ]);

            return redirect('/');
        }else{
            return back()->withInput()->withErrors(['pin_code' => __('9shop.pin_code_error')]);
        }

    }
//    **************************************************************************


//    ***************************(( resend confirmation pin code))********************************
    public function Resend_pinCode()
    {

        if(auth()->guard('client')->user()->activation != 'not_confirm') //check if user confirm his account
        {
            return back();
        }

        $pin_code = Str::random(6);

        $client = Client::find(auth()->guard('client')->user()->id);

        $client->update([           //update pin code
           'pin_code' => $pin_code
        ]);

        Mail::to($client->email)            //resend pin code to user email
            ->bcc(__('9shop.siteEmail'))
            ->send(new confirmEmail($pin_code));

        return back()->withInput()->withErrors(['was_send_again' => __('9shop.was_send_again')]);
    }
//    **************************************************************************


//    ***************************(( resend reset password pin code))********************************
    public function Resend_reset_pin_code()
    {

        $pin_code = Str::random(6);

        $client = Client::where('email' , session('email'))->first(); // check user email

        if($client)
        {
            $client->update([                           // update pin code
                'pin_code' => $pin_code
            ]);

            Mail::to($client->email)                // resend pin code to user email
                ->bcc(__('9shop.siteEmail'))
                ->send(new ResetPassword($pin_code));

            return back()->withInput()->withErrors(['was_send_again' => __('9shop.was_send_again')]);

        }else{

            session('email')->flush();          // if any problem in session named email
            redirect('/Reset-password');
        }


    }
//    **************************************************************************



//    ***************************(( ask email for reset password view))********************************
    public function showEmailResetPassword()
    {
        return view('9shop.auth.Password.ask_email');
    }

//    **************************************************************************



//    ***************************((ask email for reset password request))********************************
    public function email_Reset_password(Request $request)
    {

        $rules =
            [
                'email'=>'required|email'
            ];


        $data = validator()->make($request->all() , $rules );

        if($data->fails())
        {
            return redirect('/email-Reset-password')->withInput()->withErrors($data->errors());
        }

        $client = Client::where('email'  , $request->email)->first();

        if($client)                                                 // check if database has client has this email
        {
            $pin_code = Str::random(6);

            $client->update(['pin_code' => $pin_code]);             // update pin code

            Mail::to($client->email)                                // send pin code to user email
                ->bcc(__('9shop.siteEmail'))
                ->send(new ResetPassword($pin_code));

            session()->put('email' , $client->email);               // create session named email with value user email
            return redirect('/Reset-password');
        }else{
            return back()->withInput()->withErrors(['email' => __('9shop.email_is_invalid')]);
        }
    }
//    **************************************************************************


//    ***************************(( show Reset Password view))********************************
    public function showResetPassword()
    {
        if(session('email'))                // check if any problem in session called email
        {
            return view('9shop.auth.Password.ResetPassword');
        }else{
            return abort(404);
        }
    }

//    **************************************************************************



//    ***************************(( Reset password request))********************************
    public function Reset_password(Request $request)
    {

        $rules =
            [
                'pin_code'=>'required|min:6|max:6'
            ];


        $data = validator()->make($request->all() , $rules );

        if($data->fails())
        {
            return redirect('/Reset-password')->withInput()->withErrors($data->errors());
        }
        $client = Client::where('email'  , session('email'))->first();

        if($client)
        {
            $user_pinCode = Str::upper($client->pin_code);
            $input_pinCode = Str::upper($request->pin_code);

            if( $user_pinCode == $input_pinCode )               // check pin code
            {
                $pin_code = Str::random(6);
                $client->update([                               // update pin code
                    'pin_code' => $pin_code
                ]);

                session()->put('id' , $client->id);                 // create a session named id with value user id
                return redirect('/reset-password-form');
            }else{
                return back()->withInput()->withErrors(['pin_code' => __('9shop.pin_code_error')]);
            }

        }else{
            session('email')->flush();              // if any problem in session
            return abort(404);
        }

    }

//    **************************************************************************


//    ***************************(( show Reset Password Form view))********************************

    public function showResetPasswordForm()
    {
        if(session('id'))
        {
            return view('9shop.auth.Password.resetPasswordForm');
        }else{

            session('id')->flush();
            session('email')->flush();
            return abort(404);
        }
    }

//    **************************************************************************


//    ***************************(( reset password form request))********************************

    public function reset_password_form(Request $request)
    {

        $rules =
            [
                'password'=>'required|confirmed'
            ];


        $data = validator()->make($request->all() , $rules );

        if($data->fails())
        {
            return redirect('/reset-password-form')->withInput()->withErrors($data->errors());
        }

        if(session('id'))
        {
            $client = Client::find(session('id'));


            if($client)
            {

                $client->update(['password' => Hash::make($request->password)]);        // update user password after confirm hes account

                return redirect('/client-login');

            }else{

                session()->flush();                     // if any problem in session
                return abort(404);
            }

        }else{

            session()->flush();                     // if any problem in session
            return abort(404);
        }

    }

//    **************************************************************************

}
