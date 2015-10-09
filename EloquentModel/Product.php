<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    protected $fillable = [
    'category_id', 'title', 'description', 'price', 'availibility', 'image',
    ];

    public function category()
    {
    	return $this->belongsTo('Category');
    }
}
