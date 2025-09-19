<?php

namespace App\Http\Resources\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property mixed $active
 * @property mixed $code
 * @property mixed $sort
 * @property mixed $image
 * @property mixed $description
 */
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'active' => $this->active,
            'code' => $this->code,
            'sort' => $this->sort,
            'image' => $this->image,
            'description' => $this->description,
        ];
    }
}
