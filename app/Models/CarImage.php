<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'image_path'
    ];

    // Relation : Une image appartient à une voiture
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
