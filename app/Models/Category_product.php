<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_product extends Model 
{

    protected $table = 'category_product';
    public $timestamps = true;
    protected $fillable = array('category_id', 'product_id');

}