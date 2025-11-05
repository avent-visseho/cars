<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'description',
        'price',
        'main_image'
    ];

    // Relation : Une voiture a plusieurs images
    public function images()
    {
        return $this->hasMany(CarImage::class);
    }

    // Accesseur pour formater le prix
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, ',', ' ');
    }
}
