<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'alt'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function banners()
    {
        return $this->hasMany(Car::class);
    }

    public function carsGallery()
    {
        return $this->belongsToMany(Car::class);
    }
}
