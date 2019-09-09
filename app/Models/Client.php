<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'city_id', 'email', 'phone', 'activation', 'pin_code', 'password');
    protected $hidden = array('password');

    public function image()
    {
        return $this->morphOne('App\Models\Image');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

}