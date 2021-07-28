<?php

namespace App\Models;

use App\Contracts\Interfaces\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model implements HasTags
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'description',
        'body',
        'published_at',
        'image_id',
    ];

    protected $dates = [
        'published_at',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
