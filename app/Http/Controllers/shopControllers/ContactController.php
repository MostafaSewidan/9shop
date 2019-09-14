<?php

namespace App\Http\Controllers\shopControllers;

use App\Models\Client;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->guard('client')->check())
        {
            $rules =
                [
                    'body'=>'required'
                ];


            $data = validator()->make($request->all() , $rules );

            if($data->fails())
            {
                return redirect('/#contact')->withInput()->withErrors($data->errors());
            }

            $client = Client::find(auth()->guard('client')->user()->id);
            $client->contacts()->create(['body' => $request->body , 'name' => $client->name , 'email' => $client->email ]);
            return redirect('/');
        }else{
            $rules =
                [
                    'body'=>'required',
                    'name'=>'required',
                    'email'=>'required|email',
                ];


            $data = validator()->make($request->all() , $rules );

            if($data->fails())
            {
                return redirect('/#contact')->withInput()->withErrors($data->errors());
            }

            Contact::create(['body' => $request->body , 'name' => $request->name , 'email' => $request->email ]);
            return redirect('/');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
