<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Picture;

class Place extends Model
{
    use HasFactory;

     protected $casts = [
        'info' => 'array'
    ];

    public function getLastPictureAttribute()
    {
        return Picture::where('place', $this->id)->orderBy('date', 'desc')->first();
    }
}
