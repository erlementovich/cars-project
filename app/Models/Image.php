<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function carsGallery()
    {
        return $this->belongsToMany(Car::class);
    }
}
