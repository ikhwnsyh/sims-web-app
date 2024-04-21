<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'stock', 'category_id', 'sell_price', 'buy_price', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function countSellPrice($attributes)
    {
        return $attributes + ($attributes * 30) / 100;
    }
}
