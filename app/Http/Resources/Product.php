<?php

namespace App\Http\Resources;

use App\Http\Resources\Category as CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        // 'posts' => PostResource::collection($this->posts),
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'category' => $this->category,
            'categories' => Category::orderBy('name')->get(),
        ];
    }
}
