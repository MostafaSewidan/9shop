<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name' , 'details   ');

    public function image()
    {
        return $this->morphOne('App\Models\Image' , 'imageable');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

}