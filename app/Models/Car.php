<?php

namespace App\Models;

use App\Events\CarCreatedEvent;
use App\Events\CarDeletedEvent;
use App\Events\CarUpdatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => CarCreatedEvent::class,
        'updated' => CarUpdatedEvent::class,
        'deleted' => CarDeletedEvent::class,
    ];

    public function carEngine()
    {
        return $this->belongsTo(CarEngine::class);
    }

    public function carBody()
    {
        return $this->belongsTo(CarBody::class);
    }

    public function carClass()
    {
        return $this->belongsTo(CarClass::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function gallery()
    {
        return $this->belongsToMany(Image::class);
    }
}
