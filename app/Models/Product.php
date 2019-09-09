<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name', 'price', 'description', 'offer_price', 'offer_time', 'rete');

    public function image()
    {
        return $this->morphMany('App\Models\Image');
    }

    public function specifications()
    {
        return $this->hasMany('App\Models\Specification');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}