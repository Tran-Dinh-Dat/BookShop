<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'sale',
        'quanlity',
        'image',
        'status',
        'category_id',
        'product_type_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product_type()
    {
        return $this->belongsTo(Product_type::class);
    }

    public function oder_detail()
    {
        return $this->hasMany(Order_detail::class);
    }
}
