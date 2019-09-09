<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'client_id', 'body');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}