<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Place;

class Picture extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'place', 'date', 'info'
    ];

     /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

     protected $casts = [
        'info' => 'array'
    ];

    public function getFilenameAttribute()
    {
        return date('Y_m_d_His', $this->date).'.jpg';
    }

    public function getPlaceNameAttribute()
    {
        return Place::find($this->place)->name;
    }
}
