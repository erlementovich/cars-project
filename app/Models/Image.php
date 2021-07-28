<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getUrl()
    {
        return Storage::url($this->getAttributeValue('path'));
    }
}
