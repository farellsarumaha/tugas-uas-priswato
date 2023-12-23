<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'desc',
        'stock',
        'price'
    ];

    protected static function boot(): void
    {
        parent::boot();
        self::creating(function ($product) {
            $product->slug = Str::slug($product->title . '-slug-' . Str::random(10));
        });
        self::updating(function ($product) {
            $product->slug = Str::slug($product->title . '-slug-' . Str::random(10));
        });
    }

    public function getPriceByFormat(){
        return 'IDR. ' . number_format(($this->price), 0, ',', '.');
    }
}
