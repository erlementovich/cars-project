<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;

    public function carEngine(): HasOne
    {
        return $this->hasOne(CarEngine::class);
    }

    public function carBody(): HasOne
    {
        return $this->hasOne(CarBody::class);
    }

    public function carClass(): HasOne
    {
        return $this->hasOne(CarClass::class);
    }
}
