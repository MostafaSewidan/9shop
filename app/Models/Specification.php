<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model 
{

    protected $table = 'specifications';
    public $timestamps = true;
    protected $fillable = array('product_id', 'name', 'value', 'unit');

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}