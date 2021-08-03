<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'body' => $this->body,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'car_body_id' => $this->car_body_id,
        ];
    }

    public function with($request)
    {
        return ['success' => true];
    }
}
