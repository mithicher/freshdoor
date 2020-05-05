<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'category_id',
        'shop_id',
        'name',
        'description',
        'slug',
        'image',
        'price',
        'discount',
        'available',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'shop_id' => 'integer',
        'price' => 'decimal:2',
        'discount' => 'decimal:2',
        'available' => 'boolean',
    ];


    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }

    public function shop()
    {
        return $this->belongsTo(\App\Shop::class);
    }
}
