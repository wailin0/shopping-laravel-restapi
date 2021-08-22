<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->description,
            'stock' => $this->stock,
            'ingredients' => $this->ingredients,
            'how_to_use' => $this->how_to_use,
            'brand' => $this->brand,
            'images' => $this->images
        ];
    }
}
