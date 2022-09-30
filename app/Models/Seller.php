<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::saving(function (Seller $seller) {
            $seller->image = '/image/seller/'.str($seller->name)->replace(' ', '_')->lower().'.png';
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
