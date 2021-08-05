<?php

namespace App\Models;

use App\Events\CarCreatedEvent;
use App\Events\CarDeletedEvent;
use App\Events\CarUpdatedEvent;
use App\Events\ModelCreatedEvent;
use App\Events\ModelDeletedEvent;
use App\Events\ModelUpdatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => ModelCreatedEvent::class,
        'updated' => ModelUpdatedEvent::class,
        'deleted' => ModelDeletedEvent::class,
    ];

    protected $fillable = [
        'name',
        'body',
        'price',
        'price',
        'old_price',
        'car_body_id'
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
