<?php

namespace App\Models;

use App\Events\CategoryCreatedEvent;
use App\Events\CategoryDeletedEvent;
use App\Events\CategoryUpdatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory, HasSlug, NodeTrait;

    protected $fillable = ['name'];

    protected $dispatchesEvents = [
        'created' => CategoryCreatedEvent::class,
        'updated' => CategoryUpdatedEvent::class,
        'deleted' => CategoryDeletedEvent::class,
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug)->first();
    }
}
