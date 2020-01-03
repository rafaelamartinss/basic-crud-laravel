<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'value',
        'quantity',
    ];


    public function category()
    {
        return $this->belongsTo(Product::class);
    }
}
