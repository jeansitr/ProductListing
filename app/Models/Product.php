<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at'];

    public static function boot()
    {
        parent::boot();

        static::saving(function (Product $product) {
            $product->image = '/image/product/'.str($product->title)->replace(' ', '_')->lower().'.png';
        });
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
